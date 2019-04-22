<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Error</title>

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        
    </head>
    <body class="bg-secondary">


        <nav class="navbar navbar-dark bg-dark ">
                <div class="container text-center">
                        <a class="navbar-brand" href="{{ url('/user')}}">Usuarios</a>
                        <a class="navbar-brand" href="{{ url('/user/create')}}">Crear Usuario</a>
                        <a class="navbar-brand" href={{url('/login')}}>Login</a>

                </div>
        </nav>
        
       
        
        <div class="text-center" style="margin-top:15%" >
                <img src="{{asset('img/error.png')}}" alt="..." class=" center-block " />
                <h3 style="color:white">Oops!! Ocurrio algo D:</h3>
        </div>
            
            
    </body>
</html>
