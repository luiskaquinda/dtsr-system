@extends('admin.pedidos.layout.app')
@section('title', 'Solicitação')

@section('content')
    <form class="container p-4 bg-white rounded" action="{{ route('pedido.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        
        {{-- erros gerais --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
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
                        <h1 class="fw-bold text-dark">Solicitação de Matritula do Veículo</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-4">Por favor preencha o formulário com atenção.</div>
                        <!--end::Description-->
                    </div>

                    {{-- Nome Completo --}}

                    <div class="row g-3 mb-4">
                        <div class="col">
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
                            <input
                                type="text"
                                name="nome_completo"
                                value="{{ old('nome_completo') }}"
                                class="form-control @error('nome_completo') is-invalid @enderror"
                            >
                            @error('nome_completo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row g-3 mb-4">

                        {{-- Apelido da Empresa --}}

                        <div class="col">
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
                            <input
                                type="text"
                                name="apelido_empresa"
                                value="{{ old('apelido_empresa') }}"
                                class="form-control @error('apelido_empresa') is-invalid @enderror"
                            >
                            @error('apelido_empresa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        {{-- Data de Nascimento --}}

                        <div class="col">
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
                            <input
                                type="text"
                                name="data_nascimento"
                                id="kt_daterangepicker_1"
                                value="{{ old('data_nascimento') }}"
                                class="form-control form-control-solid @error('data_nascimento') is-invalid @enderror"
                            >
                            @error('data_nascimento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row g-3 mb-4">
                        
                        {{-- Sexo --}}
                    
                        <div class="col">
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
                            <select
                                name="sexo"
                                class="form-select @error('sexo') is-invalid @enderror"
                                data-control="select2" data-hide-search="true"
                            >
                                <option value="">Selecione o sexo</option>
                                <option value="M" {{ old('sexo')==='M' ? 'selected':'' }}>Masculino</option>
                                <option value="F" {{ old('sexo')==='F' ? 'selected':'' }}>Feminino</option>
                            </select>
                            @error('sexo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Telefone --}}

                        <div class="col">
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
                            <input
                                type="text"
                                name="telemovel"
                                value="{{ old('telemovel') }}"
                                class="form-control @error('telemovel') is-invalid @enderror"
                            >
                            @error('telemovel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
        
                    {{-- Email --}}
                    <div class="row g-3 mb-4">
                        <div class="col">
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
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o teu numero do B.I">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <input
                                    type="text"
                                    name="numero_bilhete"
                                    id="numero_bilhete"
                                    value="{{ old('numero_bilhete') }}"
                                    class="form-control form-control-solid @error('numero_bilhete') is-invalid @enderror"
                                    placeholder="Digite o teu B.I"
                                >
                                @error('numero_bilhete')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <input
                                    type="text"
                                    name="data_emissao_bilhete"
                                    id="kt_daterangepicker_2"
                                    value="{{ old('data_emissao_bilhete') }}"
                                    class="form-control form-control-solid @error('data_emissao_bilhete') is-invalid @enderror"
                                    placeholder="DD/MM/YYYY"
                                >
                                @error('data_emissao_bilhete')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <input
                                    type="text"
                                    name="data_validade_bilhete"
                                    id="kt_daterangepicker_2"
                                    value="{{ old('data_validade_bilhete') }}"
                                    class="form-control form-control-solid @error('data_validade_bilhete') is-invalid @enderror"
                                    placeholder="DD/MM/YYYY"
                                >
                                @error('data_validade_bilhete')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
        
                    {{-- Carta de Condução --}}

                    <fieldset class="my-2">
                        <legend>Carta de Condução</legend>

                        <div class="row g-3 mb-4">
                            <div class="col">
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
                                <input
                                    type="text"
                                    name="numero_carta_conducao"
                                    value="{{ old('numero_carta_conducao') }}"
                                    class="form-control @error('numero_carta_conducao') is-invalid @enderror"
                                    placeholder="Digite o número da tua carta de condução"
                                    aria-label="Número da Carta de Condução"
                                >
                                @error('numero_carta_conducao')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col mb-0">
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
                                <select
                                    name="tipo_carta_conducao"
                                    class="form-select @error('tipo_carta_conducao') is-invalid @enderror"
                                    data-control="select2"
                                    data-placeholder="Selecione o tipo de carta"
                                >
                                    <option value="">-- selecione --</option>
                                    <option value="Ligeiro" {{ old('tipo_carta_conducao') === 'Ligeiro' ? 'selected' : '' }}>Ligeiro</option>
                                    <option value="Ligeiro Profissional" {{ old('tipo_carta_conducao') === 'Ligeiro Profissional' ? 'selected' : '' }}>Ligeiro Profissional</option>
                                    <option value="Pesado" {{ old('tipo_carta_conducao') === 'Pesado' ? 'selected' : '' }}>Pesado</option>
                                    <option value="Outro" {{ old('tipo_carta_conducao') === 'Outro' ? 'selected' : '' }}>Outro</option>
                                </select>
                                @error('tipo_carta_conducao')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col mb-0">
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
                                <input
                                    type="text"
                                    name="data_emissao_carta_conducao"
                                    id="kt_daterangepicker_4"
                                    value="{{ old('data_emissao_carta_conducao') }}"
                                    class="form-control form-control-solid @error('data_emissao_carta_conducao') is-invalid @enderror"
                                    placeholder="DD/MM/YYYY"
                                >
                                @error('data_emissao_carta_conducao')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mb-0">
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
                                <input
                                    type="text"
                                    name="data_validade_carta_conducao"
                                    id="kt_daterangepicker_5"
                                    value="{{ old('data_validade_carta_conducao') }}"
                                    class="form-control form-control-solid @error('data_validade_carta_conducao') is-invalid @enderror"
                                    placeholder="DD/MM/YYYY"
                                >
                                @error('data_validade_carta_conducao')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    
        
                    {{-- Endereço --}}
        
                    <fieldset class="my-2">
                        <legend>Endereço</legend>
                    
                        <div class="row g-3 mb-4">
                            {{-- Rua --}}
                            <div class="col">
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
                                <input
                                    type="text"
                                    name="rua"
                                    value="{{ old('rua') }}"
                                    class="form-control @error('rua') is-invalid @enderror"
                                    placeholder="Nome da rua"
                                    aria-label="Rua"
                                >
                                @error('rua')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            {{-- Bairro --}}
                            <div class="col">
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
                                <input
                                    type="text"
                                    name="bairro"
                                    value="{{ old('bairro') }}"
                                    class="form-control @error('bairro') is-invalid @enderror"
                                    placeholder="Nome do bairro"
                                    aria-label="Bairro"
                                >
                                @error('bairro')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            {{-- Município --}}
                            <div class="col mb-0">
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
                                <select
                                    name="municipio_id"
                                    class="form-select @error('municipio_id') is-invalid @enderror"
                                    data-control="select2"
                                    data-placeholder="Selecione o município do teu bairro"
                                >
                                    <option value="">Selecione o municipio</option>
                                    @foreach ($municipios as $municipio)
                                        <option
                                            value="{{ $municipio->id }}"
                                            {{ old('municipio_id') == $municipio->id ? 'selected' : '' }}
                                        >
                                            {{ $municipio->nome_municipio }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('municipio_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    
        
                    {{-- Dados do Veículo --}}

                    <fieldset class="my-2">
                        <legend>Dados do Veículo</legend>
                    
                        {{-- Tipo de Pedido (readonly) --}}

                        <div class="row g-3 mb-4">
                            <div class="col mb-0">
                                <label class="required">Tipo de Pedido</label>
                                <input
                                    type="text"
                                    name="tipo_pedido"
                                    value="{{ $tipoPedidoMatricula->tipo }}"
                                    class="form-control"
                                    readonly
                                >
                            </div>
                        </div>
                    
                        {{-- Marca e Modelo --}}

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <label class="required">Marca</label>
                                <input
                                    type="text"
                                    name="marca"
                                    value="{{ old('marca') }}"
                                    class="form-control @error('marca') is-invalid @enderror"
                                    placeholder="Marca do veículo"
                                >
                                @error('marca')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="required">Modelo</label>
                                <input
                                    type="text"
                                    name="modelo"
                                    value="{{ old('modelo') }}"
                                    class="form-control @error('modelo') is-invalid @enderror"
                                    placeholder="Modelo do veículo"
                                >
                                @error('modelo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        {{-- Quadro, Motor e Cor --}}

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <label class="required">Quadro</label>
                                <input
                                    type="text"
                                    name="quadro"
                                    value="{{ old('quadro') }}"
                                    class="form-control @error('quadro') is-invalid @enderror"
                                    placeholder="Número do Quadro"
                                >
                                @error('quadro')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="required">Motor</label>
                                <input
                                    type="text"
                                    name="motor"
                                    value="{{ old('motor') }}"
                                    class="form-control @error('motor') is-invalid @enderror"
                                    placeholder="Número do Motor"
                                >
                                @error('motor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="required">Cor</label>
                                <input
                                    type="text"
                                    name="cor"
                                    value="{{ old('cor') }}"
                                    class="form-control @error('cor') is-invalid @enderror"
                                    placeholder="Cor do Veículo"
                                >
                                @error('cor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        {{-- Número de Cilindros, Classe e Combustível --}}

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <label class="required">Número de Cilindros</label>
                                <input
                                    type="number"
                                    name="numero_cilindros"
                                    value="{{ old('numero_cilindros') }}"
                                    class="form-control @error('numero_cilindros') is-invalid @enderror"
                                    placeholder="Número de Cilindros"
                                >
                                @error('numero_cilindros')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mb-0">
                                <label class="required">Classe do Veículo</label>
                                <select
                                    name="classe"
                                    class="form-select @error('classe') is-invalid @enderror"
                                    data-control="select2"
                                >
                                    <option value="">-- selecione --</option>
                                    @foreach($classesVeiculo as $c)
                                        <option
                                            value="{{ $c->id }}"
                                            {{ old('classe') == $c->id ? 'selected' : '' }}
                                        >{{ $c->classe }}</option>
                                    @endforeach
                                </select>
                                @error('classe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                
                                <select id="combustivel" name="combustivel" 
                                    class="form-select @error('combustivel') is-invalid @enderror"
                                    data-control="select2"
                                >
                                    <option value="">-- selecione --</option>
                                    @foreach($combustiveis as $c)
                                        <option
                                            value="{{ $c->id }}"
                                            {{ old('combustivel') == $c->id ? 'selected' : '' }}
                                        >{{ $c->combustivel }}</option>
                                    @endforeach
                                </select>
                                @error('combustivel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        {{-- Medidas, Serviço e País de Origem --}}

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <label class="required">Medidas dos Pneumáticos</label>
                                <input
                                    type="text"
                                    name="medidas_pneumaticas"
                                    value="{{ old('medidas_pneumaticas') }}"
                                    class="form-control @error('medidas_pneumaticas') is-invalid @enderror"
                                    placeholder="Medidas dos Pneumáticos"
                                >
                                @error('medidas_pneumaticas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mb-0">
                                <label class="required">Serviço do Veículo</label>
                                <select
                                    name="servico"
                                    class="form-select @error('servico') is-invalid @enderror"
                                    data-control="select2"
                                >
                                    <option value="">-- selecione --</option>
                                    @foreach($servicos as $s)
                                        <option
                                            value="{{ $s->id }}"
                                            {{ old('servico') == $s->id ? 'selected' : '' }}
                                        >{{ $s->servico }}</option>
                                    @endforeach
                                </select>
                                @error('servico')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="required">País de Origem</label>
                                <input
                                    type="text"
                                    name="pais_origem"
                                    value="{{ old('pais_origem') }}"
                                    class="form-control @error('pais_origem') is-invalid @enderror"
                                    placeholder="País de Origem"
                                >
                                @error('pais_origem')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    
                    {{-- Caixa do Veiculo --}}

                    <fieldset class="my-2">
                        <legend>Caixa</legend>
                    
                        {{-- Tipo de Caixa e Distância entre eixos --}}

                        <div class="row g-3 mb-4">
                            <div class="col mb-0">
                                <label class="required">Tipo de Caixa</label>
                                <select
                                    name="tipo_caixa"
                                    class="form-select @error('tipo_caixa') is-invalid @enderror"
                                    data-control="select2"
                                >
                                    <option value="">-- selecione --</option>
                                    <option value="Aberta" {{ old('tipo_caixa') === 'Aberta' ? 'selected' : '' }}>Aberta</option>
                                    <option value="Fechada" {{ old('tipo_caixa') === 'Fechada' ? 'selected' : '' }}>Fechada</option>
                                </select>
                                @error('tipo_caixa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div class="col">
                                <label class="required">Distância entre eixos</label>
                                <input
                                    type="text"
                                    name="distancia_entre_eixos"
                                    value="{{ old('distancia_entre_eixos') }}"
                                    class="form-control @error('distancia_entre_eixos') is-invalid @enderror"
                                    placeholder="Distância entre eixos"
                                    aria-label="Distância entre eixos"
                                >
                                @error('distancia_entre_eixos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        {{-- Ano de Fabrico e Altura --}}

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <label class="required">Ano de Fabrico</label>
                                <input
                                    type="text"
                                    name="ano_fabrico"
                                    value="{{ old('ano_fabrico') }}"
                                    class="form-control @error('ano_fabrico') is-invalid @enderror"
                                    placeholder="Ano de Fabrico"
                                    aria-label="Ano de Fabrico"
                                >
                                @error('ano_fabrico')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div class="col">
                                <label class="required">Altura</label>
                                <input
                                    type="text"
                                    name="altura"
                                    value="{{ old('altura') }}"
                                    class="form-control @error('altura') is-invalid @enderror"
                                    placeholder="Altura da Caixa"
                                    aria-label="Altura da Caixa"
                                >
                                @error('altura')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    
                    {{-- Peso Bruto --}}
        
                    
                    <fieldset class="my-2">
                        <legend>Peso Bruto</legend>

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">A frente</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o peso do seu veículo a frente">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <input type="text" class="form-control @error('a_frente') is-invalid @enderror" name="a_frente" placeholder="Peso a frente" value="{{ old('a_frente') }}">
                                @error('a_frente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Ao meio</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o peso do seu veículo ao meio">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <input type="text" class="form-control @error('ao_meio') is-invalid @enderror" name="ao_meio" placeholder="Peso ao meio" value="{{ old('ao_meio') }}">
                                @error('ao_meio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">A retaguarda</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite o peso do seu veículo a retaguarda">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <input type="text" class="form-control @error('a_retaguarda') is-invalid @enderror" name="a_retaguarda" placeholder="Peso a retaguarda" value="{{ old('a_retaguarda') }}">
                                @error('a_retaguarda')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Tara</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a tara do teu veículo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <input type="text" class="form-control @error('tara') is-invalid @enderror" name="tara" placeholder="Kg" value="{{ old('tara') }}">
                                @error('tara')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Lotação</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Digite a lotação do teu veículo">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <input type="text" class="form-control @error('lugares') is-invalid @enderror" name="lugares" placeholder="Número de lugares" value="{{ old('lugares') }}">
                                @error('lugares')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>


                    {{-- Documentos --}}

                    <fieldset class="my-2">
                        <legend>Carregar Documentos</legend>
                    
                        {{-- Bilhete de Identidade --}}

                        <div class="mb-3">
                            <label for="bilhete" class="form-label">Bilhete de Identidade</label>
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
                    
                        {{-- Registro Inicial ou Modelo O --}}

                        <div class="mb-3">
                            <label for="modelo_o" class="form-label">Registro Inicial ou Modelo O</label>
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
                    
                        {{-- Registro de Compra e Venda --}}

                        <div class="mb-3">
                            <label for="compra_venda" class="form-label">Registro de Compra e Venda</label>
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
                    
                        {{-- Recibo de Pagamento --}}

                        <div class="mb-3">
                            <label for="recibo_pagamento" class="form-label">Recibo de Pagamento</label>
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

                    <fieldset>
                        <legend>Carregar Imagens</legend>
                        
                        <!-- UPLOADER DINÂMICO DE IMAGENS -->
                        <div class="mb-3 form-control">
                            <label class="form-label">Imagens</label>

                            <!-- botão para abrir o file picker -->
                            <div class="d-flex gap-2 mb-2">
                                <button type="button" id="btnAdicionarImagens" class="btn btn-outline-secondary btn-sm">
                                    Adicionar
                                </button>
                                <small class="text-muted align-self-center">Máx 8 imagens.</small>
                            </div>

                            <!-- input file escondido (usado apenas para escolher ficheiros) -->
                            <input type="file" id="imagensInput" name="imagens[]" accept="image/*" multiple style="display:none;" class="form-control form-control-solid">

                            <!-- área de visualização das miniaturas -->
                            <div id="previewImagens" class="d-flex gap-2 flex-wrap"></div>
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

@push('toaster')
    
    {{-- Inserir imagens --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnAdicionar = document.getElementById('btnAdicionarImagens');
            const fileInput = document.getElementById('imagensInput');
            const previewContainer = document.getElementById('previewImagens');
            const form = document.getElementById('alerta'); // o teu form tem id="alerta"
        
            // limite máximo de imagens (ajusta se quiseres)
            const MAX_IMAGES = 8;
        
            // array onde guardamos os File seleccionados
            let selectedFiles = [];
        
            // abre o file picker
            btnAdicionar?.addEventListener('click', () => fileInput.click());
        
            // quando o utilizador selecciona ficheiros
            fileInput?.addEventListener('change', (e) => {
                const files = Array.from(e.target.files || []);
        
                // evita exceder MAX_IMAGES
                if (selectedFiles.length + files.length > MAX_IMAGES) {
                    alert('Limite de ' + MAX_IMAGES + ' imagens.');
                    fileInput.value = '';
                    return;
                }
        
                // junta ao array (filtra duplicados simples por name+size)
                files.forEach(f => {
                    const duplicate = selectedFiles.some(s => s.name === f.name && s.size === f.size && s.lastModified === f.lastModified);
                    if (!duplicate) selectedFiles.push(f);
                });
        
                renderPreviews();
                // limpa o input para permitir seleccionar os mesmos ficheiros novamente
                fileInput.value = '';
            });
        
            // renderiza as miniaturas
            function renderPreviews() {
                // limpa container
                previewContainer.innerHTML = '';
        
                selectedFiles.forEach((file, index) => {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'preview-thumb';
        
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.alt = file.name;
        
                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'preview-remove';
                    removeBtn.innerHTML = '&times;';
                    removeBtn.title = 'Remover imagem';
                    removeBtn.addEventListener('click', () => {
                        // revoke URL
                        URL.revokeObjectURL(img.src);
                        // remove do array
                        selectedFiles.splice(index, 1);
                        // re-render
                        renderPreviews();
                    });
        
                    const fname = document.createElement('div');
                    fname.className = 'preview-filename';
                    fname.textContent = file.name.length > 28 ? file.name.slice(0,25) + '...' : file.name;
        
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    wrapper.appendChild(fname);
                    previewContainer.appendChild(wrapper);
                });
            }
        
            // Antes do submit, colocamos os Files no input real usando DataTransfer (browser moderno)
            form?.addEventListener('submit', function (e) {
                // se não há ficheiros seleccionados, deixa submeter normalmente
                if (selectedFiles.length === 0) {
                    return true;
                }
        
                // tenta usar DataTransfer
                try {
                    const dt = new DataTransfer(); // moderno; não disponível em browsers antigos
                    selectedFiles.forEach(f => dt.items.add(f));
                    fileInput.files = dt.files;
                    // permite que o form submeta normalmente (enctype multipart/form-data)
                    return true;
                } catch (err) {
                    // Fallback: faz upload via fetch com FormData (AJAX)
                    e.preventDefault();
                    const fd = new FormData(form); // já recolhe os inputs do form
                    selectedFiles.forEach(f => fd.append('imagens[]', f));
        
                    // CSRF token se existir meta tag
                    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                    const headers = tokenMeta ? { 'X-CSRF-TOKEN': tokenMeta.getAttribute('content') } : {};
        
                    fetch(form.action, {
                        method: form.method || 'POST',
                        headers: headers,
                        body: fd,
                        credentials: 'same-origin'
                    })
                    .then(async response => {
                        if (!response.ok) {
                            const text = await response.text();
                            console.error('Upload falhou', text);
                            alert('Falha no upload. Ver console para detalhes.');
                            return;
                        }
                        // sucesso — redireciona ou recarrega página
                        window.location.reload();
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Erro ao enviar (ver console).');
                    });
        
                    return false;
                }
            });
        
            // Opcional: limita o total a MAX_IMAGES no caso de quereres evitar selecções muito grandes via drag&drop
            // Poderias também adicionar suporte a drag & drop aqui.
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
          const btnAdicionar = document.getElementById('btnAdicionarImagens');
          const fileInput = document.getElementById('imagensInput'); // garante que só existe UMA vez no DOM
          const previewContainer = document.getElementById('previewImagens');
        
          if (!fileInput) {
            console.warn('inputImagens não encontrado (id="imagensInput")');
            return;
          }
        
          // procura o form a partir do input (mais seguro do que document.getElementById('alerta'))
          const form = fileInput.closest('form');
          if (!form) {
            console.warn('Form não encontrado como ancestor do inputImagens');
            return;
          }
        
          const MAX_IMAGES = 8;
          let selectedFiles = [];
        
          // botão para abrir file picker (se existir)
          btnAdicionar?.addEventListener('click', () => fileInput.click());
        
          // Helper: renderiza previews a partir de selectedFiles
          function renderPreviews() {
            previewContainer.innerHTML = '';
            selectedFiles.forEach((file, idx) => {
              const wrapper = document.createElement('div');
              wrapper.className = 'preview-thumb';
              wrapper.style.position = 'relative';
              wrapper.style.width = '120px';
              wrapper.style.height = '120px';
              wrapper.style.margin = '6px';
              wrapper.style.display = 'inline-block';
        
              const img = document.createElement('img');
              img.src = URL.createObjectURL(file);
              img.onload = () => URL.revokeObjectURL(img.src);
              img.style.width = '100%';
              img.style.height = '100%';
              img.style.objectFit = 'cover';
              img.style.borderRadius = '8px';
        
              const btn = document.createElement('button');
              btn.type = 'button';
              btn.innerHTML = '&times;';
              btn.title = 'Remover';
              Object.assign(btn.style, {
                position: 'absolute',
                top: '6px',
                right: '6px',
                background: 'rgba(0,0,0,0.6)',
                color: '#fff',
                border: 'none',
                width: '22px',
                height: '22px',
                borderRadius: '50%',
                cursor: 'pointer',
              });
              btn.addEventListener('click', () => {
                selectedFiles.splice(idx, 1);
                renderPreviews();
              });
        
              wrapper.appendChild(img);
              wrapper.appendChild(btn);
              previewContainer.appendChild(wrapper);
            });
          }
        
          // Ao escolher ficheiros
          fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files || []);
            if (files.length === 0) return;
        
            // valida limite
            if (selectedFiles.length + files.length > MAX_IMAGES) {
              alert('Limite de ' + MAX_IMAGES + ' imagens.');
              e.target.value = '';
              return;
            }
        
            // adiciona sem duplicados (name+size+lastModified)
            files.forEach(f => {
              const isDup = selectedFiles.some(s => s.name === f.name && s.size === f.size && s.lastModified === f.lastModified);
              if (!isDup) selectedFiles.push(f);
            });
        
            renderPreviews();
            // limpa o input para permitir selecionar os mesmos arquivos depois
            e.target.value = '';
          });
        
          // Antes do submit: popula fileInput.files via DataTransfer
          form.addEventListener('submit', function (e) {
            if (selectedFiles.length === 0) {
              // nada para colocar — permite submissão normal
              return;
            }
        
            try {
              const dt = new DataTransfer();
              selectedFiles.forEach(f => dt.items.add(f));
              fileInput.files = dt.files; // agora o backend verá arquivos
              // permite submit normal
              return;
            } catch (err) {
              // Fallback: enviar via AJAX com FormData
              e.preventDefault();
              const fd = new FormData(form);
              // remove eventuais entradas existentes de imagens para evitar duplicação (opcional)
              // adiciona os ficheiros do array
              selectedFiles.forEach(f => fd.append('imagens[]', f));
        
              const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
              fetch(form.action, {
                method: form.method || 'POST',
                headers: token ? { 'X-CSRF-TOKEN': token } : {},
                body: fd,
                credentials: 'same-origin'
              })
              .then(resp => {
                if (!resp.ok) throw new Error('Upload falhou');
                return resp.json().catch(()=>null);
              })
              .then(() => window.location.reload())
              .catch(err => {
                console.error(err);
                alert('Erro no upload. Veja a consola.');
              });
            }
          });
        });
    </script>
        

    {{-- Toaster de susseco --}}
    <script>

        
        @if(session('success'))
            // Você pode configurar opções adicionais aqui, se quiser
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('success') }}");
            // toastr.success("{{ session('success') }}");
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
        
@endpush

@push('css_imagem')
<style>
    /* wrapper da imagem principal */
    .main-alerta-wrapper {
        width: 100%;
        aspect-ratio: 16/9; /* mantém proporção fixa e responsiva */
        overflow: hidden;
        border-radius: 8px;
        background: #f8f9fa;
    }

    /* imagem principal */
    .main-alerta-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* container das miniaturas */
    .thumbs-container {
        position: absolute;
        bottom: 10px;
        right: 10px;
        display: flex;
        gap: 6px;
    }

    /* cada miniatura */
    .thumb-btn {
        border: 2px solid transparent;
        border-radius: 6px;
        padding: 0;
        background: none;
        cursor: pointer;
        width: 60px;
        height: 45px;
        overflow: hidden;
    }

    .thumb-btn.active {
        border-color: #0d6efd; /* destaque na imagem ativa */
    }

    .thumb-btn img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 4px;
    }
</style>

<style>
    /* Força todas as imagens de alerta a terem mesmo tamanho e recorte central */
    .alerta-img {
    width: 100%;
    height: 180px;       /* ajuste a altura que achar melhor */
    object-fit: cover;   /* corta qualquer excesso mantendo proporção */
    display: block;
    }

    /* Opcional: garante que a área .symbol seja do mesmo tamanho */
    .symbol-200px {
    width: 100%;
    height: 180px;       /* mesma altura da .alerta-img */
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    }

</style>
<style>
    .preview-thumb {
        width: 140px;
        height: 100px;
        position: relative;
        overflow: hidden;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        }

        .preview-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        }

        /* botão X no canto */
        .preview-remove {
        position: absolute;
        top: 4px;
        right: 4px;
        background: rgba(0,0,0,0.6);
        color: #fff;
        border: none;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor: pointer;
        z-index: 5;
        }

        .preview-filename {
        position: absolute;
        left: 6px;
        bottom: 4px;
        right: 6px;
        font-size: 11px;
        color: #fff;
        text-shadow: 0 1px 2px rgba(0,0,0,0.6);
        background: rgba(0,0,0,0.35);
        padding: 2px 4px;
        border-radius: 3px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        }

</style>
@endpush