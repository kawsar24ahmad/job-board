<?php

namespace App\Notifications;

use App\Models\JobPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJobPostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $jobPost;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New job post alert: '. $this->jobPost->title)
                    ->line('A new job post have been posted in your subscribed category.')
                    ->action('View Job post', url('/'));
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
