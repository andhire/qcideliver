<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Users;
use App\Http\Controllers\Controller;
use View;
use DB;

//Archivos pa usar el dropbox 
use App\File;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    function returnProducts($id){
        $productsUser = DB::table('user_products')->where('id_user' ,'=', $id)->get();
        
        $productosReales = array();
        foreach ($productsUser as $value) {
            $tmp = DB::table('products')->where('id', '=', $value->id_product)->first();
            $tmp->amount = $value->amount;
            $tmp->price = $value->price;
            array_push($productosReales,$tmp); 
        }

        return $productosReales;
    }
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
        $user->estado = $request['estado'];
        $user->foto = $url;
        $user->usuario = $request['usuario'];
        $pass = $request['password'];
        $pass = hash('sha256', $pass);
        $user->password = $pass;

        $user->save();

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
        $user->id = $result->id;
        $user->nombre = $result->nombre;
        $user->apellidoP = $result->apellidoP;
        $user->apellidoM = $result->apellidoM;
        $user->tipo = $result->tipo;
        $user->estado = $result->estado;
        $user->foto = $result->foto;
        $user->usuario = $result->usuario;
        $user->password = $result->password;
        //redirect('/home_vendedor'); quiero cambiar la direccion 

       
       


        $data = array();
        $productosReales = $this->returnProducts($user->id);
        array_push($data, $user);
        array_push($data, $productosReales);
        


        /* var_dump($data); */

        if ($user->tipo == 1){
        
            
            return view('users.home_vendedor', compact('data'));
        
        }
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


    public function addProduct($id)
    { 
        $data = array();
        $user = $user = DB::table('users')->where('id', '=', $id)->first();

        $productosReales = $this->returnProducts($user->id);
        array_push($data, $user);
        array_push($data, $productosReales);
        
        return view('products.create',compact('data'));
    }

  
}
