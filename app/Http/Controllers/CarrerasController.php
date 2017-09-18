<?php

namespace App\Http\Controllers;

use App\Carreras;
use DB;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $carreras=Carreras::orderby('nombre','asc')->paginate();
        $configuracion=\App\Configuraciones::find('1');
        return view('adminlte::catalogos.carreras.index', compact('carreras','configuracion'));
    }


    public function store(Request $request){
        $this->validate($request,[
            'nombre'=>'required|unique:carreras',
            ]);
        $carrera = new Carreras();
        $carrera = Carreras::create($request->all());
        return back()->with('status','Registrado exitosamente');
    }

    public function activarCarrera(Request $request, $id){
        if ($request->ajax()) {            
            $carrera = Carreras::find($id);
            if ($carrera->activo==0) {                
            $carrera->update(['activo'=>'1']);            
            return response()->json([
                'data'=>'Activado',                
                ]);
            }else{
            $carrera->update(['activo'=>'0']);            
            return response()->json([
                'data'=>'Desactivado',                
                ]);
            }            
        }  
        
    }      
    public function edit(carreras $carreras){
        //
    }

    public function update(Request $request, carreras $carreras){
        //
    }

    
    // public function create()
    // {
    //     //
    // }

    // public function show(carreras $carreras)
    // {
    //     //
    // }

    // public function destroy(carreras $carreras)
    // {
    //     //
    // }
}
