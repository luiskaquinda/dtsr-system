<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPedido extends Model
{
    use HasFactory;
    protected $table = 'tipos_pedido';
    protected $fillable = [
        'tipo'
    ];

    public function pedido_matricula() {
        return $this->hasMany(
            PedidoMatricula::class,
            'tipo_pedido_id',
            'id'
        );
    }
}
