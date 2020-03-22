@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>{{ config('app.name') }}</h1>
        <p>
            Welkom op Friesland Bezorgt! Hier kun je de restaurants en producten beheren. Daarnaast ook de bestellingen bekijken <br>

            @if($actions && count($actions) >= 1)
            <p>Hieronder volgende stappen voor het voltooien van je account</p>
                <div class="row">
                    @foreach($actions as $action)
                        <div class="col-xs-6">
                            <div class="alert alert-warning">
                                <h4>{{ $loop->index + 1 }}. {{$action['title']}}</h4>
                                <p>{!! $action['description'] !!}</p>
                                <a href="{{ $action['link'] }}" class="btn btn-primary" style="margin-top: 10px;"> {{ $action['link_text'] }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

                @if($dashboardData)
                    <div class="row" style="margin-top: 30px;">
                        @foreach($dashboardData as $data)
                            <div class="col-xs-12 col-md-4">
                                <div style="padding: 20px; border: 1px solid; text-align: center">
                                    <a href="{{$data['link']}}" style="color: black;">
                                        <h4><strong>{{ $data['title'] }}</strong></h4>
                                        <h3>{{$data['amount']}}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
        </p>
    </div>
</div>
@endsection
