<?php

namespace App\Http\Controllers;

use App\estados;
use DB;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    
    public function index(Request $request)
    {
        $estados=Estados::name($request->get('busqueda'))->orderby('nombre', 'asc')->paginate(5);
        $configuracion=\App\Configuraciones::find('1');
        return view('adminlte::catalogos.estados.index', compact('estados','configuracion'));
    }
  
    public function store(Request $request)
    {
    
        $this->validate($request,[
        'nombre' => 'required|unique:estados|',        
        ]);

        $estado=new Estados;
        $estado=Estados::create($request->all());
        return redirect()->route('estados.index');
    }

   
    public function show(estados $estados)
    {
        //
    }

   
    public function edit($id)
    {
        $estado=Estados::find($id);
        $configuracion=\App\Configuraciones::find('1');
        return view('adminlte::catalogos.estados.edit',compact('estado','configuracion'));
    }

   
    public function update(Request $request, $id)
    {
        $estado=Estados::find($id);
        $estado->update($request->all());
        return redirect()->route('estados.index')->with('status','Modificado Correctamente');
    }

   
    public function destroy(estados $estados)
    {
        //
    }
}
