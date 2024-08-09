<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;
    protected $table = 'proprietarios';
    protected $fillable = [
        'nome_completo',
        'apelido_empresa',
        'data_nascimento',
        'sexo',
        'telemovel',
        'email',
        'bilhete_id',
        'residencia_id',
        'carta_conducao_id'
    ];
}
