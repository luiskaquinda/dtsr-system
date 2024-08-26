@extends('admin.veiculo.layout.app')
@section('title', 'index')

@section('content')
    <!--begin::Products-->
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
                    <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <div class="w-100 mw-150px">
                    <!--begin::Select2-->
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                        <option></option>
                        <option value="all">All</option>
                        <option value="published">Published</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <!--end::Select2-->
                </div>
                <!--begin::Add product-->
                <a href="{{ route('veiculo.create') }}" class="btn btn-primary"><i class="ki-duotone ki-plus fs-2"></i></a>
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
                        <th class="min-w-200px">Matricula</th>
                        <th class="text-end min-w-100px">Data</th>
                        <th class="text-end min-w-70px">Marca</th>
                        <th class="text-end min-w-100px">Classe</th>
                        <th class="text-end min-w-100px">Nº Quadro</th>
                        <th class="text-end min-w-100px">Requerente</th>
                        <th class="text-end min-w-70px">Acções</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/1.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 1</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01757006</span>
                        </td>
                        <td class="text-end pe-0" data-order="15">
                            <span class="fw-bold ms-3">15</span>
                        </td>
                        <td class="text-end pe-0">290</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('veiculo.index')}}" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('veiculo.index')}}" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/2.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 2</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01763008</span>
                        </td>
                        <td class="text-end pe-0" data-order="18">
                            <span class="fw-bold ms-3">18</span>
                        </td>
                        <td class="text-end pe-0">247</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/3.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 3</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03664002</span>
                        </td>
                        <td class="text-end pe-0" data-order="6">
                            <span class="badge badge-light-warning">Low stock</span>
                            <span class="fw-bold text-warning ms-3">6</span>
                        </td>
                        <td class="text-end pe-0">29</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/4.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 4</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02711009</span>
                        </td>
                        <td class="text-end pe-0" data-order="36">
                            <span class="fw-bold ms-3">36</span>
                        </td>
                        <td class="text-end pe-0">253</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/5.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 5</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03518003</span>
                        </td>
                        <td class="text-end pe-0" data-order="11">
                            <span class="fw-bold ms-3">11</span>
                        </td>
                        <td class="text-end pe-0">203</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/6.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 6</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02609003</span>
                        </td>
                        <td class="text-end pe-0" data-order="5">
                            <span class="badge badge-light-warning">Low stock</span>
                            <span class="fw-bold text-warning ms-3">5</span>
                        </td>
                        <td class="text-end pe-0">67</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/7.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 7</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02674003</span>
                        </td>
                        <td class="text-end pe-0" data-order="36">
                            <span class="fw-bold ms-3">36</span>
                        </td>
                        <td class="text-end pe-0">99</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/8.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 8</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01392007</span>
                        </td>
                        <td class="text-end pe-0" data-order="47">
                            <span class="fw-bold ms-3">47</span>
                        </td>
                        <td class="text-end pe-0">51</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/9.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 9</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03770004</span>
                        </td>
                        <td class="text-end pe-0" data-order="43">
                            <span class="fw-bold ms-3">43</span>
                        </td>
                        <td class="text-end pe-0">296</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/10.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 10</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01646003</span>
                        </td>
                        <td class="text-end pe-0" data-order="48">
                            <span class="fw-bold ms-3">48</span>
                        </td>
                        <td class="text-end pe-0">148</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/11.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 11</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04688005</span>
                        </td>
                        <td class="text-end pe-0" data-order="44">
                            <span class="fw-bold ms-3">44</span>
                        </td>
                        <td class="text-end pe-0">122</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/12.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 12</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04185002</span>
                        </td>
                        <td class="text-end pe-0" data-order="38">
                            <span class="fw-bold ms-3">38</span>
                        </td>
                        <td class="text-end pe-0">137</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/13.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 13</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02936002</span>
                        </td>
                        <td class="text-end pe-0" data-order="12">
                            <span class="fw-bold ms-3">12</span>
                        </td>
                        <td class="text-end pe-0">232</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/14.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 14</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04196004</span>
                        </td>
                        <td class="text-end pe-0" data-order="36">
                            <span class="fw-bold ms-3">36</span>
                        </td>
                        <td class="text-end pe-0">120</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/15.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 15</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03789001</span>
                        </td>
                        <td class="text-end pe-0" data-order="36">
                            <span class="fw-bold ms-3">36</span>
                        </td>
                        <td class="text-end pe-0">83</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/16.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 16</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02868008</span>
                        </td>
                        <td class="text-end pe-0" data-order="33">
                            <span class="fw-bold ms-3">33</span>
                        </td>
                        <td class="text-end pe-0">72</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/17.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 17</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01226008</span>
                        </td>
                        <td class="text-end pe-0" data-order="37">
                            <span class="fw-bold ms-3">37</span>
                        </td>
                        <td class="text-end pe-0">72</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/18.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 18</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04102006</span>
                        </td>
                        <td class="text-end pe-0" data-order="21">
                            <span class="fw-bold ms-3">21</span>
                        </td>
                        <td class="text-end pe-0">179</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/19.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 19</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03857004</span>
                        </td>
                        <td class="text-end pe-0" data-order="1">
                            <span class="badge badge-light-warning">Low stock</span>
                            <span class="fw-bold text-warning ms-3">1</span>
                        </td>
                        <td class="text-end pe-0">138</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/20.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 20</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03154003</span>
                        </td>
                        <td class="text-end pe-0" data-order="49">
                            <span class="fw-bold ms-3">49</span>
                        </td>
                        <td class="text-end pe-0">220</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/21.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 21</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02378008</span>
                        </td>
                        <td class="text-end pe-0" data-order="19">
                            <span class="fw-bold ms-3">19</span>
                        </td>
                        <td class="text-end pe-0">274</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/22.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 22</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02786004</span>
                        </td>
                        <td class="text-end pe-0" data-order="30">
                            <span class="fw-bold ms-3">30</span>
                        </td>
                        <td class="text-end pe-0">270</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/23.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 23</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02918009</span>
                        </td>
                        <td class="text-end pe-0" data-order="21">
                            <span class="fw-bold ms-3">21</span>
                        </td>
                        <td class="text-end pe-0">90</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/24.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 24</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02335009</span>
                        </td>
                        <td class="text-end pe-0" data-order="1">
                            <span class="badge badge-light-warning">Low stock</span>
                            <span class="fw-bold text-warning ms-3">1</span>
                        </td>
                        <td class="text-end pe-0">30</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/25.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 25</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03731006</span>
                        </td>
                        <td class="text-end pe-0" data-order="27">
                            <span class="fw-bold ms-3">27</span>
                        </td>
                        <td class="text-end pe-0">198</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/26.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 26</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04805007</span>
                        </td>
                        <td class="text-end pe-0" data-order="15">
                            <span class="fw-bold ms-3">15</span>
                        </td>
                        <td class="text-end pe-0">109</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/27.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 27</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02488006</span>
                        </td>
                        <td class="text-end pe-0" data-order="46">
                            <span class="fw-bold ms-3">46</span>
                        </td>
                        <td class="text-end pe-0">87</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/28.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 28</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01217003</span>
                        </td>
                        <td class="text-end pe-0" data-order="38">
                            <span class="fw-bold ms-3">38</span>
                        </td>
                        <td class="text-end pe-0">175</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/29.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 29</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04731002</span>
                        </td>
                        <td class="text-end pe-0" data-order="43">
                            <span class="fw-bold ms-3">43</span>
                        </td>
                        <td class="text-end pe-0">246</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/30.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 30</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01223002</span>
                        </td>
                        <td class="text-end pe-0" data-order="28">
                            <span class="fw-bold ms-3">28</span>
                        </td>
                        <td class="text-end pe-0">144</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/31.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 31</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03118006</span>
                        </td>
                        <td class="text-end pe-0" data-order="15">
                            <span class="fw-bold ms-3">15</span>
                        </td>
                        <td class="text-end pe-0">175</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/32.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 32</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04661003</span>
                        </td>
                        <td class="text-end pe-0" data-order="22">
                            <span class="fw-bold ms-3">22</span>
                        </td>
                        <td class="text-end pe-0">86</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/33.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 33</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04864009</span>
                        </td>
                        <td class="text-end pe-0" data-order="15">
                            <span class="fw-bold ms-3">15</span>
                        </td>
                        <td class="text-end pe-0">42</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/34.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 34</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01781005</span>
                        </td>
                        <td class="text-end pe-0" data-order="23">
                            <span class="fw-bold ms-3">23</span>
                        </td>
                        <td class="text-end pe-0">202</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/35.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 35</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03239008</span>
                        </td>
                        <td class="text-end pe-0" data-order="32">
                            <span class="fw-bold ms-3">32</span>
                        </td>
                        <td class="text-end pe-0">247</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/36.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 36</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04397008</span>
                        </td>
                        <td class="text-end pe-0" data-order="13">
                            <span class="fw-bold ms-3">13</span>
                        </td>
                        <td class="text-end pe-0">42</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/37.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 37</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04358001</span>
                        </td>
                        <td class="text-end pe-0" data-order="22">
                            <span class="fw-bold ms-3">22</span>
                        </td>
                        <td class="text-end pe-0">163</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/38.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 38</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01964003</span>
                        </td>
                        <td class="text-end pe-0" data-order="6">
                            <span class="badge badge-light-warning">Low stock</span>
                            <span class="fw-bold text-warning ms-3">6</span>
                        </td>
                        <td class="text-end pe-0">280</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/39.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 39</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">01827008</span>
                        </td>
                        <td class="text-end pe-0" data-order="6">
                            <span class="badge badge-light-warning">Low stock</span>
                            <span class="fw-bold text-warning ms-3">6</span>
                        </td>
                        <td class="text-end pe-0">175</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/40.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 40</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04281002</span>
                        </td>
                        <td class="text-end pe-0" data-order="41">
                            <span class="fw-bold ms-3">41</span>
                        </td>
                        <td class="text-end pe-0">233</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/41.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 41</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02301006</span>
                        </td>
                        <td class="text-end pe-0" data-order="42">
                            <span class="fw-bold ms-3">42</span>
                        </td>
                        <td class="text-end pe-0">131</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/42.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 42</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04888002</span>
                        </td>
                        <td class="text-end pe-0" data-order="35">
                            <span class="fw-bold ms-3">35</span>
                        </td>
                        <td class="text-end pe-0">269</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/43.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 43</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03685007</span>
                        </td>
                        <td class="text-end pe-0" data-order="26">
                            <span class="fw-bold ms-3">26</span>
                        </td>
                        <td class="text-end pe-0">154</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/44.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 44</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03225003</span>
                        </td>
                        <td class="text-end pe-0" data-order="17">
                            <span class="fw-bold ms-3">17</span>
                        </td>
                        <td class="text-end pe-0">93</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            <div class="badge badge-light-success">Published</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/45.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 45</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04866002</span>
                        </td>
                        <td class="text-end pe-0" data-order="46">
                            <span class="fw-bold ms-3">46</span>
                        </td>
                        <td class="text-end pe-0">66</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/46.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 46</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03497002</span>
                        </td>
                        <td class="text-end pe-0" data-order="30">
                            <span class="fw-bold ms-3">30</span>
                        </td>
                        <td class="text-end pe-0">257</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/47.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 47</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04360009</span>
                        </td>
                        <td class="text-end pe-0" data-order="43">
                            <span class="fw-bold ms-3">43</span>
                        </td>
                        <td class="text-end pe-0">176</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/48.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 48</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03467002</span>
                        </td>
                        <td class="text-end pe-0" data-order="26">
                            <span class="fw-bold ms-3">26</span>
                        </td>
                        <td class="text-end pe-0">38</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            <div class="badge badge-light-primary">Scheduled</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/49.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 49</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02327006</span>
                        </td>
                        <td class="text-end pe-0" data-order="49">
                            <span class="fw-bold ms-3">49</span>
                        </td>
                        <td class="text-end pe-0">205</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/50.gif);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 50</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">02526009</span>
                        </td>
                        <td class="text-end pe-0" data-order="34">
                            <span class="fw-bold ms-3">34</span>
                        </td>
                        <td class="text-end pe-0">29</td>
                        <td class="text-end pe-0" data-order="rating-5">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Editar</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Products-->
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