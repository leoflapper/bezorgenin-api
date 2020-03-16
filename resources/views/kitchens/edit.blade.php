@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kitchen
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kitchen, ['route' => ['kitchens.update', $kitchen->id], 'method' => 'patch']) !!}

                        @include('kitchens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection