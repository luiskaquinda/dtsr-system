<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';

    protected $fillable = [
        'nome_municipio',
        'provincia_id'
    ];

    public function dtsr() {
        return $this->hasOne(
            Dtsr::class,
            'municipio_id',
            'id'
        );
    }

    public function provincia() {
        return $this->belongsTo(
            Provincia::class,
            'provincia_id',
            'id'
        );
    }

    public function residencias() {
        return $this->hasMany(
            Residencia::class,
            'municipio_id',
            'id'
        );
    }
}
