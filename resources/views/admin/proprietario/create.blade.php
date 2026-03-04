@extends('admin.proprietario.layout.app')
@section('title', 'Cadastro')

@section('content')
    <form class="container p-4 bg-white rounded" action="{{ route('proprietario.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="row p-4">
            <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">

                    <div class="pb-12">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-dark">Cadastro</h1>
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
                    {{-- Butões --}}

                                        
                    <div class="d-flex flex-end mt-4">
                        <a href="#" class="btn btn-lg btn-light me-3" data-kt-element="settings-previous">Cancelar</a>
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

@section('custom_js')
    <script src="{{ asset('js/custom/apps/ecommerce/catalog/products.js') }}"></script>
    <script src="{{ asset('js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/main.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/users-search.js') }}"></script>
@endsection