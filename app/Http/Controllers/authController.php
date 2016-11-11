<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;

class authController extends Controller
{
    
	public function showLogin(){

		return view('auth/login');
	}

	public function login(Request $request){

		if(Auth::attempt(['user' => $request->user,'password' => $request->password])  ){
			return redirect('admin/noticias');
		}else{
			session::flash('alert','Error al ingresar, verifique sus datos');
			session::flash('type','alert-danger');
			return redirect('auth/login');
		}
	}

	public function logout(){

		Auth::logout();

		return redirect('/');
	}

}
