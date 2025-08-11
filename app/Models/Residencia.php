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


    public function proprietario() {
        return $this->hasOne(
            Proprietario::class,
            'residencia_id',
            'id'
        );
    }

    public function municipio() {
        return $this->belongsTo(
            Municipio::class,
            'municipio_id',
            'id'
        );
    }
}
