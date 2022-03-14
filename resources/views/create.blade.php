@extends('layouts.app')
@section('title','Crear facturas')

@section('content')
<br>
<div class="container">
    <h1>CREAR FACTURA</h1>
    <h4>Si quiere cambiar la dirección de facturación, modifica los campos.</h4>
    <br>
    <form action='{{-- {{ route('facturas.store') }} --}}' method='post'>
        @csrf
        <div class="mb-3 row">
            <div class="col">
                <label for="numero" class="form-label fw-bold">Número</label>
                <input type="number" class="form-control" name="numero" value="" min="100" required>
            </div>
            <div class="col">
                <label for="fecha" class="form-label fw-bold">Fecha</label>
                <input type="date" class="form-control" name="fecha" value="" required>
            </div>
        </div>
        <div class="mb-3 row">
            {{-- campo select --}}
            <div class="col">
                <label for="nombre" class="form-label fw-bold">Nombre</label>
                <select class="form-control" name='nombre' id='nombre'>
                    <option value="0" selected>Elige un cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="telefono" class="form-label fw-bold">Teléfono</label>
                <input type="text" class="form-control" name="telefono" id='telefono' value="">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="direccion" class="form-label fw-bold">Dirección</label>
                <input type="text" class="form-control" name="direccion" id='direccion' value="">
            </div>
            <div class="col">
                <label for="cpostal" class="form-label fw-bold">Código Postal</label>
                <input type="text" class="form-control" name="cpostal" id='cpostal' value="">
            </div>
            <div class="col">
                <label for="poblacion" class="form-label fw-bold">Población</label>
                <input type="text" class="form-control" name="poblacion" id='poblacion' value="">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label for="provincia" class="form-label fw-bold">Provincia</label>
                <input type="text" class="form-control" name="provincia" id='provincia' value="">
            </div>
            
        </div>
        
        <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
        <a class="btn btn-secondary" href="{{ route('clientes.index') }}">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
            
        $("#nombre").change(function(){
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
	
            var id=$("select[name=nombre]").val();
            if (id!=0){
            $.ajax({
                url: '{{route('ajax.cliente')}}',
                method:'post',
                data:{'id':id},
                success:function(data){
                    var datos=JSON.parse(data);
                    $("#nombre").val(datos.nombre);
                    $("#direccion").val(datos.direccion);
                    $("#poblacion").val(datos.poblacion);
                    $("#provincia").val(datos.provincia);
                    $("#cpostal").val(datos.cod_postal);
                    $("#telefono").val(datos.telefono);
                }
            });
            }else{
                alert("Cliente no seleccionado");
            }
        });
    });
</script>
@endsection