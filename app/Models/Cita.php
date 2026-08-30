<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cita extends Model
{
    protected $table = 'citas';

    protected $primaryKey = 'id_cita';

    public $timestamps = false;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'fecha',
        'hora',
        'estado',
        'motivo',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(
            Usuario::class,
            'paciente_id',
            'id_usuario'
        );
    }

    public function medico(): BelongsTo
    {
        return $this->belongsTo(
            Medico::class,
            'medico_id',
            'id_medico'
        );
    }

    public function expediente(): HasOne
    {
        return $this->hasOne(
            ExpedienteMedico::class,
            'id_cita',
            'id_cita'
        );
    }
}