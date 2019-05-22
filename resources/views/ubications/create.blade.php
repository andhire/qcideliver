@extends('layouts.app')
@section('title', 'Agregar Ubicacion')
@section('head')
<link href="{{ asset('css/misc.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Registrar Ubicación') }}</div>

        <div class="card-body">
          <form method="POST" action="/ubication" enctype="multipart/form-data">
            @csrf @method('POST')

            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

              <div class="col-md-6">
                <input id="nombre" class="form-control" type="text" name="nombre" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
              <div class="col-md-6">
                <div class="custom-file">
                  <input id="foto" type="file"
                    class="custom-file-input form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto"
                    required accept="image/*">

                  <label class="custom-file-label" for="foto">Seleccionar archivo</label>

                  @if ($errors->has('foto'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('foto') }}</strong>
                  </span>
                  @endif

                </div>
              </div>
            </div>

            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary btn-block" id="botonEnviar">
                {{ 'Registrar' }}
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection