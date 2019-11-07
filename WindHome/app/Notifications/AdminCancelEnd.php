<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminCancelEnd extends Notification
{
    use Queueable;
    public $room;
    public $contract;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($room, $contract)
    {
        $this->room = $room;
        $this->contract = $contract;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'room_name' => $this->room->name,
            'contract_id' => $this->contract->id
        ];
    }
}
