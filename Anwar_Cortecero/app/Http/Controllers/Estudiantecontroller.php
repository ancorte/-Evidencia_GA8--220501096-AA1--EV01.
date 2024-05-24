<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Muestra una lista de estudiantes.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Muestra el formulario para crear un nuevo estudiante.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Almacena un nuevo estudiante en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Asegura que la imagen sea válida
        ]);

        // Guarda la imagen en storage
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/estudiantes');
        } else {
            $imagenPath = null;
        }

        // Crea el estudiante
        Estudiante::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Muestra los detalles de un estudiante específico.
     */
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Muestra el formulario para editar un estudiante.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Actualiza la información de un estudiante específico en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Asegura que la imagen sea válida
        ]);

        $estudiante = Estudiante::findOrFail($id);

        // Elimina la imagen anterior si se carga una nueva
        if ($request->hasFile('imagen')) {
            Storage::delete($estudiante->imagen);
            $imagenPath = $request->file('imagen')->store('public/estudiantes');
        } else {
            $imagenPath = $estudiante->imagen;
        }

        // Actualiza el estudiante
        $estudiante->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Elimina un estudiante específico de la base de datos.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        // Elimina la imagen asociada al estudiante
        if ($estudiante->imagen) {
            Storage::delete($estudiante->imagen);
        }

        // Elimina el estudiante de la base de datos
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado exitosamente.');
    }
}
