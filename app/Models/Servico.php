<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table = 'servicos';
    protected $fillable = [
        'servico'
    ];

    public function veiculos() {
        return $this->hasMany(
            Veiculo::class,
            'servico_id',
            'id'
        );
    }
}
