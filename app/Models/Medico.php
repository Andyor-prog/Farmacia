<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $primaryKey = 'id_medico';

    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'cedula',
        'especialidad_id',
        'consultorio',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(
            Usuario::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function especialidad(): BelongsTo
    {
        return $this->belongsTo(
            Especialidad::class,
            'especialidad_id',
            'id_especialidad'
        );
    }

    public function citas(): HasMany
    {
        return $this->hasMany(
            Cita::class,
            'medico_id',
            'id_medico'
        );
    }
}
