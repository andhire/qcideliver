@extends('layouts.app')
@section('title', 'Ubicaciones')
@section('content')

<div class="album py-5">
  <div class="container">
    <div class="row">

      @foreach ($ubications as $u)
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <a href="/product/ubicacion/{{$u->slug}}">

            <img src={{$u->foto}} width="100%" height="200">
            <div class="card-body">
              <p class="card-text">
                {{$u->nombre}}
            </div>
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>


@if (Auth::check() && Auth::user()['tipo'] == 0)
<div class="container">
    <div class="content-justify-center">
    <a href="/ubication/create">
      <button type="button" class="btn btn-primary btn-block">
        Crear Ubicación
      </button>
    </a>
    </div>
</div>
@endif

<footer class="pagination justify-content-center " style="margin-top:15%">
  {{ $ubications->links() }}
</footer>

@endsection