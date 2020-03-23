@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Productcategorieën</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('mealCategories.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <p>Hieronder worden alle mogelijke productcategorieën waar je producten onder vallen weergeven. Heb je een restaurant dan kies je waarschijnlijk voor Voorgerecht, Hoofdgerecht of Nagerecht. Heb je een winkel? Dan kan dit bijvoorbeeld Cadeaus, Etenswaar of Bloemen zijn. Mocht je productcategorie er niet tussen staan, dan kun je die ook <a href="{{route('mealCategories.create')}}">toevoegen</a>. </p>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('meal_categories.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

