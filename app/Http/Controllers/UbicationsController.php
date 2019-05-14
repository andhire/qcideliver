<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ubication;
use App\Users;
use App\UserUbication;
use Illuminate\Support\Facades\Auth;

class UbicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        if (Auth::check() && Auth::user()['tipo'] == 0) {

            $ubications = Ubication::paginate(9);

            return view('ubications.index', compact('ubications'));
        }else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ubications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $ubication = new Ubication;
        $ubication->nombre = $request['nombre'];
        // $ubication->foto = $url;

        $ubication->save();

        return redirect('/ubication')->with('message', 'Ubicacion creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
