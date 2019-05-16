@extends('layouts.app')

@section('content')

@php

$categories = App\CategoryProduct::all();

@endphp

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
    /* top: 0; */
    /* Stay at the top */
    left: 0;
    background-color: #111;
    /* Black */
    overflow-x: hidden;
    /* Disable horizontal scroll */
    /* padding-top: 20px; */
    margin-top: -10px;
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


<div class="sidenav">
  <p style="color: white; text-align:center;">Filtros</p>

  @foreach ($categories as $category)
  <a href="/product/filtro/{{$category->slug}}" class='button'>{{ $category->name }}</a>
  @endforeach
</div>


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

@endsection