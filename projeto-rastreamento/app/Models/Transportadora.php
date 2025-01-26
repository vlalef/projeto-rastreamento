<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    public function entregas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Entrega::class, 'id_transportadora');
    }
}
