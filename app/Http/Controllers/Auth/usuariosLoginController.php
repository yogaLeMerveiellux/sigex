<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class usuariosLoginController extends Controller
{

	public function __construct()
	{		
		$this->middleware('guest:usuario');
	}

    public function showLoginForm()
    {
    	return view('auth.login');
    }

    public function login(Request $request)
    {
    	$this->validate($request,[
    		'correo'=>'required|email',
    		'password'=>'required|min:6',
    		]);

    	if (Auth::guard('usuario')->attempt(['correo'=>$request->correo,'password'=>$request->password],$request->remember)){
    		return redirect()->intended(route('usuarios.home'));
    	}

    	return redirect()->back()->withInput($request->only('correo','remember','password'));
    }
}
