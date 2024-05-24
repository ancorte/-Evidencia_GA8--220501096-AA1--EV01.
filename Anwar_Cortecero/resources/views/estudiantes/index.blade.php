@extends('layouts.app')

@section('titulo', 'Lista de Estudiantes')

@section('contenido')

<div class="container">
    <h1 class="text-center">Lista de Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">Agregar Estudiante</a>

    @if ($estudiantes->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->descripcion }}</td>
                <td>
                    @if ($estudiante->imagen)
                    <img src="{{ Storage::url($estudiante->imagen) }}" alt="{{ $estudiante->nombre }}" style="max-width: 100px;">
                    @else
                    Sin imagen
                    @endif
                </td>
                <td>
                    <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No hay estudiantes registrados.</p>
    @endif
</div>

@endsection

