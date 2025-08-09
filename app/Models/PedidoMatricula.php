<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class PedidoMatricula extends Model
{
    use HasFactory;

    protected $table = 'pedidos_matriculas';

    protected $fillable = [
        'codigopedido',
        'status',
        'descricao',
        'tipo_pedido_id',
        'veiculo_id'
    ];

    public function documentos() {
        return $this->hasMany(
            Documento::class,
            'pedido_matricula_id',
            'id'
        );
    }

    public function tipo_pedido() {
        return $this->belongsTo(
            TipoPedido::class,
            'tipo_pedido_id',
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

    public static function gerarCodigoPedido(int $veiculoId): string    
    {
        // 1) Data atual no formato YYYYMMDD
        $date = now()->format('Ymd');  // ex: “20250706”

        // 2) Último alerta do mesmo veículo criado hoje
        $ultimo = PedidoMatricula::where('veiculo_id', $veiculoId)
                    ->whereDate('created_at', now())
                    ->latest('created_at')
                    ->first();

        // 3) Extrai o sufixo numérico de 4 dígitos (ou inicia em zero)
        $ultimoSeq = 0;
        if ($ultimo && preg_match('/(\d{4})$/', $ultimo->codigoalerta, $m)) {
            $ultimoSeq = (int) $m[1];
        }

        // 4) Incrementa o sequencial e formata com zeros à esquerda
        $proximoSeq = str_pad($ultimoSeq + 1, 4, '0', STR_PAD_LEFT);

        // 5) Concatena veiculoId + data + sequencial e devolve
        return "{$veiculoId}{$date}{$proximoSeq}";
    }
}
