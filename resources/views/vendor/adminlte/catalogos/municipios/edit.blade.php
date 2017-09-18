@extends('adminlte::layouts.app')
@section('contentheader_title')
<h1>Municipios</h1>
@section('contentheader_description')
Administración de Municipios
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
				{!! Form::open(['route'=>['municipios.update', $municipio->id], 'method'=>'PUT']) !!}
				{!! Form::token() !!}
				<div class="form-group">
					<label for="" class="control-label">Estado</label>
					<select name="idEstado" id="" class="form-control">
						@foreach ($estados as $estado)
							<option value="{{$estado->id}}">{{$estado->nombre}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="" class="control-label sr-only">Nombre</label>
					<input type="text" class="form-control" id="" placeholder="Nombre" name="nombre" value="{!!$municipio->nombre!!}">
				</div>
				<button type="submit" class="btn btn-warning btn-block">Guardar cambios</button>
				{!! Form::close() !!}
			</div>
		</div>		
	</div>
</div>
@endsection