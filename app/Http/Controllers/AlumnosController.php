<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Municipios;
use App\Estados;
use App\Alumnos;
use App\Curriculares;
use App\Carreras;
use App\Ciclos;
use App\Configuraciones;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $curriculares=Curriculares::where('activo','1')->orderby('nombre','asc')->get();
        $carreras=Carreras::where('activo','1')->orderby('nombre','asc')->get();
        $estados=Estados::orderby('nombre','asc')->get();
        $municipios=Municipios::orderby('nombre','asc')->get();
        $ciclos=Ciclos::where('activo','1')->get();
        $configuracion=Configuraciones::find('1');
               
        $alumnos=Alumnos::name($request->get('busqueda'))
        ->join('curriculares','alumnos.idCurricular','=','curriculares.id')
        ->join('profesores','curriculares.id','=','profesores.idCurricular')
        ->join('carreras', 'alumnos.idCarrera','=','carreras.id')
        ->join('ciclosEscolares', 'alumnos.idCiclo','=','ciclosEscolares.id')
        ->select('profesores.nombre as profesor','profesores.aPaterno as apellidoProfesor','profesores.activo as profesorVigente','ciclosEscolares.*','alumnos.*','curriculares.nombre as curricular','carreras.nombre as carrera')        
        ->where('ciclosEscolares.activo','1')
        ->type($request->get('selectActivo','selectActividad'))        
        ->orderby('alumnos.id','desc')        
        ->paginate(); 

        return view('adminlte::catalogos.alumnos.index', compact('alumnos','estados','municipios','curriculares','carreras','ciclos','configuracion','profesores'));
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
        'nombre' => 'required',        
        'aPaterno' => 'required',        
        'telefono' => 'required',        
        'matricula' => 'required|unique:alumnos|max:8',        
        'correo' => 'email|required|unique:alumnos',        
        ]);

        $alumno = new Alumnos();
        $alumno = Alumnos::create($request->all());
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configuracion=\App\Configuraciones::find('1');
        $alumnos=DB::table('alumnos')
        ->join('estados','alumnos.idEstado','=','estados.id')
        ->join('municipios','alumnos.idMunicipio','=','municipios.id')
        ->join('curriculares','alumnos.idCurricular','=','curriculares.id')
        ->join('carreras', 'alumnos.idCarrera','=','carreras.id')
        ->join('ciclosEscolares', 'alumnos.idCiclo','=','ciclosEscolares.id')
        ->select('alumnos.*', 'estados.nombre as estado','municipios.nombre as municipio', 'carreras.nombre as carrera','curriculares.nombre as curricular','ciclosEscolares.fechaInicio as inicio','ciclosEscolares.fechafin as fin')
        ->where('alumnos.id',$id)        
        ->get();

        return view('adminlte::catalogos.alumnos.show', compact('alumnos','configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {         
        $configuracion=\App\Configuraciones::find('1');
        $curriculares=Curriculares::where('activo','1')->orderby('nombre','asc')->get();
        $carreras=Carreras::where('activo','1')->orderby('nombre','asc')->get();
        $estados=Estados::orderby('nombre','asc')->get();
        $municipios=Municipios::orderby('nombre','asc')->get();
        $ciclos=Ciclos::orderby('id','desc')->get();
        $alumno=DB::table('alumnos')
        ->join('estados','alumnos.idEstado','=','estados.id')
        ->join('municipios','alumnos.idMunicipio','=','municipios.id')
        ->join('curriculares','alumnos.idCurricular','=','curriculares.id')
        ->join('carreras', 'alumnos.idCarrera','=','carreras.id')        
        ->join('ciclosEscolares', 'alumnos.idCiclo','=','ciclosEscolares.id')
        ->select('alumnos.*', 'estados.nombre as estado','municipios.nombre as municipio', 'carreras.nombre as carrera','curriculares.nombre as curricular','ciclosEscolares.fechaInicio as inicio','ciclosEscolares.fechafin as fin')
        ->where('alumnos.id',$id)
        ->get();
        return view('adminlte::catalogos.alumnos.edit', compact('alumno','estados','municipios','curriculares','carreras','ciclos','configuracion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nombre' => 'required',        
        'aPaterno' => 'required',        
        'telefono' => 'required',        
        'matricula' => 'required|unique:alumnos,id|max:8',        
        'correo' => 'email|required|unique:alumnos,id',                
        ]);

        $alumno=Alumnos::find($id);
        $alumno->update($request->all());
        return back()->with('status', 'Modificado correctamente');
    }

    public function activarAlumno(Request $request, $id){
        if ($request->ajax()) {            
            $alumno = Alumnos::find($id);
            if ($alumno->activo==0) {                
            $alumno->update(['activo'=>'1']);            
            return response()->json([
                'data'=>'Activado',                
                ]);
            }else{
            $alumno->update(['activo'=>'0']);            
            return response()->json([
                'data'=>'Desactivado',                
                ]);
            }            
        }        
    } 

    public function encontrarMunicipios(Request $request, $id)
    {
        if ($request->ajax())
        {
            $municipios = DB::table('municipios')
            ->select('id','nombre')
            ->where('idEstado', $id)
            ->get();
            return response($municipios);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumnos $alumnos)
    {
        //
    }
}
