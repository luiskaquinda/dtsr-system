<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;
    protected $table = 'residencias';
    protected $fillable = [
        'rua',
        'bairro',
        'municipio_id'
    ];
}
