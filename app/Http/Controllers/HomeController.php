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


        if(auth()->user()->companies()->first()) {
            $actions[] = [
                'done' => auth()->user()->companies()->first() && (string)auth()->user()->companies()->first()->address->street === '' ? false : true,
                'title' => 'Bedrijfsinformatie aanvullen ',
                'description' => 'Vul zoveel mogelijk gegevens bij bedrijfsinformatie. Zo zorg je ervoor dat bestellingen goed gaan, er geen vragen ontstaan en je profiel zo volledig mogelijk is ingevuld. ',
                'link' => route('companies.edit',  auth()->user()->companies()->first()->id),
                'link_text' => 'Klik hier om je bedrijfsinformatie aan te vullen'
            ];
        }


        $actions[] = [
            'done' => true,
            'type' => '',
            'title' => 'Productcategorieën toevoegen',
            'description' => 'Bij deze stap vul je in onder welke productcategorieën je producten vallen, er zijn al een aantal toegevoegd. Heb je een restaurant dan kies je waarschijnlijk voor Voorgerecht, Hoofdgerecht of Nagerecht. Heb je een winkel? Dan kan dit bijvoorbeeld Cadeaus, Etenswaar of Bloemen zijn.',
            'link' => route('mealCategories.index'),
            'link_text' => 'Bekijk de productcategorieën'
        ];


        if(auth()->user()->companies()->first()) {
            $actions[] = [
                'done' => auth()->user()->companies()->first() && auth()->user()->companies()->first()->meals()->count() === 0 ? false : true,
                'title' => 'Producten toevoegen',
                'description' => 'Voeg bij deze stap je producten in. Het is mogelijk om een titel, beschrijving, prijs en extra informatie mee te geven. De toegevoegde producten zijn direct zichtbaar op je bedrijfspagina.',
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
