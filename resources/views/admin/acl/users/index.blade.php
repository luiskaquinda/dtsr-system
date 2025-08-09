@extends('admin.layout.admin-app')
@section('title', 'Users')

@section('content')
	
    <h1 class="text-black fw-semibold px-9 mt-10 mb-6">Lista de Usuários</h1>

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
                @can('cerate_user')
                    <a href="#" class="btn btn-primary"><i class="ki-duotone ki-plus fs-2"></i></a>
                @endcan
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
                        <th class="text-start min-w-100px">Nome</th>
                        <th class="text-start min-w-100px">Email</th>
                        <th class="text-start min-w-70px">Role</th>
                        <th class="text-start min-w-70px">Acções</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @forelse($users as $user)
                        
						<tr>
							<td>
								<div class="form-check form-check-sm form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="1" />
								</div>
							</td>
							<td class="text-start pe-0" data-order="15">
								<span class="fw-bold ms-3">{{ $user->name }}</span>
							</td>
							<td class="text-start pe-0" data-order="15">
								<span class="fw-bold ms-3">{{ $user->email }}</span>
							</td>
							<td class="text-start pe-0" data-order="rating-4">
								@if (($user->roles->pluck('name')->first() == null) || ($user->roles->pluck('name')->first() == ""))	
									<span class="badge badge-danger">Sem role</span>
								@else
									<span class="badge badge-dark">
                                        {{ $user->roles->pluck('name')->first() }}
                                    </span>
								@endif
							</td>
							
							<td class="text-start">
								<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
									Acções
								<i class="ki-duotone ki-down fs-5 ms-1"></i></a>
								<!--begin::Menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
									
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="{{ route('user.edit', $user->id ) }}" class="menu-link px-3">Editar</a>
									</div>
									<!--end::Menu item-->

									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Ver</a>
									</div>
									<!--end::Menu item-->

									<form method="POST" action="" class="menu-item px-3 delete-form">
										@csrf
										@method('delete')

										<button type="submit" class="menu-link px-3">Apagar</button>

									</form>
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

            <!--begin::Users-->
                {{-- <div class="mb-10">
                    <!--begin::List-->
                    <div class="mh-300px scroll-y me-n7 pe-7">
                        @foreach ($users as $user)
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{ $user->name }}</a>
                                        <div class="fw-semibold text-muted">{{ $user->email }}</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-200px">
                                    <label for="" class="fs-6 text-gray-600 mb-2">Role</label>
                                    <select class="form-select form-select-solid form-select-sm border border-gray-900 border-active active" data-control="select2">
                                        <option value="1" selected="selected">Guest</option>
                                        <option value="2">Owner</option>
                                        <option value="3">Can Edit</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                        @endforeach
                    </div>
                    <!--end::List-->
                </div> --}}
                <!--end::Users-->
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Listagem de Veiculos-->
@endsection

@section('custom_js_pre')

@endsection


