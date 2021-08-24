@extends('layout')
@section('title', $category->id ? 'Actualizar Categoria' : 'Nuevo Categoria')
@section('encabezado', $category->id ? 'Actualizar Categoria' : 'Nuevo Categoria')
@section('content')
<form action="{{ route('category.save')}}" method="POST">
    @csrf
  <div class="mb-3">
    <input type="hidden" name="id" value="{{ old('id') ? old('id'): $category->id}}">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name'): $category->name }}">
    <div>
        @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
    <label class="form-label">Descripcion</label>
    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ? old('description'): $category->description }}">
    <div>
        @error('description')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
  
    <a href="{{ route('category')}}" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection