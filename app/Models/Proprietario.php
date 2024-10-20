<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;
    protected $table = 'proprietarios';
    protected $fillable = [
        'nome_completo',
        'apelido_empresa',
        'data_nascimento',
        'sexo',
        'telemovel',
        'email',
        'bilhete_id',
        'residencia_id',
        'carta_conducao_id',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    public function bilhete() {
        return $this->belongsTo(
            Bilhete::class, 
            'bilhete_id', 
            'id'
        );
    }

    public function carta_conducao() {
        return $this->belongsTo(
            CartaConducao::class, 
            'carta_conducao_id', 
            'id'
        );
    }

    public function multa() {
        return $this->hasMany(
            Multa::class,
            'proprietario_id',
            'id'
        );
    }

    public function residencia() {
        return $this->belongsTo(
            Residencia::class,
            'residencia_id',
            'id'
        );
    }

    public function veiculo() {
        return $this->hasMany(
            Veiculo::class,
            'proprietario_id',
            'id'
        );
    }

}
