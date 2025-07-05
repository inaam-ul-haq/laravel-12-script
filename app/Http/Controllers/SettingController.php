<?php

namespace App\Http\Controllers;

use App\Dto\SiteSettings\ActiveLanguageDto;
use App\Dto\SiteSettings\BasicInfoDto;
use App\Dto\SiteSettings\RegisterDto;
use App\Dto\SiteSettings\SmtpDto;
use App\Dto\SiteSettings\SocialDto;
use App\Dto\SiteSettings\UpdateDefaultLanguageDto;
use App\Dto\SiteSettings\InstallLanguageDto;
use App\Helper\Exception;
use App\Repositories\SettingRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettings\ActiveLanguageRequest;
use App\Http\Requests\SiteSettings\BasicInfoRequest;
use App\Http\Requests\SiteSettings\InstallLanguageRequest;
use App\Http\Requests\SiteSettings\RegisterRequest;
use App\Http\Requests\SiteSettings\SmtpRequest;
use App\Http\Requests\SiteSettings\SocialLoginRequest;
use App\Http\Requests\SiteSettings\UpdateDefaultLanguage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    private $_repo = null;
    private $_directory = 'auth.pages.settings';

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(SettingRepository $repo)
    {
        $this->_repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($blade)
    {
        try {
            $view = $this->_directory . '.' . $blade;

            $data = $this->_repo->index();
            return view($view, compact('data'));
        } catch (\Throwable $th) {
            return Exception::handle($th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request Validation $validation
     * @return \Illuminate\Http\Response
     */
    public function basic_info(BasicInfoRequest $request)
    {
        try {
            $this->_repo->basic_info(BasicInfoDto::fromRequest($request->validated()));
            return redirect()->back()->with('success', 'Updated succesfully');
        } catch (\Throwable $th) {
            return Exception::handle($th);
        }
    }

    public function social_logins_update(SocialLoginRequest $request)
    {
        try {
            $this->_repo->social_update(SocialDto::fromRequest($request->validated()));
            return redirect()->back()->with('success', 'Updated succesfully');
        } catch (\Throwable $th) {
            return Exception::handle($th);
        }
    }

    public function smtp_update(SmtpRequest $request)
    {
        try {
            $this->_repo->smtp_update(SmtpDto::fromRequest($request->validated()));
            return redirect()->back()->with('success', 'Updated succesfully');
        } catch (\Throwable $th) {
            return Exception::handle($th);
        }
    }

    public function registeration_update(RegisterRequest $request)
    {
        try {
            $this->_repo->register_update(RegisterDto::fromRequest($request->validated()));
            return redirect()->back()->with('success', 'Updated succesfully');
        } catch (\Throwable $th) {
            return Exception::handle($th);
        }
    }

    public function payments_update() {}

    public function clear_cache()
    {
        try {
            $this->_repo->clear_cache();
            return redirect()->back()->with('success', 'All cache cleared for your website.');
        } catch (\Throwable $th) {
            return Exception::handle($th);
        }
    }

    public function update_default_language(UpdateDefaultLanguage $request)
    {
        try {
            $this->_repo->update_default_language(UpdateDefaultLanguageDto::fromRequest($request->validated()));
            return response()->json(['message' => 'Language updated successfully.']);
        } catch (\Throwable $th) {
            return Exception::handle($th);
        }
    }

    public function install_language(InstallLanguageRequest $request)
    {
        try {
            $this->_repo->install_language(InstallLanguageDto::fromRequest($request->validated()));
            return response()->json(['message' => 'Language updated successfully.']);
        } catch (\Throwable $th) {
            return Exception::json($th);
        }
    }

    public function active_language(ActiveLanguageRequest $request)
    {
        try {
            $this->_repo->active_language(ActiveLanguageDto::fromRequest($request->validated()));
            return response()->json(['message' => 'Language updated successfully.', 'status' => Response::HTTP_OK]);
        } catch (\Throwable $th) {
            return Exception::json($th);
        }
    }
}
