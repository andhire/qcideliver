@extends('layouts.app')
@section('title', 'Editar Producto')
@section('head')
<link href="{{ asset('css/misc.css') }}" rel="stylesheet">
@endsection

@section('content')

@php
$categorias = App\CategoryProduct::all();
@endphp
<div class="container content">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form method="POST" action="/product/{{$product->id}}" id="edit-form" role="form" enctype="multipart/form-data" >
        <div class="card">
          <div class="card-header">Editar producto</div>
          <div class="card-body">
            @csrf @method('PUT')
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input value="{{$product->name}}" type="text" class="form-control" name="name">
              </div>
            </div>
            <div class="form-group row">
                <label for="tipo" class="col-md-4 col-form-label text-md-right">Categoría</label>
                <div class="col-md-6">
                  <select class="form-control" name="type" aria-required="true" required>
                    <option value="">Selecciona una opción</option>
                    @foreach ($categorias as $nombre)
                    <option value="{{$nombre->id}}"> {{$nombre->name}}</option>
                    @endforeach
  
                  </select>
                </div>
              </div>
            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">Precio</label>
              <div class="col-md-6">
                <input value="{{$product->price}}" type="numeric" class="form-control" name="price">
              </div>
            </div>

            <div class="form-group row">
              <label for="amount" class="col-md-4 col-form-label text-md-right">Cantidad</label>
              <div class="col-md-6">
                <input value="{{$product->amount}}" type="text" class="form-control" name="amount">
              </div>
            </div>


            <div class="form-group row">
              <label for="foto" class="col-md-4 col-form-label text-md-right">Foto (opcional)</label>
              <div class="col-md-6">
                <div class="custom-file">
                  <input id="foto" type="file"
                    class="custom-file-input form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto"
                    accept="image/*">

                  @if ($errors->has('foto'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('foto') }}</strong>
                  </span>
                  @endif

                  <label class="custom-file-label" for="foto">Selecciona un archivo</label>

                </div>
              </div>
            </div>
            
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary btn-block" id="botonEnviar">
                Editar
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection