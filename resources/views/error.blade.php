@extends('layouts.app')
@section('title', 'Oops!')
@section('content')

<div class="text-center" style="margin-top:15%">
  <img src="{{asset('img/error.png')}}" alt="..." class=" center-block " />
  <h3>Oops! Algo salió mal.</h3>
</div>

@endsection