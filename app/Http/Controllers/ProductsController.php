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
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $product = new Products;
        $product->name = $request['name'];
        $product->type = $request['type'];
        $product->image = $request['image'];
        $product->slug = $request['name'];
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
