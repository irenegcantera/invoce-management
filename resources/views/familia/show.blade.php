@extends('layouts.app')
@section('title','Mostrar producto')

@section('content')
    <br>
    <div class="container">
        <h2>ID: {{ $familia->id }}</h2>
        <h3>Nombre: {{ $familia->nombre }}</h3>
        <p>Descripción: {{ $familia->descripcion }}</p>
        <a class="btn btn-secondary" href="{{ route('familias.index') }}">Volver al listado</a>
        <a class="btn btn-outline-warning" href="{{ route('familias.edit',$familia) }}">Editar</a>
        <a class="btn btn-outline-danger" href="{{ route('familias.destroy',$familia) }}">Eliminar</a>
        <br><br>
        <h4>Listado productos por familia</h4>
        <br>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>
                        <form action="{{ route('productos.show', $producto) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-info">Info producto</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <div class="d-flex justify-content-center">
            {{ $productos->links() }}
        </div>
    </div>
@endsection