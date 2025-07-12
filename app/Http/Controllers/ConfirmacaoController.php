<?php

namespace App\Http\Controllers;

use App\Models\{
    Confirmacao,
    Alerta
};
use Illuminate\Http\Request;
use Auth;
use DB;

use Illuminate\Database\QueryException;

class ConfirmacaoController extends Controller
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
    public function store($id)
    {
        //

        $user = Auth::user();
        $alertaId = $id;

        try {
        
            // Evita duplicatas
            Confirmacao::firstOrCreate([
                'user_id'  => $user->id,
                'alerta_id'=> $alertaId,
            ]);

            return redirect()
                ->route('notificacao.alertas.index')
                ->with('success', 'Alerta confirmado com sucesso!');  

        } catch (QueryException $e) {
            // 4) Falha no DB → log e retorna com erro
            \Log::error('Erro ao salvar Alerta: '.$e->getMessage());
    
            return redirect()
                ->route('notificacao.alertas.index')
                ->with('error', 'Desculpe, ocorreu um erro ao salvar a tua confirmação. Tente novamente!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Confirmacao $confirmacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Confirmacao $confirmacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Confirmacao $confirmacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();
        $confirmacao = Confirmacao::where('user_id', $user->id)->where('alerta_id', $id)->first();
        
        DB::beginTransaction();
            $confirmacao->delete();
        DB::commit();

        return redirect()
        ->route('notificacao.alertas.index')
        ->with('success', 'Alerta desconfirmado com sucesso!');
    }
}
