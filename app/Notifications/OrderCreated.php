<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreated extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Une nouvelle commande a été créée.')
                    ->action('Voir la commande', url('/orders/'.$this->order->id))
                    ->line('Merci pour votre travail !');
    }

    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'client' => $this->order->client,
            'total_price' => $this->order->total_price,
            'branch' => $this->order->branch,
            'created_at' => $this->order->created_at->format('H:i:s Y-m-d '),
        ];
    }
}
