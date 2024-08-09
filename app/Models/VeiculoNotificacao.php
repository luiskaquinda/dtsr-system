<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeiculoNotificacao extends Model
{
    use HasFactory;

    protected $table = 'veiculos_notificacoes';

    protected $fillable = [
        'veiculo_id',
        'notificacao_id',
    ];
}
