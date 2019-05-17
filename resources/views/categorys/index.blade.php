@extends('layouts.app')
@section('title', 'Categorías')
@section('content')

@if (session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif

index de categorias, solo para ver las categorias creadas

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">

      @foreach ($categorys as $c)
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          {{-- <img src={{$u->foto}} width="100%" height="200"> --}}
          <a href={{"product/categoria/".$c->name}}>
            <div class="card-body">
              <p class="card-text">
                {{$c->name}}
              </p>
            </div>
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

<a href="/category/create">
  <button type="button" class="btn btn-primary btn-sm">
    Crear Categoria
  </button>
</a>

<footer class="pagination justify-content-center " style="margin-top:15%">
  {{ $categorys->links() }}
</footer>

@endsection