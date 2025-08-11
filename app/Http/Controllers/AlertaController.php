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
use DB;
use Storage;
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
        $tipos_notificacao = TipoNotificacao::all();
        $municipios = Municipio::all();
        $alertasTodos = Alerta::all()->count();

        // Carrega todos os alertas + relacionamento de quem confirmou
        $alertas = Alerta::with(['usuariosQueConfirmaram', 'tipos_notificacoes'])
            ->latest()
            ->paginate(3)
            ->take(3);

        // Alertas por municipios

        $alertasPorMunicipio =  Alerta::select('municipio_id', DB::raw('COUNT(*) AS total_alertas'))
        ->with('municipio:id,nome_municipio')// já traz apenas id e nome do município
        ->groupBy('municipio_id')
        ->orderBy('total_alertas', 'desc')
        ->get()
        ->map(function($row) {
            return [
                'municipio'      => $row->municipio->nome_municipio,
                'total_alertas'  => $row->total_alertas,
            ];
        });

        // Alertas por status

        $alertasPorStatus = Alerta::select('status', DB::raw('COUNT(*) AS total_alertas'))
            ->groupBy('status')
            ->orderBy('total_alertas', 'desc')
            ->get();

        return view('notificoes.furtos_acidentes_roubos.index', compact('alertas', 'tipos_notificacao', 'municipios', 'user', 'alertasPorMunicipio', 'alertasPorStatus', 'alertasTodos'));
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
                'status'            => 'aberto'
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
    public function edit($id)
    {
        //
        $alerta = Alerta::findOrFail($id);
        $tipos_notificacao = TipoNotificacao::all();
        $municipios = Municipio::all();
        $alertasTodos = Alerta::all()->count();

        $alertasPorMunicipio =  Alerta::select('municipio_id', DB::raw('COUNT(*) AS total_alertas'))
        ->with('municipio:id,nome_municipio')// já traz apenas id e nome do município
        ->groupBy('municipio_id')
        ->orderBy('total_alertas', 'desc')
        ->get()
        ->map(function($row) {
            return [
                'municipio'      => $row->municipio->nome_municipio,
                'total_alertas'  => $row->total_alertas,
            ];
        });

        // Alertas por status

        $alertasPorStatus = Alerta::select('status', DB::raw('COUNT(*) AS total_alertas'))
            ->groupBy('status')
            ->orderBy('total_alertas', 'desc')
            ->get();
        
        return view('notificoes.furtos_acidentes_roubos.edit', compact('municipios', 'tipos_notificacao', 'alertasPorMunicipio', 'alertasPorStatus', 'alertasTodos', 'alerta'));
    }

    public function alertaportipo($id) {
        $user = auth()->user();
        $tipos_notificacao = TipoNotificacao::all();
        $municipios = Municipio::all();
        $alertasTodos = Alerta::all()->count();

        // Alertas por municipios

        $alertasPorMunicipio =  Alerta::select('municipio_id', DB::raw('COUNT(*) AS total_alertas'))
        ->with('municipio:id,nome_municipio')// já traz apenas id e nome do município
        ->groupBy('municipio_id')
        ->orderBy('total_alertas', 'desc')
        ->get()
        ->map(function($row) {
            return [
                'municipio'      => $row->municipio->nome_municipio,
                'total_alertas'  => $row->total_alertas,
            ];
        });

        // Alertas por status

        $alertasPorStatus = Alerta::select('status', DB::raw('COUNT(*) AS total_alertas'))
            ->groupBy('status')
            ->orderBy('total_alertas', 'desc')
            ->get();
        
        $alertas = Alerta::with('usuariosQueConfirmaram', 'tipos_notificacoes', 'municipio')
                     ->where('tipo_alerta_id', $id)
                     ->orderBy('created_at', 'desc')
                     ->paginate(3);

        $tipoAtual = TipoNotificacao::findOrFail($id);

        return view(
            'notificoes.furtos_acidentes_roubos.alertascategoria',
            compact('alertas', 'tipos_notificacao', 'tipoAtual', 'municipios', 'user', 'alertasPorMunicipio', 'alertasPorStatus', 'alertasTodos')
        );
    }


    public function list($id) {
        $alertas = Alerta::all()
                 ->where('user_id', $id);

        //
        $user = auth()->user();
        $tipos_notificacao = TipoNotificacao::all();
        $municipios = Municipio::all();

        $tipos_alerta = TipoNotificacao::all();
        $municipios = Municipio::all();

        return view('notificoes.furtos_acidentes_roubos.list', compact('alertas', 'tipos_alerta', 'municipios', 'tipos_notificacao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $userId = auth()->id();
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

        $alerta = Alerta::findOrFail($id);

        try {

            
            // 2) Prepare o caminho da imagem: mantém o antigo por default
            $path = $alerta->imagem;

            // 3) Se veio arquivo novo, remove o antigo e armazena o novo
            if ($request->hasFile('imagem')) {
                // apaga antigo
                if ($path && Storage::exists("public/{$path}")) {
                    Storage::delete("public/{$path}");
                }
                // guarda o novo e atualiza $path
                $path = $request->file('imagem')->store('alertas', 'public');
            }
            
            $alerta->update([
                'anonima'           => $request->boolean('anonima') ?? 0,
                'titulo'            => $data['titulo'],
                'data_ocorrido'     => $data['data_ocorrido'],
                'hora_ocorrido'     => $data['hora_ocorrido'],
                'nome_denuciante'   => (($data['nome_denuciante'] !== "") || ($data['nome_denuciante'] !== null)) ? $data['nome_denuciante'] : null,

                'descricao'         => $data['descricao'],
                'imagem'            => $path,

                'municipio_id'      => $data['municipio_id'],
                'tipo_alerta_id'    => $data['tipo_alerta'],
                'user_id'           => Auth::id() ?? null,
            ]);
        
            return redirect()
                ->route('alertas.list', $userId)
                ->with('success', 'Alerta editado com sucesso!');  

        } catch (QueryException $e) {
            // 4) Falha no DB → log e retorna com erro
            \Log::error('Erro ao salvar Alerta: '.$e->getMessage());
    
            // return redirect()
            //     ->intended()
            //     ->with('error', 'Desculpe, ocorreu um erro ao editar o alerta. Tente novamente!');
            return redirect()
                ->back()
                ->with('error', 'Falha ao atualizar: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function fechar(Request $request, $id) {

        $alerta = Alerta::findOrFail($id);
        $userId = auth()->id();

        try {

            $alerta->update([
                'status' => 'fechado'
            ]);
        
            return redirect()
                ->route('alertas.list', $userId)
                ->with('success', 'Alerta editado com sucesso!');  

        } catch (QueryException $e) {
            // 4) Falha no DB → log e retorna com erro
            \Log::error('Erro ao actualizar Alerta: '.$e->getMessage());
    
            // return redirect()
            //     ->intended()
            //     ->with('error', 'Desculpe, ocorreu um erro ao editar o alerta. Tente novamente!');
            return redirect()
                ->back()
                ->with('error', 'Falha ao atualizar status: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function abrir(Request $request, $id) {

        $alerta = Alerta::findOrFail($id);
        $userId = auth()->id();

        try {

            $alerta->update([
                'status' => 'aberto'
            ]);
        
            return redirect()
                ->route('alertas.list', $userId)
                ->with('success', 'Alerta editado com sucesso!');  

        } catch (QueryException $e) {
            // 4) Falha no DB → log e retorna com erro
            \Log::error('Erro ao actualizar Alerta: '.$e->getMessage());
    
            // return redirect()
            //     ->intended()
            //     ->with('error', 'Desculpe, ocorreu um erro ao editar o alerta. Tente novamente!');
            return redirect()
                ->back()
                ->with('error', 'Falha ao atualizar status: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alerta = Alerta::findOrFail($id);

        // 2) Se tiver imagem armazenada, remove do disco
        if ($alerta->imagem && Storage::exists("public/{$alerta->imagem}")) {
            Storage::delete("public/{$alerta->imagem}");
        }
    
        // 3) Apaga o registro
        $alerta->delete();
    
        // 4) Redireciona de volta para lista com mensagem de sucesso
        return redirect()
            ->route('alertas.list', auth()->id())
            ->with('success', 'Alerta removido com sucesso!');
    }
}
