<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    use HasFactory;

    protected $table = 'multas';

    protected $fillable = [
        'importancia_pagar',
        'infracao_artigo',
        'documento_apreendido',
        'tipo_multa_id',
        'agente_id',
        'proprietario_id'
    ];

    public function agente() {
        return $this->belongsTo(
            Agente::class, 
            'agente_id', 
            'id'
        );
    }

    public function documento() {
        return $this->hasMany(
            Documento::class,
            'multa_id',
            'id'
        );
    }

    public function tipo_multa() {
        return $this->belongsTo(
            TipoMulta::class,
            'tipo_multa_id',
            'id'
        );
    }

    public function proprietario() {
        return $this->belongsTo(
            Proprietario::class,
            'proprietario_id',
            'id'
        );
    }
}
