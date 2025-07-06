<?php

namespace App\Http\Controllers;

use App\Models\{
    Alerta,
    TipoNotificacao
};
use Illuminate\Http\Request;
use Str;
use Auth;
use Illuminate\Database\QueryException;

class AlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $alertas = Alerta::orderBy('created_at', 'desc')
        ->paginate(3);
        $tipos_notificacao = TipoNotificacao::all();

        return view('notificoes.furtos_acidentes_roubos.index', compact('alertas', 'tipos_notificacao'));
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
        $data = $request->all();

        $data = $request->validate([
            'anonimo'           => 'nullable|boolean',
            'nome_denuciante'   => 'nullable|string|max:100',
            'titulo'            => 'required|string|max:255',
            'data_ocorrido'     => 'required|date|date_format:Y-m-d',
            'tipo_alerta'       => 'required|in:1,2,3,4,6',
            'descricao'         => 'required|string',
            'imagem'            => 'nullable|image|max:2048',
        ]);

        try {

            $filename = Str::slug(pathinfo($request->file('imagem')->getClientOriginalName(), PATHINFO_FILENAME))
              . '-' . time()
              . '.' . $request->file('imagem')->extension();

            $path = $request->file('imagem')
                        ->storeAs('alertas', $filename, 'public');
        
            // salvar no banco
            Alerta::create([
                'anonima'           => $request->boolean('anonima') ?? 0,
                'titulo'            => $data['titulo'],
                'data_ocorrido'     => $data['data_ocorrido'],
                'codigoalerta'      => Alerta::gerarCodigoAlerta(),
                'nome_denuciante'   => (($data['nome_denuciante'] !== "") || ($data['nome_denuciante'] !== null)) ? $data['nome_denuciante'] : null,

                'descricao'         => $data['descricao'],
                'imagem'            => $path,

                'tipo_alerta_id'    => $data['tipo_alerta'],
                'user_id'           => Auth::id() ?? null,
            ]);
        
            return redirect()
                ->route('notificacao.alertas.index')
                ->with('success', 'Alerta criado com sucesso!');  

        } catch (QueryException $e) {
            // 4) Falha no DB → log e retorna com erro
            \Log::error('Erro ao salvar Alerta: '.$e->getMessage());
    
            return redirect()
                ->route('notificacao.alertas.index')
                ->with('error', 'Desculpe, ocorreu um erro ao salvar o alerta. Tente novamente mais tarde.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alerta $alerta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alerta $alerta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alerta $alerta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alerta $alerta)
    {
        //
    }
}
