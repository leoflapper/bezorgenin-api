<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $company->name }}</p>
</div>

<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $company->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $company->last_name }}</p>
</div>

<!-- Address Id Field -->
<div class="form-group">
    {!! Form::label('address_id', 'Address Id:') !!}
    <p>{{ $company->address_id }}</p>
</div>

<!-- Delivery Costs Field -->
<div class="form-group">
    {!! Form::label('delivery_costs', 'Delivery Costs:') !!}
    <p>{{ $company->delivery_costs }}</p>
</div>

<!-- Min Order Amount Field -->
<div class="form-group">
    {!! Form::label('min_order_amount', 'Min Order Amount:') !!}
    <p>{{ $company->min_order_amount }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $company->email }}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $company->telephone }}</p>
</div>

<!-- Iban Field -->
<div class="form-group">
    {!! Form::label('iban', 'Iban:') !!}
    <p>{{ $company->iban }}</p>
</div>

<!-- Kvk Field -->
<div class="form-group">
    {!! Form::label('kvk', 'Kvk:') !!}
    <p>{{ $company->kvk }}</p>
</div>

<!-- Vat Id Field -->
<div class="form-group">
    {!! Form::label('vat_id', 'Vat Id:') !!}
    <p>{{ $company->vat_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $company->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $company->updated_at }}</p>
</div>

