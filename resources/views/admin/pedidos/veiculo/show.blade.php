@extends('admin.veiculo.layout.app')
@section('title', 'Pedido')

@section('content')

    @if (session('success'))
        <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Detalhe do Pedido</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <form class="row person-button-container">

                {{-- Atribuir Matricula --}}

                @can('atribuir_matricula')
                    @if ($pedido->veiculo->matricula_id == null)
                        <a href="#" class="btn btn-sm btn-warning align-self-center text-center"
                        type="button" data-bs-toggle="modal" data-bs-target="#atribuir_matricula"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0"/>
                            </svg>
                        </a>
                    @endif

                @endcan

                @can('atribuir_multa')    
                    @if ($pedido->veiculo->matricula_id !== null)
                        <a href="../dist/account/settings.html" class="btn btn-sm btn-warning align-self-center text-center"
                        type="button" data-bs-toggle="modal" data-bs-target="#atribuir_multa"
                        >
                            <strong>MLT</strong>
                        </a>
                    @endif

                    @if (empty($pedido->veiculo->matricula_id))
                        <a href="../dist/account/settings.html" class="btn btn-sm btn-warning align-self-center text-center"
                        type="button" data-bs-toggle="modal" data-bs-target="#rejeitar_pedido"
                        >
                            <strong>RJP</strong>
                        </a>
                    @endif              
                @endcan

                @can('aprovar_pedido')
                    @if ($pedido->status == "0")
                        <a href="../dist/account/settings.html" class="btn btn-sm btn-success align-self-center text-center">
                            <i class="bi bi-check-circle-fill fs-2"></i>
                        </a>
                    @endif
                @endcan

                <a href="{{ route('pedidos.pdf', $pedido->id) }}" class="btn btn-sm btn-warning align-self-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                        <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
                        <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
                      </svg>
                </a>

                @can('notificar_proprietario')
                    <a href="../dist/account/settings.html" class="btn btn-sm btn-warning align-self-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64"/>
                        </svg>
                    </a>
                @endcan
            </form>
            <!--end::Action-->
        </div>
        <!--begin::Card header-->

        <!--begin::Card body-->
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
                <label class="col-lg-4 fw-semibold text-muted">
                    Matricula
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4">
                    @if ($pedido->veiculo->matricula_id == null)
                        <span class="fw-semibold text-danger fs-6">Sem matricula atribuido</span>
                    @else
                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->matricula->matricula }}</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-5">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">
                    Data do Primeiro Registro
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4">
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
                <label class="col-lg-4 fw-semibold text-muted">
                    Apelido(s)/Nome da Empresa
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4 fv-row"> 
                    @if ($pedido->veiculo->proprietario->apelido_empresa == null)
                        <span class="fw-semibold text-danger fs-6">Sem apelido(s) ou nome da empresa</span>
                    @else
                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->proprietario->apelido_empresa }}</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
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
            </div>

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">
                    Data Nascimento
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->data_nascimento }}
                    </span>
                </div>
                <!--end::Col-->
                <!--begin::Label-->
                <label class="col-lg-2 fw-semibold text-muted">
                    Sexo
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-2 fv-row">
                    <span class="badge badge-success fs-6">{{ $pedido->veiculo->proprietario->sexo }}</span>
                </div>
                <!--end::Col-->
            </div>

            <!--end::Input group-->

            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">
                    Residência Actual
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4 fv-row">
                    <span class="fw-semibold text-gray-400 fs-6">
                        Bairro: 
                    </span>      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->residencia->bairro }}
                    </span>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-4 fv-row">
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
                <label class="col-lg-4 fw-semibold text-muted">
                    Bilhete
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->bilhete->numero_bilhete }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">
                    Email
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4 fv-row">      
                    <span class="fw-semibold text-gray-800 fs-6">
                        {{ $pedido->veiculo->proprietario->email }}
                    </span>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">
                    Telefone
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-4 fv-row">      
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
                        @foreach ($classes as $classe)
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
                                <a href="{{ asset('storage/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
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
                                <a href="{{ asset('storage/' . $documento->url) }}" target="_blank">
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
                                <a href="{{ asset('storage/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
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
                                <a href="{{ asset('storage/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
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
        <!--end::Card body-->
    </div>
    <!--end::details View-->

    {{-- Atribuir Multa --}}

    <form class="modal fade" tabindex="-1" id="atribuir_multa" action="{{ route('multa.store', 
    ['id' => $pedido->id, 'user_id' => Auth::user()]) }}" method="POST">
        @csrf
        @method('POST')

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Atribuir Multa</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">

                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Fica notificado:
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-4 fv-row">      
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{      $pedido->veiculo->proprietario->nome_completo}}
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            BI nº:
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-4 fv-row">      
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $pedido->veiculo->proprietario->bilhete->numero_bilhete }}
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Residência em:
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-4 fv-row">      
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $pedido->veiculo->proprietario->residencia->municipio->nome_municipio }}
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>
                    
                    {{-- Residêmcia --}}

                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Rua:
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-4 fv-row">      
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $pedido->veiculo->proprietario->residencia->rua }}
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>

                    {{-- Numero --}}

                    <div class="row g-3 mb-4">
                        <div class="col mb-0">
                            
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Nº</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Digite o número">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            
                            <input type="text" class="form-control" name="numero_" placeholder="Nome do bairro" aria-label="nº">
                        </div>
                    </div>

                    {{-- Número da Carta --}}

                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Número da Carta de Condução:
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-4 fv-row">      
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $pedido->veiculo->proprietario->carta_conducao->numero_carta_conducao 
                                }}
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>

                    {{-- Tipo da Carta --}}

                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Tipo da Carta:
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-4 fv-row">      
                            <span class="fw-semibold text-gray-800 fs-6">
                                {{ $pedido->veiculo->proprietario->carta_conducao->tipo_carta_conducao 
                                }}
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>

                    {{-- Tipo de Multa --}}

                    <div class="row g-3 mb-4">
                        <div class="col-12 mb-1">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Tipo de Multa</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Selecione tipo de multa">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>

                            <!--end::Label-->
                            <select class="form-select" name="tipo_de_multa"  data-control="select2" data-hide-search="true" data-placeholder="Selecione o tipo de multa">
                                <option></option>
                                @foreach ($tipos_multa as $tipo)
                                    <option value = "{{ $tipo->id }}"> {{ $tipo->tipo }} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <input type="hidden" name="phone" value="{{ $pedido->veiculo->proprietario->telemovel }}">

                    <input type="hidden" name="message" value="Mensagem enviada para o senhor pois recebeu uma MULTA">

                    {{-- Número do Artigo --}}

                    <div class="row g-3 mb-4">
                        <div class="col mb-0">
                            
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">A luz do artigo nº</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Digite o número do artigo">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            
                            <input type="text" class="form-control" name="infracao_artigo" placeholder="Digite o artigo" aria-label="nº">
                        </div>
                    </div>

                    {{-- Documento apreendido --}}

                    <div class="row g-3 mb-4">
                        <div class="col mb-1">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Documento apreendido</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Selecione documento apreendido">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>

                            <!--end::Label-->
                            <select class="form-select" name="documento_apreendido"
                            data-hide-search="true"  data-control="select2" data-placeholder="Selecione o documento apreendido">
                                <option value="Bilhete">Bilhete</option>
                                <option value="Carta de Condução">Carta de Condução</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>

                    {{-- UCF --}}

                    <div class="row g-3 mb-4">
                        <div class="col mb-0">
                            
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">UCF's</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Digite o número de UCF's a pagar">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            
                            <input type="number" class="form-control" name="ucf" placeholder="Número de UCF's" aria-label="UCF's">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    
                    <button type="button" class="btn btn-danger" data-bs-stacked-modal="#kt_modal_stacked_3">
                        Aplicar
                    </button>
                </div>
            </div>
        </div>
        
        <div class="modal fade" tabindex="-1" id="kt_modal_stacked_3">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Cuidado!</h3>
            
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->

                    </div>
            
                    <div class="modal-body fs-2">
                        Deseja mesmo atribuir a multa?
                    </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    {{-- Atribuir Matriculas --}}

    <form class="modal fade" tabindex="-1" id="atribuir_matricula" action="{{ route('matricula.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Atribuir matrícula</h3>
        
                    <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    <!--end::Close-->
                </div>
        
                <div class="modal-body">

                    <div class="row g-3 mb-4">
                        <div class="col-12 mb-1">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Província</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Em que município fica o teu bairro?">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>

                            <!--end::Label-->
                            <select class="form-select" name="provincia"  data-control="select2" data-placeholder="Selecione a província que atribui a matricula">
                                <option></option>
                                @foreach ($provincias as $provincia)
                                    <option value="{{ $provincia->nome_provincia }}"> {{ $provincia->nome_provincia }} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Tipo de Matrícula</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Selecione o tipo de matricula">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <select class="form-select" name="tipo_matricula" data-hide-search="true" data-control="select2" data-placeholder="tipo_matricula">
                                <option></option>
                                <option value="Domestico">Domestico</option>
                                <option value="Consular">Consular</option>
                                <option value="Governamental">Governamental</option>
                                <option value="Militar">Militar</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    
                    @if ($pedido->veiculo->matricula_id == null)
                        <button type="submit" class="btn btn-danger">Salvar</button>
                    @else
                        <button type="button" class="btn btn-danger" data-bs-stacked-modal="#kt_modal_stacked_2">
                            Salvar
                        </button>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="modal fade" tabindex="-1" id="kt_modal_stacked_2">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Cuidado!</h3>
            
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->

                    </div>
            
                    <div class="modal-body fs-2">
                        O veiculo já possui uma matrícula. Ainda assim deseja continuar e alterar a matrícula?
                    </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    {{-- Rejeitar Pedido --}}

    <form class="modal fade" tabindex="-1" id="rejeitar_pedido" action="{{ route('matricula.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Rejeitar pedido</h3>
        
                    <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    <!--end::Close-->
                </div>
        
                <div class="modal-body">

                    <div class="row g-3 mb-4">
                        <div class="col-12 mb-1">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Motivo</span>
                                <span class="ms-1" data-bs-toggle="tooltip">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>

                            <!--end::Label-->
                            <select class="form-select" name="provincia"  data-control="select2" data-placeholder="Selecione a província que atribui a matricula">
                                <option></option>
                                <option value="Preencimento incorrecto">Preencimento incorrecto</option>
                                <option value="Documentos em falta">Documentos em falta</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>

                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Mensagem</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Selecione o tipo de matricula">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text">Digite</span>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    
                    @if ($pedido->veiculo->matricula_id == null)
                        <button type="submit" class="btn btn-danger">Salvar</button>
                    @else
                        <button type="button" class="btn btn-danger" data-bs-stacked-modal="#kt_modal_stacked_2">
                            Salvar
                        </button>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="modal fade" tabindex="-1" id="kt_modal_stacked_2">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Cuidado!</h3>
            
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->

                    </div>
            
                    <div class="modal-body fs-2">
                        O veiculo já possui uma matrícula. Ainda assim deseja continuar e alterar a matrícula?
                    </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection

@section('custom_js')
    <script src="{{ asset('admin/js/custom/apps/ecommerce/catalog/products.js') }}"></script>
    <script src="{{ asset('admin/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/create-project/main.js') }}"></script>
    <script src="{{ asset('admin/js/custom/utilities/modals/users-search.js') }}"></script>
@endsection

