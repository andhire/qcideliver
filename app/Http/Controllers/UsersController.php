<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Users;
use App\Http\Controllers\Controller;
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




        if ($request['nombre'] == '' || $request['apellidoP'] == ''  || $request['foto'] == '' || $request['apellidoM'] == '' || $request['tipo'] == '' || $request['usuario'] == '' || $request['password'] == '') { $user = new Users;
            return view('error');
        } else {
          
            $user = new Users;
            $user->nombre = $request['nombre'];
            $user->apellidoP = $request['apellidoP'];
            $user->apellidoM = $request['apellidoM'];
            $user->tipo = $request['tipo'];
            $user->estado = $request['estado'];
            $user->foto = $request['foto'];
            $user->usuario = $request['usuario'];
            $pass = $request['password'];
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $user->password = $pass;

            $user->save();
        }

        $users = Users::all();
        $users = Users::paginate(3);

        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Users::where('slug', $slug)->first();

        if(!$user){
            return view('error');
        }
        
        return view('users.edit',compact('user'));
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
        //
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
