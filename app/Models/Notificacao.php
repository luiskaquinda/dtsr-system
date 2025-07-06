<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacoes';

    protected $fillable = [
        'descricao',
    ];

    public function documento() {
        return $this->hasMany(
            Documento::class,
            'notificacao_id',
            'id'
        );
    }

    public function tipo_notificacao() {
        return $this->belongsTo(
            TipoNotificacao::class,
            'tipo_notificacao_id',
            'id'
        );
    }

    public function veiculos() {
        return $this->belongsToMany(
            Veiculo::class,
            'veiculos_notificacoes',
            'notificacao_id',
            'veiculo_id'
        );
    }
}
