<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\NewOrderCompany;
use App\Mail\NewOrderCustomer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNewOrderNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function handle(OrderCreated $event)
    {
        Mail::queue(new NewOrderCustomer($event->order));
        Mail::queue(new NewOrderCompany($event->order));
    }

    /**
     * Handle a job failure.
     *
     * @param  OrderCreated  $event
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(OrderCreated $event, $exception)
    {
        //
    }
}
