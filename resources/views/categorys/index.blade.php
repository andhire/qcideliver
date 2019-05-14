@extends('layouts.app')

@section('content')

@if (session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif

index de categorias, solo para ver las categorias creadas
@endsection