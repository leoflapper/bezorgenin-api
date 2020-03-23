<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Naam:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

@role('admin')
    <!-- Slug Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('slug', 'Slug:') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
@endrole
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', 'Restaurant afbeelding URL:') !!}
    {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
</div>
<hr style="width: 100%; " />
<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'Voornaam:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Achternaam:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address.street', 'Straat:') !!}
    {!! Form::text('address.street',  $company->address->street ?? '', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address.housenumber', 'Huisnummer:') !!}
    {!! Form::text('address.housenumber',  $company->address->housenumber ?? '', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address.housenumber_addition', 'Huisnummer toevoeging:') !!}
    {!! Form::text('address.housenumber_addition',  $company->address->housenumber_addition ?? '', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address.postcode', 'Postcode:') !!}
    {!! Form::text('address.postcode',  $company->address->postcode ?? '', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address.city', 'Stad:') !!}
    {!! Form::text('address.city',  $company->address->city ?? '', ['class' => 'form-control']) !!}
</div>

<!-- Delivery Costs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_costs', 'Bezorgkosten:') !!}
    {!! Form::text('delivery_costs', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Order Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min_order_amount', 'Minimale bestelbedrag:') !!}
    {!! Form::text('min_order_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'E-mailadres:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telefoonnummer:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Iban Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iban', 'IBAN rekeningnummer:') !!}
    {!! Form::text('iban', null, ['class' => 'form-control']) !!}
</div>

<!-- Kvk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kvk', 'KVK-nummer:') !!}
    {!! Form::text('kvk', null, ['class' => 'form-control']) !!}
</div>

<!-- Vat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vat_id', 'BTW-nummer:') !!}
    {!! Form::text('vat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('', 'Bedrijfscategorieën:') !!}
    <p>Dit zijn de categorieën waar je bedrijf zich in bevindt. Mocht er een categorie ontbreken, <a href="{{ route('kitchens.create') }}" target="_blank">klik dan hier om een categorie toe te voegen,</a></p>

    @php $currentKitchens = []; @endphp
    @if(isset($company))
        @php $currentKitchens = $company->kitchens->pluck('id')->toArray() @endphp
    @endif
    {!! Form::select('kitchens[]', \App\Models\Kitchen::get()->pluck('name', 'id'), $currentKitchens, [
        'id' => 'kitchens',
        'class' => 'form-control',
        'multiple' => 'multiple',
        'data-placeholder' => 'Click here to choose'
    ]) !!}
</div>


<!-- Vat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_shipping', 'Mogelijkheid tot bezorgen:') !!}
    {!! Form::checkbox('has_shipping', true,  $company->has_shipping ?? '') !!}
</div>

<!-- Vat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_pickup', 'Mogelijkheid tot afhalen:') !!}
    {!! Form::checkbox('has_pickup', true, $company->has_pickup ?? '') !!}
</div>


<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Korte omschrijving:') !!}
    {!! Form::textArea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>
</div>
