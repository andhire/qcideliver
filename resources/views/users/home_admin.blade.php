@extends('layouts.app')
@section('title', 'Panel de Control')
@section('content')

@php
$user = $data[0];
$vendedores = $data[1];
$productos = $data[2];
@endphp

<h4>Usuarios por aprobar</h4>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">

      @foreach ($vendedores as $v)
      <div class="col-md-4">
        <a href="{{ url('/user',[$v->slug]) }}">
          <div class="card mb-4 shadow-sm">

            <img src={{$v->foto}} width="100%" height="200">

            <div class="card-body">
              <p class="card-text">
                {{$v->name}} {{$v->apellidoP}} {{$v->apellidoM}}<br>
                {{$v->email}}<br>
                {{$v->phone}}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="{{ url('/user/'.$v->id.'/aprobar')}}" method="POST">
                    @csrf @method('POST')
                    <button type="submit" class="btn btn-sm btn-outline-primary">Aprobar</button>
                  </form>
                  <form action="{{ url('/user/'.$v->id.'/bloquear')}}" method="POST">
                    @csrf @method('POST')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Bloquear</button>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </a>
      </div>
      @endforeach

    </div>
  </div>
</div>

<h4>Productos por aprobar</h4>
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">

      @foreach ($productos as $p)
      <div class="col-md-4">
        <a href="{{ url('/product',[$p->slug]) }}">
          <div class="card mb-4 shadow-sm">

            <img src={{$p->image}} width="100%" height="200">

            <div class="card-body">
              <p class="card-text">
                Nombre: {{$p->name}}<br>
                Precio: ${{$p->price}}<br>
                Vendedor: {{$p->user->name}}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="{{ url('/product/'.$p->id.'/aprobar')}}" method="POST">
                    @csrf @method('POST')
                    <button type="submit" class="btn btn-sm btn-outline-primary">Aprobar</button>
                  </form>
                  <form action="{{ url('/product/'.$p->id.'/bloquear')}}" method="POST">
                    @csrf @method('POST')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Bloquear</button>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </a>
      </div>
      @endforeach

    </div>
  </div>
</div>

</body>

@endsection