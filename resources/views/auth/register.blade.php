@extends('layouts.app')
@section('title', 'Registro')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ 'Registro' }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}" id="register-form" role="form"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ 'Correo Electronico' }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                  name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{'Nombre'}}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                  name="name" value="{{ old('name') }}" required>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="apellidoP" class="col-md-4 col-form-label text-md-right">Apellido Paterno</label>
              <div class="col-md-6">
                <input id="apellidoP" type="text"
                  class="form-control{{ $errors->has('apellidoP') ? ' is-invalid' : '' }}" name="apellidoP"
                  value="{{ old('apellidoP') }}" required>

                @if ($errors->has('apellidoP'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('apellidoP') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="apellidoM" class="col-md-4 col-form-label text-md-right">Apellido Materno</label>
              <div class="col-md-6">
                <input id="apellidoM" type="text"
                  class="form-control{{ $errors->has('apellidoM') ? ' is-invalid' : '' }}" name="apellidoM"
                  value="{{ old('apellidoM') }}" required>

                @if ($errors->has('apellidoM'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('apellidoM') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">Numero Telefonico</label>
              <div class="col-md-6">
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                  name="phone" value="{{ old('phone') }}" required>

                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group row">
              <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
              <div class="col-md-6">
                <select class="form-control" name="tipo" aria-required="true" required>
                  <option value="">Elije opcion</option>
                  <option value="1">Vendedor</option>
                  <option value="2">Comprador</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ 'Contraseña' }}</label>

              <div class="col-md-6">
                <input id="password" type="password"
                  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ 'Confirmar Contraseña' }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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

                  <label class="custom-file-label" for="foto">Selecciona un archivo</label>

                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary btn-block">
                  {{ 'Completar registro' }}
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection