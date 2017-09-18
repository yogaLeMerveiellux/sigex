@extends('adminlte::layouts.app')
@section('contentheader_title')
<h1>Curriculares</h1>
@section('contentheader_description')
Administración de curriculares
@endsection
@endsection
@section('main-content')
<div class="panel panel-warning panel-form">
	<div class="panel-heading">
		<h3 class="panel-title">Editar curricular</h3>
	</div>
	<div class="panel-body">		
		{!! Form::open(['route'=>['curriculares.update', $curricular->id], 'method'=>'PUT']) !!}
		{!! Form::token() !!}
		<div class="form-group">
			<label for="" class="control-label sr-only">Nombre</label>
			<input type="text" class="form-control" id="" placeholder="Nombre" name="nombre" value="{!!$curricular->nombre!!}">
		</div>
		
		<div class="form-group">
			<label for="" class="control-label sr-only">Duración en Semestres</label>
			<input type="number" class="form-control" id="" placeholder="Duración en semestres" name="semestres" max="4" min="1" maxlength="1" minlength="1" value="{!!$curricular->semestres!!}">
		</div>
		
		<div class="form-group">
			<label for="" class="control-label sr-only">Descripción Breve</label>
			<textarea name="descripcion" id="" cols="30" rows="10" class="form-control" placeholder="Describe brevemente la actividad extracurricular">{{$curricular->descripcion}}</textarea>
		</div>
		<button type="submit" class="btn btn-warning btn-block">Guardar cambios</button>
		{!! Form::close() !!}
	</div>
</div>
@endsection