@extends('layouts.app')
@section('title','Mostrar producto')

@section('content')
<br>
<div class="container">
    <h2>ID: {{ $producto->id }}</h2>
    <h3>Nombre: {{ $producto->nombre }}</h3>
    <p>Descripción: {{ $producto->descripcion }}</p>
    <p>Precio: {{ $producto->precio }} EUROS</p>
    <p>Familia: {{ $producto->familia_id }}</p>
    <p>Accriones:
        <a class="btn btn-outline-warning" href="{{ route('productos.edit',$producto) }}">Editar</a>
        <a class="btn btn-outline-danger" href="{{ route('productos.destroy',$producto) }}">Eliminar</a>
    </p>
    <br>
    <a class="btn btn-secondary" href="{{ route('productos.index') }}">Volver a productos</a>
    <a class="btn btn-dark" href="{{ route('familias.index') }}">Volver a familias</a>
    
</div>
@endsection