<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ubication;
use App\Users;
use App\UserUbication;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UbicationsController extends Controller
{
    public function __construct()
    {
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $ubications = Ubication::paginate(9);

        return view('ubications.index', compact('ubications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check() && Auth::user()['tipo'] == 0) {
            return view('ubications.create');
        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $name = $request['nombre'] .Carbon::now(). ".jpg";
        Storage::disk('dropbox')->putFileAs(
            '/',
            $request['foto'],
            $name
        );
        $response = $this->dropbox->createSharedLinkWithSettings(
            $name,
            ["requested_visibility" => "public"]
        );

        $url = str_replace("www.dropbox.com", "dl.dropboxusercontent.com", $response['url']);   

        $ubication = new Ubication;
        $ubication->nombre = $request['nombre'];
        $ubication->foto = $url;

        $ubication->save();

        return redirect('/ubication')->with('message', 'Ubicación creada');
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
