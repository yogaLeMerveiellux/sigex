@extends('adminlte::layouts.app')
@section('htmlheader_title')
Alumnos
@endsection
@section('contentheader_title')
<h1>Alumnos</h1>
@section('contentheader_description')
Administración de alumnos
@endsection
@endsection
@section('main-content')
<div class="container">
	<div class="panel panel-form">
		<div class="panel-body">
			<div class="well">
				<button class="btn btn-primary" onclick="(history.back())"><span class="glyphicon glyphicon-circle-arrow-left"></span> regresar</button>
				@foreach($alumnos as $alumno)
				<h1 class="text-center">{{$alumno->nombre}} {{$alumno->aPaterno}} {{$alumno->aMaterno}}</h1>
				<div class="text-center">
					<img src="{{asset('img/avatar5.png')}}" alt="" class="img-circle">
				</div>
				<br>
				<dl class="dl-horizontal">
					<dt>Curricular</dt>
					<dd>{{$alumno->curricular}}</dd>
					<dt>Estado:</dt>
					@if ($alumno->activo==1)
					<dd>Activo</dd>
					@elseif($alumno->activo==0)
					<dd>Inactivo</dd>
					@endif
					<dt>Periodo</dt>
					<dd><b>{{date_format(new dateTime($alumno->inicio),'d/m/Y')}}</b> al <b>{{date_format(new dateTime($alumno->fin),'d/m/Y')}}</b></dd>					
					<dt>Telefono:</dt>
					<dd>{{$alumno->telefono}}</dd>
					<dt>Correo:</dt>
					<dd>{{$alumno->correo}}</dd>
					<dt>Matricula:</dt>
					<dd><strong>{{$alumno->matricula}}</strong></dd>
					<dt>Dirección:</dt>
					<dd>{{$alumno->calle}}, {{$alumno->municipio}}, {{$alumno->estado}}</dd>
					<dt>Carrera:</dt>
					<div class="pull-right" role="group" aria-label="Basic example">
						<a href="{{ route('boleta', $alumno->id) }}" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-download-alt"></span> Reporte PDF</a>
						<a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
					</div>
					<dd>{{$alumno->carrera}}</dd>
				</dl>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection