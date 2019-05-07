<!doctype html>


@php

$productos = App\CategoryProduct::all();

@endphp

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Productos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  {{-- <link href="{{ asset('sass/sidebar.scss') }}" rel="stylesheet"> --}}


  <style>
    .sidenav {
      height: 100%;
      /* Full-height: remove this if you want "auto" height */
      width: 160px;
      /* Set the width of the sidebar */
      position: fixed;
      /* Fixed Sidebar (stay in place on scroll) */
      z-index: 1;
      /* Stay on top */
      top: 0;
      /* Stay at the top */
      left: 0;
      background-color: #111;
      /* Black */
      overflow-x: hidden;
      /* Disable horizontal scroll */
      padding-top: 20px;
    }

    /* The navigation menu links */
    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
      color: #f1f1f1;
    }

    /* Style page content */
    .main {
      margin-left: 160px;
      /* Same as the width of the sidebar */
      padding: 0px 10px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }

    .button {
      width: 100%;
    }
  </style>
</head>

<body>



  <div class="sidenav">
    <br>
    <br>
    <p style="color: white; text-align:center;">Filtros</p>
   
    @foreach ($productos as $producto)

    <button class='button'>{{$producto->name }}</button>
    @endforeach
  </div>


  <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/">
      <img src="{{asset('img/icon.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="QciDeliver">
      QciDeliver
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navLinks" aria-controls="navLinks"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navLinks">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/product">Productos</a>
        </li>
        <li class="nav-item">
          <a href="/login">
            <button type="button" class="btn btn-link">Inciar Sesión</button>
          </a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="main">

    <div class="album py-5 bg-light" style="margin-top: 10px">
      <div class="container">
        <div class="row">

          @foreach ($productos as $p)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img src={{$p->image}} width="100%" height="200">
              <div class="card-body">
                <p class="card-text">
                  {{$p->name}}<br>
                  {{$p->type}} </p>
                <div class="d-flex justify-content-between align-items-center">
                  {{-- <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-primary">Aprobar</button>
                        <button type="button" class="btn btn-sm btn-outline-danger">Descartar</button>
                      </div> --}}
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>


  </div>


</body>