<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoMatricula extends Model
{
    use HasFactory;

    protected $table = 'pedidos_matriculas';

    protected $fillable = [
        'status',
        'descricao',
        'tipo_pedido_id',
        'veiculo_id'
    ];
}
