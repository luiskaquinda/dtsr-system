<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    User,
    Proprietario,
    Veiculo,
    Notificacao,
    TipoNotificacao
};

class NotificacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(string $id)
    {
        //

        $notificacoes = $this->obterNotificacoesDoUsuario($id);

        $tipos_notificacao = TipoNotificacao::all();

        // dd($proprietario, $id, $notificacoes);

        return view('notificoes.index', compact('notificacoes', 'tipos_notificacao'));
    }

    public function alertas() {
        
        return view('notificoes.furtos_acidentes_roubos.index');
    }

    public function obterNotificacoesParaOUsuario($id) {

        $notificacoes = Notificacao::whereHas('veiculos', function ($query) use ($id) {
            $query->whereHas('proprietario', function ($query) use ($id) {
                $query->where('user_id', $id);
            });
        })->get();
    
        return $notificacoes;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $user = User::findOrFail($id);
        $proprietario = Proprietario::findOrFail($user->id);
        $veiculos = Veiculo::where('proprietario_id', $proprietario->id)->get();

        // dd($veiculos);

        // Criar um array para armazenar os IDs das notificações para cada veículo
        $notificacoesPorVeiculo = [];

        foreach ($veiculos as $veiculo) {    
            $notificacoesIds = $veiculo->notificacoes;
            
            $notificacoesPorVeiculo[$veiculo->id] = $notificacoesIds;
        }

        dd($notificacoesPorVeiculo);

        return view('notificoes.show');
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
