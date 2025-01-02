<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\PlaceCreated;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminPlaceNotification;

class SendPlaceNotification
{
    public function handle(PlaceCreated $event)
    {
        // إرسال إشعار إلى الأدمن
        $admin = User::where('role', 'admin')->get();
        Notification::send($admin, new AdminPlaceNotification($event->place));
    }
}