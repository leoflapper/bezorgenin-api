@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Producten</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('meals.create') }}">Toevoegen</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <p>Voeg bij deze stap je producten toe. Het is mogelijk om een titel, beschrijving, prijs en extra informatie mee te geven. De toegevoegde producten zijn direct zichtbaar op je bedrijfspagina. </p>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('meals.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

