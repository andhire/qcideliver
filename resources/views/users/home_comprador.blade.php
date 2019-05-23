@php
$user = $data[0];
@endphp

@extends('layouts.app')
@section('title', ($user->name))
@section('head')
<link href="{{ asset('css/misc.css') }}" rel="stylesheet">
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Información de {{ $user->name }}</div>
          <div class="card-body">
            <div class="user-details">
              <h6 class="card-subtitle mb-2 text-muted">Datos generales</h6>
              <img class="user-img" src={{ $user->foto }}></img>
              <p class="card-text">Nombre: {{ $user->name }} {{ $user->apellidoP }} {{ $user->apellidoM }}</p>
              <div class="user-contact">
              <i class="fab fa-whatsapp">{{ $user->phone }}</i>
              <i class="fas fa-at">{{ $user->email }}</i>
              </div>
              <div class="user-edit">
              <a href="user/{{$user->slug}}/edit" class="btn btn-warning"><i class="fas fa-pencil-alt"> Editar información</i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection