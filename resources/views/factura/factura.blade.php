@extends('layouts.app')
@section('title','Facturar')
    

@section('content')
<br>
<div class="container">
    <div class="row justify-content-between">
        <div class="col-xl-5">
            <h4>Datos factura</h4>
            
            <form action="{{ route('facturas.update', $factura->numero) }}" method="post">
                @csrf
                @method('put')
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label fw-bold" for="numero">Número</label>
                        <input class="form-control form-control-sm" type="number" name='numero' size=6 value="{{$factura->numero}}" disabled/>
                    </div>
                    <div class="col">
                        <label class="form-label fw-bold" for="fecha">Fecha</label>
                        <input class="form-control form-control-sm" type="date" name='fecha' value="{{$factura->fecha}}"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-8">
                        <label class="form-label fw-bold" for="nombre_cliente">Nombre</label> 
                        <select class="form-control form-control-sm" name='id_cliente' id='nombre_cliente' >
                            <option value="{{ $factura->nombre }}">{{ $factura->nombre }}</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{$cliente->nombre }}</option>
                            @endforeach                       
                        </select>
                    </div>
                    
                    <div class="col">
                        <label class="form-label fw-bold" for="telefono">Teléfono</label> 
                        <input class="form-control form-control-sm" type='text' name='telefono' id="telefono" value="{{$cliente->telefono}}"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-9">
                        <label class="form-label fw-bold" for="direccion">Dirección</label> 
                        <input class="form-control form-control-sm" type="text" name='direccion' id='direccion' size="50" value="{{$cliente->direccion}}"/>
                    </div>
                    <div class="col">
                        <label class="form-label fw-bold" for="cod_postal">CP</label>
                        <input class="form-control form-control-sm" type="text" name='cod_postal' id='cod_postal' size=5 value="{{$cliente->cod_postal}}"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label fw-bold" for="poblacion">Población</label>
                        <input class="form-control form-control-sm" type="text" name='poblacion' id='poblacion' value="{{$cliente->poblacion}}"/>
                    </div>
                    <div class="col">  
                        <label class="form-label fw-bold" for="provincia">Provincia</label>
                        <input class="form-control form-control-sm" type="text" name='provincia' id='provincia' value="{{$cliente->provincia}}"/>
                    </div>
                </div>
                <input class="btn btn-success btn-sm fw-bold" type='submit' name="Actualizar" value='Actualizar'><br>
            </form>
            <br>

            @if(!empty($lineaEdit))
                <form action="{{route('lineas.update', $lineaEdit)}}" method="post" id="form_linea">
                    @csrf
                    @method('put')
                    <input type="hidden" name='factura_numero' size="50" value="{{$factura->numero}}"/>
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label fw-bold" for="producto_id">Producto</label>
                            <select class="form-control form-control-sm" name='producto_id' id='producto_id' >
                                <option value="0" selected>Elige un producto</option>
                                @foreach ($productos as $producto)
                                    @if($producto->id == $lineaEdit->producto_id)
                                        <option value="{{$producto->id}}" selected>{{$producto->nombre}}</option>
                                    @else
                                        <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label fw-bold" for="cantidad">Cantidad</label>
                            <input class="form-control form-control-sm" type="text" name='cantidad' id='cantidad' value="{{ $lineaEdit->cantidad }}"/>
                        </div>
                        <div class="col">  
                            <label class="form-label fw-bold" for="precio">Precio</label>
                            <input class="form-control form-control-sm" type="text" name='precio' id="precio" value="{{ $lineaEdit->precio }}"/>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label fw-bold" for="descripcion">Descripción</label>
                            <input class="form-control form-control-sm" type="text" name='descripcion' id='descripcion' value="{{ $lineaEdit->producto }}"/>
                        </div>
                    </div>
                    <input class="btn btn-outline-warning btn-sm fw-bold" type='submit' name="Guardar" value='Guardar'/><br>
                </form>
            @else
                <form action="{{route('lineas.store')}}" method="post" id="form_linea">
                    @csrf
                    <input type="hidden" name='factura_numero' size="50" value="{{$factura->numero}}"/>
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label fw-bold" for="producto_id">Producto</label>
                            <select class="form-control form-control-sm" name='producto_id' id='producto_id' >
                                <option value="0" selected>Elige un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label fw-bold" for="cantidad">Cantidad</label>
                            <input class="form-control form-control-sm" type="text" name='cantidad' id='cantidad' value="1"/>
                        </div>
                        <div class="col">  
                            <label class="form-label fw-bold" for="precio">Precio</label>
                            <input class="form-control form-control-sm" type="text" name='precio' id="precio" value=""/>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label fw-bold" for="descripcion">Descripción</label>
                            <input class="form-control form-control-sm" type="text" name='descripcion' id='descripcion' value=""/>
                        </div>
                    </div>
                    <input class="btn btn-outline-success btn-sm fw-bold" type='submit' name="Añadir" value='Añadir'/><br>
                </form>
            @endif
        </div>
        
        <div class="col-xl-7">
            <br>
            <a class="btn btn-secondary btn-sm fw-bold" href="{{ route('facturas.index') }}">Volver al listado</a>
            {{-- <a class="btn btn-primary fw-bold float-end" href="#">Generar PDF</a> --}}
            <br><br>
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio €</th>
                        <th>Importe €</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                @foreach ($factura->lineas as $linea)
                    <tr>
                        <td>{{$linea->producto}}</td>
                        <td>{{$linea->cantidad}}</td>
                        <td>{{$linea->precio}} €</td>
                        <td>{{$linea->cantidad*$linea->precio}}</td>
                        <td>
                            <form action="{{ route('lineas.edit', $linea) }}" method="get">
                                @csrf
                                @method('put')
                                <input type="hidden" name='edit' size="50" value="true"/>
                                <button type="submit" class="btn btn-warning btn-sm fw-bold">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('lineas.destroy', $linea) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm fw-bold">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tfoot class="fw-bold">
                    <tr>
                        <td>TOTAL FACTURA</td>
                        <td colspan="2">IVA 21%</td>
                        <td>{{ $factura->getImporteTotal() + ($factura->getImporteTotal()*0.21) }} €</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
{{-- CLIENTES --}}
<script>
    $(document).ready(function(){
        $("#nombre_cliente").change(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id=$("select[name=id_cliente]").val();
            if (id!=0){
            $.ajax({
                url: '{{ route('ajax.cliente') }}',
                method:'post',
                data:{'id':id},
                success:function(data){
                    var datos=JSON.parse(data);
                    $("#telefono").val(datos.telefono);
                    $("#direccion").val(datos.direccion);
                    $("#cod_postal").val(datos.cod_postal);
                    $("#poblacion").val(datos.poblacion);
                    $("#provincia").val(datos.provincia);
                }
            });
            }else{
                alert("Cliente no seleccionado");
            }
        });
    });
</script>
{{-- LINEAS DE PRODUCTOS --}}
<script>
    $(document).ready(function(){
        $("#producto_id").change(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id=$("select[name=producto_id]").val();
            if (id!=0){
            $.ajax({
                url: '{{ route('ajax.producto') }}',
                method:'post',
                data:{'id':id},
                success:function(data){
                    var datos=JSON.parse(data);
                    $("#precio").val(datos.precio);
                    $("#descripcion").val(datos.descripcion);
                    $("#nombre").val(datos.nombre);
                    
                }
            });
            }else{
                alert("Producto no seleccionado");
            }
        });
    });
</script>
@endsection