@extends('layouts.app')

@section('titulo', 'Crear Estudiante')

@section('contenido')

<div class="container">
    <h1 class="text-center">Crear Estudiante</h1>
    <form action="{{ route('estudiantes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <br>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <br>
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <br>
            <label for="imagen">Imagen:</label>
            <br>
            <input type="file" class="form-control-file" id="imagen" name="imagen">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

@endsection

