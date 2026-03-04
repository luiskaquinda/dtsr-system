<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\{
    Provincia,
    ClasseVeiculo,
    Servico,
    Combustivel,
    PesoBruto,
    CaixaVeiculo,
    PedidoMatricula,
    Documento,
    TipoMulta,
    Dtsr,
    TipoPedido
};

class PdfController extends Controller
{
    public function pdfStream($id)
    {
        $pedido = PedidoMatricula::where('id', $id)->first();
        $classes = ClasseVeiculo::all();
        $combustiveis = Combustivel::all();
        $tipoCaixas = CaixaVeiculo::all();
        $provincias = Provincia::all();
        $pesosBruto = PesoBruto::all();
        $servicos = Servico::all();
        $tipos_multa = TipoMulta::all();
        $dtsrs = Dtsr::all();
        $documentos = Documento::where('pedido_matricula_id', $pedido->id)->get();

        return Pdf::loadView('admin.pedidos.veiculo.pdf', compact('pedido', 'classes', 'combustiveis', 'tipoCaixas', 'provincias', 'pesosBruto', 'servicos', 'tipos_multa', 'dtsrs', 'documentos'))
            ->setPaper('a4', 'landscape')
            ->stream('file-name.pdf');
    }

    public function pdfStreamPedidos()
    {
        $pedidos = PedidoMatricula::all();
        $tipoPedidos = TipoPedido::all();

        return Pdf::loadView('admin.pedidos.veiculo.excel', compact('pedidos', 'tipoPedidos'))
            ->setPaper('a4', 'landscape')
            ->stream('file-name.pdf');
    }

    // public function download()
    // {
    //     $data = ['valor' => 1];
    //     $pdf = Pdf::loadView('your view', $data);

    //     return $pdf->download('file-name.pdf');
    // }

}
