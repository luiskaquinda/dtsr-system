@extends('admin.veiculo.layout.app')
@section('title', 'veiculos')

@section('content')

    <h1 class="text-black fw-semibold px-9 mt-10 mb-6">Lista de Veiculos</h1>

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
                <!--begin::Add product-->
                <a href="{{ route('pedido.create', ['tipoPedido' => "E"]) }}" class="btn btn-warning"><i class="ki-duotone ki-plus fs-2"></i>E</a>
                <!--end::Add product-->
                <!--begin::Add product-->
                <a href="{{ route('pedido.create', ['tipoPedido' => "M"]) }}" class="btn btn-primary"><i class="ki-duotone ki-plus fs-2"></i>M</a>
                <!--end::Add product-->
            </div>
        <!--end::Card toolbar-->
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
                        <th class="text-start min-w-100px">Marca</th>
                        <th class="text-start min-w-70px">Classe</th>
                        <th class="text-start min-w-100px">Nº Quadro</th>
                        <th class="text-start min-w-100px">Requerente</th>
                        <th class="text-start min-w-100px">Status</th>
                        <th class="text-start min-w-70px">Acções</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @forelse($veiculos as $veiculo)
                        @if ($veiculo->proprietario->user->id == Auth::id())     
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td class="text-start pe-0" data-order="15">
                                    <span class="fw-bold ms-3">{{ $veiculo->created_at->format('d-m-y') }}</span>
                                </td>
                                <td class="text-start pe-0" data-order="15">
                                    <span class="fw-bold ms-3">{{ $veiculo->marca }}</span>
                                </td>
                                <td class="text-start pe-0">{{ $veiculo->classe->classe }}</td>
                                <td class="text-start pe-0" data-order="rating-4">
                                    {{ $veiculo->quadro }}
                                </td>
                                <td class="text-start pe-0" data-order="rating-4">
                                    {{ $veiculo->proprietario->nome_completo }}
                                </td>
                                <td class="text-start pe-0" data-order="Scheduled">
                                    <!--begin::Badges-->
                                    @if ($veiculo->pedido_matricula->status == "0")
                                            <div class="badge badge-danger">Em Processamento</div>
                                    @else
                                            <div class="badge badge-success">Processado</div>
                                    @endif
                                    <!--end::Badges-->
                                </td>
                                <td class="text-start">
                                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('veiculo.edit', $veiculo->id) }}" class="menu-link px-3">Editar</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('veiculo.edit', $veiculo->id) }}" class="menu-link px-3">AC</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('veiculo.edit', $veiculo->id) }}" class="menu-link px-3">D</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <form method="POST" action="{{ route('veiculo.destroy', $veiculo->id) }}">
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
                        @endif
                    @empty
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td class="text-start pe-0" data-order="15">
                                <span class="fw-bold ms-3">
                                    Sem Veiculos cadastrados.
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

                                    <form method="POST" action="">
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