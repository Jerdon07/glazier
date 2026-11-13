<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return redirect()->back();
    }

    public function destroy(DatabaseNotification $notification)
    {
        $notification->delete();

        return redirect()->back();
    }
}
