<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    use HasFactory;

    protected $table = 'bilhetes';

    protected $fillable = [
        'numero',
        'data_emissao',
        'data_validade'
    ];
}
