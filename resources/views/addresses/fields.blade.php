<!-- Street Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street', 'Street:') !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}
</div>

<!-- Housenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('housenumber', 'Housenumber:') !!}
    {!! Form::text('housenumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Housenumber Addition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('housenumber_addition', 'Housenumber Addition:') !!}
    {!! Form::text('housenumber_addition', null, ['class' => 'form-control']) !!}
</div>

<!-- Postcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postcode', 'Postcode:') !!}
    {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country Id:') !!}
    {!! Form::text('country_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::text('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('addresses.index') }}" class="btn btn-default">Cancel</a>
</div>
