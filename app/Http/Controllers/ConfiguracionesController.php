<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Configuraciones;
class ConfiguracionesController extends Controller
{
    public function index(){
    	$configuracion=Configuraciones::find('1');
    	return view('adminlte::catalogos.configuraciones.index', compact('configuracion'));
    }

    public function update(Request $request, $id){    	
    	$config=Configuraciones::find($id);    	
    	if ($request->hasFile('logo')) {    		        	    	
    	Storage::delete($request->logo);
    	$config->logo=$request->file('logo')->storeAs('public','logoInstitucion');    	
    	}
    	$config->update($request->only('nombreSistema','skinOption','nombreInstitucion'));
		return back()->with('status','Configuración actualizada exitósamente ');
    }
}
