<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\noticia;
use Auth;
use Session;

class noticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->nivel == 'Editor'){
            $noticias  = noticia::where('autor',Auth::user()->id )->where('estatus','<>','Papelera')->orderBy('id','DESC')->paginate(10);
        }elseif(Auth::user()->nivel == 'Administrador' ){
            $noticias  = noticia::where('estatus','<>','Papelera')->orderBy('id','DESC')->paginate(10);
        }

        return view('admin/noticias')->with('noticias',$noticias)->with('act',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $noticia = new noticia($request->all() );
        $noticia->save();

        session::flash('alert','Noticia Agregada');
        session::flash('type','alert-success');

        return redirect('admin/noticias/'. $noticia->id .'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($estatus)
    {
        
        if(Auth::user()->nivel == 'Editor' ){
            $noticias  = noticia::where('autor',Auth::user()->id )->where('estatus',$estatus)->orderBy('id','DESC')->paginate(10);
        }elseif(Auth::user()->nivel == 'Administrador' ){
            $noticias  = noticia::where('estatus',$estatus)->orderBy('id','DESC')->paginate(10);
        }


        if($estatus=='Publicada')
            $act = 2;
        elseif($estatus=='Borrador')
            $act = 3;
        else
            $act = 4;

        return view('admin/noticias')->with('noticias',$noticias)->with('act',$act);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = noticia::find($id);

        return view('admin/edit')->with('noticia',$noticia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $noticia = noticia::find($id);
        $noticia->fill($request->all() );
        $noticia->save();

        session::flash('alert','Noticia Actualizada');
        session::flash('type','alert-warning');

        return redirect('admin/noticias/'. $id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = noticia::find($id);
        $noticia->estatus = 'Papelera';
        $noticia->save();

        session::flash('alert','Noticia movida a la papelera');
        session::flash('type','alert-danger');

        return redirect('admin/noticias');
    }

    public function recovery($id){

        $noticia = noticia::find($id);
        $noticia->estatus = 'Borrador';
        $noticia->save();

        session::flash('alert','Noticia movida a borradores');
        session::flash('type','alert-success');

        return redirect('admin/noticias/Papelera');
    }

    public function remove($id){

        $noticia = noticia::find($id);
        $noticia->delete();

        session::flash('alert','Noticia eliminada');
        session::flash('type','alert-danger');

        return redirect('admin/noticias/Papelera');
    }
}
