<?php

namespace Responsive\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Responsive\Http\Controllers\Controller;
use Responsive\User;
use Responsive\Notifications\Auth\UserVerification as UserVerificationNotification;

class VerificationController extends Controller
{
    /**
     * Confirmation page after successfully registered
     *
     *
     */
    public function getConfirmation(Request $request)
    {
        if ($request->session()->exists('need_email_confirmation')) {
            return view('confirmation');
        }

        return abort(404);
    }
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
            return redirect('/user/confirmation')->with([
                'need_email_confirmation' => true,
                'confirmation_title'      => 'Confirmation error!',
                'confirmation_message'    => 'Verification token is invalid or has been expired.'
            ]);
        } catch (\Responsive\Exceptions\Auth\UserIsVerifiedException $e) {
            return redirect('/user/confirmation')->with([
                'need_email_confirmation' => true,
                'confirmation_title'      => 'Confirmation error!',
                'confirmation_message'    => $e->getMessage()
            ]);
        }

        if (! \Auth::check()) {
            return redirect('/login')->withSuccess('Your email has been successfully verified. Please login to continue.');
        }

        $shop = DB::table('shop')->where('seller_email', '=', \Auth::user()->email)->first();

        if ($shop) {
            return redirect('/account')->withSuccess('Your email has been successfully verified.');
        }

        return redirect('/addcompany')->withSuccess('Your email has been successfully verified.');
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
            return redirect('/account')->withMessage($e->getMessage());
        }

        return redirect('/user/confirmation')
             ->with([
                'need_email_confirmation' => true,
                'confirmation_title'      => 'Confirmation was sent!',
                'confirmation_message'    => 'We have already resent a confirmation email to '.\Auth::user()->email
            ]);
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
