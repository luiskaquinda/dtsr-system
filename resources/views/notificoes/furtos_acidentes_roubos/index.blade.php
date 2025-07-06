@extends('notificoes.furtos_acidentes_roubos.layout.app')
@section('title', 'Sentinel - Benguela')

@section('content')

    <!--begin::Wrapper-->
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <!--begin::Wrapper container-->
        <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar pt-lg-9 pt-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-4 w-100">

                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column gap-3 me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Alertas</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                            <a href="../dist/index.html" class="text-gray-500">
                                                <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                            </a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Alertas</li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-gray-500">Home</li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-3 gap-lg-5">
                                    <!--begin::Primary button-->
                                    <a href="#" class="btn btn-flex btn-center btn-dark btn-sm px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_2">Alertar</a>
                                    <!--end::Primary button-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content pb-0">
                        
                        <!--begin::Stats-->
                        <div class="row g-6 g-xl-9">
                            <div class="col-lg-6 col-xxl-4">
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Heading-->
                                        <div class="fs-2hx fw-bold">237</div>
                                        <div class="fs-4 fw-semibold text-gray-400 mb-7">Alertas</div>
                                        <!--end::Heading-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Chart-->
                                            <div class="d-flex flex-center h-100px w-100px me-9 mb-5">
                                                <canvas id="kt_project_list_chart"></canvas>
                                            </div>
                                            <!--end::Chart-->
                                            <!--begin::Labels-->
                                            <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                                <!--begin::Label-->
                                                <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                    <div class="bullet bg-primary me-3"></div>
                                                    <div class="text-gray-400">Activas</div>
                                                    <div class="ms-auto fw-bold text-gray-700">30</div>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Label-->
                                                <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                    <div class="bullet bg-success me-3"></div>
                                                    <div class="text-gray-400">Fechadas</div>
                                                    <div class="ms-auto fw-bold text-gray-700">45</div>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Label-->
                                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                                    <div class="bullet bg-gray-300 me-3"></div>
                                                    <div class="text-gray-400">Falsas</div>
                                                    <div class="ms-auto fw-bold text-gray-700">25</div>
                                                </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Labels-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="col-lg-6 col-xxl-4">
                                <!--begin::Budget-->
                                <div class="card h-100">
                                    <div class="card-body p-9">
                                        <div class="fs-2hx fw-bold">Cidades</div>
                                        <div class="fs-4 fw-semibold text-gray-400 mb-7">Top 3</div>
                                        <div class="fs-6 d-flex justify-content-between mb-4">
                                            <div class="fw-semibold">Benguela</div>
                                            <div class="d-flex fw-bold">
                                            <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>1.234</div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="fs-6 d-flex justify-content-between my-4">
                                            <div class="fw-semibold">Catumbela</div>
                                            <div class="d-flex fw-bold">
                                            <i class="ki-duotone ki-arrow-down-left fs-3 me-1 text-danger">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>408</div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="fs-6 d-flex justify-content-between mt-4">
                                            <div class="fw-semibold">Lobito</div>
                                            <div class="d-flex fw-bold">
                                            <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>20</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Budget-->
                            </div>
                        </div>
                        <!--end::Stats-->

                        <!--begin::Toolbar-->
                        <div class="d-flex flex-wrap flex-stack my-5">
                            <!--begin::Heading-->
                            <h2 class="fs-2 fw-semibold my-2">Alertas
                            <span class="fs-6 text-gray-400 ms-1">por Status</span></h2>
                            <!--end::Heading-->
                            <!--begin::Controls-->
                            <div class="d-flex flex-wrap my-1">
                                <!--begin::Select wrapper-->
                                <div class="m-0">
                                    <!--begin::Select-->
                                    <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body fw-bold w-125px">
                                        <option value="Active" selected="selected">Todos</option>
                                        @foreach ($tipos_notificacao as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Select wrapper-->
                            </div>
                            <!--end::Controls-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Row-->
                        <div class="row g-6 g-xl-9">
                            <!--begin::Col-->
                            @foreach ($alertas as $alerta)
                                <div class="col-md-6 col-xl-4">
                                    <!--begin::Card-->
                                    <div class="card position-relative" href="{{ route('alertas.show', $alerta->id) }}" class="card border-hover-primary">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0 pt-9">
                                            <!--begin::Card Title-->
                                            <div class="card-title m-0">
                                                
                                                
                                                <!--begin::Avatar-->
                                                <div class="w-100 h-100 bg-light text-center">
                                                    @if($alerta->imagem)
                                                    {{-- <div class=" w-100 symbol symbol-200px">
                                                        <div
                                                          class="symbol-label"
                                                          style="background-image: url('{{ asset('storage/' . $alerta->imagem) }}')"
                                                        ></div>
                                                    </div> --}}
                                                        <img
                                                            src="{{ asset('storage/' . $alerta->imagem) }}"
                                                            class="img-fluid rounded"
                                                            alt="Imagem do alerta"
                                                        >
                                                    @else
                                                        <img src="{{ asset('admin/media/avatars/300-1.jpg') }}" alt="image" class="p-3 max-w-100" />
                                                    @endif
                                                </div>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::Car Title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar w-100">
                                                <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end:: Card header-->
                                        <!--begin:: Card body-->
                                        <div class="card-body p-9">
                                            <!--begin::Name-->
                                            <div class="fs-3 fw-bold text-dark">{{ $alerta->titulo }}</div>
                                            <!--end::Name-->
                                            <!--begin::Description-->
                                            <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">{{ $alerta->descricao }}</p>
                                            <!--end::Description-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-wrap mb-5">
                                                <!--begin::Due-->
                                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                                    <div class="fs-6 text-gray-800 fw-bold">{{ $alerta->data_ocorrido }}</div>
                                                    <div class="fw-semibold text-gray-400">Criado em: {{ $alerta->created_at }}</div>
                                                </div>
                                                <!--end::Due-->

                                                <a href="#" class="btn btn-dark  stretched-link">Ver mais</a>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end:: Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                            @endforeach
                            <!--end::Col-->

                            {{ $alertas->links() }}
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper container-->
    </div>
    <!--end::Wrapper-->

    @include('notificoes.furtos_acidentes_roubos.create')
    
@endsection
@push('anonimo')
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
@endpush