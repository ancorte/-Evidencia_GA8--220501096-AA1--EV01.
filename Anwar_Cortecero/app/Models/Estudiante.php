<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'curso_id',
    ];

    /**
     * Obtiene el curso al que pertenece el estudiante.
     */
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
