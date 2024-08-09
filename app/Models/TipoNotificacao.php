<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoNotificacao extends Model
{
    use HasFactory;
    protected $table = 'tipos_notificacoes';
    protected $fillable = [
        'tipo'
    ];
}
