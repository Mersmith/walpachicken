<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sede extends Model
{
    /** @use HasFactory<\Database\Factories\SedeFactory> */
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sede) {
            $sede->activo = false;
            $sede->save();
        });
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
}
