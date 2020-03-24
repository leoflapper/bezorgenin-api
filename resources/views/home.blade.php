@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Welkom bij {{ config('app.name') }}</h1>

            @if($dashboardData)
                <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
                    @foreach($dashboardData as $data)
                        <div class="col-xs-6 col-md-4">
                            <div style="padding: 20px; border: 1px solid; text-align: center;">
                                <a href="{{$data['link']}}" style="color: black;">
                                    <h4><strong>{{ $data['title'] }}</strong></h4>
                                    <h3>{{$data['amount']}}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <p>
                Dit is je beheerpaneel waar je jouw bedrijfsinformatie en producten kunt beheren. Ook vind je hier het volledige overzicht van bestellingen. <br>
                Volg onderstaande stappen om je bedrijfspagina in te richten. Via <i class="glyphicon glyphicon-edit"></i> kun je producten wijzigen, via <i class="fa fa-plus"></i> toevoegen en via <i class="glyphicon glyphicon-trash"></i> kun je het verwijderen.
            </p>
            <br>

            @if($actions && count($actions) >= 1)

                @foreach($actions as $action)
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <div class="alert @if(!$action['done']) alert-{{ isset($action['type']) ? $action['type'] : 'warning' }} @else alert-success @endif">
                                <h4>{{ $loop->index + 1 }}. {{$action['title']}}</h4>
                                <p>{!! $action['description'] !!}</p>
                                <a href="{{ $action['link'] }}" class="btn btn-primary" style="margin-top: 10px;"> {{ $action['link_text'] }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif

            <br>
            <p>Alle stappen doorlopen? Dan is je profiel klaar en kun je jouw bedrijfspagina gaan promoten via je website of social media. <br> Ga naar frieslandbezorgt.nl en klik op jouw bedrijf. Kopieer de URL en delen maar!</p>


            <h3>Bestellingen</h3>
            <p>Je bestellingen komen per e-mail binnen op het e-mailadres dat je bij <a href="{{route('companies.index')}}">Bedrijven</a> hebt ingevuld.</p>

            <h3>Betalingen</h3><p>De betalingen kun je zelf regelen via Tikkie of een betaalverzoek. Op de bestelbevestiging in je e-mailbox komt een link om direct een WhatsAppbericht naar de klant te sturen.</p>

        </div>
    </div>
</div>
@endsection
