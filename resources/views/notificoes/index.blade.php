@extends('admin.pedidos.layout.app')
@section('title', 'Notificações')

@section('content')

    <h1 class="text-black fw-semibold px-9 mt-10 mb-6">Minhas Notificações</h1>

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
                        <option value="scheduled">Processando</option>
                    </select>
                    <!--end::Select2-->
                </div>
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
                        <th class="text-start min-w-100px">Notificando</th>
                        <th class="text-start min-w-70px">Tipo de Notificação</th>
                        <th class="text-start min-w-100px">-</th>
                        <th class="text-start min-w-100px">-</th>
                        <th class="text-start min-w-100px">-</th>
                        <th class="text-start min-w-70px">Acções</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @forelse($notificacoes as $notificacao)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td class="text-start pe-0" data-order="15">
                                <span class="fw-bold ms-3">{{ $notificacao->created_at->format('d-m-y') }}</span>
                            </td>
                            <td class="text-start pe-0" data-order="15">
                                <span class="fw-bold ms-3">{{ $notificacao->nome_notificando }}</span>
                            </td>
                            <td class="text-start pe-0" data-order="rating-4">
                                @foreach ($tipos_notificacao as $tipo)
                                    @if ($tipo->id == $notificacao->tipo_notificacao_id)
                                        {{ $tipo->tipo }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-start pe-0" data-order="rating-4">
                                -
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
                                        <a href="{{ route('notificacao.show', $notificacao->id) }}" class="menu-link px-3">
                                            Ver
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <form method="POST" action="#">
                                            @csrf
                                            @method('delete')

                                            {{-- <button type="submit" class="menu-link px-3">Delete</button> --}}

                                            <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_1">
                                                Apagar
                                            </a>

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
                                    Sem notificações registradas!
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
                                        <a href="" class="menu-link px-3">Editar</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <form method="POST" action="#">
                                            @csrf
                                            @method('delete')

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
    </div>
    <!--end::Listagem de Veiculos-->

    <div class="modal fade" tabindex="-1" id="kt_modal_stacked_1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Modal title</h3>
        
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
        
                <div class="modal-body">
                    ...
        
                    <button type="button" class="btn btn-primary" data-bs-stacked-modal="#kt_modal_stacked_2">
                        Launch stacked modal
                    </button>
                </div>
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

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