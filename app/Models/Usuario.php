<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'activo',
        'fecha_registro',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'fecha_registro' => 'datetime',
    ];

    public function medico(): HasOne
    {
        return $this->hasOne(
            Medico::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function sesionesSociales(): HasMany
    {
        return $this->hasMany(
            SesionSocial::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function citas(): HasMany
    {
        return $this->hasMany(
            Cita::class,
            'paciente_id',
            'id_usuario'
        );
    }

    public function carritos(): HasMany
    {
        return $this->hasMany(
            Carrito::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function listaDeseos(): HasMany
    {
        return $this->hasMany(
            ListaDeseo::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function historialTransacciones(): HasMany
    {
        return $this->hasMany(
            HistorialTransaccion::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function logs(): HasMany
    {
        return $this->hasMany(
            Log::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Rol::class,
            'usuario_roles',
            'id_usuario',
            'id_rol'
        );
    }
}
