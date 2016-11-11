<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;

class passwordsController extends Controller
{
    
    
	public function showChange(){

		return view('admin/password');
	}

    public function change(Request $request){

    	if($request->password[0] == $request->password[1]){
    		$user = user::find(Auth::user()->id );
    		$user->password = bcrypt($request->password[0] );
    		$user->save();

            return redirect('admin/noticias');
    	}else{
    		session::flash('alert','Error, las contraseñas no coinciden');
            session::flash('type','alert-danger');

            return redirect('admin/password');
    	}
    	
    }
}
