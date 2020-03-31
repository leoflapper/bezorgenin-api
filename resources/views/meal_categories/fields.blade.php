<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('mealCategories.index') }}" class="btn btn-default">Cancel</a>
</div>
