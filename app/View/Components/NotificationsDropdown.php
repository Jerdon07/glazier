<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NotificationsDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $notifications = Auth::user()
            ->notifications()
            ->latest()
            ->get();

        $unread_count = Auth::user()
            ->unreadNotifications()
            ->count();

        return view('components.notifications-dropdown', [
            'notifications' => $notifications,
            'unread_count' => $unread_count,
        ]);
    }
}
