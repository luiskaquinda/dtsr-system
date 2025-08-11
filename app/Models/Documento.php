<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $fillable = [
        'url',
        'tipo_documento',
        'pedido_matricula_id',
        'multa_id',
        'notificacao_id'
    ];

    public function notificacoes() {
        return $this->belongsTo(
            Notificacao::class,
            'notificacao_id',
            'id'
        );
    }

    public function multa() {
        return $this->belongsTo(
            Multa::class,
            'multa_id',
            'id'
        );
    }

    public function pedido_matricula() {
        return $this->belongsTo(
            PedidoMatricula::class,
            'pedido_matricula_id',
            'id'
        );
    }
}
