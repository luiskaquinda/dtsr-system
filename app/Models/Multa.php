<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Multa extends Model
{
    use HasFactory;

    protected $table = 'multas';

    protected $fillable = [
        'importancia_pagar',
        'codigomulta',
        'infracao_artigo',
        'descricao',
        'documento_apreendido',
        'tipo_multa_id',
        'agente_id',
        'veiculo_id',
        'proprietario_id'
    ];

    public function agente() {
        return $this->belongsTo(
            Agente::class, 
            'agente_id', 
            'id'
        );
    }

    public function documento() {
        return $this->hasMany(
            Documento::class,
            'multa_id',
            'id'
        );
    }

    public function veiculo() {
        return $this->belongsTo(
            Veiculo::class,
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

    public static function gerarCodigoMulta(): string
    {
        // 1) ID do usuário autenticado
        $userId = Auth::id();

        // 2) Busca o ID do agente correspondente (ou lança exceção se não existir)
        $agente = Agente::where('user_id', $userId)->firstOrFail();
        $agenteId = $agente->id;

        // 3) Datas para formatação
        $date  = now()->format('Ymd');       // ex: “20250706”
        $hoje  = now()->toDateString();      // ex: “2025-07-13”

        // 4) Última multa criada hoje por este agente
        $ultimo = Multa::where('agente_id', $agenteId)
                    ->whereDate('created_at', $hoje)
                    ->latest('created_at')
                    ->first();

        // 5) Extrai o sufixo numérico (4 dígitos) ou inicia em zero
        $ultimoSeq = 0;
        if ($ultimo && preg_match('/(\d{4})$/', $ultimo->codigomulta, $m)) {
            $ultimoSeq = (int) $m[1];
        }

        // 6) Incrementa e formata com zeros à esquerda
        $proximoSeq = str_pad($ultimoSeq + 1, 4, '0', STR_PAD_LEFT);

        // 7) Concatena e devolve {agenteId}{YYYYMMDD}{NNNN}
        return "{$agenteId}{$date}{$proximoSeq}";
    }

    public static function multasDoUsuario()
    {
        // Pega o ID do utilizador autenticado
        $userId = Auth::id();

        // Busca o proprietário com base no user_id
        $proprietario = Proprietario::where('user_id', $userId)->first();

        // Verifica se é um proprietário válido
        if (!$proprietario) {
            return 0;
        }

        // Pega todas as multas relacionadas ao proprietário
        $multas = Multa::where('proprietario_id', $proprietario->id)
            ->latest()
            ->get();

        return $multas;
    }
}
