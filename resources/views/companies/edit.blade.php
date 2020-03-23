@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bedrijf
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <p>Vul zoveel mogelijk gegevens bij bedrijfsinformatie. Zo zorg je ervoor dat bestellingen goed gaan, er geen vragen ontstaan en je profiel zo volledig mogelijk is ingevuld.  </p>

       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'patch']) !!}

                        @include('companies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
