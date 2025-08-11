<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\{
    User,
    Alerta
};

class Confirmacao extends Model
{
    use HasFactory;

    protected $table = 'confirmacoes';

    protected $fillable = ['user_id', 'alerta_id'];

    // Relação com User
    public function user()    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    // Relação com Alerta
    public function alerta()  {
        return $this->belongsTo(
            Alerta::class,
            'alerta_id',
            'id'
        );
    }
}
