<!-- Street Field -->
<div class="form-group">
    {!! Form::label('street', 'Street:') !!}
    <p>{{ $address->street }}</p>
</div>

<!-- Housenumber Field -->
<div class="form-group">
    {!! Form::label('housenumber', 'Housenumber:') !!}
    <p>{{ $address->housenumber }}</p>
</div>

<!-- Housenumber Addition Field -->
<div class="form-group">
    {!! Form::label('housenumber_addition', 'Housenumber Addition:') !!}
    <p>{{ $address->housenumber_addition }}</p>
</div>

<!-- Postcode Field -->
<div class="form-group">
    {!! Form::label('postcode', 'Postcode:') !!}
    <p>{{ $address->postcode }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $address->city }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $address->country_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $address->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $address->updated_at }}</p>
</div>

