@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Meal Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mealCategory, ['route' => ['mealCategories.update', $mealCategory->id], 'method' => 'patch']) !!}

                        @include('meal_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection