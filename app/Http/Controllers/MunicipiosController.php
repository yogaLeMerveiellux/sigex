<?php

namespace App\Http\Controllers;

use App\municipios;
use App\estados;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $estados=Estados::orderby('nombre', 'asc')->get();
       $configuracion=\App\Configuraciones::find('1');
       $municipios=Municipios::name($request->get('busqueda'))
       ->join('estados','municipios.idEstado','=','estados.id')
       ->select('municipios.*', 'estados.nombre as estado')
       ->orderby('nombre', 'asc')->paginate(5);
        return view('adminlte::catalogos.municipios.index', compact('estados','municipios','configuracion'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[        
        'nombre' => 'required|unique:municipios|',        
        ]);
        $municipio = new Municipios;
        $municipio = Municipios::create($request->all());  
        return redirect()->route('municipios.index');      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function show(municipios $municipios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\municipios  $municipios
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $municipio=Municipios::find($id);
        $configuracion=\App\Configuraciones::find('1');
        $estados=Estados::orderby('nombre','asc')->get();
        return view('adminlte::catalogos.municipios.edit',compact('municipio','estados','configuracion'));
    }

   
    public function update(Request $request, $id)
    {
        $municipio=Municipios::find($id);
        $municipio->update($request->all());
        return redirect()->route('municipios.index')->with('status','Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function destroy(municipios $municipios)
    {
        //
    }
}
