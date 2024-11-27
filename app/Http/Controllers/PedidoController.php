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
    Documento
};

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

        //
        switch ($id) {
            case "E":
                
                $municipios = Municipio::all();
                $provincias = Provincia::all();
                $tipoPedidos = TipoPedido::all();
                $classesVeiculo = ClasseVeiculo::all();
                $servicos = Servico::all();
                $combustiveis = Combustivel::all();
                $tipoPedidoMatricula = TipoPedido::where('tipo', 'Emissao')->first();

                return view('admin.pedidos.partials.emissao', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis', 'tipoPedidoMatricula'));

            case "M":
                
                $municipios = Municipio::all();
                $provincias = Provincia::all();
                $tipoPedidos = TipoPedido::all();
                $classesVeiculo = ClasseVeiculo::all();
                $servicos = Servico::all();
                $combustiveis = Combustivel::all();
                $tipoPedidoMatricula = TipoPedido::where('tipo', 'Matricula')->first();

                return view('admin.pedidos.partials.matricula_form', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis', 'tipoPedidoMatricula'));
                
            default:
                session()->flash('error', 'Infelizmente o seu pedido não pode ser satisfeito!');
        }
    }

    
    public function storeMatriculaEmissao(Request $request)
    {
            
        // $pedidoCliente = TipoPedido::where('id', $id)->first();

        //
        switch ($request->tipo_pedido) {
            case "Matricula":
                
                DB::beginTransaction();

                    // Proprietário do Veículo

                    $dataEmissaoBi = Carbon::createFromFormat('d/m/Y', $request->input('data_emissao_bilhete'))->format('Y-m-d');
                    
                    $dataValidadeBi = Carbon::createFromFormat('d/m/Y', $request->input('data_validade_bilhete'))->format('Y-m-d');

                    $bilhete = Bilhete::create([
                        'numero_bilhete' => $request->numero_bilhete,
                        'data_emissao_bilhete' => $dataEmissaoBi,
                        'data_validade_bilhete' => $dataValidadeBi,
                    ]);

                    $dataEmissaoCartaConducao = Carbon::createFromFormat('d/m/Y', $request->input('data_emissao_carta_conducao'))->format('Y-m-d');
                    
                    $dataValidadeCartaConducao = Carbon::createFromFormat('d/m/Y', $request->input('data_validade_carta_conducao'))->format('Y-m-d');

                    $carta_conducao = CartaConducao::create([
                        'numero_carta_conducao' => $request->numero_carta_conducao,
                        'data_emissao_carta_conducao' =>$dataEmissaoCartaConducao,
                        'data_validade_carta_conducao' =>$dataValidadeCartaConducao,
                    ]);

                    $residencia = Residencia::create([
                        'rua' => $request->rua,
                        'bairro' => $request->bairro,
                        'municipio_id' => $request->municipio_id,
                    ]);

                    $dataNascimento = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');

                    $proprietario = Proprietario::create([
                        'nome_completo' => $request->nome_completo,
                        'apelido_empresa' => $request->apelido_empresa,
                        'data_nascimento' => $dataNascimento,
                        'sexo' => $request->sexo,
                        'telemovel' => $request->telemovel,
                        'email' => $request->email,
                        'bilhete_id' => $bilhete->id,
                        'residencia_id' => $residencia->id,
                        'carta_conducao_id' => $carta_conducao->id,
                        'user_id' => Auth::id()
                    ]);

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
                        'matricula_id' => $request->matricula,
                        'ano_fabrico' => $request->ano_fabrico,
                        'primeiro_registro' => null,
                        'combustivel_id' => $request->combustivel,
                        'classe_id' => $request->classe,
                        'caixa_id' => $caixa->id,
                        'peso_id' => $peso->id,
                        'servico_id' => $request->servico,
                        'proprietario_id' => $proprietario->id
                    ]);

                    if($request->tipo_pedido == "Matricula") {

                        $pedidoMatricula = PedidoMatricula::create([
                            'status' => '0',
                            'descricao' => 'Default',
                            'tipo_pedido_id' => 1,
                            'veiculo_id' => $veiculo->id
                        ]);

                    } else {
                        $pedidoMatricula = PedidoMatricula::create([
                            'status' => '0',
                            'descricao' => 'Default',
                            'tipo_pedido_id' => 2,
                            'veiculo_id' => $veiculo->id
                        ]);
                    }

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
                    
                
                    // if ($request->hasFile('documentos')) {

                    //     $cont = 0;
                    //     foreach ($request->file('documentos') as $key => $file) {

                    //         $docNames = ['bilhete', 'modelo_o', 'compra_venda', 'recibo_pagamento'];

                    //         if(($key == $docNames[$cont]) && (!empty($file))) {
                                
                    //             $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                    //             $userId = auth()->id();
                    //             $fileName = $userId.$docNames[$cont].'_'.$originalName. time() . '.' . $file->getClientOriginalExtension();
                    //             $tipoDocumento = $docNames[$cont];

                    //             $cont++;
                    //         } else {
                                
                    //             $cont++;
                    //             continue;
                    //         }

                    //         if (!empty($fileName)) {
                    //             $filePath = $file->storeAs('documentos', $fileName, 'public');
                    //         }
                
                    //         // Criar um novo registro na tabela 'documentos'
                    //         Documento::create([
                    //             'url' => $filePath,
                    //             'tipo_documento' => $tipoDocumento,
                    //             'pedido_matricula_id' => $pedidoMatricula->id,
                    //         ]);

                    //     }
                        
                    // } else {

                    //     return back()->with('error', 'O upload do arquivo falhou.');
                    // }


                    
                DB::commit();

                session()->flash('success', 'Pedido efectuado com sucesso');

                return redirect()->route('pedido.index');

            case "Emissao":
                
                DB::beginTransaction();

                    // Proprietário do Veículo

                    $dataEmissaoBi = Carbon::createFromFormat('d/m/Y', $request->input('data_emissao_bilhete'))->format('Y-m-d');
                    
                    $dataValidadeBi = Carbon::createFromFormat('d/m/Y', $request->input('data_validade_bilhete'))->format('Y-m-d');

                    $bilhete = Bilhete::create([
                        'numero_bilhete' => $request->numero_bilhete,
                        'data_emissao_bilhete' => $dataEmissaoBi,
                        'data_validade_bilhete' => $dataValidadeBi,
                    ]);

                    $dataEmissaoCartaConducao = Carbon::createFromFormat('d/m/Y', $request->input('data_emissao_carta_conducao'))->format('Y-m-d');
                    
                    $dataValidadeCartaConducao = Carbon::createFromFormat('d/m/Y', $request->input('data_validade_carta_conducao'))->format('Y-m-d');

                    $carta_conducao = CartaConducao::create([
                        'numero_carta_conducao' => $request->numero_carta_conducao,
                        'data_emissao_carta_conducao' =>$dataEmissaoCartaConducao,
                        'data_validade_carta_conducao' =>$dataValidadeCartaConducao,
                    ]);

                    $residencia = Residencia::create([
                        'rua' => $request->rua,
                        'bairro' => $request->bairro,
                        'municipio_id' => $request->municipio_id,
                    ]);

                    $dataNascimento = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');

                    $proprietario = Proprietario::create([
                        'nome_completo' => $request->nome_completo,
                        'apelido_empresa' => $request->apelido_empresa,
                        'data_nascimento' => $dataNascimento,
                        'sexo' => $request->sexo,
                        'telemovel' => $request->telemovel,
                        'email' => $request->email,
                        'bilhete_id' => $bilhete->id,
                        'residencia_id' => $residencia->id,
                        'carta_conducao_id' => $carta_conducao->id,
                        'user_id' => Auth::id()
                    ]);

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
                        'matricula' => $request->matricula,
                        'ano_fabrico' => $request->ano_fabrico,
                        'primeiro_registro' => null,
                        'combustivel_id' => $request->combustivel,
                        'classe_id' => $request->classe,
                        'caixa_id' => $caixa->id,
                        'peso_id' => $peso->id,
                        'servico_id' => $request->servico,
                        'proprietario_id' => $proprietario->id
                    ]);

                    if($request->tipo_pedido == "Matricula") {

                        $pedidoMatricula = PedidoMatricula::create([
                            'status' => '0',
                            'descricao' => 'Default',
                            'tipo_pedido_id' => 1,
                            'veiculo_id' => $veiculo->id
                        ]);

                    } else {
                        $pedidoMatricula = PedidoMatricula::create([
                            'status' => '0',
                            'descricao' => 'Default',
                            'tipo_pedido_id' => 2,
                            'veiculo_id' => $veiculo->id
                        ]);
                    }
                
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

                return redirect()->route('pedido.index');
                    
            default:
                session()->flash('error', 'Infelizmente o seu pedido não pode ser satisfeito!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pedido = PedidoMatricula::where('veiculo_id', $id)->first();
        $classes = ClasseVeiculo::all();
        $combustiveis = Combustivel::all();
        $tipoCaixas = CaixaVeiculo::all();
        $provincias = Provincia::all();
        $pesosBruto = PesoBruto::all();
        $servicos = Servico::all();
        $documentos = Documento::where('pedido_matricula_id', $pedido->id)->get();

        return view('admin.pedidos.veiculo.show', compact('pedido', 'classes', 'combustiveis', 'tipoCaixas', 'pesosBruto', 'servicos', 'documentos', 'provincias'));
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
        $veiculo = Veiculo::where('id', $pedidoMatricula->veiculo_id)->first();
        $documentos = Documento::where('pedido_matricula_id', $id)->get();

        return view('admin.pedidos.partials.edit', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis', 'veiculo', 'tipos_caixa', 'pedidoMatricula', 'documentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $pedidoMatricula = PedidoMatricula::where('id', $id)->first();
        $veiculo = Veiculo::where('id', $pedidoMatricula->veiculo->id)->first();

        $proprietario = $veiculo->proprietario;

        DB::beginTransaction();

            // Proprietário do Veículo

            $dataEmissaoBi = Carbon::createFromFormat('d/m/Y', $request->input('data_emissao_bilhete'))->format('Y-m-d');
            
            $dataValidadeBi = Carbon::createFromFormat('d/m/Y', $request->input('data_validade_bilhete'))->format('Y-m-d');

            $bilhete = $proprietario->bilhete;

            $bilhete->update([
                'numero_bilhete' => $request->numero_bilhete,
                'data_emissao_bilhete' => $dataEmissaoBi,
                'data_validade_bilhete' => $dataValidadeBi,
            ]);

            $dataEmissaoCartaConducao = Carbon::createFromFormat('d/m/Y', $request->input('data_emissao_carta_conducao'))->format('Y-m-d');
            
            $dataValidadeCartaConducao = Carbon::createFromFormat('d/m/Y', $request->input('data_validade_carta_conducao'))->format('Y-m-d');

            $carta_conducao = $proprietario->carta_conducao;

            $carta_conducao->update([
                'numero_carta_conducao' => $request->numero_carta_conducao,
                'data_emissao_carta_conducao' =>$dataEmissaoCartaConducao,
                'data_validade_carta_conducao' =>$dataValidadeCartaConducao,
            ]);

            $residencia = $proprietario->residencia;

            $residencia->update([
                'rua' => $request->rua,
                'bairro' => $request->bairro,
                'municipio_id' => $request->municipio_id,
            ]);

            $dataNascimento = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');

            $proprietario->update([
                'nome_completo' => $request->nome_completo,
                'apelido_empresa' => $request->apelido_empresa,
                'data_nascimento' => $dataNascimento,
                'sexo' => $request->sexo,
                'telemovel' => $request->telemovel,
                'email' => $request->email,
                'bilhete_id' => $bilhete->id,
                'residencia_id' => $residencia->id,
                'carta_conducao_id' => $carta_conducao->id
            ]);

            // Veiculo

            $caixa_veiculo = $veiculo->caixa_veiculo;

            $caixa_veiculo->update([
                'distancia_entre_eixos' => $request->distancia_entre_eixos,
                'altura' => $request->altura,
                'tipo_caixa' => $request->tipo_caixa
            ]);

            $pesos_bruto = $veiculo->pesos_bruto;

            $pesos_bruto->update([
                'a_frente' => $request->a_frente,
                'ao_meio' => $request->ao_meio,
                'a_retaguarda' => $request->a_retaguarda
            ]);

            $primeiroRegistro = Carbon::createFromFormat('d/m/Y', $request->input('primeiro_registro'))->format('Y-m-d');

            $veiculo->update([
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
                'matricula' => $request->matricula,
                'ano_fabrico' => $request->ano_fabrico,
                'primeiro_registro' => $primeiroRegistro,
                'combustivel_id' => $request->combustivel,
                'classe_id' => $request->classe,
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

            if ($request->hasFile('documentos')) {

                foreach ($request->file('documentos') as $key => $file) {

                    $encontarDocumento = false;

                    switch ($key) {
                        case 0:

                            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                            $userId = auth()->id();
                            $fileName = $userId . 'bilhete' . '_' . $originalName . time() . '.' . $file->getClientOriginalExtension();
                            $tipoDocumento = 'bilhete';

                            $filePath = $file->storeAs('documentos', $fileName, 'public');

                            $encontarDocumento = Documento::where('tipo_documento', $tipoDocumento)
                            ->where(
                                'pedido_matricula_id', $pedidoMatricula->id 
                            )->first();

                            if($encontarDocumento) {

                                $encontarDocumento->update([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento
                                ]);

                            } else {

                                Documento::create([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento,
                                    'pedido_matricula_id' => $pedidoMatricula->id,
                                ]);
                            }

                            break;

                        case 1:
                            
                            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                            $userId = auth()->id();
                            $fileName = $userId . 'modelo_o' . '_' . $originalName . time() . '.' . $file->getClientOriginalExtension();
                            $tipoDocumento = 'modelo_o';

                            $filePath = $file->storeAs('documentos', $fileName, 'public');

                            $encontarDocumento = Documento::where('tipo_documento', $tipoDocumento)
                            ->where(
                                'pedido_matricula_id', $pedidoMatricula->id 
                            )->first();

                            if($encontarDocumento) {
                                $encontarDocumento->update([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento
                                ]);
                            } else {
                                
                                Documento::create([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento,
                                    'pedido_matricula_id' => $pedidoMatricula->id,
                                ]);
                            }

                            break;

                        case 2:
                            
                            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                            $userId = auth()->id();
                            $fileName = $userId . 'compra_venda' . '_' . $originalName . time() . '.' . $file->getClientOriginalExtension();
                            $tipoDocumento = 'compra_venda';

                            $filePath = $file->storeAs('documentos', $fileName, 'public');

                            $encontarDocumento = Documento::where('tipo_documento', $tipoDocumento)
                            ->where(
                                'pedido_matricula_id', $pedidoMatricula->id 
                            )->first();

                            if($encontarDocumento) {
                                $encontarDocumento->update([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento
                                ]);
                            } else {
                                
                                Documento::create([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento,
                                    'pedido_matricula_id' => $pedidoMatricula->id,
                                ]);
                            }

                            break;

                        case 3:
                            
                            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                            $userId = auth()->id();
                            $fileName = $userId . 'recibo_pagamento' . '_' . $originalName . time() . '.' . $file->getClientOriginalExtension();
                            $tipoDocumento = 'recibo_pagamento';

                            $filePath = $file->storeAs('documentos', $fileName, 'public');

                            $encontarDocumento = Documento::where('tipo_documento', $tipoDocumento)
                            ->where(
                                'pedido_matricula_id', $pedidoMatricula->id 
                            )->first();

                            if($encontarDocumento) {
                                $encontarDocumento->update([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento
                                ]);
                            } else {
                                
                                Documento::create([
                                    'url' => $filePath,
                                    'tipo_documento' => $tipoDocumento,
                                    'pedido_matricula_id' => $pedidoMatricula->id,
                                ]);
                            }

                            break;
                        default:
                            dd('Algo está errado', $request->file('documentos'), $key);
                    }
                    
                }
            }
            
        DB::commit();

        return redirect()->route('pedido.index');
    }

    // Atribuir Matricula

    public function atribuirMatricula(Request $request, string $id) {

        // $provincias = Provincia::all()->toArray();

        // $provinciaNomes = [
        //     'Bengo',
        //     'Benguela',
        //     'Bié',
        //     'Cabinda',
        //     'Cuando Cubango',
        //     'Cuanza Norte',
        //     'Cuanza Sul',
        //     'Cunene',
        //     'Huambo',
        //     'Huíla',
        //     'Luanda',
        //     'Lunda Norte',
        //     'Lunda Sul',
        //     'Malanje',
        //     'Moxico',
        //     'Namibe',
        //     'Uíge',
        //     'Zaire'
        // ];

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
