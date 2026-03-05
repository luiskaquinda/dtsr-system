@extends('admin.pedidos.layout.app')
@section('title', 'Duplicado')

@section('content')
    <form class="container p-4 bg-white rounded" action="{{ route('pedido.acd.store', ['id' => $veiculo->proprietario->id, 'tipoPedido' => "D"] ) }}" method="POST"
    enctype="multipart/form-data"  
    >
        @csrf
        @method('POST')

        <div class="card-body p-9">

            <!--begin::Row-->
            <div class="row mb-5">
                <!--begin::Label-->
                <label class="col-lg-6 fw-semibold text-muted">
                    Data do Pedido
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-6 text-end">
                    <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->created_at }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-5">
                <!--begin::Label-->
                <label class="col-lg-6 fw-semibold text-muted">
                    Status do Pedido
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-6 text-end">
                    @if ($pedido->status == "0")
                        <span class="badge badge-danger">A Processar...</span>
                    @else
                        <span class="badge badge-success">Processado</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-5">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold bg-dark p-4">
                    @if ($pedido->tipo_pedido->tipo == "Matricula")
                        <span class="text-white fs-5 badge badge-success">Matrícula</span>
                    @else
                        <span class="text-white fs-5">Matrícula</span>
                    @endif
                </label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-3 fw-semibold bg-dark p-4">
                    @if ($pedido->tipo_pedido->tipo == "Emissao")
                        <span class="text-white fs-5 badge badge-success">Emissão</span>
                    @else
                        <span class="text-white fs-5">Emissão</span>
                    @endif
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-3 fw-semibold bg-dark p-4">
                    @if ($pedido->tipo_pedido->tipo == "Duplicado")
                        <span class="text-white fs-5 badge badge-success">Duplicado</span>
                    @else
                        <span class="text-white fs-5">Duplicado</span>
                    @endif
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-3 fw-semibold bg-dark p-4">
                    @if ($pedido->tipo_pedido->tipo == "Alteração de Características")
                        <span class="text-white fs-5 badge badge-success">Alteração de Características</span>
                    @else
                        <span class="text-white fs-5">Alteração de Características</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-5">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Matricula:
                </label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-3">
                    @if ($pedido->veiculo->matricula !== null)
                        <span class="fw-semibold text-danger fs-6">Sem matricula atribuido</span>
                    @else
                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->matricula }}</span>
                    @endif
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Data do Primeiro Registro:
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3">
                    @if ($pedido->veiculo->primeiro_registro == null)
                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->created_at }}</span>
                    @else
                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->primeiro_registro }}</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            {{-- Proprietário --}}

            <!--begin::Input group-->
            <div class="row mb-7">
                <hr>
                <!--begin::Col-->
                <div class="col-lg-12">
                    <h4 class="fw-semibold fs-4 text-gray-800">Proprietário (a)</h4>
                </div>
                <!--end::Col-->
                <hr>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Apelido(s)/Nome da Empresa
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row"> 
                    @if ($pedido->veiculo->proprietario->apelido_empresa == null)
                        <span class="fw-semibold text-danger fs-6">Sem apelido(s) ou nome da empresa</span>
                    @else
                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->proprietario->apelido_empresa }}</span>
                    @endif
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Nome Completo
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{  
                            $pedido->veiculo->proprietario->nome_completo 
                        }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            {{-- <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">
                    Nome Completo
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->nome_completo }}
                    </span>
                </div>
                <!--end::Col-->
            </div> --}}

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted mb-1">
                    Data Nascimento
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->data_nascimento }}
                    </span>
                </div>
                <!--end::Col-->
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted mb-1">
                    Sexo
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    <span class="badge badge-success fs-6">{{ $pedido->veiculo->proprietario->sexo }}</span>
                </div>
                <!--end::Col-->

            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted mb-1">
                    Residência Actual
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    <span class="fw-semibold text-gray-400 fs-6">
                        Bairro: 
                    </span>      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->residencia->bairro }}
                    </span>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    <span class="fw-semibold text-gray-400 fs-6">
                        Rua: 
                    </span>         
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->residencia->rua }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Bilhete
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->bilhete->numero_bilhete }}
                    </span>
                </div>
                <!--end::Col-->

                <label class="col-lg-3 fw-semibold text-muted">
                    Email
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->email }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <label class="col-lg-3 fw-semibold text-muted">
                    Telefone
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->telemovel }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <!--begin::Input group-->
            <div class="row mb-7">
                <hr>
                <!--begin::Col-->
                <div class="col-lg-12">
                    <h4 class="fw-semibold fs-4 text-gray-800">Características do Veículo</h4>
                </div>
                <!--end::Col-->
                <hr>
            </div>
            <!--end::Input group-->

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Marca
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->marca }}
                    </span>
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Modelo
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->modelo }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Quadro
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->quadro }}
                    </span>
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Motor
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->motor }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Cor
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->cor }}
                    </span>
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Número de Cilíndros
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->numero_cilindros }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Classe
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">    
                    <span class="fw-semibold text-gray-800 fs-6">
                        @foreach ($classesVeiculo as $classe)
                            @if (($classe->id == $pedido->veiculo->classe_id))
                                <span class="badge badge-success fs-6">
                                    {{ $classe->classe }}
                                </span>
                            @endif
                        @endforeach
                    </span>
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Combustível
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        @foreach ($combustiveis as $combustivel)
                            @if (($combustivel->id == $pedido->veiculo->combustivel_id))
                                <span class="badge badge-success fs-6">
                                    {{ $combustivel->combustivel }}
                                </span>
                            @endif
                        @endforeach
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Medidas Pneumáticas 
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->medidas_pneumaticas }}
                    </span>
                </div>
                <!--end::Col-->

                <label class="col-lg-3 fw-semibold text-muted">
                    País de Origem 
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->pais_origem }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            {{-- Caixa do Veículo --}}

            <!--begin::Input group-->
            <div class="row mb-7">
                <hr>
                <!--begin::Col-->
                <div class="col-lg-12">
                    <h4 class="fw-semibold fs-4 text-gray-800">Caixa</h4>
                </div>
                <!--end::Col-->
                <hr>
            </div>
            <!--end::Input group-->

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Tipo de Caixa
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    @foreach ($tipoCaixas as $tipoCaixa)
                        @if (($tipoCaixa->id == $pedido->veiculo->caixa_id))
                            <span class="badge badge-success fs-6">
                                {{ $tipoCaixa->tipo_caixa }}
                            </span>
                        @endif
                    @endforeach
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Distançia entre eixos
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    @foreach ($tipoCaixas as $tipoCaixa)
                        @if (($tipoCaixa->id == $pedido->veiculo->caixa_id))
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $tipoCaixa->distancia_entre_eixos }}
                            </span>
                        @endif
                    @endforeach
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Altura
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    @foreach ($tipoCaixas as $tipoCaixa)
                        @if (($tipoCaixa->id == $pedido->veiculo->caixa_id))
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $tipoCaixa->altura }}
                            </span>
                        @endif
                    @endforeach
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Ano de Fabrico
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    <span class="badge badge-warning fs-6">
                        {{ $pedido->veiculo->ano_fabrico }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            {{-- Peso Bruto --}}

            <!--begin::Input group-->
            <div class="row mb-7">
                <hr>
                <!--begin::Col-->
                <div class="col-lg-12">
                    <h4 class="fw-semibold fs-4 text-gray-800">Peso Bruto</h4>
                </div>
                <!--end::Col-->
                <hr>
            </div>
            <!--end::Input group-->

            <div class="row mb-7">
                <!--begin::Label-->

                @php
                    $total = 0;    
                @endphp

                <label class="col-lg-3 fw-semibold text-muted">
                    A Frente
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    @foreach ($pesosBruto as $pesoBruto)
                        @if (($pesoBruto->id == $pedido->veiculo->peso_id))
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $pesoBruto->a_frente }} kg
                            </span>

                            @php
                                $total += $pesoBruto->a_frente  
                            @endphp

                        @endif
                    @endforeach
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Ao Meio
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    @foreach ($pesosBruto as $pesoBruto)
                        @if (($pesoBruto->id == $pedido->veiculo->peso_id))
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $pesoBruto->ao_meio }} kg
                            </span>

                            @php
                                $total += $pesoBruto->ao_meio  
                            @endphp
                        @endif
                    @endforeach
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    A Retaguarda
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    @foreach ($pesosBruto as $pesoBruto)
                        @if (($pesoBruto->id == $pedido->veiculo->peso_id))
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $pesoBruto->a_retaguarda }} kg
                            </span>

                            @php
                                $total += $pesoBruto->a_retaguarda  
                            @endphp
                        @endif
                    @endforeach
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Total
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    <span class="badge badge-warning fs-6">
                        {{ $total }} kg
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Tara
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->tara }} kg
                    </span>
                </div>
                <!--end::Col-->

                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Lotação
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->lugares }} lugares
                    </span>
                </div>
                <!--end::Col-->
            </div>

            {{-- Serviços --}}

            <!--begin::Input group-->
            <div class="row mb-7">
                <hr>
                <!--begin::Col-->
                <div class="col-lg-12">
                    <h4 class="fw-semibold fs-4 text-gray-800">Serviço</h4>
                </div>
                <!--end::Col-->
                <hr>
            </div>
            <!--end::Input group-->

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-3 fw-semibold text-muted">
                    Serviço
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    @foreach ($servicos as $servico)
                        @if (($servico->id == $pedido->veiculo->servico_id))
                            <span class="badge badge-warning fs-6">
                                {{ $servico->servico }}
                            </span>
                        @endif
                    @endforeach
                </div>
                <!--end::Col-->
            </div>

            {{-- Documentos --}}

            <!--begin::Input group-->
            <div class="row mb-7">
                <hr>
                <!--begin::Col-->
                <div class="col-lg-12">
                    <h4 class="fw-semibold fs-4 text-gray-800">Documentos</h4>
                </div>
                <!--end::Col-->
                <hr>
            </div>
            <!--end::Input group-->

            <div class="row mb-7">

                <div class="col-lg-12">
                    <label for="formFile" class="form-label">Bilhete de Identidade</label>
                    <div class="ms-4 my-2">
                        @php
                            $encontrado = false;
                        @endphp
                
                        @foreach ($documentos as $documento)    
                            @if ($documento->tipo_documento == 'bilhete' && isset($documento->url))
                                <strong>Bilhete:</strong> 
                                <a href="{{ asset('storage/public/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
                                @php
                                    $encontrado = true;
                                @endphp
                                @break
                            @endif
                        @endforeach
                
                        @if (!$encontrado)
                            <span class="text-danger">Sem ficheiro</span>
                        @endif
                    </div>
                </div>
                    

                <div class="col-lg-12">
                    
                    <label for="formFile" class="form-label">Registro Inicial ou Modelo O</label>
                    <div class="ms-4 my-2">
                        @php
                            $encontrado = false;
                        @endphp
                
                        @foreach ($documentos as $documento)    
                            @if ($documento->tipo_documento == 'modelo_o' && isset($documento->url))
                                <strong>Registro Inicial ou Modelo O:</strong> 
                                <a href="{{ asset('storage/public/' . $documento->url) }}" target="_blank">
                                    {{ basename($documento->url) }}
                                </a>
                                @php
                                    $encontrado = true;
                                @endphp
                                @break
                            @endif
                        @endforeach
                
                        @if (!$encontrado)
                            <span class="text-danger">Sem ficheiro</span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
                    <label for="formFile" class="form-label">Registro de Compra e Venda</label>
                    <div class="ms-4 my-2">
                        @php
                            $encontrado = false;
                        @endphp
                
                        @foreach ($documentos as $documento)    
                            @if ($documento->tipo_documento == 'compra_venda' && isset($documento->url))
                                <strong>Registro de Compra e Venda:</strong> 
                                <a href="{{ asset('storage/public/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
                                @php
                                    $encontrado = true;
                                @endphp
                                @break
                            @endif
                        @endforeach
                
                        @if (!$encontrado)
                            <span class="text-danger">Sem ficheiro</span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
                    <label for="formFile" class="form-label">Recibo de Pagamento</label>
                    <div class="ms-4 my-2">
                        @php
                            $encontrado = false;
                        @endphp
                
                        @foreach ($documentos as $documento)    
                            @if ($documento->tipo_documento == 'recibo_pagamento' && isset($documento->url))
                                <strong>Registro Inicial ou Modelo O:</strong> 
                                <a href="{{ asset('storage/public/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
                                @php
                                    $encontrado = true;
                                @endphp
                                @break
                            @endif
                        @endforeach
                
                        @if (!$encontrado)
                            <span class="text-danger">Sem ficheiro</span>
                        @endif
                    </div>
                </div>
                </fieldset> 
            </div>
        </div>

        <div class="row p-4">
            <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">

                    <div class="pb-12">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-dark">Duplicado</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5"><span class="required">Campos de caracter obrigatório</span></div>
                        <!--end::Description-->
                    </div>

                    <div class="row g-3 mb-4 d-none">
                        <div class="col">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Nome Completo</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Digite o teu nome completo">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->

                            <input type="text" id="nome_completo" name="nome_completo" class="form-control" placeholder="First name" aria-label="First name"
                            value="{{ $veiculo->proprietario->nome_completo ?? old('nome_completo') }}"
                            >
                        </div>
                    </div>

                    <div class="row g-3 mb-4 d-none">
                        <div class="col">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Apelido/Nome da Empresa</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Caso tenha uma empresa, digite o nome">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="text" id="apelido_empresa" class="form-control" placeholder="Digite o nome/apelido da empresa" aria-label="First name" name="apelido_empresa"
                            value="{{ $veiculo->proprietario->apelido_empresa ?? old('apelido_empresa') }}"
                            >
                        </div>
                        <div class="col mb-0">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Data de Nascimento</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Quando você nasceu?">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input class="form-control form-control-solid" name="data_nascimento" placeholder="MM/DD/YYYY" id="kt_daterangepicker_1"
                            value="{{ isset($veiculo->proprietario->data_nascimento) ? \Carbon\Carbon::parse($veiculo->proprietario->data_nascimento)->format('m/d/Y') : old('data_nascimento') }}"
                            />
                        </div>
                    </div>

                    <div class="row g-3 mb-4 d-none">
                        <div class="col">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Sexo</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Selecione o teu genero">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <select class="form-select" id="sexo" name="sexo" data-hide-search="true" data-control="select2" data-placeholder="Sexo">
                                <option></option>
                                <option value="M" {{ (isset($veiculo->proprietario->sexo) && $veiculo->proprietario->sexo == 'M') ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ (isset($veiculo->proprietario->sexo) && $veiculo->proprietario->sexo == 'F') ? 'selected' : '' }}>Feminino</option>
                            </select>
                        </div>

                        <div class="col mb-0">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Telefone</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Digite o teu nome completo">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="number" id="telemovel" name="telemovel" class="form-control" placeholder="Digite o teu número de telefone" aria-label="Digite o teu nome completo"
                            value="{{ $veiculo->proprietario->telemovel ?? old('telemovel') }}"
                            >
                        </div>
                    </div>

                    <div class="row g-3 mb-4 d-none">
                        <div class="col">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Email</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Digite o teu melhor email">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="email" id="email" name="email" class="form-control" placeholder="Digite o teu melhor email"
                            value="{{ $veiculo->proprietario->email ?? old('email') }}"
                            />
                        </div>
                    </div>

                    {{-- Bilhete --}}

                    <fieldset class="my-2 d-none">
                        <legend>Bilhete de Identidade</legend>

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Número do Bilhete</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o teu nome completo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" id="numero" name="numero_bilhete" class="form-control" placeholder="Digite o teu B.I" aria-label="First name"
                                value="{{ $veiculo->proprietario->bilhete->numero_bilhete ?? old('numero_bilhete') }}"
                                >
                            </div>
                        </div>
    
                        <div class="row g-3 mb-4">
                            <div class="col mb-0">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Data de Emissão</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Quando emitiste o teu B.I">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" name="data_emissao_bilhete" placeholder="MM/DD/YYYY" id="kt_daterangepicker_2"
                                value="{{ isset($veiculo->proprietario->bilhete->data_emissao_bilhete) ? \Carbon\Carbon::parse($veiculo->proprietario->bilhete->data_emissao_bilhete)->format('m/d/Y') : old('data_emissao_bilhete') }}"
                                />
                            </div>
                            <div class="col mb-0">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Data de Validade</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Quando expira o teu B.I">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" name="data_validade_bilhete" placeholder="MM/DD/YYYY" id="kt_daterangepicker_3"
                                value="{{ isset($veiculo->proprietario->bilhete->data_validade_bilhete) ? \Carbon\Carbon::parse($veiculo->proprietario->bilhete->data_validade_bilhete)->format('m/d/Y') : old('data_validade_bilhete') }}"
                                />
                            </div>
                        </div>

                    </fieldset>


                    {{-- Carta de Condução --}}

                    <fieldset class="my-2 d-none">
                        <legend>Carta de Condução</legend>

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Número da Carta de Condução</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o número da tua carta">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" name="numero_carta_conducao" placeholder="Digite o número da tua carta de condução" aria-label="First name"
                                value="{{ $veiculo->proprietario->carta_conducao->numero_carta_conducao ?? old('numero_carta_conducao') }}"
                                >
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col mb-0">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Data de Emissão</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Quando emitiste a tua carta">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" name="data_emissao_carta_conducao" placeholder="MM/DD/YYYY" id="kt_daterangepicker_4"
                                value="{{ isset($veiculo->proprietario->carta_conducao->data_emissao_carta_conducao) ? \Carbon\Carbon::parse($veiculo->proprietario->carta_conducao->data_emissao_carta_conducao)->format('m/d/Y') : old('data_emissao_carta_conducao') }}"
                                />
                            </div>
                            <div class="col mb-0">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Data de Validade</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Quando expira a tua carta">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" name="data_validade_carta_conducao" placeholder="MM/DD/YYYY" id="kt_daterangepicker_5"
                                value="{{ isset($veiculo->proprietario->carta_conducao->data_validade_carta_conducao) ? \Carbon\Carbon::parse($veiculo->proprietario->carta_conducao->data_validade_carta_conducao)->format('m/d/Y') : old('data_validade_carta_conducao') }}"
                                />
                            </div>
                        </div>

                    </fieldset>

                    {{-- Endereço --}}

                    <fieldset class="my-2 d-none">
                        <legend>Endereço</legend>

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Rua</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o nome da tua rua">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" name="rua" placeholder="Nome da rua" aria-label="First name"
                                value="{{ $veiculo->proprietario->residencia->rua ?? old('rua') }}"
                                >
                            </div>

                            <div class="col">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Bairro</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o nome do teu bairro">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" name="bairro" placeholder="Nome do bairro" aria-label="First name"
                                value="{{ $veiculo->proprietario->residencia->bairro ?? old('bairro') }}"
                                >
                            </div>

                            <div class="col mb-0">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Município</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Em que município fica o teu bairro?">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <select class="form-select" name="municipio_id"  data-control="select2" data-placeholder="Selecione o município do teu bairro">
                                    <option></option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id  ?? old('municipio_id') }}" {{ (isset($municipio->id) && $municipio->id == $veiculo->proprietario->residencia->municipio_id) ? 'selected' : '' }}>{{ $municipio->nome_municipio }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </fieldset>

                    {{-- Dados do Veículo --}}

                    <fieldset class="my-2">
                        <legend>Dados do Veiculo</legend>

                        <div class="row g-3 mb-4">
                            <div class="col mb-0">
                                
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Tipo de Pedido</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Onde emitiste o teu B.I">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>

                                <input type="text" class="form-control" name="tipo_pedido" placeholder="Tipo de pedido a efectuar" aria-label="First name"
                                value="{{ $tipoPedido }}" readonly
                                >
                            </div>
                        </div>

                        {{-- Matricula e Data do Primeiro Registro --}}

                        <div class="row g-3 mb-4">
                            
                            <div class="col d-none">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Matricula</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a matricula do teu veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="matricula" placeholder="Matricula do veiculo" aria-label="First name"
                                value="{{ $veiculo->matricula ?? old('matricula') }}" readonly
                                >
                            </div>

                            <div class="col mb-0 d-none">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Data do Primeiro Registro</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a data do primeiro registro do veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input class="form-control form-control-solid" name="primeiro_registro" placeholder="MM/DD/YYYY" id="kt_daterangepicker_6"
                                value="{{ isset($veiculo->primeiro_registro) ? \Carbon\Carbon::parse($veiculo->primeiro_registro)->format('m/d/Y') : old('primeiro_registro') }}" readonly
                                />
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            
                            <div class="col d-none">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Marca</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a marca do teu veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" name="marca" placeholder="Marca do veiculo" aria-label="First name"
                                value="{{ $veiculo->marca ?? old('marca') }}"
                                readonly
                                >
                            </div>

                            <div class="col d-none">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Modelo</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o modelo do teu veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" name="modelo" placeholder="Modelo do veiculo" aria-label="First name"
                                value="{{ $veiculo->modelo ?? old('modelo') }}"
                                readonly
                                >
                            </div>
                        </div>

                        <div class="row g-3 mb-4">  
                            <div class="col">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Quadro</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a número do quadro do teu veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" name="quadro" placeholder="Número do Quadro" aria-label="First name"
                                value="{{ $veiculo->quadro ?? old('quadro') }}"
                                readonly
                                >
                            </div>

                            <div class="col">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Motor</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o número do motor do teu veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" name="motor" placeholder="Número do Motor" aria-label="First name"
                                value="{{ $veiculo->motor ?? old('motor') }}"
                                readonly
                                >
                            </div>

                            <div class="col">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Cor</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a cor do teu veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" name="cor" placeholder="Cor do Veículo" aria-label="First name"
                                value="{{ $veiculo->cor ?? old('cor') }}"
                                readonly
                                >
                            </div>
                        </div>

                        <div class="row g-3 mb-4">  
                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Número de Cilindros</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a número de cilindros do teu veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="numero_cilindros" placeholder="Número do Quadro" aria-label="First name"
                                value="{{ $veiculo->numero_cilindros ?? old('numero_cilindros') }}" readonly
                                >
                            </div>

                            <div class="col mb-0">
                                    
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Classe do Veículo</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Onde emitiste o teu B.I">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                
                                <select class="form-select" name="classe"  data-control="select2" data-placeholder="Selecione o tipo de pedido" disabled>
                                    <option></option>
                                    @foreach ($classesVeiculo as $classeVeiculo)
                                        <option value="{{ $classeVeiculo->id  ?? old('classe') }}" {{ (isset($classeVeiculo->id) && $classeVeiculo->id == $veiculo->classe_id) ? 'selected' : '' }}>{{ $classeVeiculo->classe }}</option>
                                    @endforeach
                                </select>

                                <!-- Campo hidden para enviar o valor selecionado -->
                                <input type="hidden" name="classe" value="{{ $veiculo->classe->id }}">
                            </div>

                            <div class="col mb-0">
                                    
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Combustivel</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o tipo de combustivel do veiculo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                
                                <select class="form-select" name="combustivel"  data-control="select2" data-placeholder="Selecione o tipo de combustivel" disabled>
                                    <option></option>
                                    @foreach ($combustiveis as $combustivel)
                                        <option value="{{ $combustivel->id  ?? old('combustivel') }}" {{ (isset($combustivel->id) && $combustivel->id == $veiculo->combustivel_id) ? 'selected' : '' }}>{{ $combustivel->combustivel }}</option>
                                    @endforeach
                                </select>

                                <!-- Campo hidden para enviar o valor selecionado -->
                                <input type="hidden" name="combustivel" value="{{ $veiculo->combustivel->id }}">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">  
                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Medidas dos Pneumáticos</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite as medidas dos pneumáticos">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="medidas_pneumaticas" placeholder="Medidas dos Pneumáticos" aria-label="First name"
                                value="{{ $veiculo->medidas_pneumaticas ?? old('medidas_pneumaticas') }}" readonly
                                >
                            </div>

                            <div class="col mb-0 d-none">
                                    
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Serviço do Veiculo</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Que tipo de serviço o teu veiculo presta">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                
                                <select class="form-select" name="servico" data-control="select2" data-placeholder="Selecione o tipo de serviço" disabled>
                                    <option></option>
                                    @foreach ($servicos as $servico)
                                        <option value="{{ $servico->id  ?? old('servico') }}" {{ (isset($servico->id) && $servico->id == $veiculo->servico_id) ? 'selected' : '' }}>{{ $servico->servico }}</option>
                                    @endforeach
                                </select>

                                <!-- Campo hidden para enviar o valor selecionado -->
                                <input type="hidden" name="servico" value="{{ $veiculo->servico_id }}">

                            </div>

                            <div class="col d-none">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">País de Origem</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite país de origem do teu veículo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="pais_origem" placeholder="Digite o país de origem" aria-label="First name"
                                value="{{ $veiculo->pais_origem ?? old('pais_origem') }}" readonly
                                >
                            </div>
                        </div>
                    </fieldset>

                    {{-- Caixa do Veiculo --}}

                    <fieldset class="my-2">
                        <legend>Caixa</legend>

                        <div class="row g-3 mb-4">
                            <div class="col mb-0">
                                    
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Tipo de Caixa</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Onde emitiste o teu B.I">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                
                                <select class="form-select" name="tipo_caixa"  data-control="select2" data-placeholder="Selecione o tipo de pedido" disabled>
                                    @foreach ($tipoCaixas as $tipo_caixa)
                                        <option value="Aberta" {{ (isset($veiculo->caixa_veiculo->tipo_caixa) && $veiculo->caixa_veiculo->tipo_caixa == 'Aberta') ? 'selected' : '' }}>Aberta</option>
                                        <option value="Fechada" {{ (isset($veiculo->caixa_veiculo->tipo_caixa) && $veiculo->caixa_veiculo->tipo_caixa == 'Fechada') ? 'selected' : '' }}>Fechada</option>
                                    @endforeach
                                </select>

                                <!-- Campo hidden para enviar o valor selecionado -->
                                <input type="hidden" name="tipo_caixa" value="{{ $veiculo->caixa_id }}">
                            </div>

                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Distância entre eixos</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a distância entre os eixos do teu veículo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="distancia_entre_eixos" placeholder="Distância entre eixos" aria-label="First name"
                                value="{{ $veiculo->caixa_veiculo->distancia_entre_eixos ?? old('distancia_entre_eixos') }}" readonly
                                >
                            </div>
                        </div>

                        <div class="row g-3 mb-4">

                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Ano de Fabrico</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a altura da caixa do teu veículo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="ano_fabrico" placeholder="Altura da Caixa" aria-label="First name"
                                value="{{ isset($veiculo->ano_fabrico) ? \Carbon\Carbon::parse($veiculo->ano_fabrico)->format('m/d/Y') : old('ano_fabrico') }}" readonly
                                >
                            </div>

                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Altura</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a altura da caixa do teu veículo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="altura" placeholder="Altura da Caixa" aria-label="First name"
                                value="{{ $veiculo->caixa_veiculo->altura ?? old('altura') }}" readonly
                                >
                            </div>
                        </div>
                    </fieldset>

                    {{-- Peso Bruto --}}

                    
                    <fieldset class="my-2">
                        <legend>Peso Bruto</legend>

                        <div class="row g-3 mb-4">
                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">A frente</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o peso do seu veiculo a frente">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="a_frente" placeholder="Peso a frente" aria-label="First name"
                                value="{{ $veiculo->pesos_bruto->a_frente ?? old('a_frente') }}" readonly
                                >
                            </div>

                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Ao meio</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o peso do seu veiculo ao meio">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="ao_meio" placeholder="Peso ao meio" aria-label="First name"
                                value="{{ $veiculo->pesos_bruto->ao_meio ?? old('ao_meio') }}" readonly
                                >
                            </div>

                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">A retaguarda</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o peso do seu veiculo a retaguarda">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="a_retaguarda" placeholder="Peso a retaguarda" aria-label="First name"
                                value="{{ $veiculo->pesos_bruto->a_retaguarda ?? old('a_retaguarda') }}" readonly
                                >
                            </div>
                        </div>

                        <div class="row g-3 mb-4">

                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Tara</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a tara do teu veículo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="tara" placeholder="Kg" aria-label="First name"
                                value="{{ $veiculo->tara ?? old('tara') }}" readonly
                                >
                            </div>

                            <div class="col">

                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Lotação</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a lotação do teu veículo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->

                                <input type="text" class="form-control" name="lugares" placeholder="Número de lugares" aria-label="First name"
                                value="{{ $veiculo->lugares ?? old('lugares') }}"
                                readonly
                                >
                            </div>

                        </div>
                    </fieldset>

                    {{-- Documentos --}}

                    <fieldset class="my-2">
                        <legend>Carregar Documentos</legend>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Bilhete de Identidade</label>
                            <input class="form-control" type="file" id="bilhete" name="documentos[bilhete]">
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Registro Inicial ou Modelo O</label>
                            <input class="form-control" type="file" id="modelo_o" name="documentos[modelo_o]">
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Registro de Compra e Venda</label>
                            <input class="form-control" type="file" id="compra_venda" name="documentos[compra_venda]">
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Recibo de Pagamento</label>
                            <input class="form-control" type="file" id="recibo_pagamento" name="documentos[recibo_pagamento]">
                        </div>
                    </fieldset> 

                    {{-- Butões --}}
                                        
                    <div class="d-flex flex-end mt-4">
                        <a href="{{ route('veiculo.index') }}" class="btn btn-lg btn-danger me-3" data-kt-element="settings-previous">Cancelar</a>
                        <a href="{{ route('pedido.acd.create', ['id' => $pedidoMatricula->id, 'tipoPedido' => 'AC']) }}" class="btn btn-lg btn-secondary me-3" data-kt-element="settings-previous">Alterar Características</a>
                        <button type="submit" class="btn btn-lg btn-primary" data-kt-element="settings-next">
                            <span class="indicator-label">Enviar</span>
                        </button>
                    </div>

                </div>
                <!--end::Wrapper-->
            </div>
        </div>
    </form>
@endsection