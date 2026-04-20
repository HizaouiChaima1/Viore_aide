<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Allcustomers extends Notification
{
    use Queueable;
    protected $restaurant;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'restaurant_id' => $this->restaurant->id,
            'nom' => $this->restaurant->nom,
            'prenom'=> $this->restaurant->prenom,
            'nom_restaurant' => $this->restaurant->nom_restaurant,
            'adresse_restaurant' =>$this->restaurant->adresse_restaurant,
            'telephone'=>$this->restaurant->telephone,
            'email'=>$this->restaurant->email,
        ];
    }
    
   
}








