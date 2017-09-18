@extends('adminlte::layouts.app')
@section('contentheader_title')
<h1>Estados</h1>
@section('contentheader_description')
Administración de Estados
@endsection
@endsection
@section('main-content')
<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="panel panel-warning panel-form col-md-6">
			<div class="panel-heading">
				<h3 class="panel-title">Editar Estado</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['route'=>['estados.update', $estado->id], 'method'=>'PUT']) !!}
				{!! Form::token() !!}
				<div class="form-group">
					<label for="" class="control-label sr-only">Nombre</label>
					<input type="text" class="form-control" id="" placeholder="Nombre" name="nombre" value="{!!$estado->nombre!!}">
				</div>
				<button type="submit" class="btn btn-warning btn-block">Guardar cambios</button>
				{!! Form::close() !!}
			</div>
		</div>		
	</div>
</div>
@endsection