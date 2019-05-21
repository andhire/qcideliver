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
      <h4>Categorias</h4>
    </div>

    <ul class="list-unstyled components">
      @foreach ($categories as $category)
      <li>
        <a href="/product/categoria/{{$category->slug}}" class='button'>{{ $category->name }}</a>
      </li>
      @endforeach
    </ul>

    <div class="sidebar-header">
      <h4>Ubicaciones</h4>
    </div>

    <ul class="list-unstyled components">
      @foreach ($ubicactions as $ubication)
      <li>
        <a href="/product/ubicacion/{{$ubication->id}}" class='button'>{{ $ubication->nombre }}</a>
      </li>
      @endforeach
    </ul>
  </nav>

  <!-- Page Content  -->
  <div id="content">
    <button type="button" id="sidebarCollapse" class="btn btn-info">
      <i class="fas fa-align-left"></i>
      <span>Toggle Sidebar</span>
    </button>

    <div class="main">

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">

            @foreach ($productos as $p)
            <div class="col-md-4">
              <a href="{{ url('/product',[$p->slug]) }}">
                <div class="card mb-4 shadow-sm">

                  <img src={{$p->image}} width="100%" height="200">

                  <div class="card-body">
                    <h5 class="card-title">
                      {{$p->name}}
                    </h5>
                    <p class="card-text">
                      {{$p->price}} <br>
                      {{$p->user->userUbication->ubication->nombre ?? 'No hay ubicacion'}} </p>
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

@endsection