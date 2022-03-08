@extends('layouts.app')
@section('title','Editar productos')

@section('content')
<br>
<div class="container">
    <h3>Editar producto <small class="text-muted">{{ $producto->nombre}}</small></h3>
    <br>
    <form action='{{ route('productos.update', $producto) }}' method='post'>
        @csrf
        @method('put')
        <div class="mb-3 row">
            <div class="col">
                <label for="id" class="form-label fw-bold">ID</label>
                <input type="text" class="form-control" name="id" value="{{ $producto->id }}" disabled>
            </div>
            <div class="col">
                <label for="nombre" class="form-label fw-bold">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label fw-bold">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="5">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="precio" class="form-label fw-bold">Precio</label>
                <input type="number" class="form-control" name="precio" value="{{ $producto->precio }}">
            </div>
            <div class="col">
                <label for="familia_id" class="form-label fw-bold">Familia</label>
                <select class="form-select" name='familia_id'>
                    @foreach($familias as $familia)
                        @if ($familia->id == $producto->familia_id)
                            <option value="{{ $familia->id }}" selected>{{ $familia->id }} - {{ $familia->nombre }}</option>
                        @else
                            <option value="{{ $familia->id }}"">{{ $familia->id }} - {{ $familia->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
        <a class="btn btn-outline-secondary" href="{{ route('productos.index') }}">Cancelar</a>
    </form>
</div>
@endsection