@extends('adminlte::layouts.app')
@section('contentheader_title')
<h1>Curriculares</h1>
@section('contentheader_description')
Administración de curriculares
@endsection
@endsection
@section('main-content')
<div class="panel panel-form">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Gestión de curriculares
    <a class="btn btn-primary pull-right" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
    
  </div>
  <div class="panel-body">
    
    <form action="{{route('curriculares.index')}}" method="GET">
      <div class="form-inline">
        <div class="input-group">
          <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
        </div>
        <input type="search" class="form-control" id="idBusqueda" placeholder="Búsqueda..." name="busqueda" value="{{old('busqueda')}}">
      </div>
    </div>
  </form>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Duración (Semestres)</th>
        <!-- <th>Descripción</th> -->
        <th>Activo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($curriculares as $curricular)
      <tr class = "{{$curricular->activo==0?'danger':''}}">
        <td>{{$curricular->nombre}}</td>
        <td>{{$curricular->semestres}}</td>
        <!-- <td>{{$curricular->descripcion}}</td> -->
        <td>
          {!! Form::open(['route'=>['activarCurricular', $curricular->id],'method'=>'PUT']) !!}
          {!! Form::token() !!}
          <label class="switch">
            <input type="checkbox" class="lActivo" <?=$curricular->activo==1?'checked':'';?> id="{{$curricular->id}}">
            <span class="slider round"></span>
          </label>
          {!! Form::close() !!}
        </td>
        <td>
          <!-- <form action="" method="get" accept-charset="utf-8"> -->
          <a href="{{route('curriculares.edit', $curricular->id)}}" class="btn btn-warning">Editar</a>
          <!-- <input type="submit" href="" class="btn btn-danger" disabled value="Eliminar"> -->
          <!-- </form>           -->
        </td>
      </tr>
      @endforeach
    </tbody>    
  </table>
  <div class="text-center">
    {!!$curriculares->appends(request()->input())->links()!!}
  </div>
  <span id="provedores-total">{{$curriculares->total()}}</span>
  activos | página {{$curriculares->currentPage()}} de {{$curriculares->lastPage()}}
</div>
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Curricular</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>['curriculares.store'],'method'=>'POST']) !!}
        {!! Form::token() !!}
        <div class="form-group">
          <label for="" class="control-label sr-only">Nombre</label>
          <input type="text" class="form-control" id="" placeholder="Nombre" name="nombre">
        </div>
        
        <div class="form-group">
          <label for="" class="control-label sr-only">Duración en Semestres</label>
          <input type="number" class="form-control" id="" placeholder="Duración en semestres" name="semestres" max="4" min="1" maxlength="1" minlength="1">
        </div>
        
        <div class="form-group">
          <label for="" class="control-label sr-only">Duración en Semestres</label>
          <textarea name="descripcion" id="" cols="30" rows="10" class="form-control" placeholder="Describe brevemente la actividad extracurricular"></textarea>
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