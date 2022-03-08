@extends('layouts.app')
@section('title','Listado Productos')

@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>LISTADO DE PRODUCTOS:</h1>
        </div>
    </div>
    
    <br>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Familia</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->familia_id }}</td>
                <td>
                    <form action="{{ route('productos.show', $producto) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-info btn-sm fw-bold">Info</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('productos.edit', $producto) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm fw-bold">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('productos.destroy', $producto) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm fw-bold">Eliminar</button>
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