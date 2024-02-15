<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLogin extends Notification
{
    use Queueable;
    public $ip;

    /**
     * Create a new notification instance.
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting("Hello $notifiable->name, We Hope You Have Great DAY ?")
            ->line("New Login From You Account  $notifiable->email , with the ip Address ( $this->ip }")
            ->action('Login To Your Account', url('/login'))
            ->line("If You We're not the one who logged in, we suggest to change your password, or contact the support to notify !");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
