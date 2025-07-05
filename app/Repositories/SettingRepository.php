<?php

namespace App\Repositories;

use App\Constants\Constants;
use App\Dto\SiteSettings\ActiveLanguageDto;
use App\Dto\SiteSettings\BasicInfoDto;
use App\Dto\SiteSettings\InstallLanguageDto;
use App\Dto\SiteSettings\RegisterDto;
use App\Dto\SiteSettings\SmtpDto;
use App\Dto\SiteSettings\SocialDto;
use App\Dto\SiteSettings\UpdateDefaultLanguageDto;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;

class SettingRepository extends BaseRepository
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Setting $model)
    {
        $this->setModel($model);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->_model->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function basic_info(BasicInfoDto $data)
    {
        $dataArray = $data->toArray();
        $dataResult = $this->index();

        if (isset($dataArray['image'])) {
            $existingImage = $dataResult->file()->where('type', 'logo')->first();

            if ($existingImage) {
                $this->deleteFile($existingImage->path);
                $existingImage->delete();
            }

            $profileUpload = $this->uploadFile($dataArray['image'], $this->_imgPath);
            $profileUpload['type'] = Constants::LOGOTYPE;
            $dataResult->file()->create($profileUpload);
        }

        $dataResult->update($dataArray);

        app(\App\Services\SettingService::class)->clearCache();

        return true;
    }

    private function updateData($data)
    {
        $dataArray = $data->toArray();
        $dataResult = $this->index();

        $dataResult->update($dataArray);

        app(\App\Services\SettingService::class)->clearCache();

        return true;
    }

    public function smtp_update(SmtpDto $data)
    {
        return $this->updateData($data);
    }

    public function social_update(SocialDto $data)
    {
        return $this->updateData($data);
    }

    public function register_update(RegisterDto $data)
    {
        return $this->updateData($data);
    }

    public function update_default_language(UpdateDefaultLanguageDto $data)
    {
        return $this->updateData($data);
    }

    public function install_language(InstallLanguageDto $data)
    {
        $dataArray = $data->toArray();
        $newLanguage = $dataArray['available'];

        $dataResult = $this->index();
        $languages = $dataResult->installed_languages;

        if (!in_array($newLanguage, $languages)) {
            $languages[] = $newLanguage;
        }

        $updatedLanguages['installed_languages'] = implode(',', $languages);
        $dataResult->update($updatedLanguages);

        app(\App\Services\SettingService::class)->clearCache();

        return true;
    }

    public function active_language(ActiveLanguageDto $data)
    {
        $dataArray = $data->toArray();
        $newLanguage = $dataArray['locale'];
        $is_installed = $dataArray['is_installed'];

        $dataResult = $this->index();
        $languages = $dataResult->languages;

        if (is_string($languages)) {
            $languages = explode(',', $languages);
        }

        if ($is_installed) {
            if (!in_array($newLanguage, $languages)) {
                $languages[] = $newLanguage;
            }
        } else {
            if (($key = array_search($newLanguage, $languages)) !== false) {
                unset($languages[$key]);
            }
        }

        $updatedLanguages['languages'] = implode(',', $languages);
        $dataResult->update($updatedLanguages);

        app(\App\Services\SettingService::class)->clearCache();

        return true;
    }

    public function clear_cache()
    {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');

        return true;
    }
}
