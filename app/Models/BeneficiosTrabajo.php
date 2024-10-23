<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiosTrabajo extends Model
{
    /** @use HasFactory<\Database\Factories\BeneficiosTrabajoFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'contenido', 'activo'];

}
