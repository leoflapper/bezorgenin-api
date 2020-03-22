<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home',
            [
                'actions' => $this->getActions(),
                'dashboardData' => $this->getDashboardData()
            ]
        );
    }

    /**
     * @return array
     */
    private function getActions()
    {
        $actions = [];

        if(auth()->user()->companies()->first() && auth()->user()->companies()->first()->address->street === '') {
            $actions[] = [
                'title' => 'Vul de gegevens in van je restaurant/bedrijf',
                'description' => 'Om bestellingen mogelijk te maken zijn de gegevens van je bedrijf nodig.',
                'link' => route('companies.edit',  auth()->user()->companies()->first()->id),
                'link_text' => 'Klik hier om in te vullen'
            ];
        }

        if(auth()->user()->companies()->first() && auth()->user()->companies()->first()->meals()->count() === 0) {
            $actions[] = [
                'title' => 'Voeg je eerste maaltijd of product toe',
                'description' => 'Door producten of maaltijden toe te voegen kunnen mensen deze bestellen.',
                'link' => route('meals.create'),
                'link_text' => 'Klik hier om toe te voegen'
            ];
        }

        return $actions;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getDashboardData()
    {

        $ordersToday = app(OrderRepository::class)->getCurrentUserOrders()->where('created_at', '>=', (new \DateTime())->format('Y-m-d'))->count();
        $ordersThisWeek = app(OrderRepository::class)->getCurrentUserOrders()->where('created_at', '>=', (new \DateTime())->modify('-1 week')->format('Y-m-d'))->count();
        return [
            [
                'title' => 'Bestellingen vandaag',
                'amount' => $ordersToday,
                'link' => route('orders.index')
            ],
            [
                'title' => 'Bestellingen afgelopen week',
                'amount' => $ordersThisWeek,
                'link' => route('orders.index')
            ]
        ];
    }
}
