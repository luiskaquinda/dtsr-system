<?php

namespace App\Http\Controllers;

use App\Models\{
    Bilhete,
    Municipio,
    Provincia,
    Residencia,
    CartaConducao,
    Proprietario
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProprietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.proprietario.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $municipios = Municipio::all();
        $provincias = Provincia::all();

        return view('admin.proprietario.create', compact('municipios', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Iniciando uma transação para garantir consistência
        DB::beginTransaction();

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

        DB::commit();

        return redirect()->route('proprietario.index');
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
