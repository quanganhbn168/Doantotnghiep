<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Tenderer;
use App\Models\Contracotr;
class NewUser extends Notification
{
    use Queueable;

    private $tenderer;
    private $contractor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Tenderer $tenderer, Contractor $contractor)
    {
       $this->tenderer = $tenderer;
       $this->contractor = $contractor;
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
        if($this->tenderer)
        return (new MailMessage)
                    ->line('New user has registered with email ' . $this->tenderer->email)
                    ->action('Approve user', route('admin.users.approve', $this->tenderer->id));
        else
        return (new MailMessage)
                    ->line('New user has registered with email ' . $this->contractor->email)
                    ->action('Approve user', route('admin.users.approve', $this->contractor->id));
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
