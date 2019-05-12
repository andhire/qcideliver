@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@php
     $user = Auth::user();
     
     
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
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{$user->nombre}}
                  <b class="caret"></b></a>
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
  