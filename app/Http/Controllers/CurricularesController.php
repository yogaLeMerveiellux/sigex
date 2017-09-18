<?php

namespace App\Http\Controllers;

use App\Curriculares;
use Illuminate\Http\Request;
use DB;

class CurricularesController extends Controller
{

    public function index(Request $request)
    {
        $curriculares=Curriculares::name($request->get('busqueda'))->orderby('nombre', 'asc')->paginate();
        $configuracion=\App\Configuraciones::find('1');
        return view('adminlte::catalogos.curriculares.index', compact('curriculares','configuracion'));
    }

    public function store(Request $request)
    {
        $nuevo = new Curriculares($request->all());
        $nuevo->save();
        return redirect()->route('curriculares.index');
    }

    public function show(Curriculares $curriculares)
    {
        //
    }

    public function destroy(Curriculares $curriculares)
    {
        //
    }
    public function edit($id)
    {
        $curricular=Curriculares::find($id);
        $configuracion=\App\Configuraciones::find('1');
        return view('adminlte::catalogos.curriculares.edit', compact('curricular','configuracion'));
    }

    public function update(Request $request,$id)
    {
        $curricular=Curriculares::find($id);
        $curricular->update($request->all());
        return redirect()->route('curriculares.index');
    }

    public function activarCurricular(Request $request, $id){
        if ($request->ajax()) {            
            $curricular = Curriculares::find($id);
            if ($curricular->activo==0) {                
            $curricular->update(['activo'=>'1']);            
            return response()->json([
                'data'=>'Activado',                
                ]);
            }else{
            $curricular->update(['activo'=>'0']);            
            return response()->json([
                'data'=>'Desactivado',                
                ]);
            }            
        }        
    }  

    // public function desactivar(Request $request, $id){
    //     if ($request->ajax()) {            
    //         $curricular = Curriculares::find($id);
    //         $curricular->update(['activo'=>'0']);            
    //         return response()->json([
    //             'data'=>'Desactivado',
    //             ]);
    //     }
        
    // }   
}
