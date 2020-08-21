<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentAdded extends Notification
{
    use Queueable;

  public $discussion;
    public function __construct($d)
    {
        $this->discussion = $d;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello from madrassa rim')
            ->line('New comment to your discussion.')
            ->action('View Discussion', route('discussion.show', ['slug' => $this->discussion->slug]))
            ->line('Thank you for using our application!');
    }

}
