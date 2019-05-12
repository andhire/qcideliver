<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use View;
use DB;
use App\Products;
use Auth;
use App\Users;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    public function authenticated($request , $user)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }

    function returnProducts($id = null)
    {
        if ($id != null) {
            $productsUser = DB::table('user_products')->where('id_user', '=', $id)->get();
        } else {
            $productsUser = DB::table('user_products')->get();
        }

        $productosReales = array();
        foreach ($productsUser as $value) {
            $tmp = DB::table('products')->where('id', '=', $value->id_product)->first();
            $tmp->amount = $value->amount;
            $tmp->price = $value->price;
            array_push($productosReales, $tmp);
        }

        return $productosReales;
    }
}
