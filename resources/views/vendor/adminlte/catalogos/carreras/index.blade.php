@extends('adminlte::layouts.app')
@section('contentheader_title')
<h1>Carreras</h1>
@section('contentheader_description')
Administración de carreras
@endsection
@endsection
@section('main-content')
<div class="panel panel-form">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Gestión de carreras
    <a class="btn btn-primary pull-right" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
    
  </div>
  <div class="panel-body">
    
    <form action="{{route('carreras.index')}}" method="GET">
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
        <th>Nombre</th>
        <th>Activo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($carreras as $carrera)
      <tr class = "{{$carrera->activo==0?'danger':''}}">
        <td>{{$carrera->nombre}}</td>
        <td>        
        {!! Form::open(['route'=>['activarCarrera', $carrera->id],'method'=>'PUT']) !!}
        {!! Form::token() !!}
          <label class="switch">
            <input type="checkbox" class="lActivo" <?=$carrera->activo==1?'checked':'';?> id="{{$carrera->id}}">
            <span class="slider round"></span>
          </label>      
          {!! Form::close() !!}    
        </td>
        <td>                  
          <a href="{{route('carreras.edit', $carrera->id)}}" class="btn btn-warning">Editar</a>
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
    {!!$carreras->appends(request()->input())->links()!!}
  </div>
  <span id="provedores-total">{{$carreras->total()}}</span>
  activos | página {{$carreras->currentPage()}} de {{$carreras->lastPage()}}
</div>
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">carrera</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>['carreras.store'],'method'=>'POST']) !!}
        {!! Form::token() !!}
        <div class="form-group">
          <label for="" class="control-label sr-only">Nombre</label>
          <input type="text" class="form-control" id="" placeholder="Nombre" name="nombre" value="{{old('nombre')}}">
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

