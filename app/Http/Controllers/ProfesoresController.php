<?php

namespace App\Http\Controllers;

use App\Profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculares = \App\Curriculares::orderby('nombre','asc')->get();
        $configuracion=\App\Configuraciones::find('1');
        $profesores = \DB::table('profesores')
        ->join('curriculares','profesores.idCurricular','=','curriculares.id')
        ->select('curriculares.nombre as curricular', 'profesores.*')
        ->orderby('profesores.id','desc')               
        ->paginate()
        ;
        return view('adminlte::catalogos.profesores.index',compact('profesores','curriculares','configuracion'));
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
            'nombre'=>'required',
            'aPaterno'=>'required',                        
            'correo'=>'required',
            'idCurricular'=>'unique:profesores',
        ]);
        Profesores::create($request->all());
        return back()->with('status','Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function show(Profesores $profesores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curriculares=\App\Curriculares::orderby('nombre','asc')->get();
        $configuracion=\App\Configuraciones::find('1');
        $profesor=\DB::table('profesores')
        ->join('curriculares','profesores.idCurricular','=','curriculares.id')
        ->select('curriculares.nombre as curricular','profesores.*')
        ->where('profesores.id',$id)
        ->get();
        
        return view('adminlte::catalogos.profesores.edit',compact('profesor','curriculares','configuracion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'aPaterno'=>'required',                        
            'correo'=>'required',
            'idCurricular'=>'unique:profesores',
        ]);
        $instructor=Profesores::find($id);
        $instructor->update($request->all());
        return redirect()->route('profesores.index')->with('status','Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesores $profesores)
    {
        //
    }

    public function activarProfesor(Request $request, $id){
        if ($request->ajax()) {            
            $profesor = Profesores::find($id);
            if ($profesor->activo==0) {                
            $profesor->update(['activo'=>'1']);            
            return response()->json([
                'data'=>'Activado',                
                ]);
            }else{
            $profesor->update(['activo'=>'0']);            
            return response()->json([
                'data'=>'Desactivado',                
                ]);
            }            
        }  
        
    } 
}
