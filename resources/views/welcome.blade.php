@extends('layouts.app')
@section('title', 'Bienvenido')
@section('content')
<!-- Banner -->
<div class="jumbotron jumbotron-fluid bg-info text-white text-center">
  <div class="container">
    <h1 class="">Bienvenido a QciDeliver</h1>
    <p class="lead">Un punto de encuentro para el comercio en tu centro universitario</p>
    <a href="/register">
      <button type="button" class="btn btn-success btn-lg">Comienza ahora!</button>
    </a>
  </div>
</div>

<!-- Cards -->
<div class="container text-muted text-center">
  <div class="card-deck">
    <div class="card">
      <img class="card-img-top img-fluid" src="{{asset('img/estudiantes.jpg')}}">
      <div class="card-body bg-info text-white">
        <h3 class="card-title">De estudiantes para estudiantes</h3>
        <p class="card-text">Sabemos lo importante que es tu tiempo, por eso QciDeliver te permite encontrar tus
          productos favoritos con unos cuantos clicks!</p>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top img-fluid" src="{{asset('img/repartidor.jpg')}}">
      <div class="card-body bg-success text-white">
        <h3 class="card-title">Entregas cómodas y rápidas</h3>
        <p class="card-text">No te preocupes por tener que buscar al vendedor o trasladarte muy lejos. Con
          QciDeliver podrás designar un punto de entrega que te sea comodo y accesible!</p>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top img-fluid" src="{{asset('img/dulces.jpg')}}">
      <div class="card-body bg-dark text-white">
        <h3 class="card-title">Tus favoritos están aquí</h3>
        <p class="card-text">Nuestro catálogo esta en constante crecimiento, estamos seguros de que aquí podrás
          encontrar tus productos favoritos, desde un dulce hasta una compuerta lógica.</p>
      </div>
    </div>
  </div>
</div>

@endsection