<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaConducao extends Model
{
    use HasFactory;

    protected $table = 'cartas_conducao';

    protected $fillable = [
        'numero_carta_conducao',
        'data_emissao_carta_conducao',
        'data_validade_carta_conducao'
    ];

    public function proprietario() {
        return $this->hasOne(
            Proprietario::class, 
            'carta_conducao_id', 
            'id'
        );
    }
}
