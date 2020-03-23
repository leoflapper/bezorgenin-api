@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Bestellingen</h1>
        <h1 class="pull-right">
{{--           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('orders.create') }}">Add New</a>--}}
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <p>Je bestellingen komen per e-mail binnen op het e-mailadres dat je bij <a href="{{route('companies.index')}}">Bedrijven</a> hebt ingevuld. <br> De betalingen kun je zelf regelen via Tikkie of een betaalverzoek. Op de bestelbevestiging in je e-mailbox komt een link om direct een WhatsAppbericht naar de klant te sturen.</p>
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('orders.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

