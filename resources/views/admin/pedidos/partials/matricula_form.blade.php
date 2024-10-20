@extends('admin.pedidos.layout.app')
@section('title', 'Matrícula')

@section('content')
    <form class="container p-4 bg-white rounded" action="{{ route('pedido.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row p-4">
            <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">
        
                    <div class="pb-12">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-dark">Pedido de Matricula do Veículo</h1>
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
                            <input type="text" id="nome_completo" name="nome_completo" class="form-control" placeholder="First name" aria-label="First name">
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
                            <input type="text" id="apelido_empresa" class="form-control" placeholder="Digite o nome/apelido da empresa" aria-label="First name" name="apelido_empresa">
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
                            <input class="form-control form-control-solid" name="data_nascimento" placeholder="MM/DD/YYYY" id="kt_daterangepicker_1"/>
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
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
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
                            <input type="number" id="telemovel" name="telemovel" class="form-control" placeholder="Digite o teu número de telefone" aria-label="Digite o teu nome completo">
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
                            <input type="email" id="email" name="email" class="form-control" placeholder="Digite o teu melhor email"/>
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
                                <input type="text" id="numero" name="numero_bilhete" class="form-control" placeholder="Digite o teu B.I" aria-label="First name">
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
                                <input class="form-control form-control-solid" name="data_emissao_bilhete" placeholder="MM/DD/YYYY" id="kt_daterangepicker_2"/>
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
                                <input class="form-control form-control-solid" name="data_validade_bilhete" placeholder="MM/DD/YYYY" id="kt_daterangepicker_3"/>
                            </div>
                            {{-- <div class="col mb-0">
                                
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Arquivo de Identificação</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Onde emitiste o teu B.I">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                
                                <select class="form-select"  data-control="select2" data-placeholder="Sexo">
                                    <option></option>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia->id }}"> {{ $provincia->nome_provincia }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
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
                                <input type="text" class="form-control" name="numero_carta_conducao" placeholder="Digite o número da tua carta de condução" aria-label="First name">
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
                                <input class="form-control form-control-solid" name="data_emissao_carta_conducao" placeholder="MM/DD/YYYY" id="kt_daterangepicker_4"/>
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
                                <input class="form-control form-control-solid" name="data_validade_carta_conducao" placeholder="MM/DD/YYYY" id="kt_daterangepicker_5"/>
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
                                <input type="text" class="form-control" name="rua" placeholder="Nome da rua" aria-label="First name">
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
                                <input type="text" class="form-control" name="bairro" placeholder="Nome do bairro" aria-label="First name">
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
                                        <option value="{{ $municipio->id }}"> {{ $municipio->nome_municipio }}</option>
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
                                
                                <input type="text" class="form-control" name="tipo_pedido" placeholder="Nome do bairro" aria-label="First name" value="{{ $tipoPedidoMatricula->tipo }}" readonly>
                            </div>
                        </div>
        
                        {{-- Matricula e Data do Primeiro Registro --}}
        
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
                                <input type="text" class="form-control" name="marca" placeholder="Marca do veiculo" aria-label="First name">
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
                                <input type="text" class="form-control" name="modelo" placeholder="Modelo do veiculo" aria-label="First name">
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
                                <input type="text" class="form-control" name="quadro" placeholder="Número do Quadro" aria-label="First name">
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
                                <input type="text" class="form-control" name="motor" placeholder="Número do Motor" aria-label="First name">
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
                                <input type="text" class="form-control" name="cor" placeholder="Cor do Veículo" aria-label="First name">
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
        
                                <input type="text" class="form-control" name="numero_cilindros" placeholder="Número do Quadro" aria-label="First name">
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
                                        <option value="{{ $classeVeiculo->id }}"> {{ $classeVeiculo->classe }}</option>
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
                                        <option value="{{ $combustivel->id }}"> {{ $combustivel->combustivel }}</option>
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
        
                                <input type="text" class="form-control" name="medidas_pneumaticas" placeholder="Medidas dos Pneumáticos" aria-label="First name">
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
                                        <option value="{{ $servico->id }}"> {{ $servico->servico }}</option>
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
        
                                <input type="text" class="form-control" name="pais_origem" placeholder="Digite o país de origem" aria-label="First name">
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
                                    <option value="Aberta">Aberta</option>
                                    <option value="Fechada">Fechada</option>
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
        
                                <input type="text" class="form-control" name="distancia_entre_eixos" placeholder="Distância entre eixos" aria-label="First name">
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
        
                                <input type="text" class="form-control" name="ano_fabrico" placeholder="Altura da Caixa" aria-label="First name">
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
        
                                <input type="text" class="form-control" name="altura" placeholder="Altura da Caixa" aria-label="First name">
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
        
                                <input type="text" class="form-control" name="a_frente" placeholder="Peso a frente" aria-label="First name">
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
        
                                <input type="text" class="form-control" name="ao_meio" placeholder="Peso ao meio" aria-label="First name">
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
        
                                <input type="text" class="form-control" name="a_retaguarda" placeholder="Peso a retaguarda" aria-label="First name">
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
        
                                <input type="text" class="form-control" name="tara" placeholder="Kg" aria-label="First name">
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
        
                                <input type="text" class="form-control" name="lugares" placeholder="Número de lugares" aria-label="First name">
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
                        <a href="{{ route('veiculo.index') }}" class="btn btn-lg btn-light me-3" data-kt-element="settings-previous">Cancelar</a>
                        <button type="submit" class="btn btn-lg btn-primary" data-kt-element="settings-next">
                            <span class="indicator-label">Cadastrar</span>
                        </button>
                    </div>
        
                </div>
                <!--end::Wrapper-->
            </div>
        </div>
    </form>
@endsection