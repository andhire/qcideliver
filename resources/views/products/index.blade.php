<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Productos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">

        @foreach ($productos as $p)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src={{$p->image}} width="100%" height="200">
            <div class="card-body">
              <p class="card-text">
                {{$p->name}}<br>
                {{$p->type}} </p>
              <div class="d-flex justify-content-between align-items-center">
                {{-- <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-primary">Aprobar</button>
                  <button type="button" class="btn btn-sm btn-outline-danger">Descartar</button>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

</body>