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

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $veiculos = Veiculo::with(['classe', 'proprietario'])->get();
        $tipoPedidos = TipoPedido::all();

        return view('admin.veiculo.index', compact('veiculos', 'tipoPedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $municipios = Municipio::all();
        $provincias = Provincia::all();
        $tipoPedidos = TipoPedido::all();
        $classesVeiculo = ClasseVeiculo::all();
        $servicos = Servico::all();
        $combustiveis = Combustivel::all();

        return view('admin.veiculo.veiculo.create', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request, $request->documentos);

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
                'carta_conducao_id' => $carta_conducao->id
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

            $primeiroRegistro = Carbon::createFromFormat('d/m/Y', $request->input('primeiro_registro'))->format('Y-m-d');

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
                'primeiro_registro' => $primeiroRegistro,
                'combustivel_id' => $request->combustivel,
                'classe_id' => $request->classe,
                'caixa_id' => $caixa->id,
                'peso_id' => $peso->id,
                'servico_id' => $request->servico,
                'proprietario_id' => $proprietario->id
            ]);

            $pedidoMatricula = PedidoMatricula::create([
                'status' => '0',
                'descricao' => 'Default',
                'tipo_pedido_id' => $request->tipo,
                'veiculo_id' => $veiculo->id
            ]);
        
            if ($request->hasFile('documentos')) {

                $cont = 0;
                foreach ($request->file('documentos') as $key => $file) {

                    $docNames = ['bilhete', 'modelo_o', 'compra_venda', 'recibo_pagamento'];

                    if($key == $cont) {
                        $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                        $userId = auth()->id();
                        $fileName = $userId.$docNames[$cont].'_'.$originalName. time() . '.' . $file->getClientOriginalExtension();
                        $tipoDocumento = $docNames[$cont];

                        $cont++;
                    }

                    $filePath = $file->storeAs('documentos', $fileName, 'public');
        
                    // Criar um novo registro na tabela 'documentos'
                    Documento::create([
                        'url' => $filePath,
                        'tipo_documento' => $tipoDocumento,
                        'pedido_matricula_id' => $pedidoMatricula->id,
                    ]);

                }
                
            } else {

                return back()->with('error', 'O upload do arquivo falhou.');
            }
            
        DB::commit();

        session()->flash('success', 'Pedido efectuado com sucesso');

        return redirect()->route('veiculo.index');
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
        $municipios = Municipio::all();
        $provincias = Provincia::all();
        $tipoPedidos = TipoPedido::all();
        $classesVeiculo = ClasseVeiculo::all();
        $servicos = Servico::all();
        $combustiveis = Combustivel::all();
        $tipos_caixa = CaixaVeiculo::all();

        $veiculo = Veiculo::where('id', $id)->first();
        $pedidoMatricula = PedidoMatricula::where('veiculo_id', $id)->first();
        $documentos = Documento::where('pedido_matricula_id', $pedidoMatricula->id)->get();

        // dd($documento);

        return view('admin.veiculo.veiculo.edit', compact('municipios', 'provincias', 'tipoPedidos', 'classesVeiculo', 'servicos', 'combustiveis', 'veiculo', 'tipos_caixa', 'pedidoMatricula', 'documentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $veiculo = Veiculo::findOrFail($id);
        $proprietario = $veiculo->proprietario;
        // $bilhete = Bilhete::find($request->);

        // dd($request);

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

            $pedido_matricula = $veiculo->pedido_matricula;

            $pedido_matricula->update([
                'status' => '0',
                'descricao' => 'Default',
                'tipo_pedido_id' => $request->tipo,
                'veiculo_id' => $veiculo->id
            ]);

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
                                'pedido_matricula_id', $pedido_matricula->id 
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
                                    'pedido_matricula_id' => $pedido_matricula->id,
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
                                'pedido_matricula_id', $pedido_matricula->id 
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
                                    'pedido_matricula_id' => $pedido_matricula->id,
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
                                'pedido_matricula_id', $pedido_matricula->id 
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
                                    'pedido_matricula_id' => $pedido_matricula->id,
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
                                'pedido_matricula_id', $pedido_matricula->id 
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
                                    'pedido_matricula_id' => $pedido_matricula->id,
                                ]);
                            }

                            break;
                        default:
                            dd('Algo está errado', $request->file('documentos'), $key);
                    }
                    
                }
            }
            
        DB::commit();

        return redirect()->route('veiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $veiculo = Veiculo::findOrFail($id);
        
        DB::beginTransaction();
            $veiculo->pesos_bruto->delete();
            $veiculo->caixa_veiculo->delete();
            $veiculo->delete();
        DB::commit();

        return redirect()->route('veiculo.index');
    }
}
