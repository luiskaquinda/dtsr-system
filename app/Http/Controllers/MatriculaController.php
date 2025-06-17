<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Exception;

use App\Models\{
    Matricula,
    Provincia,
    Veiculo,
    PedidoMatricula,
    ClasseVeiculo,
    CaixaVeiculo,
    Combustivel,
    PesoBruto,
    Servico,
    Documento,
    TipoMulta,
    Dtsr
};

class MatriculaController extends Controller
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


    public function gerarMatricula(Request $request, string $id)
    {
        
        $pedido = PedidoMatricula::where('veiculo_id', $id)->first();
        $classes = ClasseVeiculo::all();
        $combustiveis = Combustivel::all();
        $tipoCaixas = CaixaVeiculo::all();
        $provincias = Provincia::all();
        $pesosBruto = PesoBruto::all();
        $servicos = Servico::all();
        $tipos_multa = TipoMulta::all();
        $dtsrs = Dtsr::all();
        $documentos = Documento::where('pedido_matricula_id', $pedido->id)->get();

        // Recuperar o veículo
        $veiculo = Veiculo::find($id);
        $provincias = Provincia::all();

        $provinciaAbreviacao = $request->provincia;

        // Busca a última matrícula da província especificada
        // $ultimaMatricula = Matricula::whereRelation('provincia', 'abreviacao_provincia', $provinciaAbreviacao)
        // ->orderByDesc('id')
        // ->first();

        foreach($provincias as $provincia) {
            if($provinciaAbreviacao == $provincia->nome_provincia) {
                $abreviacao = $provincia->abreviacao_provincia;
            }
        };

        $ultimaMatricula = Matricula::whereHas('provincia', function ($query) use ($abreviacao) {
                $query->where('abreviacao_provincia', $abreviacao);
        })
        ->orderBy('id', 'desc')
        ->first();

        // Se não houver uma matrícula existente, começa do zero
        $numeroSerie = '00-00';
        $serie = 'AA';

        if ($ultimaMatricula) {

            // Divide o número de série e incrementa
            [$parte1, $parte2] = explode('-', $ultimaMatricula->numero_serie);

            // Incrementa a segunda parte
            if ((int)$parte2 < 99) {
                $parte2 = str_pad((int)$parte2 + 1, 2, '0', STR_PAD_LEFT);
            } else {
                // Incrementa a primeira parte e reseta a segunda
                $parte1 = str_pad((int)$parte1 + 1, 2, '0', STR_PAD_LEFT);
                $parte2 = '00';
            }

            $numeroSerie = $parte1 . '-' . $parte2;

            // Incrementa a série
            $serie = $this->incrementarSerie($ultimaMatricula->serie);
        }

        // Cria a nova matrícula
        $matricula = "{$abreviacao}-{$numeroSerie}-{$serie}";
        $tipo_matricula = $request->tipo_matricula;
        
        switch ($tipo_matricula) {
            case 'Domestico':
                $cor_matricula = "Letra branca fundo preto";
                break;
            case 'Consular':
                $cor_matricula = "Letra branca fundo vermelho";
                break;
            case 'Governamental':
                $cor_matricula = "Letra branca fundo verde alface";
                break;
            case 'Militar':
                $cor_matricula = "Letra preta fundo amarelo";
                break;
            default:
                session()->flash('error', 'Infelizmente o seu pedido não pode ser satisfeito!');
                return redirect()->route('pedido.index');
        }

        // Salva no banco de dados
        $novaMatricula = Matricula::create([
            'provincia_id' => $this->buscarProvinciaId($abreviacao), // Adapte conforme necessário
            'numero_serie' => $numeroSerie,
            'serie' => $serie,
            'matricula' => $matricula,
            'tipo_matricula' => $tipo_matricula,
            'cor_matricula' => $cor_matricula
        ]);

        // Mudar o satus do pedido

        // dd($pedido->id);

        $pedido->status = "1";
        $pedido->save(); 

        // Atribuir a matrícula ao veículo
        $veiculo->matricula_id =  $novaMatricula->id;
        $veiculo->save();

        session()->flash('success', 'Matricula criada e atribuida com sucesso');

        return view('admin.pedidos.veiculo.show', compact('pedido', 'classes', 'combustiveis', 'tipoCaixas', 'pesosBruto', 'servicos', 'documentos', 'provincias', 'tipos_multa', 'dtsrs'));
    }

    private function incrementarSerie($serieAtual)
    {
        $letras = str_split($serieAtual);

        // Incrementa a segunda letra
        if ($letras[1] < 'Z') {
            $letras[1] = chr(ord($letras[1]) + 1);
        } else {
            // Incrementa a primeira letra e reseta a segunda
            $letras[1] = 'A';
            if ($letras[0] < 'Z') {
                $letras[0] = chr(ord($letras[0]) + 1);
            } else {
                // Reseta para AA (ciclo completo)
                $letras = ['A', 'A'];
            }
        }

        return implode('', $letras);
    }

    private function buscarProvinciaId($abreviacao)
    {
        // Implementa a lógica para buscar o ID da província com base na abreviação
        return Provincia::where('abreviacao_provincia', $abreviacao)->value('id');
    }

    public function mudarStatus($id) {

        $pedido = PedidoMatricula::find($id);
        $pedido->status = "1";
        $pedido->save();

        return $pedido->status;
    }

}
