<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\NewOrderCustomer;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $newOrderCustomerMail = new NewOrderCustomer($event->order);
        echo $newOrderCustomerMail->render();
        exit;
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
