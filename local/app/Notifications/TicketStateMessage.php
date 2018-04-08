<?php

namespace Responsive\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class TicketStateMessage extends Notification
{
    use Queueable;
    private $ticketId;
    private $title;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticketId, $title)
    {
        $this->ticketId = $ticketId;
        $this->title = $title;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->line('Ticket "' . $this->title . '" ' . Route('ticket.show', $this->ticketId) .  ' is closed');
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}