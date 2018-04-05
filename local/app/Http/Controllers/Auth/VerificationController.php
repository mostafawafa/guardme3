<?php

namespace Responsive\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Responsive\Http\Controllers\Controller;
use Responsive\User;
use Responsive\Notifications\Auth\UserVerification as UserVerificationNotification;

class VerificationController extends Controller
{
    /**
     * Handle the user verification
     *
     * @param Illuminate\Http\Request $request
     * @param $token
     * @return \Illuminate\Http\Response
     */
    public function getVerification(Request $request, $token)
    {
        try {
            $user = User::findByVerificationToken($token);

            $user->processVerify();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect('/dashboard')->withError('Verification token is invalid or has been expired.');
        } catch (\Responsive\Exceptions\Auth\UserIsVerifiedException $e) {
            return redirect('/dashboard')->withMessage($e->getMessage());
        }

        if (! \Auth::check()) {
            return redirect('/login')->withSuccess('Your email has been successfully verified. Please login to continue.');
        }

        return redirect('/dashboard')->withSuccess('Your email has been successfully verified.');
    }

    /**
     * Resend the email verification
     *
     * @return \Illuminate\Http\Response
     */
    public function getResendVerification()
    {
        try {
            if (! \Auth::check()) {
                return redirect('/login')
                     ->withError('You are not logged in or your session has expired!');
            }

            $user = User::find(\Auth::user()->id);

            $this->sendVerificationNotification($user);
        } catch (\Responsive\Exceptions\Auth\UserIsVerifiedException $e) {
            return redirect('/dashboard')->withMessage($e->getMessage());
        }

        return redirect('/dashboard')
             ->withMessage('We have already sent a verification link to your email.');
    }

    /**
     * Generate token and send email notify with verification link
     * from the given user
     *
     * @param \Responsive\User $user
     * @return void
     */
    private function sendVerificationNotification(User $user)
    {
        $token = $user->generateToken();

        $user->notify(new UserVerificationNotification($token));
    }
}
