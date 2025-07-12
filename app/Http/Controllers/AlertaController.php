<?php

namespace App\Http\Controllers;

use App\Models\{
    Alerta,
    TipoNotificacao,
    Municipio
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
        $user = auth()->user();

        // Carrega todos os alertas + relacionamento de quem confirmou
        $alertas = Alerta::with(['usuariosQueConfirmaram', 'tipos_notificacoes'])
                        ->latest()
                        ->paginate(3);

        $tipos_notificacao = TipoNotificacao::all();
        $municipios = Municipio::all();

        return view('notificoes.furtos_acidentes_roubos.index', compact('alertas', 'tipos_notificacao', 'municipios', 'user'));
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
            'municipio_id'      => 'required|string|max:100',
            'data_ocorrido'     => 'required|date|date_format:Y-m-d',
            'hora_ocorrido'     => 'required|date_format:H:i',
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
                'hora_ocorrido'     => $data['hora_ocorrido'],
                'codigoalerta'      => Alerta::gerarCodigoAlerta(),
                'nome_denuciante'   => (($data['nome_denuciante'] !== "") || ($data['nome_denuciante'] !== null)) ? $data['nome_denuciante'] : null,

                'descricao'         => $data['descricao'],
                'imagem'            => $path,

                'municipio_id'      => $data['municipio_id'],
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
                ->with('error', 'Desculpe, ocorreu um erro ao salvar o alerta. Tente novamente!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $alerta = Alerta::where('id', $id)->first();
        $alertas = Alerta::all();
        $tipos_notificacao = TipoNotificacao::all();
        $municipios = Municipio::all();

        return view('notificoes.furtos_acidentes_roubos.details', compact('alerta', 'alertas', 'municipios', 'tipos_notificacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alerta $alerta)
    {
        //
    }

    public function alertaportipo($id) {
        $tipos_notificacao = TipoNotificacao::all();
        $municipios = Municipio::all();

        $user = auth()->user();
        
        $alertas = Alerta::with('usuariosQueConfirmaram', 'tipos_notificacoes', 'municipio')
                     ->where('tipo_alerta_id', $id)
                     ->orderBy('created_at', 'desc')
                     ->paginate(3);

        $tipoAtual = TipoNotificacao::findOrFail($id);

        // dd( $alertas->tipo_notificac->tipo );

        return view(
            'notificoes.furtos_acidentes_roubos.alertascategoria',
            compact('alertas', 'tipos_notificacao', 'tipoAtual', 'municipios', 'user')
        );
    }


    public function list($id) {
        $alertas = Alerta::all()
                 ->where('user_id', $id);

        $tipos_alerta = TipoNotificacao::all();

        return view('notificoes.furtos_acidentes_roubos.list', compact('alertas', 'tipos_alerta'));
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
