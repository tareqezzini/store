<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrder extends Notification
{
    use Queueable;

    protected $costumer_name;
    protected $order_number;
    public function __construct($costumer_name, $order_number)
    {
        $this->costumer_name = $costumer_name;
        $this->order_number = $order_number;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'costumer_name'    => $this->costumer_name,
            'order_number'  => $this->order_number,
        ];
    }
}
