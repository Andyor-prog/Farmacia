<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServicioMedico extends Model
{
    protected $table = 'servicios_medicos';

    protected $primaryKey = 'id_servicio';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'costo',
        'activo',
    ];

    protected $casts = [
        'costo' => 'decimal:2',
        'activo' => 'boolean',
    ];

    public function carritoDetalles(): HasMany
    {
        return $this->hasMany(
            CarritoDetalle::class,
            'id_servicio',
            'id_servicio'
        );
    }

    public function listasDeseos(): HasMany
    {
        return $this->hasMany(
            ListaDeseo::class,
            'id_servicio',
            'id_servicio'
        );
    }
}