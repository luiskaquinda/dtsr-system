<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoMatricula extends Model
{
    use HasFactory;

    protected $table = 'pedidos_matriculas';

    protected $fillable = [
        'codigopedido',
        'status',
        'descricao',
        'tipo_pedido_id',
        'veiculo_id'
    ];

    public function documentos() {
        return $this->hasMany(
            Documento::class,
            'pedido_matricula_id',
            'id'
        );
    }

    public function tipo_pedido() {
        return $this->belongsTo(
            TipoPedido::class,
            'tipo_pedido_id',
            'id'
        );
    }

    public function veiculo() {
        return $this->belongsTo(
            Veiculo::class,
            'veiculo_id',
            'id'
        );
    }
}
