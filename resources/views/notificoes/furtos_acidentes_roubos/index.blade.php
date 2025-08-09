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

                    {{-- Mensagens de erro genérico --}}
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
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
                                        <div class="fs-2hx fw-bold">{{ $alertasTodos }}</div>
                                        <div class="fs-4 fw-semibold text-gray-400 mb-7">Alertas</div>
                                        <!--end::Heading-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Labels-->
                                            <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                                @foreach ($alertasPorStatus as $item)  
                                                    <!--begin::Label-->
                                                    <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                        @switch($item['status'])
                                                            @case('aberto')
                                                                <div class="bullet bg-primary me-3"></div>
                                                                <div class="text-gray-400">{{ ucfirst($item['status']) }}</div>
                                                                @break
                                                            @case('fechado')
                                                                <div class="bullet bg-success me-3"></div>
                                                                <div class="text-gray-400">{{ ucfirst($item['status']) }}</div>
                                                                @break
                                                            @default

                                                        @endswitch
                                                        <div class="ms-auto fw-bold text-gray-700">{{ $item['total_alertas'] }}</div>
                                                    </div>
                                                    <!--end::Label-->   
                                                @endforeach
                                                
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
                                        <div class="fs-4 fw-semibold text-gray-400 mb-7">Top</div>
                                        @if ($alertasPorMunicipio->isEmpty())
                                            <div class="fs-6 d-flex justify-content-center mb-4">
                                                <div class="fw-semibold">Sem alertas no momento!</div>
                                            </div>
                                        @else
                                            @foreach($alertasPorMunicipio as $item)
                                                <div class="fs-6 d-flex justify-content-between mb-4">
                                                    <div class="fw-semibold">{{ $item['municipio'] }}</div>
                                                    <div class="d-flex fw-bold">
                                                    <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>{{ $item['total_alertas'] }}</div>
                                                </div>
                                                <div class="separator separator-dashed"></div>
                                            @endforeach
                                        @endif

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
                                    <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body fw-bold w-125px" onchange="if (this.value) window.location = this.value">
                                        <option value="Active" selected="selected">Todos</option>
                                        @foreach ($tipos_notificacao as $tipo)
                                            <option value="{{ route('alertas.tipo', $tipo->id) }}">
                                                {{ $tipo->tipo }}
                                            </option>
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
                            @forelse ($alertas as $alerta)
                                <div class="col-md-6 col-xl-4">
                                    <!--begin::Card-->
                                    <div class="card position-relative h-100 d-flex flex-column" class="card border-hover-primary">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0 pt-9">
                                            <!--begin::Card Title-->
                                            <div class="card-title m-0">
                                                
                                                
                                                <!--begin::Avatar-->
                                                <div class="w-100 h-100 bg-light text-center">
                                                    @if($alerta->imagem)

                                                        <div class="symbol symbol-200px">
                                                            <div class="symbol-label fs-2 fw-semibold text-success w-100 h-100">
                                                                <img
                                                                    src="{{ asset('storage/' . $alerta->imagem) }}"
                                                                    class="img-fluid rounded"
                                                                    alt="Imagem do alerta"
                                                                >
                                                            </div>
                                                        </div>
                                                    @else
                                                        <img src="{{ asset('admin/media/avatars/300-1.jpg') }}" alt="image" class="p-3 max-w-100" />
                                                    @endif
                                                </div>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::Car Title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar w-100">
                                                @switch($alerta->tipos_notificacoes->tipo)
                                                    @case('Furto')
                                                        <span class="badge badge-info fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @case('Acidente')
                                                        <span class="badge badge-warning fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break

                                                    @case('Assalto')
                                                        <span class="badge badge-danger fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @case('Roubo')
                                                        <span class="badge badge-secondary fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @case('Multa')
                                                        <span class="badge badge-primary fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @case('Outro')
                                                        <span class="badge badge-dark fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @default
                                                       <span class="badge badge-success fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                @endswitch 
                                                | <span class="badge ms-2 badge-light-success fw-bold me-auto px-4 py-3">{{ $alerta->municipio->nome_municipio }}</span>
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end:: Card header-->
                                        <!--begin:: Card body-->
                                        <div class="card-body p-9 flex-grow-1 d-flex flex-column">
                                            <!--begin::Name-->
                                            <div class="fs-3 fw-bold text-dark">{{ $alerta->titulo }}</div>
                                            <!--end::Name-->
                                            <!--begin::Description-->
                                            <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">{{ $alerta->descricao }}</p>
                                            <!--end::Description-->

                                            <div class="mt-auto">
                                                <!-- data, botões e confirmações -->


                                                <!--begin::Info-->
                                                <div class="d-flex flex-wrap mb-5">
                                                    <!--begin::Due-->
                                                    @php
                                                        // Data de criação como Carbon
                                                        $created = $alerta->created_at;
                                                        $days    = $created->diffInDays(now());
                                                        $hours   = $created->diffInHours(now());
                                                        $minutes = $created->diffInMinutes(now());
                                                    @endphp

                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                                        <div class="fs-6 text-gray-800 fw-bold">
                                                            Ocorrido em: {{ $alerta->data_ocorrido->format('d/m/Y') }} | {{ $alerta->hora_ocorrido->format('H:i') }}
                                                        </div>
                                                        <div class="fw-semibold text-gray-400">
                                                            Alertado em: {{ $created->format('d/m/Y') }}
                                                            &nbsp;•&nbsp;
                                                            @if($days >= 1)
                                                                {{ $days }} {{ Str::plural('dia', $days) }} atrás
                                                            @elseif($hours >= 1)
                                                                {{ $hours }} {{ Str::plural('hora', $hours) }} atrás
                                                            @else
                                                                {{ $minutes }} {{ Str::plural('minuto', $minutes) }} atrás
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!--end::Due-->

                                                    <a href="{{ route('alertas.show', $alerta->id) }}" class="btn btn-dark">Ver mais</a>

                                                    @if($alerta->isConfirmedBy($user))
                                                        <form action="{{route('confirmacao.destroy', $alerta->id)}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class=" ms-2 btn btn-danger">Desconfirmar</button>
                                                        </form>
                                                    @else
                                                        <form action="{{route('confirmacao.store', $alerta->id)}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <button type="submit" class=" ms-2 btn btn-primary">Confirmar</button>
                                                        </form>
                                                    @endif


                                                    
                                                </div>
                                                <!--end::Info-->
                                                <!--begin::Users-->
                                                <div class="symbol-group symbol-hover">
                                                    <!--begin::User-->
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Quantidade de usuários que confirmaram o alerta">
                                                        {{-- <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span> --}}
                                                        <small class="text-muted">
                                                            {{ $alerta->confirmacoes()->count() }} confirmações
                                                        </small>
                                                    </div>
                                                    <!--begin::User-->
                                                </div>
                                                <!--end::Users-->
                                            </div>
                                        </div>
                                        <!--end:: Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                            @empty
                                <!--begin::Alert-->
                                    <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-notification-bing fs-2hx text-danger me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column pe-0 pe-sm-10">
                                            <!--begin::Title-->
                                            <h4 class="fw-semibold">Alerta!</h4>
                                            <!--end::Title-->

                                            <!--begin::Content-->
                                            <span>Felizmente sem alertas.</span>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                <!--end::Alert-->
                            @endforelse
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
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            // use o ID do <div class="modal">, não do <form>
            var myModal = new bootstrap.Modal(
                document.getElementById('kt_modal_scrollable_2')
            );
            myModal.show();
            });
        </script>
    @endif
    
