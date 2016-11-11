<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\noticia;
use App\contacto;
use Session;

class indexController extends Controller
{
    

	public function index(){

		$ultimasNoticias = $this->obtenerUltimas();
		$noticias = noticia::where('estatus','Publicada')->orderBy('id','DESC')->paginate(5);

		return view('index/index')->with('ultimasNoticias',$ultimasNoticias)->with('noticias',$noticias);
	}


	public function qs(){

		$ultimasNoticias = $this->obtenerUltimas();
		return view('index/qs')->with('ultimasNoticias',$ultimasNoticias);
	}

	public function contacto(){

		$ultimasNoticias = $this->obtenerUltimas();
		return view('index/contacto')->with('ultimasNoticias',$ultimasNoticias);
	}

	public function noticia($id){

		$ultimasNoticias = $this->obtenerUltimas();
		$noticia = noticia::find($id);
		return view('index/noticia')->with('ultimasNoticias',$ultimasNoticias)->with('noticia',$noticia);

	}

	public function regContacto(Request $request){

		$contacto = new contacto($request->all() );
		$contacto->save();

		session::flash('alert','Su mensaje fue enviado. Gracias!');
        session::flash('type','alert-success');

		return redirect('/');
	}

	private function obtenerUltimas(){

		$ultimasNoticias = noticia::orderBy('id','DESC')->take(5)->get();
		return $ultimasNoticias;
	}

}
