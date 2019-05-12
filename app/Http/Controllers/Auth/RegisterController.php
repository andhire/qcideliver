<?php

namespace App\Http\Controllers\Auth;

use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
//Archivos pa usar el dropbox 
use App\File;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;
use App\Products;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' => ['required'],
            'tipo' => ['required'],
            'usuario' => ['required', 'string','max:255' ],
            'apellidoM' => ['required', 'string', 'max:255'],
            'apellidoP' => ['required', 'string','max:255' ],
            'phone' => ['required', 'string', 'max:255']
          
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        $slug = $data['email'] . ".jpg";
        Storage::disk('dropbox')->putFileAs(
            '/',
            $data['foto'],
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

        $estado;
        if ($data['tipo'] == 2 || $data['tipo'] == 0) { // es admin o comprador
            $estado = true; //activo
        } else if ($data['tipo'] == 1) { // es vendedor
            $estado = false; //inactivo
        } else { //alguna otra madre no contemplada
            $estado = null;
        }

        return Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'foto' => $url,
            'tipo' => $data['tipo'],
            'usuario' => $data['usuario'],
            'apellidoM' => $data['apellidoM'],
            'apellidoP' => $data['apellidoP'],
            'phone' => $data['phone'],
            'estado' =>$estado,
            'slug'=>str_slug($data['name'])
        ]);


    }
}
