@extends('admin.pedidos.layout.app')
@section('title', 'Notificações')

@section('content')

    <h1 class="text-black fw-semibold px-9 mt-10 mb-6">Meus Alertas</h1>

    <!--begin::Listagem de Veiculos-->
    <div class="card card-flush">
        
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Pesquisar registro" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <div class="w-100 mw-150px">
                    <!--begin::Select2-->
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Selecionar" data-kt-ecommerce-product-filter="status">
                        <option></option>
                        <option value="all">Todos</option>
                        <option value="aberto">Aberto</option>
                        <option value="fechado">Fechado</option>
                    </select>
                    <!--end::Select2-->
                </div>

                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-3 gap-lg-5">
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-flex btn-center btn-dark btn-sm px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_2">Alertar</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->

            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="text-start min-w-100px">Data</th>
                        <th class="text-start min-w-100px">Titulo</th>
                        <th class="text-start min-w-70px">Tipo de Notificação</th>
                        <th class="text-start min-w-100px">Estado</th>
                        <th class="text-start min-w-100px">-</th>
                        <th class="text-start min-w-100px">-</th>
                        <th class="text-start min-w-70px">Acções</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @forelse($alertas as $alerta)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td class="text-start pe-0" data-order="15">
                                <span class="fw-bold ms-3">{{ $alerta->created_at->format('d-m-y') }}</span>
                            </td>
                            <td class="text-start pe-0" data-order="15">
                                <span class="fw-bold ms-3">{{ $alerta->titulo }}</span>
                            </td>
                            <td class="text-start pe-0" data-order="rating-4">
                                @foreach ($tipos_alerta as $tipo)
                                    @if ($tipo->id == $alerta->tipo_alerta_id)
                                        {{ $tipo->tipo }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-start pe-0" data-order="rating-4">
                                {{ $alerta->status }}
                            </td>
                            <td class="text-start pe-0" data-order="rating-4">
                                -
                            </td>
                            <td class="text-start pe-0" data-order="Scheduled">
                                -
                            </td>
                            <td class="text-start">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ route('alertas.show', $alerta->id) }}" class="menu-link px-3">Ver</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ route('alertas.edit', $alerta->id) }}" class="menu-link px-3">Editar</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        @switch($alerta->status)
                                            @case('aberto')
                                                <form action="{{ route('alertas.fechar', $alerta->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Tem certeza que deseja fechar este alerta?');">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="status" value="fechado">
                                                        <button type="submit" class=" btn menu-link px-3 bg-danger text-white">Fechar</button>
                                                </form>
                                                @break
                                            @case('fechado')
                                                <form action="{{ route('alertas.abrir', $alerta->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Tem certeza que deseja abrir este alerta?');">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="status" value="aberto">
                                                        <button type="submit" class=" btn menu-link px-3 bg-warning text-white">Abrir</button>
                                                </form>
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </div>

                                    <div class="menu-item px-3">
                                        <form action="{{ route('alertas.destroy', $alerta->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja apagar este alerta?');">
                                                @csrf
                                                @method('DELETE')
    
                                                <button type="submit" class="menu-link px-3 bg-danger text-white" style="border: none;">Delete</button>
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
 
                    @empty
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td class="text-start pe-0" data-order="15">
                                <span class="fw-bold ms-3">
                                    Opaaa... cidadão distraído!
                                </span>
                            </td>
                            <td class="text-start pe-0" data-order="15">
                                <span class="fw-bold ms-3"></span>
                            </td>
                            <td class="text-start pe-0"></td>
                            <td class="text-start pe-0" data-order="rating-4">
                                
                            </td>
                            <td class="text-start pe-0" data-order="rating-4">
                            </td>
                            <td class="text-start pe-0" data-order="Scheduled">
                            </td>
                            <td class="text-start">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ route('alertas.edit', $alerta->id) }}" class="menu-link px-3">Editar</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <form action="{{ route('alertas.destroy', $alerta->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja apagar este alerta?');">
                                          @csrf
                                          @method('DELETE')

                                            <button type="submit" class="menu-link px-3">Delete</button>

                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->

        @include('notificoes.furtos_acidentes_roubos.create')
    </div>
    <!--end::Listagem de Veiculos-->

@endsection

@push('css_imagem')
    <style>
        #kt_header_search .custom-search {
            display: none !important;
        }
    </style>
@endpush

@push('toaster')

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

@section('custom_js')

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('modalEditAlerta');
        
            editModal.addEventListener('show.bs.modal', function (event) {
                // 1) Quem clicou
                var button = event.relatedTarget;
            
                // 2) Extrai os data-attributes
                var id                 = button.getAttribute('data-id');
                var anonima            = button.getAttribute('data-anonima');
                var nome_denunciante   = button.getAttribute('data-nome_denunciante');
                var titulo             = button.getAttribute('data-titulo');
                var data               = button.getAttribute('data-data');
                var hora               = button.getAttribute('data-hora');
                var descricao          = button.getAttribute('data-descricao');
                var tipo               = button.getAttribute('data-tipo');
                var municipio          = button.getAttribute('data-municipio');
                var imagem             = button.getAttribute('data-imagem');
            
                // 3) Preenche os campos do form
                document.getElementById('titulo').value     = titulo;
                document.getElementById('anonima').value     = anonima;
                document.getElementById('nome_denunciante').value     = nome_denunciante;
                document.getElementById('data_ocorrido').value       = data;
                document.getElementById('descricao').value  = descricao;
                document.getElementById('tipo_alerta').value       = tipo;
                document.getElementById('municipio_id').value  = municipio;
            
                // 4) Ajusta a action do form para chamar a rota de update
                var form = document.getElementById('formEditAlerta');
                form.action = '/alertas/' + id; 
                // ou, se quiser usar named route via Blade:
                // form.action = "{{ url('alertas') }}/" + id;
                // ou
                // form.action = "{{ route('alertas.update', '') }}/" + id;
            });
        });
    </script> --}}
    
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