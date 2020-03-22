<!-- Meal Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meal_category_id', 'Categorie:') !!}

    {!! Form::select('meal_category_id', \App\Models\MealCategory::get()->pluck('name', 'id'), null, [
        'class' => 'form-control',
    ]) !!}
</div>
<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Bedrijf:') !!}

    @php
        if(auth()->user()->hasRole('admin')) :
            $companies = \App\Models\Company::get()->pluck('name', 'id');
        else :
            $companies = auth()->user()->companies()->pluck('name', 'id');
        endif;

    @endphp
    {!! Form::select('company_id', $companies, null, [
        'class' => 'form-control',
    ]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Naam:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Prijs:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Omschrijving:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Allergens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('allergens', 'Allergieën:') !!}
    {!! Form::text('allergens', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('meals.index') }}" class="btn btn-default">Cancel</a>
</div>
