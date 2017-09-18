@extends('adminlte::layouts.app')
@section('htmlheader_title')
Ciclos Escolares
@endsection
@section('contentheader_title')
<h1>Ciclos Escolares</h1>
@section('contentheader_description')
Administración de ciclos escolares
@endsection
@endsection
@section('main-content')
<div class="panel panel-form">
	<!-- Default panel contents -->
	<div class="panel-heading">
		Gestión de ciclos
		<a class="btn btn-primary pull-right" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>		
		
	</div>
	<div class="panel-body">
		
		<form action="{{route('ciclos.index')}}" method="GET">
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
		No se pudo agregar ciclo escolar, la razón;
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
				<th>ID</th>
				<th>Fecha de Inicio</th>
				<th>Fecha fin</th>
				<th>Activo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ciclos as $ciclo)
			<tr class = "{{$ciclo->activo==0?'danger inactivo':''}} lead">
				<td>{{$ciclo->id}}</td>
				<!-- <td>{{$ciclo->fechaInicio}}</td>
				<td>{{$ciclo->FechaFin}}</td> -->
				<td>{{date_format(new dateTime($ciclo->fechaInicio),'d / m / Y')}}</td>
				<td>{{date_format(new dateTime($ciclo->FechaFin),'d / m / Y')}}</td>
				<td>
					{!! Form::open(['route'=>['activarCiclo', $ciclo->id],'method'=>'PUT']) !!}
					{!! Form::token() !!}
					<label class="switch">
						<input type="checkbox" class="lActivo" <?=$ciclo->activo==1?'checked':'';?> id="{{$ciclo->id}}">
						<span class="slider round"></span>
					</label>
					{!! Form::close() !!}
				</td>
				<td>
					<!-- <form action="" method="get" accept-charset="utf-8"> -->
					<a href="{{route('ciclos.edit', $ciclo->id)}}" class="btn btn-warning">Editar</a>
					<!-- <input type="submit" href="" class="btn btn-danger" disabled value="Eliminar"> -->
					<!-- </form>           -->
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{!!$ciclos->appends(request()->input())->links()!!}
	</div>
	<span id="provedores-total">{{$ciclos->total()}}</span>
	activos | página {{$ciclos->currentPage()}} de {{$ciclos->lastPage()}}
</div>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ciclo</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['route'=>['ciclos.store'],'method'=>'POST']) !!}
				{!! Form::token() !!}
				<div class="form-group">
					<label for="" class="control-label sr-only">Fecha de Inicio del ciclo escolar</label>
					<input type="date" class="form-control" id="" placeholder="Indica el inicio del ciclo" name="fechaInicio" value="{{old('fechaInicio')}}">
				</div>
				<div class="form-group">
					<label for="" class="control-label sr-only">Fecha de fin del ciclo escolar</label>
					<input type="date" class="form-control" id="" placeholder="Indica el fin del ciclo" name="fechaFin" value="{{old('fechaFin')}}">
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