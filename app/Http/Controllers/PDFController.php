<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Alumnos;
use App\Curriculares;
use App\Ciclos;
use App\Profesores;
use App;
use PDF;
use DB;
class PDFController extends Controller
{

public function boletaDeAcreditacion(Request $request, $id){
	$configuracion=\App\Configuraciones::find('1');
	$alumnos=DB::table('alumnos')	
	->join('curriculares','alumnos.idCurricular','=','curriculares.id')
    ->join('profesores','curriculares.id','=','profesores.idCurricular')
	->join('carreras', 'alumnos.idCarrera','=','carreras.id')	
	->join('ciclosEscolares','alumnos.idCiclo','=','ciclosEscolares.id')
	->select('profesores.nombre as profesor','profesores.aPaterno as apellidoProfesor','ciclosEscolares.*','alumnos.*', 'carreras.nombre as carrera','curriculares.nombre as curricular')
	->where('alumnos.id', $id)
	->get();	

	$view =  \View::make('pdf.boleta', compact('alumnos','configuracion'))->render();
	$pdf = \App::make('dompdf.wrapper');
	$pdf->loadHTML($view);
	
	$alumnopdf=Alumnos::find($id);
	return $pdf->stream($alumnopdf->nombre.$alumnopdf->aPaterno.'_BoletaCurricular_'.date('dmY').'.pdf');
	}

public function listasPDF(Request $request)
{
	$alumnos=Alumnos::type($request->get('selectActividad'))        	
	->join('curriculares','alumnos.idCurricular','=','curriculares.id')
	->join('carreras', 'alumnos.idCarrera','=','carreras.id')
	->join('ciclosEscolares', 'alumnos.idCiclo','=','ciclosEscolares.id')
	->select('ciclosEscolares.*','alumnos.*','curriculares.nombre as curricular','carreras.nombre as carrera')
	->where('alumnos.activo', '1')
	->where('ciclosEscolares.activo', '1')
	->orderby('alumnos.nombre','asc')
	->get(); 

	$actividad=Curriculares::find($request->selectActividad);	

	$profesor= Profesores::select('nombre','aPaterno','activo')	
	->where('idCurricular',$request->selectActividad)
	// ->where('activo','1')
	->get();
	// dd($profesor);

	$ciclo = Ciclos::where('activo','1')->get();
	
	$view =  \View::make('pdf.lista', compact('alumnos','actividad','ciclo','profesor'))->render();
	$pdf = \App::make('dompdf.wrapper');
	$pdf->loadHTML($view);
	
	return $pdf->stream('listaDeAsistencias_'.date('d_m_Y').'.pdf');

	
}

}