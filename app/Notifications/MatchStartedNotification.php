<?php

namespace App\Notifications;

use App\Models\Matches;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MatchStartedNotification extends Notification
{
    use Queueable;

    public $match;

    /**
     * Create a new notification instance.
     */
    public function __construct(Matches $match)
    {
        $this->match = $match;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "The match {$this->match->homeTeam->name} vs {$this->match->awayTeam->name} has started!",
            'match_id' => $this->match->match_id,
        ];
    }
}
