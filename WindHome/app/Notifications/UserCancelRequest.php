<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserCancelRequest extends Notification
{
    use Queueable;
    public $user;
    public $contract;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $contract)
    {
        $this->user = $user;
        $this->contract = $contract;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'room_id' => $this->contract->roomId
        ];
    }
}
