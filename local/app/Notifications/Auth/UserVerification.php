<?php

namespace Responsive\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Responsive\Mail\ChangeEmailAddress as Mailable;

class UserVerification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The email verification token
     *
     * @var string
     */
    public $token;

    /**
     * The email address
     *
     * @var string
     */
    public $email;

    /**
     * Create a new notification instance.
     *
     * @param  mixed $user
     * @return void
     */
    public function __construct($token, $email = null)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Responsive\Mail\ChangeEmailAddress
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/user/verification/'.$this->token);

        if ($this->email) {
            return (new Mailable($url))
                ->to($this->email)
                ->subject('Please Verify Your New Email Address');
        }

        return (new MailMessage)
            ->subject('Please Verify Your Email Address')
            ->markdown('mail.auth.verification', ['url' => $url]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
