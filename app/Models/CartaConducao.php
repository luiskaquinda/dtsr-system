<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaConducao extends Model
{
    use HasFactory;

    protected $table = 'cartas_conducao';

    protected $fillable = [
        'numero',
        'data_emissao',
        'data_validade'
    ];
}