@endsection
@push('anonimo')

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

    {{-- Validação na criação do alert --}}

    {{-- <script>

        // Define form element
        document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('alerta');

        modal.addEventListener('shown.bs.modal', function () {
            // Se já existir uma instância anterior, destrua-a:
            if (modal.fv) {
            modal.fv.dispose();
            }

            // Cria nova instância de validação
            modal.fv = FormValidation.formValidation(
            document.getElementById('formCreateAlerta'),
            {
                fields: {
                    'titulo': {
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
                    'data_ocorrido': {
                        validators: {
                        notEmpty: { message: 'A data é obrigatória' },
                        date: {
                            format: 'YYYY-MM-DD',
                            message: 'Use o formato YYYY-MM-DD'
                        }
                        }
                    },
                    'tipo_alerta': {
                        validators: {
                        notEmpty: { message: 'Selecione um tipo de alerta' }
                        }
                    },

                    // adicione regras para os demais campos…
                },

                plugins: {

                    
                    trigger: new FormValidation.plugins.Trigger(),
                    trigger: new FormValidation.plugins.Trigger({
                        // aqui você mapeia campos → eventos
                        event: {
                        // para o campo “titulo”, dispare também em `input`
                            titulo: ['input', 'blur']
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    }),

                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // opcional: impedir dupla submissão
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                },
            }
            );
        });
        });

    </script> --}}

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

@push('css_imagem')
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
@endpush