@extends('layouts.app')
@section('title','Crear productos')

@section('content')
<br>
<div class="container">
    <h1>CREAR FAMILIAS</h1>
    <form action='{{ route('familias.store') }}' method='post'>
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="7"></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
        <a class="btn btn-secondary" href="{{ route('familias.index') }}">Cancelar</a>
    </form>
</div>
@endsection