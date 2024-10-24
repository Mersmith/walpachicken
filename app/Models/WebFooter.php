<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebFooter extends Model
{
    /** @use HasFactory<\Database\Factories\WebFooterFactory> */
    use HasFactory;

    protected $fillable = ['primera_columna', 'segunda_columna', 'tercera_columna', 'cuarta_columna', 'derechos', 'activo'];

}
