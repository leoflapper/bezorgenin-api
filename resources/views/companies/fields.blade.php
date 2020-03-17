<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', 'Afbeeldings URL:') !!}
    {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
</div>
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

<!-- Address Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address_id', 'Address Id:') !!}
    {!! Form::text('address_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Costs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_costs', 'Delivery Costs:') !!}
    {!! Form::text('delivery_costs', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Order Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min_order_amount', 'Min Order Amount:') !!}
    {!! Form::text('min_order_amount', null, ['class' => 'form-control']) !!}
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

<!-- Iban Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iban', 'Iban:') !!}
    {!! Form::text('iban', null, ['class' => 'form-control']) !!}
</div>

<!-- Kvk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kvk', 'Kvk:') !!}
    {!! Form::text('kvk', null, ['class' => 'form-control']) !!}
</div>

<!-- Vat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vat_id', 'Vat Id:') !!}
    {!! Form::text('vat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::text('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('', 'Keukens:') !!}

    {!! Form::select('kitchens[]', \App\Models\Kitchen::get()->pluck('name', 'id'), Request::get('kitchens', 0), [
        'id' => 'kitchens',
        'class' => 'form-control',
        'multiple' => 'multiple',
        'data-placeholder' => 'Click here to choose'
    ]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Omschrijving:') !!}
    {!! Form::textArea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>
</div>
