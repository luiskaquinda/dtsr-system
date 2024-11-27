<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $table = 'provincias';
    protected $fillable = [
        'abreviacao_provincia',
        'nome_provincia',
    ];

    public function municipios() {
        return $this->hasMany(
            Municipio::class,
            'provincia_id',
            'id'
        );
    }

    public function matriculas() {
        return $this->hasMany(
            Matricula::class,
            'provincia_id',
            'id'
        );
    }

}
