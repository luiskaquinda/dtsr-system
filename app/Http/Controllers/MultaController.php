<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\InfobipSmsService;

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
    protected InfobipSmsService $smsService;

    public function __construct(InfobipSmsService $smsService)
    {
        $this->smsService = $smsService;
    }


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
    // public function store(Request $request, string $id, string $user_id)
    // {
    //     //
    //     $pedido = PedidoMatricula::findOrFail( $id);
    //     $agente = Agente::where('user_id', $user_id)->first();
    //     $dtsr = Dtsr::findOrFail($agente->dtsr_id);
    //     $veiculo = Veiculo::findOrFail($pedido->veiculo_id);
    //     $proprietario = Proprietario::findOrFail($veiculo->proprietario_id);
    //     $tipo_multa = TipoMulta::findOrFail($request->tipo_de_multa);        
    //     $importancia_pagar = $request->ucf * 88;


    //     $mensagem = "Caro sr(a) {$proprietario->nome_completo}, o(a) sr(a) foi multado com uma multa {$tipo_multa->tipo}, e notificado a pagar a mesma que está no valor de {$importancia_pagar}, num período de 5 à 15 dias, a contar a partir do dia em que recebeu esta notificação. Deve proceder o levantamento da {$dtsr->nome_dtsr}. Caso não pague a multa no prazo acima estabelecido, será o auto remetido a Tribunal nos termos da alinea d) nº 1 do Artº 148 do Código de Estrada";

    //     // dd($proprietario->nome_completo);

    //     DB::beginTransaction();
            
    //         $multa = Multa::create([
    //             'codigomulta' => Multa::gerarCodigoMulta(),
    //             'importancia_pagar' => $importancia_pagar,
    //             'infracao_artigo' => $request->infracao_artigo,
    //             'descricao' => $mensagem,
    //             'documento_apreendido' => $request->documento_apreendido,
    //             'tipo_multa_id' => $request->tipo_de_multa,
    //             'agente_id' => $agente->id, //Na verdade esse seria o user_id
    //             'proprietario_id' => $veiculo->proprietario_id,
    //             'veiculo_id' => $veiculo->id
    //         ]);

    //     DB::commit();

    //     return redirect()
    //         ->route('pedido.show', $pedido->id)
    //         ->with('success', 'Multa atribuída com sucesso.');
            
    // }

    public function store(Request $request, string $id, string $user_id)
    {
        $pedido = PedidoMatricula::findOrFail($id);
        $agente = Agente::where('user_id', $user_id)->firstOrFail();
        $dtsr = Dtsr::findOrFail($agente->dtsr_id);
        $veiculo = Veiculo::findOrFail($pedido->veiculo_id);
        $proprietario = Proprietario::findOrFail($veiculo->proprietario_id);
        $tipo_multa = TipoMulta::findOrFail($request->tipo_de_multa);
        $importancia_pagar = $request->ucf * 88;

        $mensagem = "Caro sr(a) {$proprietario->nome_completo}, o(a) sr(a) foi multado com uma multa {$tipo_multa->tipo}, e notificado a pagar a mesma que está no valor de {$importancia_pagar}, num período de 5 à 15 dias, a contar a partir do dia em que recebeu esta notificação. Deve proceder o levantamento da {$dtsr->nome_dtsr}. Caso não pague a multa no prazo acima estabelecido, será o auto remetido a Tribunal nos termos da alinea d) nº 1 do Artº 148 do Código de Estrada";

        DB::beginTransaction();

            try {
                $multa = Multa::create([
                    'codigomulta' => Multa::gerarCodigoMulta(),
                    'importancia_pagar' => $importancia_pagar,
                    'infracao_artigo' => $request->infracao_artigo,
                    'descricao' => $mensagem,
                    'documento_apreendido' => $request->documento_apreendido,
                    'tipo_multa_id' => $request->tipo_de_multa,
                    'agente_id' => $agente->id,
                    'proprietario_id' => $veiculo->proprietario_id,
                    'veiculo_id' => $veiculo->id
                ]);

                DB::commit();
                
            } catch (\Throwable $e) {
                DB::rollBack();
                Log::error('Erro ao criar Multa: '.$e->getMessage(), ['exception' => $e]);
                return redirect()->back()->with('error', 'Erro ao atribuir a multa.');
            }

        // --- Notificar por SMS (não fazemos rollback se falhar o envio) ---
        $telefone = $veiculo->proprietario->telemovel ?? null; // adapta se o campo tiver outro nome

        // dd($telefone);

        if ($telefone && $this->smsService->isValidAngolanNumber($telefone)) {
            $smsResult = $this->smsService->sendSms($telefone, $mensagem);

            if (! $smsResult['success']) {
                Log::warning('Falha no envio do SMS do Multa', [
                    'multa_id' => $multa->id,
                    'telefone' => $telefone,
                    'error' => $smsResult['error'] ?? null
                ]);
                // opcional: flash message para informar que multa foi criada mas SMS falhou
                return redirect()
                    ->route('pedido.show', $pedido->id)
                    ->with('warning', 'Multa atribuída, mas falha ao enviar notificação SMS.');
            }

            // sucesso no envio do SMS
            return redirect()
                ->route('pedido.show', $pedido->id)
                ->with('success', 'Multa atribuída e notificação SMS enviada.');
        }

        // telefone inválido ou inexistente
        Log::info('Telefone inválido ou ausente para envio de SMS', [
            'multa_id' => $multa->id,
            'telefone' => $telefone
        ]);

        return redirect()
            ->route('pedido.show', $pedido->id)
            ->with('success', 'Multa atribuída com sucesso. Telefone do proprietário inválido/ausente para SMS.');
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
