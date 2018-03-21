<h1>Empleados</h1>
<table>
	<thread>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Acción</th>
		</tr>
	</thread>
	<tbody>
		@foreach ($empleados as $empleados)
		<tr>
			<td>{!! $empleados->matricula!!}</td>
			<td>{!! $empleados->paterno !!}</td>				
			<td>{!! $empleados->materno !!}</td>	
			<td>{!! $empleados->nombre !!}</td>	
			<td><button><a href='/empleados/{{ $empleados->id}}/edit'> Editar </a>	</button>

               {!! Form::model('',['route' => ['empleados.destroy',$empleados->id],'method'=>'DELETE']) !!}
				{!! Form::submit('Eliminar', ['class' => 'btn btn-success']) !!}
				{!! Form::close() !!} 
			<!--<button>Eliminar</button>-->
				</td></tr>
		@endforeach
	</tbody>
</table>

