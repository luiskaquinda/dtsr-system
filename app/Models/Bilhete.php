<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    use HasFactory;

    protected $table = 'bilhetes';

    protected $fillable = [
        'numero_bilhete',
        'data_emissao_bilhete',
        'data_validade_bilhete'
    ];

    public function proprietario() {
        return $this->hasOne(
            Proprietario::class, 
            'bilhete_id', 
            'id'
        );
    }
}
