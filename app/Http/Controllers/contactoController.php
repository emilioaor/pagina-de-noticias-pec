<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\contacto;

class contactoController extends Controller
{

	public function index(){

		$contacto = contacto::orderBy('id','DESC')->paginate(20);

		return view('admin/contacto/contacto')->with('contacto',$contacto);
	}

	public function show($id){

		$contacto = contacto::find($id);

		return view('admin/contacto/show')->with('contacto',$contacto);

	}
}
