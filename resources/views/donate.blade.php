{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description">

  <!-- Title -->
  <title>QciDeliver</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head> --}}

@extends('layouts.app')

@section('content')
<!-- Banner -->
<div class="jumbotron jumbotron-fluid bg-success text-white text-center">
  <div class="container">
    <h1 class="">Apoya al desarollo de QciDeliver</h1>
    <p class="lead">Gracias a tu apoyo podemos mantener esta plataforma gratuita y en desarrollo constante</p>
    <a href="/user/create">
    </a>
  </div>
</div>
<!-- Donation -->
<div class="container">
  <!-- Session Messages -->

  @if ($message = Session::get('success'))

  <div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

  </div>

  @endif
  @if ($message = Session::get('error'))

  <div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

  </div>

  @endif


  <div class="row justify-content-center db-padding-btm db-attached">

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <div class="card">
        <div class="card-header">Donación</div>
        <div class="card-body">
          <div class="db-wrapper">
            @php
            $amount = 5;
            @endphp
            {!! Form::open(array('route' => 'getCheckout')) !!}
            {{-- {!! Form::hidden('pay',$amount) !!} --}}
            {!! Form::label('donacion', 'Donacion') !!}
            {!! Form::number('pay', null, ['placeholder' => empty($amount) ? 'default value' : $amount,
            'required' ])
            !!}

            <button class="btn btn-primary db btn-block">Pagar</button>
            {!! Form::close() !!}

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection