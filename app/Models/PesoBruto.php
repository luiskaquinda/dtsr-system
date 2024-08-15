<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesoBruto extends Model
{
    use HasFactory;

    protected $table = 'pesos_bruto';

    protected $fillable = [
        'a_frente',
        'ao_meio',
        'a_retaguarda'
    ];

    public function veiculo() {
        return $this->hasOne(
            Veiculo::class,
            'peso_id',
            'id'
        );
    }
}
