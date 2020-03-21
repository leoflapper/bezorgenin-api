{!! Form::open(['route' => ['mealCategories.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('mealCategories.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('mealCategories.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @role('admin')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endrole
</div>
{!! Form::close() !!}
