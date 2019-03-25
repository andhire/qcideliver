<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="../../../public/css/user.create.css">
    </head>
    <body>
        <h1>Usuarios</h1>
        @foreach ($users as $user)
            <h2>{{$user->nombre}} {{$user->apellidoP}} {{$user->apellidoM}}</h2> 

            @if($user->estado == 1)
                <img src="img/online.png"/>
            @else
                <img src="img/offline.png"/>
            @endif

            <img src="{{$user->foto}}" height="100px",width="100px"/>   

            @if($user->tipo == 1)
                <img src="img/usuario.png"/>
            @else
                <img src="img/vendedor.png"/>
            @endif

            
        @endforeach
       
        </div>
    </body>
</html>
