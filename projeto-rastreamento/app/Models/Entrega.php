<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $casts = [
        'remetente' => 'array',
        'destinatario' => 'array',
        'rastreamento' => 'array',
    ];

    public function transportadora(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Transportadora::class, 'id_transportadora');
    }
}
