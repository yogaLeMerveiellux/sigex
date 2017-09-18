@extends('adminlte::layouts.app')
@section('htmlheader_title')
Configuración
@endsection
@section('contentheader_title')
<h1>Configuración del sistema</h1>
@endsection
@section('main-content')
<div class="panel panel-form">
  <!-- Default panel contents -->  
  <div class="panel-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <div class="row">
      
      <legend>Apariencia</legend>
      
      {!! Form::open(['route'=>['configuracion.update', 1],'method'=>'PUT','enctype'=>'multipart/form-data','class'=>'col-md-5']) !!}
      {!! Form::token() !!}
      <div class="form-group">
        <label for="" class="control-label">Nombre del sistema</label>
        <input type="text" class="form-control" value="{{$configuracion->nombreSistema or old('nombreSistema')}}" name="nombreSistema" placeholder="Nombre del Sistema" required>
      </div>
      <div class="form-group">
        <label class="control-label">Selecciona un logo</label>
        <input id="input-id" type="file" class="file form-control" data-preview-file-type="text" name="logo">
      </div>
      <div class="form-group">
        <label for="" class="control-label">Colores</label>
        <select name="skinOption" id="" class="form-control">
          <option value="{{$configuracion->skinOption}}" hidden>
          @php
            switch($configuracion->skinOption){
                case('skin-red'):
                    echo 'Rojo';
                    break;
                case('skin-yellow'):
                    echo 'Amarillo';
                    break;
            }
          @endphp
          </option>
          <option value="skin-green">Verde</option>
          <option value="skin-yellow">Amarillo</option>
          <option value="skin-red">Rojo</option>
          <option value="skin-black">Black & White</option>
          <option value="skin-purple">Púrpura</option>
          <option value="skin-blue">Azul</option>
        </select>
      </div>
        <legend>Institución</legend>
        <div class="form-group">
          <label for="" class="control-label">Nombre de la Institución</label>
          <input type="text" name="nombreInstitucion" id="" class="form-control" placeholder="Nombre de la institución educativa" value="{{$configuracion->nombreInstitucion}}">
        </div>
      <input type="submit" value="Guardar" class="btn btn-success">
      {!! Form::close() !!}
      <br>
      <div class="col-md-7 text-center">
        <img src="{{ Storage::url($configuracion->logo) }}" max-width="400">
      </div>
    </div>
  </div>
</div>
@endsection