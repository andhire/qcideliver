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
use App\CategoryProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Ubication;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categoria = $request->categoria;
        $slugUbicacion = $request->ubicacion;

        if ($slugUbicacion != null) {
            $productos = array();
            $ubication = Ubication::where('slug', $slugUbicacion)->first();
            if ($ubication != null) {
                $usersInUbication = $ubication->userUbications;
                foreach ($usersInUbication as $userUbication) {
                    foreach ($userUbication->user->products as $product) {
                        if ($product->aprobado) {
                            if ($categoria == null) {
                                array_push($productos, $product);
                            } else {
                                if ($product->category->slug == $categoria) {
                                    array_push($productos, $product);
                                }
                            }
                        }
                    }
                }
            }
        } else if ($categoria != null) {
            $productos = CategoryProduct::where('slug', $categoria)->get()[0]->products()->where('aprobado', 1)->paginate(6);
        } else {
            $productos = Products::where('aprobado', 1)->paginate(6);
        }


        return view('products.index', compact('productos'));
    }
    /**
     * Inicializa el dropbox
     *
     * @return void
     */
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
        if (Auth::check() && Auth::user()['tipo'] == 1 &&  Auth::user()['estado'] == 1) {
            return view('products.create');
        } else {
            return redirect('/');
        }
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
        $product = new Products;
        $product->slug = $request['name'];

        $slug = $product->slug . Carbon::now() . ".jpg";
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

        $product->name = $request['name'];
        $product->id_category = $request['type'];

        $product->image = $url;
        $product->id_user = $request['id'];
        $product->price = $request['price'];
        $product->amount = $request['amount'];

        $product->aprobado = false;

        $product->save();

        return redirect('/home')->with('message', 'Producto Creado!');;
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
        $product = Products::where('slug', $slug)->first();

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $product = Products::where('slug', $slug)->first();
        if (!$product) {
            return redirect('/');
        } else {
            $user = $product->user;
            if (Auth::check() && Auth::user()->id == $user->id) {
                return view('products.edit', compact('product'));
            } else {
                return redirect('/');
            }
        }
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
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        $product =  Products::where('id', $id)->first();
        $slug = $product->slug . Carbon::now() . ".jpg";
        if ($request['foto'] != '') {
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
            $product->aprobado = false;
            $url = str_replace("www.dropbox.com", "dl.dropboxusercontent.com", $response['url']);
            $product->image = $url;
        }
        if($product->name != $request['name']){
            $product->name = $request['name'];
            
             $product->aprobado = false;
        }
       
        $product->id_category = $request['category'];
        $product->price = $request['price'];
        $product->amount = $request['amount'];

       

        $product->save();

        return redirect('/home')->with('message', 'Edición exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $product = Products::where('slug', $slug)->first();
        $product->delete();

        return redirect('/home')->with('message', 'producto eliminado!');
    }

    public function aprobar(Request $request, $id)
    {
        $product = Products::where('id', $id)->first();
        $product['aprobado'] = true;
        $product->save();

        return back()->with('message', 'producto aprobado!');
    }

    public function bloquear(Request $request, $id)
    {
        $product = Products::where('id', $id)->first();
        $product['aprobado'] = null;
        $product->save();

        return back()->with('message', 'producto bloqueado!');
    }

    public function filtroCategoria($slug)
    {
        $productos = CategoryProduct::where('slug', $slug)->get()[0]->products()->where('aprobado', 1)->get();
        return view('products.index', compact('productos'));
    }

    public function filtroUbicacion($slug)
    {
        $productos = array();
        $usersInUbication = Ubication::where('slug', $slug)->first()->userUbications;
        foreach ($usersInUbication as $userUbication) {
            foreach ($userUbication->user->products as $product) {
                if ($product->aprobado) {
                    array_push($productos, $product);
                }
            }
        }
        return view('products.index', compact('productos'));
    }
}
