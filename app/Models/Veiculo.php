<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $table = 'veiculos';

    protected $fillable = [
        'marca',
        'modelo',
        'quadro',
        'motor',
        'cor',
        'numero_cilindros',
        'medidas_pneumaticas',
        'lugares',
        'tara',
        'pais_origem',
        'matricula',
        'ano_fabrico',
        'primeiro_registro',
        'combustivel_id',
        'classe_id',
        'caixa_id',
        'peso_id',
        'servico_id',
        'proprietario_id'
    ];
}
