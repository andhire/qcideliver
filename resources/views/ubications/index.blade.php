@extends('layouts.app')

@section('content')

index de Ubicaciones

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">

      @foreach ($ubications as $u)
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img src={{$u->foto}} width="100%" height="200">
          <div class="card-body">
            <p class="card-text">
              {{$u->nombre}}
            <div class="d-flex justify-content-between align-items-center">

            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

<a href="/ubication/create">
  <button type="button" class="btn btn-primary btn-sm">
    Crear Ubicacion
  </button>
</a>

<footer class="pagination justify-content-center " style="margin-top:15%">
  {{ $ubications->links() }}
</footer>

@endsection