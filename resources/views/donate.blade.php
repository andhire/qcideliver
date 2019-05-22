@extends('layouts.app')
@section('title', 'Donación')
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
            {!! Form::number( 'pay', null, ['placeholder' => empty($amount) ? 'default value' : $amount,
            'required', 'min' => '1'])
            !!}

            <button class="btn btn-primary db btn-block" id="donation-btn">Pagar</button>
            {!! Form::close() !!}

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection