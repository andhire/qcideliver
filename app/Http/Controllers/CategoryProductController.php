<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;
use Illuminate\Support\Facades\Auth;

class CategoryProductController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()['tipo'] == 0) {

            $categorys = CategoryProduct::paginate(9);

            return view('categorys.index', compact('categorys'));
        }else {
            return redirect('/');
        }
    }

    //
    public function create()
    {
        if (Auth::check() && Auth::user()['tipo'] == 0) {
            return view('categorys.create');
        }else {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $category = new CategoryProduct;
        $category->name = $request['name'];
        $category->save();

        return redirect('/category')->with('message', 'Categoría creada');
    }
}
