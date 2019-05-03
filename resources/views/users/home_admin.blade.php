<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Usuario Administrador</title>

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"
    id="bootstrap-css">
  <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>

</head>

<body>
<!--TODO: Mostrar productos por autorizar-->
<!--TODO: Mostrar vendedores por autorizar-->
<!--TODO: Opcion para crear nuevos usuarios-->

<a href="{{ url('/user/create') }}" class="btn btn-default">Registrar Admin</a> 

</body>

</html>