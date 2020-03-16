<!-- Meal Category Id Field -->
<div class="form-group">
    {!! Form::label('meal_category_id', 'Meal Category Id:') !!}
    <p>{{ $meal->meal_category_id }}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{{ $meal->company_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $meal->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $meal->description }}</p>
</div>

<!-- Allergens Field -->
<div class="form-group">
    {!! Form::label('allergens', 'Allergens:') !!}
    <p>{{ $meal->allergens }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $meal->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $meal->updated_at }}</p>
</div>

