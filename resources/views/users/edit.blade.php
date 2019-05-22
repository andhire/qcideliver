@extends('layouts.app')
@section('title', 'Editar Información')
@section('content')

<div class="container content">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form method="POST" action="/user/{{$user->slug}}" id="edit-form" role="form">
        <div class="card">
          <div class="card-header">Editar Usuario</div>
          <div class="card-body">
            @csrf @method('PUT')
            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input value="{{$user->name}}" type="text" class="form-control" name="name">
              </div>
            </div>
            <div class="form-group row">
              <label for="apellidoP" class="col-md-4 col-form-label text-md-right">Apellido Paterno</label>
              <div class="col-md-6">
                <input value="{{$user->apellidoP}}" type="text" class="form-control" name="apellidoP">
              </div>
            </div>
            <div class="form-group row">
              <label for="apellidoM" class="col-md-4 col-form-label text-md-right">Apellido Materno</label>
              <div class="col-md-6">
                <input value="{{$user->apellidoM}}" type="text" class="form-control" name="apellidoM">
              </div>
            </div>

            <div class="form-group row">
              <label for="mail" class="col-md-4 col-form-label text-md-right">Correo</label>
              <div class="col-md-6">
                <input value="{{$user->email}}" type="text" class="form-control" name="email">
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">Numero Telefonico</label>
              <div class="col-md-6">
                <input value="{{$user->phone}}" type="text" class="form-control" name="phone">
              </div>
            </div>

            <div class="form-group row">
              <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
              <div class="col-md-6">
                <select class="form-control" name="tipo">
                  @if($user->tipo==1)
                  <option selected value="1">Vendedor</option>
                  <option value="2">Comprador</option>
                  @else
                  <option value="1">Vendedor</option>
                  <option selected value="2">Comprador</option>
                  @endif
                </select>
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

                  <label class="custom-file-label" for="foto">Choose file</label>

                </div>
              </div>
            </div>

            <input type="hidden" value="1" name="estado">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary" id="botonEnviar">
                Editar!
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection