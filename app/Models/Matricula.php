<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculass';

    protected $fillable = [
        'provincia_id',
        'numero_serie',
        'serie',
        'matricula'
    ];

    public function veiculo() {
        return $this->hasOne(
            Veiculo::class,
            'matricula_id',
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
}
