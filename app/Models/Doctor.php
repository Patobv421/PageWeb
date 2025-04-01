<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // Si el nombre de la tabla en la base de datos es 'doctors', Laravel lo detecta automáticamente.
    // De lo contrario, puedes definirlo manualmente:
    // protected $table = 'nombre_de_la_tabla';

    // Especifica los campos que se pueden asignar masivamente.
    protected $fillable = [
        'name',
        'photo_url',
        'specialty',
        'years_experience',
        'rating',
    ];
}

