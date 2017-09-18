@extends('adminlte::layouts.app')
@section('htmlheader_title')
Municipios
@endsection
@section('contentheader_title')
<h1>Municipios</h1>
@section('contentheader_description')
Administración de municipios
@endsection
@endsection
@section('main-content')
<div class="panel panel-form">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Gestión de Municipios
    <a class="btn btn-primary pull-right" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
    
  </div>
  <div class="panel-body">
    
    <form action="{{route('municipios.index')}}" method="GET">
      <div class="form-inline">
        <div class="input-group">
          <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
        </div>
        <input type="search" class="form-control" id="idBusqueda" placeholder="Búsqueda..." name="busqueda" value="{{old('busqueda')}}">
      </div>
    </div>
  </form>
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
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Estado <span class="glyphicon glyphicon-sort pull-right"></span></th>
        <th>Municipio <span class="glyphicon glyphicon-sort pull-right"></span></th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($municipios as $municipio)
      <tr>
        <td>{{$municipio->estado}}</td>
        <td>{{$municipio->nombre}}</td>
        <td>
          <a href="{{route('municipios.edit', $municipio->id)}}" class="btn btn-warning">Editar</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
    {!!$municipios->appends(request()->input())->links()!!}
  </div>
  <span id="provedores-total">{{$municipios->total()}}</span>
  activos | página {{$municipios->currentPage()}} de {{$municipios->lastPage()}}
</div>
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Municipio</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>['municipios.store'],'method'=>'POST']) !!}
        {!! Form::token() !!}
        <div class="form-group">
          <label for="" class="control-label sr-only">Estado</label>
          <select name="idEstado" id="idEstado" class="form-control">
            @foreach($estados as $estado)
            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="" class="control-label sr-only">Nombre</label>
          <input type="text" class="form-control" id="" placeholder="Nombre" name="nombre">
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