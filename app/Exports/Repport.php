<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;            // <<-- import necessário
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\Models\TipoPedido;
use App\Models\PedidoMatricula;

class Repport implements FromView, ShouldAutoSize
{
    /**
     * Retorna a View que será convertida para Excel.
     */
    public function view(): View
    {
        $pedidos = PedidoMatricula::all();
        $tipoPedidos = TipoPedido::all();

        return view('admin.pedidos.veiculo.excel', compact('pedidos', 'tipoPedidos'));
    }
}
