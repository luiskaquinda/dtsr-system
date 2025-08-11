<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoNotificacao extends Model
{
    use HasFactory;
    protected $table = 'tipos_notificacoes';
    protected $fillable = [
        'tipo'
    ];

    public function alertas() {
        return $this->hasMany(
            Alerta::class,
            'tipo_alerta_id',
            'id'
        );
    }
}
