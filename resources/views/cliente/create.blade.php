@extends('layouts.app')
@section('title','Crear clientes')

@section('content')
<br>
<div class="container">
    <h1>CREAR CLIENTES</h1>
    <br>
    <form action='{{ route('clientes.store') }}' method='post' enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-xl-5">
                <div class="mb-3 row">
                    <div class="col">
                        <label for="nif" class="form-label fw-bold">NIF</label>
                        <input type="text" class="form-control" name="nif" value="" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="" required>
                    </div>
                    <div class="col">
                        <label for="telefono" class="form-label fw-bold">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control" name="email" value="">
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label fw-bold">Dirección</label>
                    <input type="text" class="form-control" name="direccion" value="">
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <label for="poblacion" class="form-label fw-bold">Población</label>
                        <input type="text" class="form-control" name="poblacion" value="">
                    </div>
                    <div class="col">
                        <label for="cod_postal" class="form-label fw-bold">Código Postal</label>
                        <input type="text" class="form-control" name="cod_postal" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <label for="provincia" class="form-label fw-bold">Provincia</label>
                        <input type="text" class="form-control" name="provincia" value="">
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <label for="avatar" class="form-label fw-bold">Foto cliente</label>
                <br><img id="frame" src="{{ asset('img/avatar.png') }}" class="img-thumbnail" accept="image/png, image/jpeg" width="200" height="300"/><br>
                <br><input type="file" class="form-control" name="avatar" id="avatar" onchange="preview()">
            </div>
        </div>
        
        
        <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
        <a class="btn btn-secondary" href="{{ route('clientes.index') }}">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection