@php
$user = $data[0];
@endphp

@extends('layouts.app')
@section('title', ($user->name))
@section('content')

<div class="container">
  <img src="{{$user->foto}}" class="img-thumbnail" style="width: 100px;" />


</div>

Mostrar informacion del Usuario (Pagina personal)

@endsection