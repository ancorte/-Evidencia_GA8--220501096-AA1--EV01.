@extends('layouts.app')

@section('titulo', 'Editar Estudiante')

@section('contenido')

<div class="container">
    <h1 class="text-center">Editar Estudiante</h1>
    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $estudiante->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $estudiante->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <br>
            <label for="imagen">Imagen:</label>
            <br>
            <input type="file" class="form-control-file" id="imagen" name="imagen">
            <br>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

@endsection

