<?php

namespace App\Http\Controllers;

use App\Ciclos;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos=Ciclos::orderby('id','desc')->paginate();
        $configuracion=\App\Configuraciones::find('1');
        return view('adminlte::catalogos.ciclos.index', compact('ciclos','configuracion'));
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
            'fechaInicio'=>'required',
            'fechaFin'=>'required',
            ]);
        Ciclos::create($request->all());
        return back()->with('mensaje','Ciclo añadido exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function show(Ciclos $ciclos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciclos $ciclos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciclos $ciclos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciclos  $ciclos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciclos $ciclos)
    {
        //
    }

    public function activarCiclo(Request $request, $id){
        if ($request->ajax()) {            
            $ciclo = Ciclos::find($id);
            if ($ciclo->activo==0) {                
            $ciclo->update(['activo'=>'1']);            
            return response()->json([
                'data'=>'Activado',                
                ]);
            }else{
            $ciclo->update(['activo'=>'0']);            
            return response()->json([
                'data'=>'Desactivado',                
                ]);
            }            
        }        
    } 
}
