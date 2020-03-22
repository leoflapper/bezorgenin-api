@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Verifieer uw e-mailadres</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">Er is een verificatielink naar je e-mailadres gestuurd
                            </div>
                        @endif
                        <p>Controleer dat je de verificatielink hebt ontvangen op {{ auth()->user()->email }}. Als je geen verificatielink hebt ontvangen,</p>
                        <a href="{{ route('verification.resend') }}">Klik dan hier om deze opnieuw op te vragen'</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
