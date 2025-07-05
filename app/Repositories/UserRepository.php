<?php

namespace App\Repositories;

use App\Constants\Constants;
use App\Dto\UserDto;
use App\Interface\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Password;
use App\Notifications\UserCreatedResetNotification;

class UserRepository extends BaseRepository implements UserInterface
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(User $model)
    {
        $this->setModel($model);
    }

    public function get_all_users()
    {
        return $this->_model->whereHas('roles', function ($q) {
            $q->whereNotIn('name', [Constants::SUPERADMIN]);
        })->get();
    }

    public function getStaff($user)
    {
        return $this->_model->whereHas('roles', function ($q) use ($user) {
            $q->where('name', $user);
        })->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserDto $data)
    {
        $dataArray = $data->toArray();
        $roleId = $dataArray['type'];
        $dataArray['email_verified_at'] = now();

        $roleName = Role::whereId($roleId)->pluck('name')->first();

        if (is_null($roleName)) {
            throw new NotFoundHttpException('The specified role does not exist.'); // Throw a custom exception
        }

        unset($dataArray['type']);

        $user = $this->add($this->_model, $dataArray);
        $user->assignRole($roleName);

        if (isset($dataArray['image'])) {
            $profileUpload = $this->uploadFile($dataArray['image'], $this->_imgPath);
            $profileUpload['type'] = Constants::PROFILETYPE;
            $user->file()->create($profileUpload);
        }

        $token = Password::broker()->createToken($user);

        $user->notify(new UserCreatedResetNotification($token));

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UserDto $data)
    {
        $dataArray = $data->toArray();

        if (isset($dataArray['password'])) {
            $dataArray['password'] = Hash::make($dataArray['password']);
        }

        $dataResult = $this->get_by_id($this->_model, $id);

        if (isset($dataArray['image'])) {
            $existingImage = $dataResult->file()->first();

            if ($existingImage) {
                $this->deleteFile($existingImage->path);
                $existingImage->delete();
            }

            $profileUpload = $this->uploadFile($dataArray['image'], $this->_imgPath);
            $profileUpload['type'] = Constants::PROFILETYPE;
            $dataResult->file()->create($profileUpload);
        }

        $dataResult->update($dataArray);

        return $dataResult;
    }

    public function validateEmail($email)
    {
        $data = $this->get_by_column_single($this->_model, ['email' => $email]);

        if ($data == null) {
            return false;
        } else {
            return true;
        }
    }
}
