<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$user->nombre}}</title>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        
    </head>
    <body>
            <nav class="navbar navbar-dark bg-dark ">
                    <div class="container text-center">
                            <a class="navbar-brand" href="{{ url('/user')}}">Usuarios</a>
                            <a class="navbar-brand" href="{{ url('/user/create')}}">Crear Usuario</a>
                    </div>
            </nav>
            
            

            

            <div class="container mt-5">
                    
                    <div class="row">
                      <div class="col">
                             
                            <div class="card" style="width: 18rem;">
          
                                    <img src="{{$user->foto}}"  class="img-thumbnail"/>  
                                  </div>
                      </div>
                      <div class="col">
                            <div class="row">
                            <h2>{{$user->nombre}} {{$user->apellidoP}} {{$user->apellidoM}}</h2> 
                            
                                    <div class="col col-lg-5">
                                            @if($user->estado==1)
                                            <img src="{{asset('img/online.png')}}" height="16px",width="16px"/>
                                              @else
                                              <img src="{{asset('img/offline.png')}}" height="16px",width="16px"/>
                                              @endif
                                     </div>
                                    <div class="col-md-auto">
                                            @if($user->tipo==1)
                                            <p class="card-text">Vendedor</p>
                                          @else
                                            <p class="card-text">Comprador</p>
                                          @endif
                                    </div>
                                
                              </div>
                    
                    </div>
                  </div>
    </body>
</html>
