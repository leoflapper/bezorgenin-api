
<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>


@if(false == $order->is_pickup)
    <!-- Street Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('street', 'Street:') !!}
        {!! Form::text('street', null, ['class' => 'form-control']) !!}
    </div>
@endif

@if(false == $order->is_pickup)
<!-- Housenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('housenumber', 'Housenumber:') !!}
    {!! Form::text('housenumber', null, ['class' => 'form-control']) !!}
</div>
@endif

@if(false == $order->is_pickup)
<!-- Housenumber Addition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('housenumber_addition', 'Housenumber Addition:') !!}
    {!! Form::text('housenumber_addition', null, ['class' => 'form-control']) !!}
</div>
@endif

@if(false == $order->is_pickup)
<!-- Postcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postcode', 'Postcode:') !!}
    {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
</div>
@endif

@if(false == $order->is_pickup)
<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>
@endif

@if(false == $order->is_pickup)
<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country Id:') !!}
    {!! Form::text('country_id', null, ['class' => 'form-control']) !!}
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('addresses.index') }}" class="btn btn-default">Cancel</a>
</div>
