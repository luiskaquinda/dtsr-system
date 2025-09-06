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
        'hora_ocorrido',
        'codigoalerta',
        'anonima',
        'nome_denuciante',
        'descricao',
        'imagem',
        'municipio_id',
        'tipo_alerta_id',
        'user_id',
        'status'
    ];

    protected $casts = [
        'data_ocorrido'    => 'date',      // só data
        'hora_ocorrido'    => 'datetime:H:i', // só hora
    ];

    public function tipos_notificacoes() {
        return $this->belongsTo(
        TipoNotificacao::class,
    'tipo_alerta_id',
        'id'
        );
    }

    public function municipio() {
        return $this->belongsTo(
            Municipio::class,
            'municipio_id',
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

    public function confirmacoes() {
        return $this->hasMany(
            Confirmacao::class,
            'alerta_id',
            'id'
        );
    }

    public function usuariosQueConfirmaram()
    {
        return $this->belongsToMany(
            User::class,
            'confirmacoes'
        )->withTimestamps();
    }

    // Helper para contar confirmações
    public function confirmacoesCount(): int
    {
        return $this->confirmacoes()->count();
    }

    public function isConfirmedBy(\App\Models\User $user): bool
    {
        // Usa o relacionamento muitos‑para‑muitos
        return $this->usuariosQueConfirmaram()
                    ->where('user_id', $user->id)
                    ->exists();
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

    public function imagens()
    {
        return $this->hasMany(AlertaImagem::class);
    }

}
