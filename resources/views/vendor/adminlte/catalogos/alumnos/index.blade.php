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
	<!-- Default panel contents -->
	<div class="panel-heading">
		<h2>Gestión de alumnos</h2>
		<div class="btn-group pull-right">
			<a class="btn btn-primary" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
			<a class="btn btn-primary" data-toggle="modal" href='#generarLista'><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Listas</a>
			<div class="modal fade" id="generarLista">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Generar Lista de Asistencia</h4>
						</div>
						<div class="modal-body">
							
							{!! Form::open(['route'=>'descargarLista', 'method'=>'get','target'=>'_blank']) !!}
							<div class="form-group">
								<select name="selectActividad" id="" class="form-control">
									@foreach($curriculares as $curricular)
									<option value="{{$curricular->id}}">{{$curricular->nombre}}</option>
									@endforeach
								</select>
							</div>
							
							<button type="submit" class="btn btn-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar lista</button>
							
							{!! Form::close() !!}
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="form-inline">
			<!-- <div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
			</div> -->
			Filtrar por:
			{!! Form::open(['route'=>'alumnos.index', 'method'=>'get']) !!}
			<input type="search" class="form-control" id="idBusqueda" placeholder="Búsqueda..." name="busqueda" value="{{old('busqueda')}}">
			<select name="selectActividad" id="" class="form-control">
				<option value="">Actividades (Todas)</option>
				@foreach($curriculares as $curricular)
				<option value="{{$curricular->id}}">{{$curricular->nombre}}</option>
				@endforeach
			</select>
			<select name="selectActivo" id="" class="form-control">
				<option value="">Situación (Todas)</option>
				<option value="1">Activo</option>
				<option value="0">Inactivo</option>
			</select>
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> </button>
			{!! Form::close() !!}
		</div>
	</div>
	<br>
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul class="list-unstyled">
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<table class="table table-hover table-striped">
		<thead class="text-uppercase">
			<th class="text-center">Alumno</th>
			<th class="text-center">Ciclo escolar</th><!-- pertenece a una tabla -->
			<th class="text-center">Actividad</th>
			<th class="text-center">Instructor</th>
			<th class="text-center">Activo</th>
			<th class="text-center">Acciones</th>
		</thead>
		<tbody>
			@foreach($alumnos as $alumno)
			<tr class = "{{$alumno->activo==0?'danger inactivo':''}} text-center">
				<td class="text-left">{{$alumno->nombre}} {{$alumno->aPaterno}} {{$alumno->aMaterno}}</td>
				<td>{{date_format(new dateTime($alumno->fechaInicio),'d/m/Y')}} al {{date_format(new dateTime($alumno->FechaFin),'d/m/Y')}}</td>
				<!-- <td>{{$alumno->correo}}</td> -->
				<td>{{$alumno->curricular}}</td>
				@if ($alumno->profesorVigente==1)
				<td><strong>{{$alumno->profesor}} {{$alumno->apellidoProfesor}}</strong></td>					
				@else
				<td><strong>Sin Instructor asignado.</strong></td>
				@endif

				<td>
					{!! Form::open(['route'=>['activarAlumno', $alumno->id],'method'=>'PUT']) !!}
					{!! Form::token() !!}
					<label class="switch">
						<input type="checkbox" class="lActivo" <?=$alumno->activo==1?'checked':'';?> id="{{$alumno->id}}">
						<span class="slider round"></span>
					</label>
					{!! Form::close() !!}
				</td>
				<td>
					<a href="{{route('alumnos.show', $alumno->id)}}" class="btn btn-default btn-sm"><div class="glyphicon glyphicon-eye-open"></div></a>
					<a href="{{route('alumnos.edit', $alumno->id)}}" class="btn btn-warning btn-sm"><div class="glyphicon glyphicon-edit"></div></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{!!$alumnos->appends(request()->input())->links()!!}
	</div>
	<span id="provedores-total">Mostrando {{$alumnos->total()}}</span>
	| página {{$alumnos->currentPage()}} de {{$alumnos->lastPage()}}
	
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Alumno</h4>
				</div>
				<div class="modal-body pre-scrollable">
					{!! Form::open(['route'=>['alumnos.store'], 'method'=>'POST']) !!}
					{!! Form::token() !!}
					<div class="form-group">
						<label for="" class="control-label sr-only">Nombre(s)</label>
						<input type="text" name="nombre" id="" class="form-control" placeholder="Nombre(s)" required value="{{old('nombre')}}">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Apellido Paterno</label>
						<input type="text" name="aPaterno" id="" class="form-control" placeholder="Apellido Paterno" required value="{{old('aPaterno')}}">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Apellido Materno</label>
						<input type="text" name="aMaterno" id="" class="form-control" placeholder="Apellido Materno" required value="{{old('aMaterno')}}">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Teléfono</label>
						<input type="text" name="telefono" id="" class="form-control" placeholder="Teléfono" required maxlength="10" value="{{old('telefono')}}">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Correo</label>
						<input type="email" name="correo" placeholder="ejemplo@gmail.com" id="" class="form-control" required value="{{old('correo')}}">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Matrícula</label>
						<input type="number" name="matricula" id="" class="form-control" placeholder="Matrícula" required maxlength="8" min="0" value="{{old('matricula')}}">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Calle</label>
						<input type="text" name="calle" placeholder="Calle" id="" class="form-control" required value="{{old('calle')}}">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Estado</label>
						<select name="idEstado" id="" class="form-control estados">
							<option value="" hidden>--Selecciona un estado--</option>
							@foreach($estados as $estado)
							<option value="{{$estado->id}}">{{$estado->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Municipio</label>
						<select name="idMunicipio" id="idMunicipios" class="form-control">
						</select>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Carrera</label>
						<select name="idCarrera" id="idCarrera" class="form-control" required>
							<option value="" hidden></option>
							@foreach($carreras as $carrera)
							<option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Curricular deseada</label>
						<select name="idCurricular" id="idCurricular" class="form-control">
							<option value="" hidden></option>
							@foreach($curriculares as $curricular)
							<option value="{{$curricular->id}}">{{$curricular->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Ciclo Escolar</label>
						<select name="idCiclo" id="" class="form-control">
							<option value="" hidden></option>
							@foreach ($ciclos as $ciclo)
							<option value="{{$ciclo->id}}">{{date_format(new dateTime($ciclo->fechaInicio),'d/m/Y')}} al {{date_format(new dateTime($ciclo->fechaFin),'d/m/Y')}}</option>
							@endforeach
						</select>
					</div>
					<!-- <div class="form-group">
										<label for="">Inicio Periodo</label>
										<input name="fechaInicio" value="{{date('Y-m-d')}}" class="form-control calendar" type="date">
					</div>
					<div class="form-group">
									<label for="">Fin Periodo</label>
									<input name="fechaFin" value="{{date('Y-m-d',strtotime('+6 months'))}}" class="form-control" type="date">
					</div> -->
					<button type="submit" class="btn btn-success btn-block">Guardar</button>
					{!! Form::close() !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection