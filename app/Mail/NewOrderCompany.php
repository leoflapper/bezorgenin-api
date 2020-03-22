<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderCompany extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('order.mail.from.email'), config('order.mail.from.name'))
            ->to($this->order->company->email, $this->order->company->name)
            ->subject(sprintf('Nieuwe bestelling %s', $this->order->number))
            ->replyTo($this->order->email, $this->order->first_name . ' ' . $this->order->last_name)
            ->view('emails.orders.company-new');
    }
}
