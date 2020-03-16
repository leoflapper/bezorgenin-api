@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Meal
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($meal, ['route' => ['meals.update', $meal->id], 'method' => 'patch']) !!}

                        @include('meals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection