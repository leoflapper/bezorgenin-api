<?php

namespace App\Events;


use App\Models\Order;
use Illuminate\Queue\SerializesModels;

class OrderCreated
{
    use SerializesModels;

    public $order;

    /**
     * OrderCreated constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
