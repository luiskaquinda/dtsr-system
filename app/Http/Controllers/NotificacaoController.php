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

    public function obterNotificacoesDoUsuario($id) {
        // Obtenha o usuário com suas notificações de veículos
        // $notificacoes = User::where('id', $id)
        //     ->with('proprietario.veiculo.notificacoes')
        //     ->get()
        //     ->pluck('proprietario.veiculo.*.notificacoes')
        //     ->flatten();

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

        // Criar um array para armazenar os IDs das notificações para cada veículo
        $notificacoesPorVeiculo = [];

        foreach ($veiculos as $veiculo) {    
            $notificacoesIds = $veiculo->notificacoes;
            
            $notificacoesPorVeiculo[$veiculo->id] = $notificacoesIds;
        }

        // dd($notificacoesPorVeiculo, $veiculos, $user->proprietario->veiculo);


        // $user = User::findOrFail($id);
        // $propietario = Proprietario::findOrFail($user->id);
        // $veiculos = Veiculo::where('propietario_id', $propietario->id)->get();
        // $notificacoes = Notificacao::all();

        // foreach($veiculos as $veiculo) {
        //     $idVeiculo = $veiculo->id;
        //     foreach($notificacoes as $notificacao) {

        //     }
        // }

        // $user = User::find($id);
        // $proprietario = $user->proprietario;

        // // Passo 2: Recuperar os veículos do proprietário
        // $veiculos = $proprietario->veiculos;

        // // Passo 3: Buscar o veículo que tem a notificação
        // $veiculoComNotificacao = $veiculos->filter(function($veiculo) {
        //     return $veiculo->notificacoes->isNotEmpty();  // Verifica se o veículo tem notificações
        // })->first();

        // dd($veiculoComNotificacao);

        // // Busca as notificações do usuário via relacionamentos
        // $notificacoes = $user->proprietario()
        //     ->with('veiculos.notificacoes') // Carrega notificações relacionadas a veículos
        //     ->get()
        //     ->pluck('veiculos') // Obtém a coleção de veículos
        //     ->flatten()
        //     ->pluck('notificacoes') // Obtém as notificações dos veículos
        //     ->flatten();

        // Conta as notificações
        // $quantidadeNotificacoes = $notificacoes->count();

        // dd($notificacoes, $quantidadeNotificacoes);

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
