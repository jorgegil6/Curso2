@extends('Layouts.app')
@section('content')
{!! Form::model($Empleado, ['action' => ‘EmpleadoController@store']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label(‘sexo', ‘Sexo') !!}
			{!! Form::select('sexo',$sexos,'',['class' => 'form-control'])
 		</div>
		{!! Form::submit(Guardar', ['class' => 'btn btn-success']) !!}
	{!! Form::close() !!} 
@endsection