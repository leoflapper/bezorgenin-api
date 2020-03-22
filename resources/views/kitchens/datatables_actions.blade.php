{!! Form::open(['route' => ['kitchens.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('kitchens.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('kitchens.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @role('admin')

        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('Weet je het zeker?')"
        ]) !!}

    @endrole
</div>
{!! Form::close() !!}
