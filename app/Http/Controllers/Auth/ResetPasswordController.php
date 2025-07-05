<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\ResetPasswordRequest;
use App\Repositories\PasswordRepository;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    private $_repo = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(PasswordRepository $repo)
    {
        $this->_repo = $repo;
    }

    public function changePassword()
    {
        return view('auth.passwords.change-password');
    }

    public function updatePassword(ResetPasswordRequest $request)
    {
        try {
            $this->_repo->change_password($request->validated());
            return redirect()->back()->with('success', 'Password changed successfully');
        } catch (\Throwable $th) {
            if ($th instanceof NotFoundHttpException) {
                $message = $th->getMessage();
                return redirect()->back()->with('error', $message);
            } else {
                return redirect()->back()->with('error', 'Something went wrong..');
            }
        }
    }
}
