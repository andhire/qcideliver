@extends('layouts.app')
@section('title', 'Agregar Producto')
@section('content')

@php
$user = Auth::user();
$categorias = App\CategoryProduct::all();
@endphp

<div class="container content">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form method="POST" action="/product" id="register-form" role="form" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header">Registrar Producto</div>
          <div class="card-body">
            @csrf @method('POST')
            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name">
              </div>
            </div>

            <div class="form-group row">
              <label for="tipo" class="col-md-4 col-form-label text-md-right">Categoria</label>
              <div class="col-md-6">
                <select class="form-control" name="type">

                  @foreach ($categorias as $nombre)

                  <option value="{{$nombre->id}}"> {{$nombre->name}}</option>
                  @endforeach

                </select>
              </div>
            </div>



            <div class="form-group row">
              <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
              <div class="col-md-6">
                <div class="custom-file">
                  <input id="foto" type="file"
                    class="custom-file-input form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto"
                    required accept="image/*">

                  @if ($errors->has('foto'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('foto') }}</strong>
                  </span>
                  @endif

                  <label class="custom-file-label" for="foto">Choose file</label>

                </div>
              </div>
            </div>


            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Precio</label>
              <div class="col-md-6">
                <input type="number" min="0.00" max="100000.00" step="0.1" class="form-control" name="price">
              </div>
            </div>
            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Cantidad</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="amount">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <input type="text" class="form-control" name="id" value="{{$user->id}}" style="visibility: hidden;">
              </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Registrar Producto!
                  </button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection