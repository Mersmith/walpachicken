<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanesReserva extends Model
{
    /** @use HasFactory<\Database\Factories\PlanesReservaFactory> */
    use HasFactory;

    protected $fillable = ['icono', 'titulo', 'reservas', 'activo'];

}
