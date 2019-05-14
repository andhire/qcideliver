@extends('layouts.app')

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="/">
    <img src="{{asset('img/icon.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="QciDeliver">
    QciDeliver
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navLinks" aria-controls="navLinks"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navLinks">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/product">Productos</a>
      </li>
      <li class="nav-item">
        <a href="/login">
          <button type="button" class="btn btn-link">Inciar Sesión</button>
        </a>
      </li>
    </ul>
  </div>
</nav>

<!-- Form -->
<div class="jumbotron jumbotron-fluid">

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form method="POST" action="/user" id="register-form" role="form" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">Registro</div>
            <div class="card-body">
              @csrf @method('POST')
              <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="nombre">
                </div>
              </div>
              <div class="form-group row">
                <label for="apellidoP" class="col-md-4 col-form-label text-md-right">Apellido Paterno</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="apellidoP">
                </div>
              </div>
              <div class="form-group row">
                <label for="apellidoM" class="col-md-4 col-form-label text-md-right">Apellido Materno</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="apellidoM">
                </div>
              </div>
              <div class="form-group row">
                <label for="usuario" class="col-md-4 col-form-label text-md-right">Usuario</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="usuario">
                </div>
              </div>
              <div class="form-group row">
                <label for="mail" class="col-md-4 col-form-label text-md-right">Correo</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="mail">
                </div>
              </div>
              <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Numero Telefonico</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="phone">
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>

              <div class="form-group row">
                <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
                <div class="col-md-6">
                  <select class="form-control" name="tipo">
                    <option value="1">Vendedor</option>
                    <option value="2">Comprador</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">Foto</label>
                <div class="col-md-6">
                  <input type="file" name="file">
                </div>
              </div>

              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="botonEnviar">
                  Registrar!
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="navbar navbar-expand-md">
  <div class="d-inline-block align-top">© 2019 Copyright:
    <a href="/#">QciDeliver</a>
  </div>
  <!-- Social -->
  <div class="ml-auto">
    <a class="fb-ic">
      <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
    </a>

    <a class="tw-ic">
      <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
    </a>

    <a class="ins-ic">
      <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
    </a>
  </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="{{asset('js/create.js')}}"></script>