@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Profiel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                        @include('users.fields')

                   {!! Form::close() !!}

                   <div class="form-group col-sm-6">

                       {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                       {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Verwijder account', [
                            'type' => 'submit',
                            'class' => 'btn btn-danger',
                            'onclick' => "return confirm('Weet je het zeker?')"
                        ]) !!}
                       {!! Form::close() !!}
                   </div>

               </div>
           </div>
       </div>
   </div>
@endsection
