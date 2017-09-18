@extends('adminlte::layouts.app')
@section('htmlheader_title')
Instructores
@endsection
@section('contentheader_title')
<h1>Instructores</h1>
@section('contentheader_description')
Administración de Instructores
@endsection
@endsection
@section('main-content')
<div class="container">
  <div class="row">
  <div class="col-md-3"></div>
    <div class="panel panel-warning panel-form col-md-6">
      <div class="panel-heading">
        <h3 class="panel-title">Editar Instructor</h3>
      </div>
      <div class="panel-body">
      @foreach ($profesor as $detalle)        
        {!! Form::open(['route'=>['profesores.update', $detalle->id], 'method'=>'PUT']) !!}
        {!! Form::token() !!}
        <div class="form-group">
          <label for="" class="control-label sr-only">Nombre</label>
          <input type="text" class="form-control" id="" placeholder="Nombre" name="nombre" value="{!!$detalle->nombre!!}">
        </div>
        <div class="form-group">
          <label for="" class="control-label sr-only">Apellidos</label>
          <input type="text" class="form-control" id="" placeholder="Apellidos" name="aPaterno" value="{!!$detalle->aPaterno!!}">
        </div>
        <div class="form-group">
          <label for="" class="control-label sr-only">Correo</label>
          <input type="text" class="form-control" id="" placeholder="example@company.com" name="correo" value="{!!$detalle->correo!!}">
        </div>
        <div class="form-group">
          <label for="" class="control-label sr-only">Teléfono</label>
          <input type="text" class="form-control" id="" placeholder="Teléfono" name="telefono" value="{!!$detalle->telefono!!}">
        </div>
        <div class="form-group">
          <label for="" class="control-label sr-only">Curricular Asignada</label>
          <select name="idCurricular" id="" class="form-control">
            <option value="{{$detalle->idCurricular}}">{{$detalle->curricular}}</option>
            @foreach ($curriculares as $curricular)
              <option value="{{$curricular->id}}">{{$curricular->nombre}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-warning btn-block">Guardar cambios</button>
        {!! Form::close() !!}
      @endforeach
      </div>
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
        No se pudo modificar instructor, las razones:
        <ul class="list-unstyled">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>    
  </div>
</div>
@endsection