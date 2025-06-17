<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\{
    Agente,
    PedidoMatricula,
    Multa,
    Notificacao,
    Proprietario,
    TipoMulta,
    Dtsr,
    Veiculo
};

class MultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id, string $user_id)
    {
        //
        $pedido = PedidoMatricula::findOrFail( $id);
        $agente = Agente::where('user_id', $user_id)->first();
        $dtsr = Dtsr::findOrFail($agente->dtsr_id);
        $veiculo = Veiculo::findOrFail($pedido->veiculo_id);
        $proprietario = Proprietario::findOrFail($veiculo->proprietario_id);
        $tipo_multa = TipoMulta::findOrFail($request->tipo_de_multa);        
        $importancia_pagar = $request->ucf * 88;


        $mensagem = "Caro sr(a) {$proprietario->nome_completo}, o(a) sr(a) foi multado com uma multa {$tipo_multa->tipo}, e notificado a pagar a mesma que está no valor de {$importancia_pagar}, num período de 5 à 15 dias, a contar a partir do dia em que recebeu esta notificação. Deve proceder o levantamento da {$dtsr->nome_dtsr}. Caso não pague a multa no prazo acima estabelecido, será o auto remetido a Tribunal nos termos da alinea d) nº 1 do Artº 148 do Código de Estrada";

        // dd($proprietario->nome_completo);

        DB::beginTransaction();
            
            Multa::create([
                'importancia_pagar' => $importancia_pagar,
                'infracao_artigo' => $request->infracao_artigo,
                'documento_apreendido' => $request->documento_apreendido,
                'tipo_multa_id' => $request->tipo_de_multa,
                'agente_id' => $agente->id, //Na verdade esse seria o user_id
                'proprietario_id' => $veiculo->proprietario_id
            ]);

            $notificacao = Notificacao::create([
                'nome_notificando' => $proprietario->nome_completo,
                'anonima' => 0,
                'descricao' => $mensagem,
                'tipo_notificacao_id' => 6
            ]);

            $veiculo->notificacoes()->attach(
                $notificacao
            );

        DB::commit();

        session()->flash('success', 'Multa atribuida com sucesso');

        return back()->with('success', 'Multa atribuida com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
