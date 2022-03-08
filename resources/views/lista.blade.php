@extends('layouts.app')
@section('title','Listado Facturas')

@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>LISTADO DE FACTURAS:</h1>
        </div>
    </div>
    
    <br>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Número</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Importe Total</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        @foreach($facturas as $factura)
            <tr>
                <td>{{ $factura->numero }}</td>
                <td>{{ $factura->fecha }}</td>
                <td>{{ $factura->nombre }}</td>
                <td>{{ $factura->getImporteTotal() }} €</td>
                {{-- <td>
                    <form action="{{ route('productos.show', $producto) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-info btn-sm fw-bold">Info</button>
                    </form>
                </td> --}}
                <td>
                    <form action="{{ route('facturas.edit', $factura) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm fw-bold">Editar</button>
                    </form>
                </td>
                {{-- <td>
                    <form action="{{ route('productos.destroy', $producto) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm fw-bold">Eliminar</button>
                    </form>
                </td> --}}
            </tr>
        @endforeach
    </table>
    <br>
    <div class="d-flex justify-content-center">
        {{ $facturas->links() }}
    </div>
</div>

@endsection