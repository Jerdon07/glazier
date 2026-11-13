<?php

namespace App\Notifications;

use App\Models\Ingredient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IngredientCreated extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(Ingredient $ingredient)
    {
        //
    }

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'from' => 'Ingredient Created',
            'user' => $notifiable->name,
            'ingredient_name' => $this->ingredient->name,
        ];
    }
}
