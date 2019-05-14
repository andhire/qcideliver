<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;

class CategoryProductController extends Controller
{
    public function index()
    {
        return view('categorys.index');
    }

    //
    public function create()
    {
        return view('categorys.create');
    }

    public function store(Request $request)
    {
        $category = new CategoryProduct;
        $category->name = $request['name'];
        $category->save();

        return redirect('/category')->with('message', 'Categoria creada');
    }
}
