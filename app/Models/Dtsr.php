<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtsr extends Model
{
    use HasFactory;

    protected $table = 'dtsrs';

    protected $fillable = [
        'nome_dtsr',
        'telefone',
        'email',
        'municipio_id'
    ];
}
