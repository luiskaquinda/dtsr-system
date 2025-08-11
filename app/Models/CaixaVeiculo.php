<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaixaVeiculo extends Model
{
    use HasFactory;

    protected $table = 'caixas_veiculos';

    protected $fillable = [
        'distancia_entre_eixos',
        'altura',
        'tipo_caixa'
    ];

    public function veiculo() {
        return $this->hasOne(
            Veiculo::class, 
            'caixa_id', 
            'id'
        );
    }
}
