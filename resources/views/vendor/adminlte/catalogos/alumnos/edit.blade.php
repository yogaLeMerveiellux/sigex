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
<div class="panel panel-form">
	<div class="panel-heading">
		<a href="{{route('alumnos.index')}}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Listado</a>
		<h3>Editar alumno</h3>
	</div>	
	@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
	@endif
	@if ($errors->any())
	<div class="alert alert-warning">
		No se pudo modificar alumno, las razones:
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="panel-body">
		@foreach($alumno as $detalle)
		{!! Form::open(['route'=>['alumnos.update', $detalle->id], 'method'=>'PUT']) !!}
		{!! Form::token() !!}
		<div class="form-group">
			<label for="" class="control-label sr-only">Nombre(s)</label>
			<input type="text" name="nombre" id="" class="form-control" placeholder="Nombre(s)" required value="{{$detalle->nombre}}">
		</div>
		<div class="form-group">
			<label for="" class="control-label sr-only">Apellido Paterno</label>
			<input type="text" name="aPaterno" id="" class="form-control" placeholder="Apellido Paterno" required value="{{$detalle->aPaterno}}">
		</div>
		<div class="form-group">
			<label for="" class="control-label sr-only">Apellido Materno</label>
			<input type="text" name="aMaterno" id="" class="form-control" placeholder="Apellido Materno" required value="{{$detalle->aMaterno}}">
		</div>
		<div class="form-group">
			<label for="" class="control-label sr-only">Teléfono</label>
			<input type="text" name="telefono" id="" class="form-control" placeholder="Teléfono" required maxlength="10" value="{{$detalle->telefono}}">
		</div>
		<div class="form-group">
			<label for="" class="control-label sr-only">Correo</label>
			<input type="email" name="correo" placeholder="ejemplo@gmail.com" id="" class="form-control" required value="{{$detalle->correo}}">
		</div>
		<div class="form-group">
			<label for="" class="control-label sr-only">Matrícula</label>
			<input type="number" name="matricula" id="" class="form-control" placeholder="Matrícula" required value="{{$detalle->matricula}}">
		</div>
		<div class="form-group">
			<label for="" class="control-label sr-only">Calle</label>
			<input type="text" name="calle" placeholder="Calle" id="" class="form-control" required value="{{$detalle->calle}}">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Estado</label>
			<select name="idEstado" id="" class="form-control">
				<option value="{{$detalle->idEstado}}" hidden>{{$detalle->estado}}</option>
				@foreach($estados as $estado)
				<option value="{{$estado->id}}">{{$estado->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Municipio</label>
			<select name="idMunicipio" id="" class="form-control">
				<option value="{{$detalle->idMunicipio}}" hidden>{{$detalle->municipio}}</option>
				@foreach($municipios as $municipio)
				<option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Carrera</label>
			<select name="idCarrera" id="idCarrera" class="form-control">
				<option value="{{$detalle->idCarrera}}" hidden>{{$detalle->carrera}}</option>
				@foreach($carreras as $carrera)
				<option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Curricular deseada</label>
			<select name="idCurricular" id="idCurricular" class="form-control">
				<option value="{{$detalle->idCurricular}}" hidden>{{$detalle->curricular}}</option>
				@foreach($curriculares as $curricular)
				<option value="{{$curricular->id}}">{{$curricular->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="">Ciclo Escolar</label>
			<select name="idCiclo" id="" class="form-control">				
				<option value="{{$detalle->idCiclo}}" hidden>
					{{date_format(new dateTime($detalle->inicio),'d M Y')}} al
					{{date_format(new dateTime($detalle->fin),'d M Y')}}
				</option>
				@foreach ($ciclos as $ciclo)
				<option value="{{$ciclo->id}}">
					{{$ciclo->fechaInicio}} al {{$ciclo->FechaFin}}
				</option>				
				@endforeach
			</select>
		</div>
		
		<button type="submit" class="btn btn-warning">Guardar Cambios</button>
		{!! Form::close() !!}
	</div>
	@endforeach
</div>
@endsection