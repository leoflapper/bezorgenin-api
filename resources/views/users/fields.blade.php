
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Naam:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->

<div class="form-group col-sm-6">
    {!! Form::label('email', 'E-mailadres:') !!}
    @role('admin')
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('email', null, ['class' => 'form-control', 'disabled' => true]) !!}
        <p>Om je e-mailadres te wijzigen dien je een e-mail te sturen naar <a href="mailto:{{config('mail.from.address')}}?SUBJECT=E-mailadres wijzigen {{$user->email}}">{{config('mail.from.address')}}</a></p>
    @endrole
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
