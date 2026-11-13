<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return redirect()->back();
    }

    public function readAll()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }

    public function destroy(DatabaseNotification $notification)
    {
        $notification->delete();

        return redirect()->back();
    }
}
