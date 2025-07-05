<?php

namespace App\Repositories;

use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\VerificationCode;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Mail;

class PasswordRepository
{
    public function change_password($request)
    {
        if (!Hash::check($request['old_password'], auth()->user()->password)) {
            throw new NotFoundHttpException('Old Password wroung');
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request['new_password'])
        ]);

        return true;
    }

    public function get_email($email)
    {
        $userRepo = new UserRepository();
        $data = $userRepo->validateEmail($email['email']);

        if (!$data) {
            throw new NotFoundHttpException('There is no account related to this email.');
        }

        Mail::to($email)->send(new VerificationMail($email['email']));

        return true;
    }

    public function reset_password($data)
    {
        $verificationCode = VerificationCode::where(['code' => $data['code'], 'ip' => request()->ip()])->first();

        if ($verificationCode == null) {
            throw new NotFoundHttpException('Your code expired');
        }

        $user = User::where('email', $verificationCode->email)->first();
        $user->password = Hash::make($data['new_password']);
        $user->update();

        $verificationCode->delete();

        return true;
    }
}
