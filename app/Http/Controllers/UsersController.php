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

class UsersController extends Controller
{
    function returnProducts($id = null)
    {
        if ($id != null) {
            $productosReales = DB::table('products')->where('id_user', '=', $id)->get();
        } else {
            $productosReales = DB::table('products')->get();
        }

        /* $productosReales = array();
        foreach ($productsUser as $value) {
            $tmp = DB::table('products')->where('id', '=', $value->id_product)->first();
            $tmp->amount = $value->amount;
            $tmp->price = $value->price;
            array_push($productosReales, $tmp);
        } */

        return $productosReales;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::check() && Auth::user()['tipo'] == 0) {

            $users = Users::all();
            $users = Users::paginate(3);

            return view('users.index', compact('users'));
        }else {
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        Storage::disk('dropbox')->putFileAs(
            '/',
            $request->file('file'),
            $request->file('file')

        );
        //Storage::move('old/file.jpg', 'new/file.jpg');
        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            $request->file('file')->getClientOriginalName(),
            ["requested_visibility" => "public"]
        );

        $url = str_replace("www.dropbox.com", "dl.dropboxusercontent.com", $response['url']);

        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'apellidoP' => 'required|max:255',
            'apellidoM' => 'required|max:255',
            'usuario' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $user = new Users;
        $user->nombre = $request['nombre'];
        $user->apellidoP = $request['apellidoP'];
        $user->apellidoM = $request['apellidoM'];
        $user->tipo = $request['tipo'];
        $user->foto = $url;
        $user->usuario = $request['usuario'];
        $pass = $request['password'];
        $pass = hash('sha256', $pass);
        $user->password = $pass;

        $user->mail = $request['mail'];
        $user->phone = $request['phone'];

        if ($request['tipo'] == 2 || $request['tipo'] == 0) { // es admin o comprador
            $user->estado = true; //activo
        } else if ($request['tipo'] == 1) { // es vendedor
            $user->estado = false; //inactivo
        } else { //alguna otra madre no contemplada
            $user->estado = null;
        }

        $user->save();

        return redirect('/user')->with('message', 'Usuario creado!');
    } */

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
        $user->name = $request['name'];
        $user->apellidoP = $request['apellidoP'];
        $user->apellidoM = $request['apellidoM'];
        $user->tipo = $request['tipo'];
        $user->estado = $request['estado'];
        $user->foto = $request['foto'];
        $user->usuario = $request['usuario'];
        /* $pass = $request['password'];
        $pass = hash('sha256', $pass);
        $user->password = $pass; */
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


    public function addProduct($id)
    {
        $data = array();
        $user = $user = DB::table('users')->where('id', '=', $id)->first();

        $productosReales = $this->returnProducts($user->id);
        array_push($data, $user);
        array_push($data, $productosReales);

        return view('products.create', compact('data'));
    }

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
        $user['estado'] = true;
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
                $productosReales = $this->returnProducts($user->id);
            } else {                  // es comprador
                $productosReales = $this->returnProducts();
            }
            array_push($data, $productosReales);
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
}
