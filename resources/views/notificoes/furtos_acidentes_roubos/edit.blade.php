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
                                            <a href="{{ route('alertas.list', Auth::user()->id ) }}" class="text-gray-500">
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
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" class="form form-control" action="{{ route('alertas.update', $alerta->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="form-check form-switch form-check-custom form-check-solid mb-6">
                                        <input class="form-check-input fv-row" 
                                               type="checkbox" 
                                               id="anonima" 
                                               name="anonima" 
                                               value="1"
                                               {{ old('anonima', $alerta->anonima) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="anonima">
                                            Anônima
                                        </label>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-6 form-control" 
                                        id="nomeContainer" 
                                        style="display: {{ old('anonima', $alerta->anonima) ? 'none' : 'block' }}; margin-top: .5rem;"
                                    >
                                        <label for="nome_denuciante" class="form-label">Nome:</label>
                                        <input
                                            type="text"
                                            id="nome_denuciante"
                                            name="nome_denuciante"
                                            value="{{ old('nome_denuciante', $alerta->nome_denuciante) }}"
                                            class="form-control form-control-solid @error('nome_denuciante') is-invalid @enderror"
                                            placeholder="Insira seu nome"
                                        />
                                        @error('nome_denunciante')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-6 form-control">
                                        <label for="titulo" class="required form-label">Título</label>
                                        <input
                                          type="text"
                                          id="titulo"
                                          name="titulo"
                                          value="{{ old('titulo', $alerta->titulo) }}"
                                          class="form-control form-control-solid @error('titulo') is-invalid @enderror"
                                          placeholder="Escreva algo para destacar..."
                                        />
                                        @error('titulo')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <div class="mb-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Município</label>
                                            <select name="municipio_id" 
                                                    id="municipio_id" 
                                                    data-control="select2"  
                                                    class="form-select form-select-solid form-select-lg fw-semibold @error('municipio_id') is-invalid @enderror">
                                                <option value="">Selecione o município...</option>
                                                @foreach($municipios as $municipio)
                                                    <option
                                                    value="{{ $municipio->id }}"
                                                    {{ old('municipio_id', $alerta->municipio_id) == $municipio->id ? 'selected' : '' }}
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
                                    <!--end::Input group-->

                                    <div class="mb-6 form-control">
                                        <label class="required form-label">Data do ocorrido</label>
                                        <input
                                        type="date"
                                        id="data_ocorrido"
                                        name="data_ocorrido"
                                        value="{{ old('data_ocorrido', $alerta->data_ocorrido->format('Y-m-d')) }}"
                                        class="form-control form-control-solid @error('data_ocorrido') is-invalid @enderror"
                                        />
                                        @error('data_ocorrido')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-6 form-control">
                                        <label for="hora_ocorrido" class="required form-label">Hora do ocorrido</label>
                                        <input
                                          type="time"
                                          id="hora_ocorrido"
                                          name="hora_ocorrido"
                                          value="{{ old('hora_ocorrido', $alerta->hora_ocorrido->format('H:i')) }}"
                                          class="form-control form-control-solid @error('hora_ocorrido') is-invalid @enderror"
                                        />
                                        @error('hora_ocorrido')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <div class="fv-row">
                                            <label class="col-form-label required fw-semibold fs-6">Tipo de alerta</label>
                                            <select id="tipo_alerta"
                                                    name="tipo_alerta" 
                                                    data-control="select2" 
                                                    data-placeholder="Selecione o tipo de alerta..." 
                                                    class="form-select form-select-solid form-select-lg @error('tipo_alerta') is-invalid @enderror">
                                                <option value="">Selecione o tipo de alerta...</option>
                                                @foreach($tipos_notificacao as $tipo)
                                                    <option
                                                    value="{{ $tipo->id }}"
                                                    {{ old('tipo_alerta', $alerta->tipo_alerta_id) == $tipo->id ? 'selected' : '' }}
                                                    >
                                                    {{ $tipo->tipo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tipo_alerta')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-6 form-control">
                                        <label class="required fs-6 fw-semibold mb-2">Descrição</label>
                                        <textarea
                                          id="descricao"
                                          name="descricao"
                                          rows="3"
                                          class="form-control form-control-solid @error('descricao') is-invalid @enderror"
                                          placeholder="Digite aqui uma descrição detalhada..."
                                        >{{ old('descricao', $alerta->descricao) }}</textarea>
                                        @error('descricao')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!--end::Input group-->
                                    <div class="mb-3 form-control">
                                        <label for="imagem" class="form-label">Carregar imagem</label>
                                        @if($alerta->imagem)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $alerta->imagem) }}" alt="Imagem atual" class="img-fluid" style="max-height: 150px;">
                                            </div>
                                        @endif
                                        <input 
                                          class="form-control form-control-solid" 
                                          type="file" 
                                          id="imagem" 
                                          name="imagem"
                                        >
                                    </div>
                                </div>
                                <!--end::Card body-->
                                <!--begin::Actions-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Limpar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Stats-->
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
    
@endsection
@push('css_imagem')
    <style>
        #kt_header_search .custom-search {
            display: none !important;
        }
    </style>
@endpush
@push('anonimo')
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