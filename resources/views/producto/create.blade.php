@extends('layouts.app')
@section('title','Crear productos')

@section('content')
<br>
<div class="container">
    <h1>CREAR PRODUCTOS</h1>
    <form action='{{ route('productos.store') }}' method='post'>
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="7"></textarea>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" value="" required>
            </div>
            <div class="col">
                <label for="familia_id" class="form-label">Familia</label>
                <select class="form-select" name='familia_id'>
                    @foreach($familias as $familia)
                        <option value="{{ $familia->id }}"">{{ $familia->id }} - {{ $familia->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
        <a class="btn btn-secondary" href="{{ route('productos.index') }}">Cancelar</a>
    </form>
</div>
@endsection