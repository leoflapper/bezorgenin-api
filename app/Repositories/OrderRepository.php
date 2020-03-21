<?php

namespace App\Repositories;

use App\Events\OrderCreated;
use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Site;
use Illuminate\Support\Facades\Hash;

/**
 * Class OrderRepository
 * @package App\Repositories
 * @version March 18, 2020, 7:58 pm UTC
*/

class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Order::class;
    }

    public function create($input)
    {

        $site = new Site('sneekbezorgt');

        /**
         * @var Order $order
         */
        $order = $this->makeModel()->fill($input);

        $order->website = $site->getId();

        if(!$order->country_id) {
            $order->country_id = config('order.default_country_id');
        }

        $company = app(CompanyRepository::class)->find($order->company_id);

        $mealRepository = app(MealRepository::class);
        $orderProductRepository = app(OrderProductRepository::class);

        $subtotal = 0;
        $orderProducts = [];

        foreach ($input['meals'] as $meal) {

            if(!$mealItem = $mealRepository->getByIdAndCompany($meal['id'], $company)) {
                abort(404, sprintf('Meal with id %d not found for company %s', $meal['id'], $company->name));
            }

            $orderProduct = $orderProductRepository->makeModel()->fill($mealItem->toArray());
            $orderProduct->quantity = $meal['quantity'];

            $orderProducts[] = $orderProduct->toArray();

            $subtotal += $orderProduct->quantity * $orderProduct->price;
        }

        $order->subtotal = $subtotal;

        $order->shipping_price = 0;
        if(false == $order->is_pickup) {
            $order->shipping_price = $company->delivery_costs;
        }
        $order->tax = 0;
        $order->total_price = $order->subtotal + $order->shipping_price + $order->tax;

        $order->number = $this->createOrderNumber($order);

        $order->save();

        $order->orderProducts()->createMany($orderProducts);

        //event(new OrderCreated($order));

        return $order;
    }

    /**
     * @param Order $order
     * @return string
     */
    private function createOrderNumber(Order $order)
    {
        preg_match_all("/[A-Z]/", ucwords(strtolower($order->company->name)), $matches);
        $prefix = 'ORD';
        if(isset($matches[0])) {
            $prefix = implode('', $matches[0]);
        }

        $hash = substr(Hash::make($order->first_name . $order->last_name), 15, 6);
        return $prefix.'-'.$hash;
    }
}
