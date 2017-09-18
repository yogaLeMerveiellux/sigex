@extends('adminlte::layouts.app')
@section('htmlheader_title')
Profesores
@endsection
@section('contentheader_title')
<h1>Profesores</h1>
@section('contentheader_description')
Administración de profesores
@endsection
@endsection
@section('main-content')
<div class="panel panel-form">
	<!-- Default panel contents -->
	<div class="panel-heading">
		Gestión de profesores
		<a class="btn btn-primary pull-right" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
		
	</div>
	<div class="panel-body">
		
		<form action="{{route('profesores.index')}}" method="GET">
			<div class="form-inline">
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
				</div>
				<input type="search" class="form-control" id="idBusqueda" placeholder="Búsqueda..." name="busqueda" value="{{old('busqueda')}}">
			</div>
		</div>
	</form>
	<br>
	@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
	@endif
	@if ($errors->any())
	<div class="alert alert-danger">
		No se pudo agregar instructor, las razones:
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Profesor</th>
				<th>Actividad Asignada</th>
				<th>Activo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($profesores as $profesor)
			<tr class = "{{$profesor->activo==0?'danger inactivo':''}}">
				<td>{{$profesor->nombre}} {{$profesor->aPaterno}}</td>
				<td>{{$profesor->curricular}}</td>
				<td>
					{!! Form::open(['route'=>['activarProfesor', $profesor->id],'method'=>'PUT']) !!}
					{!! Form::token() !!}
					<label class="switch">
						<input type="checkbox" class="lActivo" <?=$profesor->activo==1?'checked':'';?> id="{{$profesor->id}}">
						<span class="slider round"></span>
					</label>
					{!! Form::close() !!}
				</td>
					<td>
						<a href="{{route('profesores.edit', $profesor->id)}}" class="btn btn-warning">Editar</a>
						<a href="{{route('profesores.destroy', $profesor->id)}}" class="btn btn-danger">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!!$profesores->appends(request()->input())->links()!!}
		</div>
		<span id="provedores-total">{{$profesores->total()}}</span>
		activos | página {{$profesores->currentPage()}} de {{$profesores->lastPage()}}
	</div>
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Profesor</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route'=>['profesores.store'],'method'=>'POST']) !!}
					{!! Form::token() !!}
					<div class="form-group">
						<label for="" class="control-label sr-only">Nombre</label>
						<input type="text" name="nombre" id="idNombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre del profesor">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Apellidos</label>
						<input type="text" class="form-control" id="" placeholder="Apellidos" name="aPaterno">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Correo</label>
						<input type="text" class="form-control" id="" placeholder="example@company.com" name="correo">
					</div>
					<div class="form-group">
						<label for="" class="control-label sr-only">Teléfono</label>
						<input type="text" class="form-control" id="" placeholder="Numero de teléfono (Celular, casa)" name="telefono" maxlength="10" min="0">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Curricular Designada</label>
						<select name="idCurricular" id="" class="form-control">
							@foreach ($curriculares as $curricular)
							<option value="{{$curricular->id}}">{{$curricular->nombre}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Guardar</button>
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