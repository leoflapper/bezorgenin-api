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
<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', 'Restaurant afbeelding URL:') !!}
    <p>Dit kan een URL zijn van je eigen website. Een beveiligde URL (met HTTPS) is wel verplicht.</p>
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
    {!! Form::number('address.housenumber',  $company->address->housenumber ?? '', ['class' => 'form-control']) !!}
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
<hr style="display:block; width: 100%;" />

<div class="col-xs-12" style="margin-bottom: 15px">
    <h4>Openingstijden</h4>
</div>


<div class="col-xs-12 col-md-6">
    <p>Houd er rekening mee dat de bezorgtijden aan de hand van deze tijden weergeven worden</p>
    <table class="table table-striped">
        <thead>
        <th>Dag</th>
        <th>Openingstijd</th>
        <th>Sluitingstijd</th>
        </thead>
        <tbody>
            @foreach($days as $day => $label)
                <tr>
                    <td>{{ $label }}</td>
                    <td>
                        {!! Form::time(sprintf('%s_opening_time', $day), isset($company->opening_hours->forDay($day)->getIterator()[0]) ? $company->opening_hours->forDay($day)->getIterator()[0]->start()->format() : null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! Form::time(sprintf('%s_closing_time', $day), isset($company->opening_hours->forDay($day)->getIterator()[0]) ? $company->opening_hours->forDay($day)->getIterator()[0]->end()->format() : null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



<hr style="display:block; width: 100%;" />

<div class="col-xs-12" style="margin-bottom: 15px">
    <h4>Bezorgen en Afhalen</h4>
</div>


<!-- Vat Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('has_pickup', 'Mogelijkheid tot afhalen:') !!}
    {!! Form::checkbox('has_pickup', true, $company->has_pickup ?? '') !!}
</div>

<!-- Vat Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('has_shipping', 'Mogelijkheid tot bezorgen:') !!}
    {!! Form::checkbox('has_shipping', true,  $company->has_shipping ?? '') !!}
</div>

<div class="shipping-detail-input-fields">

    <!-- Delivery Costs Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('delivery_costs', 'Bezorgkosten:') !!}
        {!! Form::text('delivery_costs', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Delivery radius Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('delivery_radius', 'Bezorgstraal (in kilometers):') !!}
        {!! Form::number('delivery_radius', null, ['class' => 'form-control']) !!}
    </div>
</div>

<hr style="display:block; width: 100%;" />

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Korte omschrijving:') !!}
    {!! Form::textArea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery start time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note_message', 'Bericht bij opmerkingen veld:') !!}
    <p>Geef hier een optioneel bericht aan voor bij het opmerkingen veld van het bestelproces. Bijvoorbeeld: "Wij leveren uitsluitend maandags of dinsdags" of "De bezorgtijd kan een kwartier afwijken".</p>
    {!! Form::textarea('note_message', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>
</div>

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
<script>
    jQuery( document ).ready(function($) {

        setShippingInputFields();
        $('#has_shipping').on('change', function(){
            setShippingInputFields();
        });

        function setShippingInputFields()
        {
            $('.shipping-detail-input-fields').hide();
            if($('#has_shipping').is(':checked')) {
                $('.shipping-detail-input-fields').show();
            }
        }

    });
</script>
