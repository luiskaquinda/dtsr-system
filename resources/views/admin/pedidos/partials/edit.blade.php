@extends('admin.pedidos.layout.app')
@section('title', 'Editar Pedido')

@section('content')
    <form class="container p-4 bg-white rounded" action="{{ route('pedido.update', $pedidoMatricula->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- erros gerais --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li> {{ $erro }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row p-4">
            <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">

                    <div class="pb-12">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-dark">Editar {{ $pedidoMatricula->tipo_pedido->tipo }} </h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-4">Por favor preencha o formulário com atenção.</div>
                        <!--end::Description-->
                    </div>

                    <div class="row g-3 mb-4">
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

                            <input type="text" id="nome_completo" name="nome_completo" class="form-control @error('nome_completo') is-invalid @enderror" placeholder="First name" aria-label="First name"
                            value="{{ $veiculo->proprietario->nome_completo ?? old('nome_completo') }}"
                            >
                            @error('nome_completo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
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

                    <div class="row g-3 mb-4">
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

                    <div class="row g-3 mb-4">
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

                    <fieldset class="my-2">
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

                    <fieldset class="my-2">
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

                        <div class="col mb-0">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Tipo de Carta</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Qual o tipo de carta?">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            {{-- <select class="form-select" name="tipo_carta_conducao"  data-control="select2" data-placeholder="Selecione o tipo de carta">
                                <option value=""></option>
                                <option value="{{ isset($veiculo->proprietario->carta_conducao->tipo_carta_conducao)  ? 'selected' : 'Ligeiro'}}">Ligeiro</option>
                                <option value="{{ isset($veiculo->proprietario->carta_conducao->tipo_carta_conducao)  ? 'selected' : 'Ligeiro Profissional'}}">Ligeiro Profissional</option>
                                <option value="{{ isset($veiculo->proprietario->carta_conducao->tipo_carta_conducao)  ? 'selected' : 'Pesado'}}">Pesado</option>
                                <option value="{{ isset($veiculo->proprietario->carta_conducao->tipo_carta_conducao)  ? 'selected' :  'Outro'}}">Outro</option>
                            </select> --}}

                            @php
                                $tipoAtual = old(
                                    'tipo_carta_conducao',
                                    optional($veiculo->proprietario->carta_conducao)->tipo_carta_conducao
                                );
                            @endphp

                            <select name="tipo_carta_conducao" class="form-select" data-control="select2">
                                <option value=""></option>
                                <option value="Ligeiro" {{ $tipoAtual === 'Ligeiro' ? 'selected' : '' }}>Ligeiro</option>
                                <option value="Ligeiro Profissional" {{ $tipoAtual === 'Ligeiro Profissional' ? 'selected' : '' }}>Ligeiro Profissional</option>
                                <option value="Pesado" {{ $tipoAtual === 'Pesado' ? 'selected' : '' }}>Pesado</option>
                                <option value="Outro" {{ $tipoAtual === 'Outro' ? 'selected' : '' }}>Outro</option>
                            </select>
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

                    <fieldset class="my-2">
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
                                
                                <input type="text" class="form-control" name="tipo_pedido" placeholder="Nome do bairro" aria-label="First name"
                                value="{{ $pedidoMatricula->tipo_pedido->tipo }}"
                                readonly
                                >
                            </div>
                        </div>

                        {{-- Matricula e Data do Primeiro Registro --}}

                        <div class="row g-3 mb-4">
                            
                            <div class="col">
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

                            <div class="col mb-0">
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
                                value="{{ isset($veiculo->primeiro_registro) ? \Carbon\Carbon::parse($veiculo->primeiro_registro)->format('m/d/Y') : old('primeiro_registro') }}"
                                readonly />
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            
                            <div class="col">
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
                                readonly >
                            </div>

                            <div class="col">
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
                                value="{{ $veiculo->numero_cilindros ?? old('numero_cilindros') }}"
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
                                
                                <select class="form-select" name="classe"  data-control="select2" data-placeholder="Selecione o tipo de pedido">
                                    <option></option>
                                    @foreach ($classesVeiculo as $classeVeiculo)
                                        <option value="{{ $classeVeiculo->id  ?? old('classe') }}" {{ (isset($classeVeiculo->id) && $classeVeiculo->id == $veiculo->classe_id) ? 'selected' : '' }}>{{ $classeVeiculo->classe }}</option>
                                    @endforeach
                                </select>
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
                                
                                <select class="form-select" name="combustivel"  data-control="select2" data-placeholder="Selecione o tipo de combustivel">
                                    <option></option>
                                    @foreach ($combustiveis as $combustivel)
                                        <option value="{{ $combustivel->id  ?? old('combustivel') }}" {{ (isset($combustivel->id) && $combustivel->id == $veiculo->combustivel_id) ? 'selected' : '' }}>{{ $combustivel->combustivel }}</option>
                                    @endforeach
                                </select>
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
                                value="{{ $veiculo->medidas_pneumaticas ?? old('medidas_pneumaticas') }}"
                                >
                            </div>

                            <div class="col mb-0">
                                    
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
                                
                                <select class="form-select" name="servico" data-control="select2" data-placeholder="Selecione o tipo de serviço">
                                    <option></option>
                                    @foreach ($servicos as $servico)
                                        <option value="{{ $servico->id  ?? old('servico') }}" {{ (isset($servico->id) && $servico->id == $veiculo->servico_id) ? 'selected' : '' }}>{{ $servico->servico }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">

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
                                value="{{ $veiculo->pais_origem ?? old('pais_origem') }}"
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
                                
                                <select class="form-select" name="tipo_caixa"  data-control="select2" data-placeholder="Selecione o tipo de pedido">
                                    @foreach ($tipos_caixa as $tipo_caixa)
                                        <option value="Aberta" {{ (isset($veiculo->caixa_veiculo->tipo_caixa) && $veiculo->caixa_veiculo->tipo_caixa == 'Aberta') ? 'selected' : '' }}>Aberta</option>
                                        <option value="Fechada" {{ (isset($veiculo->caixa_veiculo->tipo_caixa) && $veiculo->caixa_veiculo->tipo_caixa == 'Fechada') ? 'selected' : '' }}>Fechada</option>
                                    @endforeach
                                    {{-- <option value="Aberta">Aberta</option>
                                    <option value="Fechada">Fechada</option> --}}
                                </select>
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
                                value="{{ $veiculo->caixa_veiculo->distancia_entre_eixos ?? old('distancia_entre_eixos') }}"
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

                                <input type="number"
                                    class="form-control @error('ano_fabrico') is-invalid @enderror"
                                    name="ano_fabrico"
                                    placeholder="Ano de fabrico"
                                    aria-label="Ano de fabrico"
                                    min="1900"
                                    max="{{ date('Y') }}"
                                    step="1"
                                    value="{{ old('ano_fabrico', isset($veiculo->ano_fabrico) ? \Carbon\Carbon::parse($veiculo->ano_fabrico)->format('Y') : '') }}"
                                >

                                @error('ano_fabrico')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

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
                                value="{{ $veiculo->caixa_veiculo->altura ?? old('altura') }}"
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
                                value="{{ $veiculo->pesos_bruto->a_frente ?? old('a_frente') }}"
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
                                value="{{ $veiculo->pesos_bruto->ao_meio ?? old('ao_meio') }}"
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
                                value="{{ $veiculo->pesos_bruto->a_retaguarda ?? old('a_retaguarda') }}"
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
                                value="{{ $veiculo->tara ?? old('tara') }}"
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
                                >
                            </div>

                        </div>
                    </fieldset>

                    {{-- Documentos --}}

                    <fieldset class="my-2">
                        <legend>Editar Documentos</legend>

                        <div class="mb-3">
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
                            <input
                                class="form-control @error('documentos.bilhete') is-invalid @enderror"
                                type="file"
                                id="bilhete"
                                name="documentos[bilhete]"
                            >
                            @error('documentos.bilhete')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div class="mb-3">
                            
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
                            <input
                                class="form-control @error('documentos.modelo_o') is-invalid @enderror"
                                type="file"
                                id="modelo_o"
                                name="documentos[modelo_o]"
                            >
                            @error('documentos.modelo_o')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
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
                            <input
                                class="form-control @error('documentos.compra_venda') is-invalid @enderror"
                                type="file"
                                id="compra_venda"
                                name="documentos[compra_venda]"
                            >
                            @error('documentos.compra_venda')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Recibo de Pagamento</label>
                            <div class="ms-4 my-2">
                                @php
                                    $encontrado = false;
                                @endphp
                        
                                @foreach ($documentos as $documento)    
                                    @if ($documento->tipo_documento == 'recibo_pagamento' && isset($documento->url))
                                        <strong>Recibo de Pagamento:</strong> 
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
                            <input
                                class="form-control @error('documentos.recibo_pagamento') is-invalid @enderror"
                                type="file"
                                id="recibo_pagamento"
                                name="documentos[recibo_pagamento]"
                            >
                            @error('documentos.recibo_pagamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset> 

                    {{-- Imagens --}}

                    <fieldset>
                        <legend>Editar Imagens</legend>

                        <!-- imagens já guardadas no BD -->
                        <div id="listaImagens" style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:8px;">
                            @foreach($veiculo->imagens as $img)
                                <div class="imagem-item-bd" data-id="{{ $img->id }}" style="position:relative;">
                                    <input type="checkbox" name="remover_imagens[]" value="{{ $img->id }}" style="position:absolute; top:6px; left:6px; z-index:2;">
                                    <img src="{{ asset('storage/' . $img->path) }}" style="width:120px; height:120px; object-fit:cover; border-radius:8px; border:1px solid #ddd;">
                                </div>
                            @endforeach
                        </div>

                        <h3>Adicionar novas imagens</h3>
                        <input type="file" id="inputImagens" name="imagens[]" multiple accept="image/*">

                        <div id="previewImagens" style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;"></div>

                    </fieldset>

                    {{-- Butões --}}
                                        
                    <div class="d-flex flex-end mt-4">
                        <a href="{{ route('veiculo.index') }}" class="btn btn-lg btn-light me-3" data-kt-element="settings-previous">Cancelar</a>
                        <button type="submit" class="btn btn-lg btn-primary" data-kt-element="settings-next">
                            <span class="indicator-label">Salvar</span>
                        </button>
                    </div>

                </div>
                <!--end::Wrapper-->
            </div>
        </div>
    </form>
@endsection

@push('css_imagem')
    <style>
        #kt_header_search .custom-search {
            display: none !important;
        }
    </style>

    <style>
        .preview-thumb {
            position: relative;
            width: 120px;
            height: 120px;
            border-radius: 8px;
            overflow: hidden;
            background: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .preview-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .preview-remove {
            position: absolute;
            top: 4px;
            right: 4px;
            background: rgba(0,0,0,0.6);
            border: none;
            color: white;
            font-size: 16px;
            line-height: 1;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        .preview-filename {
            font-size: 11px;
            text-align: center;
            margin-top: 4px;
            word-break: break-all;
        }

    </style>
@endpush
@push('anonimo')

{{-- <script>
    document.getElementById('inputImagens').addEventListener('change', function(e) {
        const preview = document.getElementById('previewImagens');
        
        Array.from(e.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(event) {
                const container = document.createElement('div');
                container.classList.add('imagem-item');
                container.style.position = 'relative';
                container.style.display = 'inline-block';

                // botão "x" para remover
                const btn = document.createElement('button');
                btn.innerHTML = '×';
                btn.type = 'button';
                btn.style.position = 'absolute';
                btn.style.top = '5px';
                btn.style.right = '5px';
                btn.style.background = 'rgba(0,0,0,0.6)';
                btn.style.color = 'white';
                btn.style.border = 'none';
                btn.style.borderRadius = '50%';
                btn.style.width = '20px';
                btn.style.height = '20px';
                btn.style.cursor = 'pointer';
                btn.style.fontSize = '14px';
                btn.style.lineHeight = '18px';
                btn.onclick = () => container.remove();

                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.width = '120px';
                img.style.height = '120px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '8px';
                img.style.border = '1px solid #ddd';

                container.appendChild(img);
                container.appendChild(btn);
                preview.appendChild(container);
            };
            reader.readAsDataURL(file);
        });

        // Permite adicionar mais imagens depois sem sobrescrever as anteriores
        e.target.value = "";
    });
</script> --}}

{{-- <script>
    document.getElementById('inputImagens').addEventListener('change', function(event) {
        let preview = document.getElementById('previewImagens');
        preview.innerHTML = ""; // limpa antes de exibir
    
        for (let file of event.target.files) {
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = "120px";
                img.style.height = "120px";
                img.style.objectFit = "cover";
                img.style.borderRadius = "8px";
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });
</script> --}}

{{-- Script para inserir várias imagens --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
      const input = document.getElementById('inputImagens');
      const preview = document.getElementById('previewImagens');
    
      if (!input || !preview) return;
    
      // Array com os File selecionados (apenas os novos, não as imagens do BD)
      let selectedFiles = [];
    
      // Helper: identifica um ficheiro por name|size|lastModified
      function fileKey(f) {
        return `${f.name}_${f.size}_${f.lastModified}`;
      }
    
      // Adiciona novos ficheiros evitando duplicados
      function addFiles(files) {
        const seen = new Set(selectedFiles.map(f => fileKey(f)));
        Array.from(files).forEach(f => {
          const key = fileKey(f);
          if (!seen.has(key)) {
            selectedFiles.push(f);
            seen.add(key);
          }
        });
        syncInputFiles();
        renderPreviews();
      }
    
      // Remove ficheiro por índice
      function removeFileAt(index) {
        if (index < 0 || index >= selectedFiles.length) return;
        selectedFiles.splice(index, 1);
        syncInputFiles();
        renderPreviews();
      }
    
      // Recria FileList no input a partir do selectedFiles
      function syncInputFiles() {
        const dt = new DataTransfer();
        selectedFiles.forEach(f => dt.items.add(f));
        input.files = dt.files;
      }
    
      // Renderiza as previews de selectedFiles
      function renderPreviews() {
        preview.innerHTML = '';
        selectedFiles.forEach((file, i) => {
          const wrapper = document.createElement('div');
          wrapper.className = 'preview-thumb';
          wrapper.style.position = 'relative';
          wrapper.style.width = '120px';
          wrapper.style.height = '120px';
          wrapper.style.borderRadius = '8px';
          wrapper.style.overflow = 'hidden';
          wrapper.style.border = '1px solid #ddd';
          wrapper.style.background = '#fff';
    
          const img = document.createElement('img');
          img.src = URL.createObjectURL(file);
          img.style.width = '100%';
          img.style.height = '100%';
          img.style.objectFit = 'cover';
          img.alt = file.name;
    
          const btn = document.createElement('button');
          btn.type = 'button';
          btn.innerHTML = '&times;';
          btn.title = 'Remover';
          btn.style.position = 'absolute';
          btn.style.top = '6px';
          btn.style.right = '6px';
          btn.style.width = '22px';
          btn.style.height = '22px';
          btn.style.borderRadius = '50%';
          btn.style.background = 'rgba(0,0,0,0.6)';
          btn.style.color = '#fff';
          btn.style.border = 'none';
          btn.style.cursor = 'pointer';
    
          btn.addEventListener('click', function () {
            // remove file i
            removeFileAt(i);
          });
    
          wrapper.appendChild(img);
          wrapper.appendChild(btn);
          preview.appendChild(wrapper);
    
          // revoked objectURL após imagem carregar para liberar memória
          img.onload = () => URL.revokeObjectURL(img.src);
        });
      }
    
      // Listener principal
      input.addEventListener('change', function (e) {
        const files = e.target.files;
        if (!files || files.length === 0) return;
        addFiles(files);
    
        // NÃO limpar e.target.value (isso remove os files do input)
        // e.target.value = '';
      });
    
      // Caso precises de limpar tudo por exemplo num reset:
      const form = input.closest('form');
      if (form) {
        form.addEventListener('reset', function () {
          selectedFiles = [];
          syncInputFiles();
          renderPreviews();
          // Desmarca checkboxes de remover imagens do BD se quiseres:
          // document.querySelectorAll('input[name="remover_imagens[]"]').forEach(cb => cb.checked = false);
        });
      }
    
      // Opcional: se queres permitir arrastar & soltar para o preview
      preview.addEventListener('dragover', function(ev) {
        ev.preventDefault();
        ev.dataTransfer.dropEffect = 'copy';
      });
      preview.addEventListener('drop', function(ev) {
        ev.preventDefault();
        if (ev.dataTransfer && ev.dataTransfer.files) {
          addFiles(ev.dataTransfer.files);
        }
      });
    
    });
</script>
        
{{-- End Script para inserir várias imagens --}}
    <script>
        document.getElementById('anonima').addEventListener('change', function() {
            const nomeContainer = document.getElementById('nomeContainer');
            nomeContainer.style.display = this.checked ? 'none' : 'block';
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        $('#kt_modal_scrollable_2').on('shown.bs.modal', function () {
            $('#selectTipoAlertaModal')   // <<< este id deve existir no <select>
            .select2({
                placeholder: 'Selecione um tipo de alerta...',
                allowClear:  true,
                minimumResultsForSearch: 0,   // 0 = sempre mostrar a caixa de busca
                dropdownParent: $('#kt_modal_scrollable_2')
            });
        });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        $('#kt_modal_scrollable_2').on('shown.bs.modal', function () {
            $('#selectMunicipio')   // <<< este id deve existir no <select>
            .select2({
                placeholder: 'Selecione o municipio...',
                allowClear:  true,
                minimumResultsForSearch: 0,   // 0 = sempre mostrar a caixa de busca
                dropdownParent: $('#kt_modal_scrollable_2')
            });
        });
        });
    </script>

    <script>
        // Captura os elementos
        const toggle = document.getElementById('anonima');
        const nomeContainer = document.getElementById('nomeContainer');
    
        // Função que mostra ou esconde o input
        function atualizaVisibilidade() {
            // Se estiver marcado (anônimo), esconda o campo de nome
            if (toggle.checked) {
                nomeContainer.style.display = 'none';
            } else {
                nomeContainer.style.display = 'block';
            }
        }
    
        // Atacha o listener ao change do checkbox
        toggle.addEventListener('change', atualizaVisibilidade);
    
        // Inicializa o estado ao carregar a página
        atualizaVisibilidade();
    </script>
    
    {{-- Toaster de susseco --}}
    <script>
        @if(session('success'))
            // Você pode configurar opções adicionais aqui, se quiser
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "3000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('success') }}");
            // toastr.success("Logado", "Login efetuado com sucesso!");
        @endif
    </script>

    {{-- Toaster de erro --}}
    <script>
        @if(session('error'))
            // Você pode configurar opções adicionais aqui, se quiser
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "3000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('error') }}");
            // toastr.success("Logado", "Login efetuado com sucesso!");
        @endif
    </script>    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Ajuste: pegue o modal pelo ID da DIV, não do form
          var modal = document.getElementById('kt_modal_scrollable_2');
        
          modal.addEventListener('shown.bs.modal', function () {
            // Se já existir uma instância anterior, destrua-a
            if (modal.fv) {
              modal.fv.dispose();
            }
        
            // Ajuste: use o ID “formCreateAlerta” que deve existir no seu <form>
            modal.fv = FormValidation.formValidation(
              document.getElementById('formCreateAlerta'),
              {
                fields: {
                  titulo: {
                    validators: {
                      notEmpty: {
                        message: 'O título é obrigatório entendeu!'
                      },
                      stringLength: {
                        max: 255,
                        message: 'Máximo de 255 caracteres'
                      }
                    }
                  },
                  data_ocorrido: {
                    validators: {
                      notEmpty: { message: 'A data é obrigatória' },
                      date: {
                        format: 'YYYY-MM-DD',
                        message: 'Use o formato YYYY-MM-DD'
                      }
                    }
                  },
                  tipo_alerta: {
                    validators: {
                      notEmpty: { message: 'Selecione um tipo de alerta' }
                    }
                  }
                  // … outros campos
                },
                plugins: {
                  // Declara o Trigger apenas uma vez, com os eventos que deseja
                  trigger: new FormValidation.plugins.Trigger({
                    event: {
                      titulo:        ['input', 'blur'],   // valida ao digitar e ao sair
                      data_ocorrido: ['change', 'blur'],  // datepicker → change
                      tipo_alerta:   ['change']           // select → change
                    }
                  }),
                  bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                  }),
                  submitButton: new FormValidation.plugins.SubmitButton(),
                  defaultSubmit: new FormValidation.plugins.DefaultSubmit()
                }
              }
            );
          });
        });
    </script>
        
@endpush




