@extends('layouts.app')
@section('title', 'Perfil: {{$user->name}}')
@section('content')

@php
$user = $data[0];
@endphp

<div class="container">
  <img src="{{$user->foto}}" class="img-thumbnail" style="width: 100px;" />


</div>

{{-- <a href="{{ route('addProduct', $user) }}" class="btn btn-default">Agregar Producto </a> --}}
Mostrar informacion del Usuario (Pagina personal)

@endsection