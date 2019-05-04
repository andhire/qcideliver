<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Products;
use App\UserProducts;
use App\Users;

use App\Http\Controllers\Controller;
use View;
use DB;
//Archivos pa usar el dropbox 
use App\File;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Products::all();

        return view('products.index', compact('productos'));
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
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        Storage::disk('dropbox')->putFileAs(
            '/', 
            $request->file('file'), 
            $request->file('file')->getClientOriginalName()
        );
 
        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            $request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        
        $url =str_replace("www.dropbox.com","dl.dropboxusercontent.com",$response['url']);
        $product = new Products;
        $product->name = $request['name'];
        $product->type = $request['type'];
        $product->slug = $request['name'];
        $product->image = $url;

        $product->aprobado = false;

        $product->save();
        $userproduct = new UserProducts;
        $userproduct->id_user = $request['id'];
        $userproduct->id_product = $product->id;
        $userproduct->price = $request['price'];
        $userproduct->amount = $request['amount'];
        $userproduct->save();

        $result = $result = DB::table('users')->where('id', '=', $request['id'])->first();
        
        
        $user = new Users();
        
        $user->slug = $result->slug;
        $user->id = $result->id;
        $user->nombre = $result->nombre;
        $user->apellidoP = $result->apellidoP;
        $user->apellidoM = $result->apellidoM;
        $user->tipo = $result->tipo;
        $user->estado = $result->estado;
        $user->foto = $result->foto;
        $user->usuario = $result->usuario;
        $user->password = $result->password;

        $productosReales = app('App\Http\Controllers\UsersController')->returnProducts($user->id);
        $data = array();
        
        array_push($data, $user);
        array_push($data, $productosReales);
        return view('users.home_vendedor', compact('data'));
        
        
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
        //
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
