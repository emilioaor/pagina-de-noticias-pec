<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\user;
use Session;

class usersController extends Controller
{


    public function __construct(){

        $this->middleware('superadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::where('nivel','Editor')->orderBy('id','DESC')->paginate(20);
        
        return view('admin/users/users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->password[0] == $request->password[1] ){
            
            $user = new user();
            $user->user= $request->user;
            $user->nombre = $request->nombre;
            $user->password = bcrypt($request->password[0]);
            $user->nivel = 'Editor';
            $user->save();

            session::flash('alert','El usuario ha sido creado');
            session::flash('type','alert-success');

            return redirect('admin/users');

        }else{

            session::flash('alert','Error, las contraseñas no coinciden');
            session::flash('type','alert-danger'); 

            return redirect('admin/users/create');
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);

        return view('admin/users/edit')->with('user',$user);
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
        $user = user::find($id);
        $user->user = $request->user;
        $user->nombre = $request->nombre;

        if($request->password[0]<>''){

            if($request->password[0] == $request->password[1] ){

                $user->password = bcrypt($request->password[0] );
                $user->save();

                session::flash('alert','Usuario Actualizado');
                session::flash('type','alert-warning');
            }else{

                session::flash('alert','Error, las contraseñas no coinciden');
                session::flash('type','alert-danger');
            }
        }else{

            session::flash('alert','Usuario Actualizado');
            session::flash('type','alert-warning');
            $user->save();
        }

        
        return redirect('admin/users/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
