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

    public function agente() {
        return $this->hasMany(
            Agente::class, 
            'dtsr_id', 
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
