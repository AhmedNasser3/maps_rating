<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserApprovalNotification extends Notification
{
    use Queueable;

    public $place;

    public function __construct($place)
    {
        $this->place = $place;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('تمت الموافقة على المكان الخاص بك:')
            ->line('الاسم: ' . $this->place->name)
            ->action('عرض التفاصيل', url('/places/' . $this->place->id));
    }

    public function toArray($notifiable)
    {
        return [
            'name' => $this->place->name,
            'id' => $this->place->id,
        ];
    }
}