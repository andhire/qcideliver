<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Users;
use App\Http\Controllers\Controller;
use View;
use DB;
use Auth;

//Archivos pa usar el dropbox 
use App\File;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;
use App\Products;
use App\UserUbication;
use Illuminate\Support\Carbon;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::check() && Auth::user()['tipo'] == 0) {

            $users = Users::paginate(6);

            return view('users.index', compact('users'));
        } else {
            return redirect('/');
        }
    }

    public function __construct()
    {
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('register');
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
            return redirect('/');
        } else {
            if (Auth::check()) {
                if ((Auth::user()->id == $user->id && Auth::user()->estado == 1) || Auth::user()->tipo == 0) {
                    return view('users.edit', compact('user'));
                } else {
                    return redirect('/');
                }
            }
        }
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
        if ($request['foto'] != '') {
            $slug = $request['email'] . Carbon::now() . ".jpg";
            Storage::disk('dropbox')->putFileAs(
                '/',
                $request['foto'],
                $slug
            );
            //Storage::move('old/file.jpg', 'new/file.jpg');
            // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
            // definida en el constructor de la clase y almacenamos la respuesta.
            $response = $this->dropbox->createSharedLinkWithSettings(
                $slug,
                ["requested_visibility" => "public"]
            );

            $url = str_replace("www.dropbox.com", "dl.dropboxusercontent.com", $response['url']);
            $user->foto = $url;
            if ($user->tipo == 1) {
                $user->estado = false;
            }
        }

        if (($user->name != $request['name'] || $user->apellidoP != $request['apellidoP'] || $user->apellidoM != $request['apellidoM']) && ($user->tipo == 1)) {

            $user->name = $request['name'];
            $user->apellidoP = $request['apellidoP'];
            $user->apellidoM = $request['apellidoM'];
            $user->estado = false;
        } else {
            $user->name = $request['name'];
            $user->apellidoP = $request['apellidoP'];
            $user->apellidoM = $request['apellidoM'];
        }




        $user->email = $request['email'];
        $user->phone = $request['phone'];

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
    /* 

    public function addProduct($id)
    {
        $data = array();
        $user = $user = DB::table('users')->where('id', '=', $id)->first();

        $productosReales = $this->returnProducts($user->id);
        array_push($data, $user);
        array_push($data, $productosReales);

        return view('products.create', compact('data'));
    } */

    /**
     * Aprobar the specified user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function aprobar(Request $request, $id)
    {
        $user = Users::where('id', $id)->first();
        $user['estado'] = 1;
        $user->save();

        return back();
    }

    public function bloquear(Request $request, $id)
    {
        $user = Users::where('id', $id)->first();
        $user['estado'] = null;
        $user->save();

        return back();
    }

    public function hacerAdmin(Request $request, $id)
    {
        $user = Users::where('id', $id)->first();
        $user['tipo'] = 0;
        $user->save();

        return back();
    }

    public function quitarAdmin(Request $request, $id)
    {
        $user = Users::where('id', $id)->first();
        $user['tipo'] = 2;
        $user->save();

        return back();
    }

    public function showHome()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        $data = array();
        array_push($data, $user);

        if ($user->tipo == 0) { //es admin
            $vendedores = Users::where('estado', '=', false)->get();
            $productosNoAprobados = Products::where('aprobado', '=', false)->get();
            array_push($data, $vendedores);
            array_push($data, $productosNoAprobados);
        } else {
            if ($user->tipo == 1) { // es vendedor
                $productosAprobados = Products::where('id_user', $user->id)->where('aprobado', true)->get();
                array_push($data, $productosAprobados);
                $productosNoAprobados = Products::where('id_user', $user->id)->where('aprobado', false)->get();
                array_push($data, $productosNoAprobados);
                $ubicacion = (int)($user->userUbication['id_ubication']);
                array_push($data, $ubicacion);
            }
        }

        /* var_dump($data); */
        if ($user->tipo == 0) { //es administrador
            return view('users.home_admin', compact('data'));
        } else { // no es admin
            if ($user->tipo == 1) { // es vendedor
                return view('users.home_vendedor', compact('data'));
            } else {   // es comprador
                return view('users.home_comprador', compact('data'));
            }
        }
    }

    public function setubication(Request $request, $id_user)
    {
        $user_ubication = UserUbication::where('id_user', $id_user)->first();

        if ($request['ubication'] == 0 && $user_ubication != null) { // Eligio sin ubicacion
            $user_ubication->delete();
        } else {
            if ($user_ubication == null) // Si no tenia ubicacion
                $user_ubication = new UserUbication;

            $user_ubication['id_user'] = $id_user;
            $user_ubication['id_ubication'] = $request['ubication'];
            $user_ubication['descripcion'] = $request['descripcion'];

            if ($user_ubication['descripcion'] == null)
                $user_ubication['descripcion'] = '';

            $user_ubication->save();
        }

        return back()->with('message', 'Ubicación actualizada');
    }
}
