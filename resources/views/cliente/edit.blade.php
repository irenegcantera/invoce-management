@extends('layouts.app')
@section('title','Editar clientes')

@section('content')
<br>
<div class="container">
    <h3>Editar cliente <small class="text-muted">{{ $cliente->nombre}}</small></h3>
    <br>
    <form action='{{ route('clientes.update', $cliente) }}' method='post'>
        @csrf
        @method('put')
        <div class="mb-3 row">
            <div class="col">
                <label for="id" class="form-label fw-bold">ID</label>
                <input type="text" class="form-control" name="id" value="{{ $cliente->id }}" disabled>
            </div>
            <div class="col">
                <label for="nif" class="form-label fw-bold">NIF</label>
                <input type="text" class="form-control" name="nif" value="{{ $cliente->nif }}">
            </div>
            <div class="col">
                <label for="nombre" class="form-label fw-bold">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ $cliente->nombre }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label fw-bold">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{ $cliente->direccion }}">
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="poblacion" class="form-label fw-bold">Población</label>
                <input type="text" class="form-control" name="poblacion" value="{{ $cliente->poblacion }}">
            </div>
            <div class="col">
                <label for="provincia" class="form-label fw-bold">Provincia</label>
                <input type="text" class="form-control" name="provincia" value="{{ $cliente->provincia }}">
            </div>
            <div class="col">
                <label for="cod_postal" class="form-label fw-bold">Código Postal</label>
                <input type="text" class="form-control" name="cod_postal" value="{{ $cliente->cod_postal }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $cliente->email }}">
            </div>
            <div class="col">
                <label for="telefono" class="form-label fw-bold">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="{{ $cliente->telefono }}">
            </div>
        </div>
        
        <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
        <a class="btn btn-outline-secondary" href="{{ route('clientes.index') }}">Cancelar</a>
    </form>
</div>
@endsection