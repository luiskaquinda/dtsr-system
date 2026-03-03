<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Municipio,
    Provincia,
    TipoPedido,
    ClasseVeiculo,
    Servico,
    Combustivel,
    Bilhete,
    Residencia,
    CartaConducao,
    Proprietario,
    PesoBruto,
    CaixaVeiculo,
    Veiculo,
    PedidoMatricula,
    Documento,
    TipoMulta,
    Dtsr,
    AlertaImagem
};

use Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $pedidos = PedidoMatricula::all();
        $tipoPedidos = TipoPedido::all();

        return view('admin.pedidos.index', compact('pedidos', 'tipoPedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function createAlteracaoCaracteristicasDuplicados($id, $tipoPedido) 
    {

        $veiculo = Veiculo::where('id', $id)->first();
        $pedidoCliente = PedidoMatricula::where('veiculo_id', $id)->first();

        //
        switch ($tipoPedido) {
            case "AC":
                
                $municipios = Municipio::all();
                $provincias = Provincia::all();
                $tipoPedidos = TipoPedido::all();
                $classesVeiculo = ClasseVeiculo::all();
                $servicos = Servico::all();
                $combustiveis = Combustivel::all();
                $combustiveis = Combustivel::all();
                $tipoCaixas = CaixaVeiculo::all();
                $tipos_multa = TipoMulta::all();
                $pesosBruto = PesoBruto::all();
                $documentos = Documento::where('pedido_matricula_id', $id)->get();
                $tipoPedido = 'Alteração de Características';

                $pedidoMatricula = PedidoMatricula::where('veiculo_id', $id)->first();
                $documentos = Documento::where('pedido_matricula_id', $pedidoMatricula->id)->get();
                $pedido = PedidoMatricula::where('veiculo_id', $id)->first();

                return view('admin.pedidos.partials.alteracao_caracteristicas', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis', 'veiculo', 'pedidoMatricula', 'documentos', 'pedido', 'tipoCaixas', 'pesosBruto', 'tipoPedido'));

            case "D":
                
                $municipios = Municipio::all();
                $provincias = Provincia::all();
                $tipoPedidos = TipoPedido::all();
                $classesVeiculo = ClasseVeiculo::all();
                $servicos = Servico::all();
                $combustiveis = Combustivel::all();
                $combustiveis = Combustivel::all();
                $tipoCaixas = CaixaVeiculo::all();
                $pesosBruto = PesoBruto::all();
                $documentos = Documento::where('pedido_matricula_id', $id)->get();
                $tipoPedido = 'Duplicado';

                $pedidoMatricula = PedidoMatricula::where('veiculo_id', $id)->first();
                $documentos = Documento::where('pedido_matricula_id', $pedidoMatricula->id)->get();
                $pedido = PedidoMatricula::where('veiculo_id', $id)->first();

                return view('admin.pedidos.partials.duplicado', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis', 'veiculo', 'pedido', 'tipoCaixas', 'pesosBruto', 'documentos', 'tipoPedido', 'pedidoMatricula'));
                
            default:
                dd('Algo está errado', $pedidoCliente->tipo_pedido->tipo);
        }

    }

    public function storeAlteracaoCaracteristicasDuplicados(Request $request, $id, $tipoPedido) 
    {

        $proprietario = Proprietario::where('id', $id)->first();
        $pedidoCliente = PedidoMatricula::where('veiculo_id', $id)->first();

        //
        switch ($tipoPedido) {
            case "AC":

                DB::beginTransaction();

                    // Veiculo

                    $caixa = CaixaVeiculo::create([
                        'distancia_entre_eixos' => $request->distancia_entre_eixos,
                        'altura' => $request->altura,
                        'tipo_caixa' => $request->tipo_caixa
                    ]);


                    $peso = PesoBruto::create([
                        'a_frente' => $request->a_frente,
                        'ao_meio' => $request->ao_meio,
                        'a_retaguarda' => $request->a_retaguarda
                    ]);

                    $veiculo = Veiculo::create([
                        'marca'   => $request->marca,
                        'modelo'  => $request->modelo,
                        'quadro'  => $request->quadro,
                        'motor'   => $request->motor,
                        'cor'     => $request->cor,
                        'numero_cilindros'  => $request->numero_cilindros,
                        'medidas_pneumaticas' => $request->medidas_pneumaticas,
                        'lugares' => $request->lugares,
                        'tara' => $request->tara,
                        'pais_origem' => $request->pais_origem,
                        'ano_fabrico' => $request->ano_fabrico,
                        'combustivel_id' => $request->combustivel,
                        'classe_id' => $request->classe,
                        'caixa_id' => $caixa->id,
                        'peso_id' => $peso->id,
                        'servico_id' => $request->servico,
                        'proprietario_id' => $id
                    ]);

                    // Criar uma nova instância de pedido

                    if($request->tipo_pedido == "Duplicado") {

                        $pedidoMatricula = PedidoMatricula::create([
                            'status' => '0',
                            'descricao' => 'Default',
                            'tipo_pedido_id' => 3,
                            'veiculo_id' => $veiculo->id
                        ]);

                    } else {

                        $pedidoMatricula = PedidoMatricula::create([
                            'status' => '0',
                            'descricao' => 'Default',
                            'tipo_pedido_id' => 4,
                            'veiculo_id' => $veiculo->id
                        ]);
                    }

                    // Criar uma nova instância de documentos

                    
                    if ($request->hasFile('documentos')) {
                        
                        $docNames = ['bilhete', 'modelo_o', 'compra_venda', 'recibo_pagamento'];
                    
                        foreach ($request->file('documentos') as $key => $file) {
                            // Verifique se o arquivo foi realmente enviado
                            if (!empty($file)) {
                                $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                                $userId = auth()->id();
                                $fileName = $userId.$key.'_'.$originalName. time() . '.' . $file->getClientOriginalExtension();
                                $tipoDocumento = $key; // O $key é o nome do documento (ex: 'bilhete')
                    
                                // Salve o arquivo no diretório 'documentos' público
                                $filePath = $file->storeAs('documentos', $fileName, 'public');
                    
                                // Criar um novo registro na tabela 'documentos'
                                Documento::create([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento,
                                    'pedido_matricula_id' => $pedidoMatricula->id,
                                ]);
                            }
                        }
                    } else {
                        return back()->with('error', 'O upload do arquivo falhou.');
                    }
                    
                    
                DB::commit();

                session()->flash('success', 'Pedido efectuado com sucesso');

                return back()->with('success', 'Pedido efectuado com sucesso!');

            case "D":

                DB::beginTransaction();

                    // Veiculo

                    $caixa = CaixaVeiculo::create([
                        'distancia_entre_eixos' => $request->distancia_entre_eixos,
                        'altura' => $request->altura,
                        'tipo_caixa' => $request->tipo_caixa
                    ]);


                    $peso = PesoBruto::create([
                        'a_frente' => $request->a_frente,
                        'ao_meio' => $request->ao_meio,
                        'a_retaguarda' => $request->a_retaguarda
                    ]);

                    $veiculo = Veiculo::create([
                        'marca'   => $request->marca,
                        'modelo'  => $request->modelo,
                        'quadro'  => $request->quadro,
                        'motor'   => $request->motor,
                        'cor'     => $request->cor,
                        'numero_cilindros'  => $request->numero_cilindros,
                        'medidas_pneumaticas' => $request->medidas_pneumaticas,
                        'lugares' => $request->lugares,
                        'tara' => $request->tara,
                        'pais_origem' => $request->pais_origem,
                        'ano_fabrico' => $request->ano_fabrico,
                        'combustivel_id' => $request->combustivel,
                        'classe_id' => $request->classe,
                        'caixa_id' => $caixa->id,
                        'peso_id' => $peso->id,
                        'servico_id' => $request->servico,
                        'proprietario_id' => $id
                    ]);

                    // Criar uma nova instância de pedido

                    if($request->tipo_pedido == "Duplicado") {

                        $pedidoMatricula = PedidoMatricula::create([
                            'status' => '0',
                            'descricao' => 'Default',
                            'tipo_pedido_id' => 3,
                            'veiculo_id' => $veiculo->id
                        ]);

                    } else {

                        $pedidoMatricula = PedidoMatricula::create([
                            'status' => '0',
                            'descricao' => 'Default',
                            'tipo_pedido_id' => 4,
                            'veiculo_id' => $veiculo->id
                        ]);
                    }

                    // Criar uma nova instância de documentos

                    
                    if ($request->hasFile('documentos')) {
                        
                        $docNames = ['bilhete', 'modelo_o', 'compra_venda', 'recibo_pagamento'];
                    
                        foreach ($request->file('documentos') as $key => $file) {
                            // Verifique se o arquivo foi realmente enviado
                            if (!empty($file)) {
                                $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                                $userId = auth()->id();
                                $fileName = $userId.$key.'_'.$originalName. time() . '.' . $file->getClientOriginalExtension();
                                $tipoDocumento = $key; // O $key é o nome do documento (ex: 'bilhete')
                    
                                // Salve o arquivo no diretório 'documentos' público
                                $filePath = $file->storeAs('documentos', $fileName, 'public');
                    
                                // Criar um novo registro na tabela 'documentos'
                                Documento::create([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento,
                                    'pedido_matricula_id' => $pedidoMatricula->id,
                                ]);
                            }
                        }
                    } else {
                        return back()->with('error', 'O upload do arquivo falhou.');
                    }
                    
                    
                DB::commit();

                session()->flash('success', 'Pedido efectuado com sucesso');

                return back()->with('success', 'Pedido efectuado com sucesso!');
                
            default:
                dd('Algo está errado', $pedidoCliente->tipo_pedido->tipo);
        }

    }

    public function createMatriculaEmissao($id)
    {
        $municipios = Municipio::all();
        $provincias = Provincia::all();
        $tipoPedidos = TipoPedido::all();
        $classesVeiculo = ClasseVeiculo::all();
        $servicos = Servico::all();
        $combustiveis = Combustivel::all();
        $tipo_pedido = $id;
        $tipoPedidoMatricula = TipoPedido::where('tipo', $tipo_pedido)->first();

        return view('admin.pedidos.partials.matricula_form', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis', 'tipoPedidoMatricula'));
    }

    
    public function storeMatriculaEmissao(Request $request)
    {
        $validated = $request->validate([
            'nome_completo'                => 'required|string|max:80',
            'apelido_empresa'              => 'nullable|string|max:100',
            'data_nascimento'              => 'required|date_format:m/d/Y|before:today',
            'sexo'                         => 'required|in:M,F',
            'telemovel'                    => 'required|max:10',
            'email'                        => 'required|email|max:100',
    
            'numero_bilhete'               => 'required|string|max:14',
            'data_emissao_bilhete'         => 'required|date_format:m/d/Y',
            'data_validade_bilhete'        => 'required|date_format:m/d/Y|after_or_equal:data_emissao_bilhete',
    
            'numero_carta_conducao'        => 'required|string|max:50',
            'tipo_carta_conducao'          => 'required|in:Ligeiro,Ligeiro Profissional,Pesado,Outro',
            'data_emissao_carta_conducao'  => 'required|date_format:m/d/Y',
            'data_validade_carta_conducao' => 'required|date_format:m/d/Y|after_or_equal:data_emissao_carta_conducao',
    
            'rua'                          => 'required|string|max:255',
            'bairro'                       => 'required|string|max:255',
            'municipio_id'                 => 'required|exists:municipios,id',
    
            'marca'                        => 'required|string|max:100',
            'modelo'                       => 'required|string|max:100',
            'quadro'                       => 'required|string|max:100',
            'motor'                        => 'required|string|max:100',
            'cor'                          => 'required|string|max:50',
            'numero_cilindros'             => 'required|integer|min:1',
            'medidas_pneumaticas'          => 'required|string|max:100',
            'lugares'                      => 'required|integer|min:1',
            'tara'                         => 'required|numeric',
            'pais_origem'                  => 'required|string|max:100',
            'ano_fabrico'                  => 'required|digits:4',
    
            'distancia_entre_eixos'        => 'required|numeric',
            'altura'                       => 'required|numeric',
            'tipo_caixa'                   => 'required|in:Aberta,Fechada',
    
            'combustivel'                  => 'required|numeric',
            'classe'                       => 'required|numeric',
            'servico'                      => 'required|numeric',

            'a_frente'                     => 'required|numeric',
            'ao_meio'                      => 'required|numeric',
            'a_retaguarda'                 => 'required|numeric',
    
            'documentos.bilhete'           => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'documentos.modelo_o'          => '|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'documentos.compra_venda'      => '|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'documentos.recibo_pagamento'  => '|file|mimes:jpg,jpeg,png,pdf|max:2048',

            'imagens.*'                    => 'required|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // 2) Converter datas de m/d/Y → Y-m-d

        $dataEmissaoBi = Carbon::createFromFormat('m/d/Y', $request->input('data_emissao_bilhete'))->format('Y-m-d');
                    
        $dataValidadeBi = Carbon::createFromFormat('m/d/Y', $request->input('data_validade_bilhete'))->format('Y-m-d');

        $dataEmissaoCartaConducao = Carbon::createFromFormat('m/d/Y', $request->input('data_emissao_carta_conducao'))->format('Y-m-d');
                    
        $dataValidadeCartaConducao = Carbon::createFromFormat('m/d/Y', $request->input('data_validade_carta_conducao'))->format('Y-m-d');

        $dataNascimento = Carbon::createFromFormat('m/d/Y', $request->input('data_nascimento'))->format('Y-m-d');

        // Salvar dados na BD

            switch ($request->tipo_pedido){
                case "Matricula":
                    DB::beginTransaction(); 
                        try {
                            // 1 - Bilhete
                                $bilhete = Bilhete::create([
                                    'numero_bilhete'          => $validated['numero_bilhete'],
                                    'data_emissao_bilhete' => $dataEmissaoBi,
                                    'data_validade_bilhete' => $dataValidadeBi,
                                ]);

                            // 2 - Carta de Condução
                                $carta_conducao = CartaConducao::create([
                                    'numero_carta_conducao' => $validated['numero_carta_conducao'],
                                    'tipo_carta_conducao' => $validated['tipo_carta_conducao'],
                                    'data_emissao_carta_conducao' =>$dataEmissaoCartaConducao,
                                    'data_validade_carta_conducao' =>$dataValidadeCartaConducao,
                                ]);

                            // 3 - Residência
                                $residencia = Residencia::create([
                                    'rua'           => $validated['rua'],
                                    'bairro'        => $validated['bairro'],
                                    'municipio_id'  => $validated['municipio_id'],
                                ]);

                            // 4 - Proprietário
                                $proprietario = Proprietario::create([
                                    'nome_completo'     => $validated['nome_completo'],
                                    'apelido_empresa'   => $validated['apelido_empresa'],
                                    'data_nascimento'   => $dataNascimento,
                                    'sexo'              => $validated['sexo'],
                                    'telemovel'         => $validated['telemovel'],
                                    'email'             => $validated['email'],
                                    'bilhete_id'        => $bilhete->id,
                                    'residencia_id'     => $residencia->id,
                                    'carta_conducao_id' => $carta_conducao->id,
                                    'user_id' => Auth::id()
                                ]);

                            // 5 - Caixa de Veiculo
                                $caixa = CaixaVeiculo::create([
                                    'distancia_entre_eixos' => $validated['distancia_entre_eixos'],
                                    'altura'                => $validated['altura'],
                                    'tipo_caixa'            => $validated['tipo_caixa'],
                                ]);

                            // 6 - Peso Bruto

                                $peso = PesoBruto::create([
                                    'a_frente'     => $validated['a_frente'],
                                    'ao_meio'      => $validated['ao_meio'],
                                    'a_retaguarda' => $validated['a_retaguarda'],
                                ]);

                            // 7 - Veiculo

                                $veiculo = Veiculo::create([
                                    'marca'                   => $validated['marca'],
                                    'modelo'                  => $validated['modelo'],
                                    'quadro'                  => $validated['quadro'],
                                    'motor'                   => $validated['motor'],
                                    'cor'                     => $validated['cor'],
                                    'numero_cilindros'        => $validated['numero_cilindros'],
                                    'medidas_pneumaticas'     => $validated['medidas_pneumaticas'],
                                    'lugares'                 => $validated['lugares'],
                                    'tara'                    => $validated['tara'],
                                    'pais_origem'             => $validated['pais_origem'],
                                    'matricula_id'            => null,
                                    'ano_fabrico'             => $validated['ano_fabrico'],
                                    'primeiro_registro'       => null,
                                    'combustivel_id'          => $validated['combustivel'],
                                    'classe_id'               => $validated['classe'],
                                    'caixa_id'                => $caixa->id,
                                    'peso_id'                 => $peso->id,
                                    'servico_id'              => $validated['servico'],
                                    'proprietario_id'         => $proprietario->id
                                ]);

                                //Imagens do Veiculo

                                // dd($request->file('imagens'));

                                if ($request->hasFile('imagens')) {
                                    foreach ($request->file('imagens') as $file) {
                                        $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                                        $path = $file->storeAs('alertas', $filename, 'public');
                        
                                        AlertaImagem::create([
                                            'veiculo_id' => $veiculo->id,
                                            'path' => $path
                                        ]);
                                    }
                                }
                            

                            // 8 - Pedido de Matricula

                                $pedidoMatricula = PedidoMatricula::create([
                                    'codigopedido' => PedidoMatricula::gerarCodigoPedido($veiculo->id),
                                    'status' => '0',
                                    'descricao' => 'Default',
                                    'tipo_pedido_id' => 1,
                                    'veiculo_id' => $veiculo->id
                                ]);

                            // 9 - Documentos associados ao pedido

                                if ($request->hasFile('documentos')) {
                                    foreach ($request->file('documentos') as $tipo => $file) {

                                        // gera um nome seguro
                                        $baseName   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                                        $slugName   = Str::slug($baseName, '_');
                                        $ext        = $file->getClientOriginalExtension();
                                        $timestamp  = now()->format('YmdHis');
                                        $userId     = auth()->id();
                                        $fileName   = "{$userId}_{$tipo}_{$slugName}_{$timestamp}.{$ext}";

                                        // grava no disco 'public/documentos'
                                        $path = $file->storeAs('documentos', $fileName, 'public');

                                        // persiste no banco
                                        $documentos[] = Documento::create([
                                            'url'                 => $path,
                                            'tipo_documento'      => $tipo,
                                            'pedido_matricula_id' => $pedidoMatricula->id
                                        ]);
                                    }

                                    DB::commit();

                                } else {
                                    
                                    return redirect()
                                        ->back()
                                        ->withInput()
                                        ->with('error', 'Infelizmente não conseguimos carregar os ficheiros.');
                                }

                            return redirect()->back()->with('success', 'Matricula efetuada com sucesso.');

                        } catch (\Throwable $e) {
                            DB::rollBack();
                            
                            return back()->withInput()->with('error', 'Ocorreu um erro ao processar a matricula.');

                        }
                break;
                case "Emissao":
                    DB::beginTransaction(); 
                        try {
                            // 1 - Bilhete
                                $bilhete = Bilhete::create([
                                    'numero_bilhete'          => $validated['numero_bilhete'],
                                    'data_emissao_bilhete' => $dataEmissaoBi,
                                    'data_validade_bilhete' => $dataValidadeBi,
                                ]);

                            // 2 - Carta de Condução
                                $carta_conducao = CartaConducao::create([
                                    'numero_carta_conducao' => $validated['numero_carta_conducao'],
                                    'tipo_carta_conducao' => $validated['tipo_carta_conducao'],
                                    'data_emissao_carta_conducao' =>$dataEmissaoCartaConducao,
                                    'data_validade_carta_conducao' =>$dataValidadeCartaConducao,
                                ]);

                            // 3 - Residência
                                $residencia = Residencia::create([
                                    'rua'           => $validated['rua'],
                                    'bairro'        => $validated['bairro'],
                                    'municipio_id'  => $validated['municipio_id'],
                                ]);

                            // 4 - Proprietário
                                $proprietario = Proprietario::create([
                                    'nome_completo'     => $validated['nome_completo'],
                                    'apelido_empresa'   => $validated['apelido_empresa'],
                                    'data_nascimento'   => $dataNascimento,
                                    'sexo'              => $validated['sexo'],
                                    'telemovel'         => $validated['telemovel'],
                                    'email'             => $validated['email'],
                                    'bilhete_id'        => $bilhete->id,
                                    'residencia_id'     => $residencia->id,
                                    'carta_conducao_id' => $carta_conducao->id,
                                    'user_id' => Auth::id()
                                ]);

                            // 5 - Caixa de Veiculo
                                $caixa = CaixaVeiculo::create([
                                    'distancia_entre_eixos' => $validated['distancia_entre_eixos'],
                                    'altura'                => $validated['altura'],
                                    'tipo_caixa'            => $validated['tipo_caixa'],
                                ]);

                            // 6 - Peso Bruto

                                $peso = PesoBruto::create([
                                    'a_frente'     => $validated['a_frente'],
                                    'ao_meio'      => $validated['ao_meio'],
                                    'a_retaguarda' => $validated['a_retaguarda'],
                                ]);

                            // 7 - Veiculo

                                $veiculo = Veiculo::create([
                                    'marca'                   => $validated['marca'],
                                    'modelo'                  => $validated['modelo'],
                                    'quadro'                  => $validated['quadro'],
                                    'motor'                   => $validated['motor'],
                                    'cor'                     => $validated['cor'],
                                    'numero_cilindros'        => $validated['numero_cilindros'],
                                    'medidas_pneumaticas'     => $validated['medidas_pneumaticas'],
                                    'lugares'                 => $validated['lugares'],
                                    'tara'                    => $validated['tara'],
                                    'pais_origem'             => $validated['pais_origem'],
                                    'matricula_id'            => null,
                                    'ano_fabrico'             => $validated['ano_fabrico'],
                                    'primeiro_registro'       => null,
                                    'combustivel_id'          => $validated['combustivel'],
                                    'classe_id'               => $validated['classe'],
                                    'caixa_id'                => $caixa->id,
                                    'peso_id'                 => $peso->id,
                                    'servico_id'              => $validated['servico'],
                                    'proprietario_id'         => $proprietario->id
                                ]);

                                if ($request->hasFile('imagens')) {
                                    foreach ($request->file('imagens') as $file) {
                                        $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                                        $path = $file->storeAs('alertas', $filename, 'public');
                        
                                        AlertaImagem::create([
                                            'veiculo_id' => $veiculo->id,
                                            'path' => $path
                                        ]);
                                    }
                                }
                            

                            // 8 - Pedido de Matricula

                                $pedidoMatricula = PedidoMatricula::create([
                                    'codigopedido' => PedidoMatricula::gerarCodigoPedido($veiculo->id),
                                    'status' => '0',
                                    'descricao' => 'Default',
                                    'tipo_pedido_id' => 2,
                                    'veiculo_id' => $veiculo->id
                                ]);

                            // 9 - Documentos associados ao pedido

                                
                                if ($request->hasFile('documentos')) {
                                    foreach ($request->file('documentos') as $tipo => $file) {

                                        // gera um nome seguro
                                        $baseName   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                                        $slugName   = \Str::slug($baseName, '_');
                                        $ext        = $file->getClientOriginalExtension();
                                        $timestamp  = now()->format('YmdHis');
                                        $userId     = auth()->id();
                                        $fileName   = "{$userId}_{$tipo}_{$slugName}_{$timestamp}.{$ext}";

                                        // grava no disco 'public/documentos'
                                        $path = $file->storeAs('documentos', $fileName, 'public');

                                        // persiste no banco
                                        $documentos[] = Documento::create([
                                            'url'                 => $path,
                                            'tipo_documento'      => $tipo,
                                            'pedido_matricula_id' => $pedidoMatricula->id
                                        ]);
                                    }

                                } else {

                                    return redirect()
                                        ->back()->with('error', 'Infelizmente não conseguimos carregar os ficheiros.')
                                        ->withInput();
                                }
    
                        DB::commit();

                            return redirect()->back()->with('success', 'Emissão efetuada com sucesso.');

                        } catch (\Throwable $e) {

                            DB::rollBack();
                            return back()->withInput()->with('error', 'Ocorreu um erro ao processar a emissão.');

                        }
                break;
                default:
                    return redirect()
                            ->back()
                            ->withInput()
                            ->with('error', 'Tipo de pedido inválido.');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        // dd($id);

        $pedido = PedidoMatricula::with([
            'veiculo.proprietario.user',
            'veiculo.matricula', 
            'tipo_pedido',
        ])->where('veiculo_id', $id)->get();
        
        $documentos = Documento::whereIn('pedido_matricula_id', $pedido->pluck('id'))->get();
        
        
        
        $classes = ClasseVeiculo::all();
        $combustiveis = Combustivel::all();
        $tipoCaixas = CaixaVeiculo::all();
        $provincias = Provincia::all();
        $pesosBruto = PesoBruto::all();
        $servicos = Servico::all();
        $tipos_multa = TipoMulta::all();
        $dtsrs = Dtsr::all();
        $documentos = Documento::whereIn('pedido_matricula_id', $pedido->pluck('id'))->get();

        return view('admin.pedidos.veiculo.show', compact('pedido', 'classes', 'combustiveis', 'tipoCaixas', 'pesosBruto', 'servicos', 'documentos', 'provincias', 'tipos_multa', 'dtsrs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $municipios = Municipio::all();
        $provincias = Provincia::all();
        $tipoPedidos = TipoPedido::all();
        $classesVeiculo = ClasseVeiculo::all();
        $servicos = Servico::all();
        $combustiveis = Combustivel::all();
        $tipos_caixa = CaixaVeiculo::all();

        $pedidoMatricula = PedidoMatricula::where('id', $id)->first();
        $veiculo = Veiculo::with('proprietario.carta_conducao')
        ->findOrFail($pedidoMatricula->veiculo_id);
        $documentos = Documento::where('pedido_matricula_id', $id)->get();

        return view('admin.pedidos.partials.edit', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis', 'veiculo', 'tipos_caixa', 'pedidoMatricula', 'documentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nome_completo'                => 'required|string|max:80',
            'apelido_empresa'              => 'nullable|string|max:100',
            'data_nascimento'              => 'required|date_format:m/d/Y|before:today',
            'sexo'                         => 'required|in:M,F',
            'telemovel'                    => 'required|max:10',
            'email'                        => 'required|email|max:100',
    
            'numero_bilhete'               => 'required|string|max:14',
            'data_emissao_bilhete'         => 'required|date_format:m/d/Y',
            'data_validade_bilhete'        => 'required|date_format:m/d/Y|after_or_equal:data_emissao_bilhete',
    
            'numero_carta_conducao'        => 'required|string|max:50',
            'tipo_carta_conducao'          => 'required|in:Ligeiro,Ligeiro Profissional,Pesado,Outro',
            'data_emissao_carta_conducao'  => 'required|date_format:m/d/Y',
            'data_validade_carta_conducao' => 'required|date_format:m/d/Y|after_or_equal:data_emissao_carta_conducao',
    
            'rua'                          => 'required|string|max:255',
            'bairro'                       => 'required|string|max:255',
            'municipio_id'                 => 'required|exists:municipios,id',
    
            'marca'                        => 'required|string|max:100',
            'matricula'                    => 'max:12',
            'modelo'                       => 'required|string|max:100',
            'quadro'                       => 'required|string|max:100',
            'motor'                        => 'required|string|max:100',
            'cor'                          => 'required|string|max:50',
            'numero_cilindros'             => 'required|integer|min:1',
            'medidas_pneumaticas'          => 'required|string|max:100',
            'lugares'                      => 'required|integer|min:1',
            'tara'                         => 'required|numeric',
            'pais_origem'                  => 'required|string|max:100',
            'ano_fabrico'                  => 'required|digits:4',
    
            'distancia_entre_eixos'        => 'required|numeric',
            'altura'                       => 'required|numeric',
            'tipo_caixa'                   => 'required|in:Aberta,Fechada',
    
            'combustivel'                  => 'required|numeric',
            'classe'                       => 'required|numeric',
            'servico'                      => 'required|numeric',

            'a_frente'                     => 'required|numeric',
            'ao_meio'                      => 'required|numeric',
            'a_retaguarda'                 => 'required|numeric',
    
            'documentos.bilhete'           => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
            'documentos.modelo_o'          => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
            'documentos.compra_venda'      => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
            'documentos.recibo_pagamento'  => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        //

        $pedidoMatricula = PedidoMatricula::where('id', $id)->first();
        $veiculo = Veiculo::where('id', $pedidoMatricula->veiculo->id)->first();

        $proprietario = $veiculo->proprietario;

        DB::beginTransaction();

            // Proprietário do Veículo

            $dataEmissaoBi = Carbon::createFromFormat('d/m/Y', $request->input('data_emissao_bilhete'))->format('Y-m-d');
            
            $dataValidadeBi = Carbon::createFromFormat('d/m/Y', $request->input('data_validade_bilhete'))->format('Y-m-d');

            $dataEmissaoCartaConducao = Carbon::createFromFormat('d/m/Y', $request->input('data_emissao_carta_conducao'))->format('Y-m-d');
            
            $dataValidadeCartaConducao = Carbon::createFromFormat('d/m/Y', $request->input('data_validade_carta_conducao'))->format('Y-m-d');

            $bilhete = $proprietario->bilhete;

            $bilhete->update([
                'numero_bilhete' => $validated['numero_bilhete'],
                'data_emissao_bilhete' => $dataEmissaoBi,
                'data_validade_bilhete' => $dataValidadeBi,
            ]);

            $carta_conducao = $proprietario->carta_conducao;

            $carta_conducao->update([
                'numero_carta_conducao' => $validated['numero_carta_conducao'],
                'tipo_carta_conducao' => $validated['tipo_carta_conducao'],
                'data_emissao_carta_conducao' =>$dataEmissaoCartaConducao,
                'data_validade_carta_conducao' =>$dataValidadeCartaConducao,
            ]);

            $residencia = $proprietario->residencia;

            $residencia->update([
                'rua' => $validated['rua'],
                'bairro' => $validated['bairro'],
                'municipio_id' => $validated['municipio_id'],
            ]);

            $dataNascimento = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');

            $proprietario->update([
                'nome_completo' => $validated['nome_completo'],
                'apelido_empresa' => $validated['apelido_empresa'],
                'data_nascimento' => $dataNascimento,
                'sexo' => $validated['sexo'],
                'telemovel' => $validated['telemovel'],
                'email' => $validated['email'],
                'bilhete_id' => $bilhete->id,
                'residencia_id' => $residencia->id,
                'carta_conducao_id' => $carta_conducao->id
            ]);

            // Veiculo

            $caixa_veiculo = $veiculo->caixa_veiculo;

            $caixa_veiculo->update([
                'distancia_entre_eixos' => $validated['distancia_entre_eixos'],
                'altura' => $validated['altura'],
                'tipo_caixa' => $validated['tipo_caixa']
            ]);

            $pesos_bruto = $veiculo->pesos_bruto;

            $pesos_bruto->update([
                'a_frente' => $validated['a_frente'],
                'ao_meio' => $validated['ao_meio'],
                'a_retaguarda' => $validated['a_retaguarda']
            ]);

            $primeiroRegistro = Carbon::createFromFormat('d/m/Y', $request->input('primeiro_registro'))->format('Y-m-d');

            $veiculo->update([
                'marca'   => $validated['marca'],
                'modelo'  => $validated['modelo'],
                'quadro'  => $validated['quadro'],
                'motor'   => $validated['motor'],
                'cor'     => $validated['cor'],
                'numero_cilindros'  => $validated['numero_cilindros'],
                'medidas_pneumaticas' => $validated['medidas_pneumaticas'],
                'lugares' => $validated['lugares'],
                'tara' => $validated['tara'],
                'pais_origem' => $validated['pais_origem'],
                'matricula' => $this->isValidMatricula($validated['matricula']) ? $validated['matricula'] : null,
                'ano_fabrico' => $validated['ano_fabrico'],
                'primeiro_registro' => $primeiroRegistro,
                'combustivel_id' => $validated['combustivel'],
                'classe_id' => $validated['classe'],
                'caixa_id' => $caixa_veiculo->id,
                'peso_id' => $pesos_bruto->id,
                'servico_id' => $request->servico,
                'proprietario_id' => $proprietario->id
            ]);

            $pedidoMatricula = $veiculo->pedido_matricula;

            if($request->tipo_pedido == "Matricula") {

                $pedidoMatricula->update([
                    'status' => '0',
                    'descricao' => 'Default',
                    'tipo_pedido_id' => 1,
                    'veiculo_id' => $veiculo->id
                ]);

            } else if($request->tipo_pedido == "Emissao") {
                
                $pedidoMatricula->update([
                    'status' => '0',
                    'descricao' => 'Default',
                    'tipo_pedido_id' => 2,
                    'veiculo_id' => $veiculo->id
                ]);

            } else if($request->tipo_pedido == "Duplicado") {
                $pedidoMatricula->update([
                    'status' => '0',
                    'descricao' => 'Default',
                    'tipo_pedido_id' => 3,
                    'veiculo_id' => $veiculo->id
                ]);
            } else if($request->tipo_pedido == "Alteração de Características") {
                $pedidoMatricula->update([
                    'status' => '0',
                    'descricao' => 'Default',
                    'tipo_pedido_id' => 4,
                    'veiculo_id' => $veiculo->id
                ]);
            }

            // Imagens
            // dd($request->filled('remover_imagens'), $request->hasFile('imagens'));

            // 1) Remove imagens marcadas para remoção
            if ($request->filled('remover_imagens')) {
                foreach ($request->remover_imagens as $imgId) {
                    $img = AlertaImagem::find($imgId);
                    if ($img) {
                        // guarda path, deleta do DB e do disco
                        $path = $img->path;
                        $img->delete();
                        if ($path) Storage::disk('public')->delete($path);
                    }
                }
            }
    
            // 2) Processa novas imagens secundárias (imagens[])
            if ($request->hasFile('imagens')) {
                foreach ($request->file('imagens') as $file) {
                    $path = $file->store('alertas', 'public');
                    $veiculo->imagens()->create([
                        'path' => $path
                    ]);
                }
            }

            // 9 - Documentos associados ao pedido

                                
            if ($request->hasFile('documentos')) {
                foreach ($request->file('documentos') as $tipo => $file) {

                    // gera um nome seguro
                    $baseName   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $slugName   = Str::slug($baseName, '_');
                    $ext        = $file->getClientOriginalExtension();
                    $timestamp  = now()->format('YmdHis');
                    $userId     = auth()->id();
                    $fileName   = "{$userId}_{$tipo}_{$slugName}_{$timestamp}.{$ext}";

                    // grava no disco 'public/documentos'
                    $path = $file->storeAs('documentos', $fileName, 'public');

                    // persiste no banco
                    $documentos[] = Documento::updateOrCreate([
                        'url'                 => $path,
                        'tipo_documento'      => $tipo,
                        'pedido_matricula_id' => $pedidoMatricula->id
                    ]);
                }

            }
            
        DB::commit();

        return redirect()
        ->back()->with('success', 'Pedido editado com sucesso!')->withInput();
    }

    // Atribuir Matricula

    public function atribuirMatricula(Request $request, string $id) {

        $provincias = array(
            'BGO' => 'Bengo',
            'BIE' => 'Bié',
            'BLA' => 'Benguela',
            'CCU' => 'Cuando Cubango',
            'CDA' => 'Cabinda',
            'CNE' => 'Cunene',
            'CNO' => 'Cuanza-Norte',
            'CSU' => 'Cuanza-Sul',
            'HBO' => 'Huambo',
            'HLA' => 'Huíla',
            'LDA' => 'Luanda',
            'LNO' => 'Lunda-Norte',
            'LSU' => 'Lunda-Sul',
            'LTO' => 'Lobito',
            'MCO' => 'Moxico',
            'MJE' => 'Malanje',
            'NBE' => 'Namibe',
            'UGE' => 'Uíge',
            'ZRE' => 'Zaire'
        );
        
        $position = array_search($request->provincia, $provincias);

        dd($request, $id, $provincias, $position);
    }

    private function isValidMatricula(?string $value): bool
    {
        if (!$value) {
            return false;
        }

        // Normaliza: uppercase e remove espaços extras
        $plate = strtoupper(trim($value));
        $plate = preg_replace('/\s+/', '', $plate);

        // Padrões aceitos
        $patterns = [
            // 3 letras - 2 dígitos - 2 dígitos - 2 letras  (ex: LDA-28-62-RP ou LDA2862RP)
            '/^[A-Z]{3}-?\d{2}-?\d{2}-?[A-Z]{2}$/',

            // 2 letras - 2 dígitos - 2 dígitos - 2 letras  (ex: LD-28-62-RP ou LD2862RP)
            '/^[A-Z]{2}-?\d{2}-?\d{2}-?[A-Z]{2}$/',

            // Formato curto/antigo (ex: A1-00-00)
            '/^[A-Z]\d-?\d{2}-?\d{2}$/'
        ];

        foreach ($patterns as $regex) {
            if (preg_match($regex, $plate)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $pedido = PedidoMatricula::where('id', $id)->first();
        $veiculo = Veiculo::where('id', $pedido->veiculo_id)->first();
        
        DB::beginTransaction();
            $veiculo->pesos_bruto->delete();
            $veiculo->caixa_veiculo->delete();
            $veiculo->delete();
            $pedido->delete();
        DB::commit();

        return redirect()->route('pedido.index');

    }
}
