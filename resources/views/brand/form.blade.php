@extends('layout')
@section('title', $brand->id ? 'Actualizar Marca' : 'Nuevo Marca')
@section('encabezado', $brand->id ? 'Actualizar Marca' : 'Nuevo Marca')
@section('content')
<form action="{{ route('brand.save')}}" method="POST">
    @csrf
  <div class="mb-3">
    <input type="hidden" name="id" value="{{ old('id') ? old('id'): $brand->id}}">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name'): $brand->name }}">
    <div>
        @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
  
    <a href="{{ route('brands')}}" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection