{!! Form::open(['method' => 'DELETE', 'route' => [‘empleado.delete', $empleado->id]]) !!}
		{!! Form::submit('Eliminar', ['class' => 'btn btn-xs btn-danger']) !!}
	{!! Form::close() !!}
