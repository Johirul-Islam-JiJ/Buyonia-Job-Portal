<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailForNewAccount extends Notification
{
    use Queueable;
    public $password='';
    public $user_name='';
    public $user_email='';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password,$user_name,$user_email)
    {
        $this->password = $password;
        $this->user_name = $user_name;
        $this->user_email = $user_email;

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

        $password = $this->password;
        $user_name = $this->user_name;
        $user_email= $this->user_email;
        return (new MailMessage)
                    ->line($user_name)
                    ->line('Your account credentials ')
                    ->line('Email : '.$user_email)
                    ->line('Password : '.$password)
                    ->line('Thank you! for using our application.');

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
