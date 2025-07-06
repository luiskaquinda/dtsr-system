<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Alerta extends Model
{
    use HasFactory;

    protected $table = 'alertas';

    protected $fillable = [
        'titulo',
        'data_ocorrido',
        'codigoalerta',
        'anonima',
        'nome_denuciante',
        'descricao',
        'imagem',
        'tipo_alerta_id',
        'user_id'
    ];

    public function tipo_notificacao() {
        return $this->belongsTo(
            TipoNotificacao::class,
            'tipo_notificacao_id',
            'id'
        );
    }

    public function usuario() {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }


    public static function gerarCodigoAlerta(): string
    {
        // 1) ID do usuário e data atual
        $userId = Auth::id();
        $date   = now()->format('Ymd');  // ex: “20250706”

        // 2) Último alerta do usuário criado hoje
        $ultimo = Alerta::where('user_id', $userId)
                      ->whereDate('created_at', now())
                      ->latest('created_at')
                      ->first();

        // 3) Pega o sufixo numérico (4 dígitos) ou inicia em zero
        $ultimoSeq = 0;
        if ($ultimo && preg_match('/(\d{4})$/', $ultimo->codigoalerta, $m)) {
            $ultimoSeq = (int) $m[1];
        }

        // 4) Incrementa e formata com zero à esquerda
        $proximoSeq = str_pad($ultimoSeq + 1, 4, '0', STR_PAD_LEFT);

        // 5) Retorna o código completo

        return "{$userId}{$date}{$proximoSeq}";
    }

}
