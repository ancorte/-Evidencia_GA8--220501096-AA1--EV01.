@extends('layouts.app')

@section('titulo', 'Detalle del Estudiante')

@section('contenido')

<div class="container">
    <h1 class="text-center">Detalle del Estudiante</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $estudiante->nombre }}</h5>
            <p class="card-text">{{ $estudiante->descripcion }}</p>
           
            @if ($estudiante->imagen)
            <img src="{{ Storage::url($estudiante->imagen) }}" class="img-fluid" alt="Imagen del estudiante">
            @else
            <p class="card-text">Sin imagen</p>
            @endif
            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>

@endsection


