@extends('layout')
@section('title', $product->id ? 'Actualizar Producto' : 'Nuevo Producto')
@section('encabezado', $product->id ? 'Actualizar Producto' : 'Nuevo Producto')
@section('content')
<form action="{{ route('product.save')}}" method="POST">
    @csrf
  <div class="mb-3">
    <input type="hidden" name="id" value="{{ old('id') ? old('id'): $product->id}}">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name'): $product->name }}">
    <div>
        @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
  <div class="mb-3">
    <label class="form-label">Cost</label>
    <input  class="form-control" id="cost" name="cost" value="{{ old('cost') ? old('cost'): $product->cost }}">
  </div>
  <div>
        @error('cost')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
  <div class="mb-3">
    <label class="form-label">Price</label>
    <input  class="form-control" id="price" name="price" value="{{ old('price') ? old('price'): $product->price }}">
  </div>
  <div>
        @error('price')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
  <div class="mb-3">
    <label class="form-label">Quantity</label>
    <input  class="form-control" id="quantity" name="quantity" value="{{ old('quantity') ? old('quantity'): $product->quantity }}">
  </div>
  <div>
        @error('quantity')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
  <div class="mb-3">
    <label class="form-label">Brand</label>
    <div class="col-sm-10">
    <select name="brand_id" class="form-select">
      @foreach($brand as $brands)
      <option value="{{ $brands->id }}" {{ $product->brand_id === $brands->id ? "selected" : ""}}>
        {{ $brands->name }}
      </option>
      @endforeach
    </select>
  </div>
  <div>
        @error('brand')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
    <label class="form-label">Category</label>
    <div class="col-sm-10">
    <select name="category_id" class="form-select">
      @foreach($category as $categorys)
      <option value="{{ $categorys->id }}" {{ $product->category_id === $categorys->id ? "selected" : ""}}>
        {{ $categorys->name }}
      </option>
      @endforeach
    </select>
  </div>
  <div>
        @error('category')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <a href="{{ route('products')}}" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection