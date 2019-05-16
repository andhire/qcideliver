@extends('layouts.app')

@section('content')

@php $user = $data[0]; $productos = $data[1];
@endphp


<div class="navbar navbar-inverse nav">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a> @if ($user->tipo)
      <a class="brand" href="/user">Qci</a> @endif @if (!$user->tipo)
      <a class="brand" href="/user">Qci</a> @endif
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="divider-vertical"></li>
          <li><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
        </ul>
        <div class="pull-right">
          <ul class="nav pull-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome,
                {{$user->nombre}} <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                <li class="divider"></li>
                <li><a href="/auth/logout"><i class="icon-off"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <img src="{{$user->foto}}" class="img-thumbnail" style="width: 100px;" />


</div>


<a href="{{ route('addProduct', $user) }}" class="btn btn-default">Agregar Producto </a>
<div class="main">

  <div class="album py-5 bg-light" style="margin-top: 10px">
    <div class="container">
      <div class="row">

        @foreach ($productos as $p)
        <div class="col-md-4">
          <a href="{{ url('/product',[$p->slug]) }}">
            <div class="card mb-4 shadow-sm">
              <img src={{$p->image}} width="100%" height="200">
              <div class="card-body">
                <p class="card-text">
                 
                  {{$p->name}}<br>
                  Cantidad: {{$p->amount}}<br>
                  Precio: ${{$p->price}}
                 </p>

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

@endsection