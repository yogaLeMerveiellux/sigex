<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
return view('welcome');
});


// Route::group(['prefix' => 'usuarios'], function() {
// Route::get('home','Auth\UsuariosController@index')->name('usuarios.home');
// Route::get('log','Auth\UsuariosLoginController@showLoginForm')->name('usuarios.login');
// Route::post('log','Auth\UsuariosLoginController@login')->name('usuarios.login.submit');
// });


Route::group(['middleware' => 'auth','prefix'=>'Admin'], function () {
Route::resource('curriculares', 'CurricularesController');
Route::resource('alumnos', 'AlumnosController');
Route::resource('ciclos', 'CiclosController');
Route::resource('carreras', 'CarrerasController');
Route::resource('municipios', 'MunicipiosController');
Route::resource('estados', 'EstadosController');
Route::resource('profesores', 'ProfesoresController');
Route::get('encontrarMunicipios/{id}','AlumnosController@encontrarMunicipios');
Route::get('boletaDeAcreditacion/Code_{id}','PDFController@boletaDeAcreditacion')->name('boleta');
Route::get('listaDeAsistencias','PDFController@listasPDF')->name('descargarLista');
Route::get('configuraciones','ConfiguracionesController@index')->name('configuraciones.index');
Route::put('activarCarrera/{id}','CarrerasController@activarCarrera')->name('activarCarrera');
Route::put('activarProfesor/{id}','ProfesoresController@activarProfesor')->name('activarProfesor');
Route::put('activarAlumno/{id}','AlumnosController@activarAlumno')->name('activarAlumno');
Route::put('activarCurricular/{id}','CurricularesController@activarCurricular')->name('activarCurricular');
Route::put('activarCiclo/{id}','CiclosController@activarCiclo')->name('activarCiclo');
Route::put('guardarConfig/{id}','ConfiguracionesController@update')->name('configuracion.update');
});