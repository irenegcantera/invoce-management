@extends('layouts.app')
@section('title','Listado Familias')

@section('content')
<br>
<br>
<div class="container">
    <h1>LISTADO DE FAMILIAS:</h1>
    <br>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        @foreach($familias as $familia)
            <tr>
                <td>{{ $familia->id }}</td>
                <td>{{ $familia->nombre }}</td>
                <td>{{ $familia->descripcion }}</td>
                <td>
                    <form action="{{ route('familias.show', $familia) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-info btn-sm fw-bold">Info</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('familias.edit', $familia) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm fw-bold">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('familias.destroy', $familia) }}" method="post">
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
        {{ $familias->links() }}
    </div>
</div>

@endsection