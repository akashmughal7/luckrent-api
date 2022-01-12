<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class PasswordResetRequest extends Notification
{
    use Queueable;
    protected $token;
    protected $otp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($otp)
    {
        // $this->token = $token;
        $this->otp = $otp;
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
     {
        // $url = url('/api/password/find/'.$this->token);
        // return (new MailMessage)
        //     ->line('You are receiving this email because we        received a password reset request for your account.')
        //     ->action('Reset Password', url($url))
        //     ->line('If you did not request a password reset, no further action is required.');
        return (new MailMessage)
        ->greeting('Your OTP is '.$this->otp)
        ->line('You are receiving this email because we received a password reset request for your account.')
        // ->action('Reset Password', url($url))
        ->line('If you did not request a password reset, no further action is required.');
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
