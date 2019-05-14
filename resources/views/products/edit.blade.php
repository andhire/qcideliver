@extends('layouts.app')

@section('content')

<div class="container content">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form method="POST" action="/product/{{$product->id}}" id="edit-form" role="form">
        <div class="card">
          <div class="card-header">Editar producto</div>
          <div class="card-body">
            @csrf @method('PUT')
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input value="{{$product->name}}" type="text" class="form-control" name="name">
              </div>
            </div>
            <div class="form-group row">
              <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
              <div class="col-md-6">
                <input value="{{$product->id_category}}" type="text" class="form-control" name="category">
              </div>
            </div>
            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
              <div class="col-md-6">
                <input value="{{$product->price}}" type="numeric" class="form-control" name="price">
              </div>
            </div>

            <div class="form-group row">
              <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
              <div class="col-md-6">
                <input value="{{$product->amount}}" type="text" class="form-control" name="amount">
              </div>
            </div>


            <div class="form-group row">
              <label for="file" class="col-md-4 col-form-label text-md-right">Foto</label>
              <div class="col-md-6">
                <input value="{{$product->image}}" type="file" class="form-control" name="file">
              </div>
            </div>
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