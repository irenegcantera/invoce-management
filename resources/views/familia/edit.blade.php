@extends('layouts.app')
@section('title','Editar Familias')

@section('content')
<br>
<div class="container">
    <h3>Editar producto <small class="text-muted">{{ $familia->nombre}}</small></h3>
    <br>
    <form action='{{ route('familias.update', $familia) }}' method='post'>
        @csrf
        @method('put')
        <div class="mb-3 row">
            <div class="col">
                <label for="id" class="form-label fw-bold">ID</label>
                <input type="text" class="form-control" name="id" value="{{ $familia->id }}" disabled>
            </div>
            <div class="col">
                <label for="nombre" class="form-label fw-bold">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ $familia->nombre }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label fw-bold">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="5">{{ $familia->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
        <a class="btn btn-outline-secondary" href="{{ route('familias.index') }}">Cancelar</a>
    </form>
</div>
@endsection