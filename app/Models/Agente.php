<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//agentes (usuario_id) 1:1 usuarios
//agentes (dtsr_id) N:1 dtsrs

class Agente extends Model
{
    use HasFactory;

    protected $table = 'agentes';

    protected $fillable = [
        'nome',
        'patente',
        'numero',
        'dtsr_id',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(
            User::class, 
            'user_id', 
            'id'
        );
    }

    public function dtsr() {
        return $this->belongsTo(
            Dtsr::class, 
            'dtsr_id', 
            'id'
        );
    }

    public function multa() {
        return $this->hasMany(
            Multa::class, 
            'agente_id', 
            'id'
        );
    }
}
