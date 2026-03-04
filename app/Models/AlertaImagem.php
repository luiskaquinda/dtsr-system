<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertaImagem extends Model
{
    use HasFactory;

    protected $table = 'alerta_imagens';

    protected $fillable = [
        'alerta_id',
        'veiculo_id',
        'path',
    ];

    public function alerta()
    {
        return $this->belongsTo(Alerta::class);
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
