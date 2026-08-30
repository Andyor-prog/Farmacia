<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListaDeseo extends Model
{
    protected $table = 'lista_deseos';

    protected $primaryKey = 'id_lista';

    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_servicio',
        'fecha_agregado',
    ];

    protected $casts = [
        'fecha_agregado' => 'datetime',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(
            Usuario::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(
            ServicioMedico::class,
            'id_servicio',
            'id_servicio'
        );
    }
}