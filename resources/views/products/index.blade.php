@extends('layouts.app')
@section('title', 'Productos')

@section('head')
<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}" defer></script>
@endsection

@section('content')

@php
$categories = App\CategoryProduct::all();
$ubicactions = App\Ubication::all();
@endphp

<div class="wrapper">
  <!-- Sidebar  -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <h4>Filtros</h4>
    </div>

    <ul class="list-unstyled components">
      <li class="active">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categorías</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
          @foreach ($categories as $category)
          <li>
            <a href="/product/categoria/{{$category->slug}}" class='button'>{{ $category->name }}</a>
          </li>
          @endforeach
        </ul>
      </li>

      <li class="active">
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ubicaciones</a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
          @foreach ($ubicactions as $ubication)
          <li>
            <a href="/product/ubicacion/{{$ubication->slug}}" class='button'>{{ $ubication->nombre }}</a>
          </li>
          @endforeach
        </ul>
      </li>
    </ul>

  </nav>

  <!-- Page Content  -->
  <div id="content">
    <button type="button" id="sidebarCollapse" class="btn btn-info">
      <i class="fas fa-align-left"></i>
      <span>Filtros</span>
    </button>

    <div class="main">
      <div class="album py-5">
        <div class="container">
          <div class="row">

            @foreach ($productos as $p)
            <div class="col-md-4">
              <a href="{{ url('/product',[$p->slug]) }}">
                <div class="card mb-4 shadow-sm">

                  <img src={{$p->image}} width="100%" height="200">
                  <div class="card-header bg-success text-white"><i class="fab fa-whatsapp"> {{ $p->user->phone }}</i></div>
                  <div class="card-body">
                    <h5 class="card-title">
                      {{$p->name}}
                    </h5>
                    <p class="card-text">
                      {{$p->price}} <br>
                      {{$p->user->userUbication->ubication->nombre ?? 'No hay ubicación'}} </p>
                  </div>

                </div>
              </a>
            </div>
            @endforeach

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@if($productos)
<div class="pagination justify-content-center " style="margin-top:15%">
  {{ $productos->links() }}
</div>
@endif

@endsection