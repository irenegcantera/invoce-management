@extends('layouts.app')
@section('title','Mostrar cliente')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>ID: {{ $cliente->id }}</h2>
            <h3>NIF: {{ $cliente->nif }}</h3>
            <h3>Nombre: {{ $cliente->nombre }}</h3>
            <p>Dirección: {{ $cliente->direccion }}</p>
            <p>Población: {{ $cliente->poblacion }}</p>
            <p>Provincia: {{ $cliente->provincia }}</p>
            <p>Código postal: {{ $cliente->cod_postal }}</p>
            <p>Email: {{ $cliente->email }}</p>
            <p>Teléfono: {{ $cliente->telefono }}</p>
            <a class="btn btn-secondary" href="{{ route('clientes.index') }}">Volver al listado</a>
            <a class="btn btn-outline-warning" href="{{ route('clientes.edit',$cliente) }}">Editar</a>
            <a class="btn btn-outline-danger" href="{{ route('clientes.destroy',$cliente->id) }}">Eliminar</a>
        </div>
        <div class="col">
            <br>
            <h4>Listado facturas por clientes</h4>
            <br>
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Número</th>
                        <th>Fecha</th>
                        <th>Importe Total</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                @foreach($facturas as $factura)
                <tr>
                    <td>{{ $factura->numero }}</td>
                    <td>{{ $factura->fecha }}</td>
                    <td>{{ $factura->getImporteTotal() }} €</td>
                    <td>
                        <form action="{{ route('facturas.show', $factura) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-info" disabled>Info factura</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <br>
            <div class="d-flex justify-content-center">
                {{ $facturas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection