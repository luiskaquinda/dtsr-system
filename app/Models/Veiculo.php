<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $table = 'veiculos';

    protected $fillable = [
        'marca',
        'modelo',
        'quadro',
        'motor',
        'cor',
        'numero_cilindros',
        'medidas_pneumaticas',
        'lugares',
        'tara',
        'pais_origem',
        'matricula_id',
        'ano_fabrico',
        'primeiro_registro',
        'combustivel_id',
        'classe_id',
        'caixa_id',
        'peso_id',
        'servico_id',
        'proprietario_id'
    ];

    public function caixa_veiculo() {
        return $this->belongsTo(
            CaixaVeiculo::class, 'caixa_id', 
            'id'
        );
    }

    public function classe() {
        return $this->belongsTo(
            ClasseVeiculo::class,
            'classe_id',
            'id'
        );
    }

    public function combustivel() {
        return $this->belongsTo(
            Veiculo::class,
            'combustivel_id',
            'id'
        );
    }

    public function notificacoes() {
        return $this->belongsToMany(
            Notificacao::class,
            'veiculos_notificacoes',
            'veiculo_id',
            'notificacao_id'
        );
    }

    public function pedido_matricula() {
        return $this->hasOne(
            PedidoMatricula::class,
            'veiculo_id',
            'id'
        );
    }

    // protected static function booted()
    // {
    //     static::deleting(function ($veiculo) {
    //         // deleta todos os pedidos antes de remover o veículo
    //         $veiculo->pedidos_matriculas()->delete();
    //     });
    // }

    public function pesos_bruto() {
        return $this->belongsTo(
            PesoBruto::class,
            'peso_id',
            'id'
        );
    }

    public function multa() {
        return $this->hasMany(
            Multa::class,
            'veiculo_id',
            'id'
        );
    }

    public function proprietario() {
        return $this->belongsTo(
            Proprietario::class,
            'proprietario_id',
            'id'
        );
    }

    public function servico() {
        return $this->belongsTo(
            Servico::class,
            'servico_id',
            'id'
        );
    }

    public function matricula() {
        return $this->belongsTo(
            Matricula::class, 
            'matricula_id', 
            'id'
        );
    }

    public function imagens()
    {
        return $this->hasMany(AlertaImagem::class);
    }
}
