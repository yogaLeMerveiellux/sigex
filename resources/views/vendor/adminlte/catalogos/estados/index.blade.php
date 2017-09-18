@extends('adminlte::layouts.app')
@section('contentheader_title')
<h1>Estados</h1>
@section('contentheader_description')
Administración de estados
@endsection
@endsection

@section('main-content')
<div class="panel panel-form">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Gestión de Estados
    <a class="btn btn-primary pull-right" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>    
    
  </div>
  <div class="panel-body">
    
    <form action="{{route('estados.index')}}" method="GET">
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
          <th>Nombre</th>          
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($estados as $estado)
        <tr>
          <td>{{$estado->nombre}}</td>         
          <td>          
              <a href="{{route('estados.edit', $estado->id)}}" class="btn btn-warning">Editar</a>          
          </td>
        </tr>
        @endforeach
      </tbody>      
    </table>
    <div class="text-center">
    {!!$estados->appends(request()->input())->links()!!} 
    </div>    
    <span id="provedores-total">{{$estados->total()}}</span>
      activos | página {{$estados->currentPage()}} de {{$estados->lastPage()}}
  </div>
  <div class="modal fade" id="modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Estado</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['route'=>['estados.store'], 'method'=>'POST']) !!}
          {!! Form::token() !!}
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
