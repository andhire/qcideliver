<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Users;
use App\Http\Controllers\Controller;
use View;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $users = Users::all();
        $users = Users::paginate(3);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //




        /*  if ($request['nombre'] == '' || $request['apellidoP'] == ''  || $request['foto'] == '' || $request['apellidoM'] == '' || $request['tipo'] == '' || $request['usuario'] == '' || $request['password'] == '') { $user = new Users;
            return view('error');
        } else {
           */
        $user = new Users;
        $user->nombre = $request['nombre'];
        $user->apellidoP = $request['apellidoP'];
        $user->apellidoM = $request['apellidoM'];
        $user->tipo = $request['tipo'];
        $user->estado = $request['estado'];
        $user->foto = $request['foto'];
        $user->usuario = $request['usuario'];
        $pass = $request['password'];
        $pass = hash('sha256', $pass);
        $user->password = $pass;

        $user->save();
        /* } */

        /* $users = Users::all();
        $users = Users::paginate(3);

        return view('users.index', compact('users')); */
        return redirect('/user')->with('message', 'Usuario creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $user = Users::where('slug', $slug)->first();

        if (!$user) {
            return view('error');
        }


        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Users::where('slug', $slug)->first();

        if (!$user) {
            return view('error');
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $user = Users::where('slug', $slug)->first();
        $user->nombre = $request['nombre'];
        $user->apellidoP = $request['apellidoP'];
        $user->apellidoM = $request['apellidoM'];
        $user->tipo = $request['tipo'];
        $user->estado = $request['estado'];
        $user->foto = $request['foto'];
        $user->usuario = $request['usuario'];
        /* $pass = $request['password'];
        $pass = hash('sha256', $pass);
        $user->password = $pass; */

        $user->save();

        return redirect('/user')->with('message', 'Edición exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $user = Users::where('slug', $slug)->first();
        $user->delete();

        return redirect('/user')->with('message', 'Usuario eliminado!');
    }
    /**
     * 
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function doLogin()
    {

        $userdata = array(
            'usuario'     => Input::get('usuario'),
            'password'  => Input::get('password')
        );

        $pass = hash('sha256', $userdata['password']);
        $userdata['password'] = $pass;

        $result = $result = DB::table('users')->where('usuario', '=', $userdata['usuario'])->where('password', '=', $userdata['password'])->first();

        /*   var_dump($userdata);
        var_dump($result); */

        if($result == NULL){
            return redirect('/login')->with('message', 'Usuario o contraseña incorrecta');;
        }
        $user = new Users();

        $user->slug = $result->slug;

        $user->nombre = $result->nombre;
        $user->apellidoP = $result->apellidoP;
        $user->apellidoM = $result->apellidoM;
        $user->tipo = $result->tipo;
        $user->estado = $result->estado;
        $user->foto = $result->foto;
        $user->usuario = $result->usuario;
        $user->password = $result->password;
        //redirect('/home_vendedor'); quiero cambiar la direccion 


        

        if ($user->tipo)
            return view('users.home_vendedor', compact('user'));
        else
            return view('users.home_comprador', compact('user'));
    }

    /**
     * 
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        return View::make('users/login');
    }

    public function homeVendedor()
    { 
    }
}
