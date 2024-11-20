@extends('admin.layout.admin-app')
@section('title', 'Abilidades')

@section('content')

    @if($mensagem = Session::get('sucesso'))
        <!--begin::Alert-->
        <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">

            <!--begin::Wrapper-->
            <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                <!--begin::Content-->
                <p>{{ $mensagem }}</p>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Close-->
            <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span class="path2"></span></i>
            </button>
            <!--end::Close-->
        </div>
        <!--end::Alert-->

    @endif
	
    <h1 class="text-black fw-semibold px-9 mt-10 mb-6">Lista de Abilidades</h1>

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
                <a href="{{ route('ability.create') }}" class="btn btn-primary"><i class="ki-duotone ki-plus fs-2"></i></a>
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
                        <th class="text-start min-w-100px">Abilidade</th>
                        <th class="text-start min-w-100px">Roles Associadas</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @forelse($abilities as $ability)
                        
						<tr>
							<td>
								<div class="form-check form-check-sm form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="1" />
								</div>
							</td>
							<td class="text-start pe-0" data-order="15">
								<span class="fw-bold ms-3">{{ $ability->name }}</span>
							</td>
							<td class="text-start pe-0" data-order="rating-4">
                                @if ($ability->roles->isEmpty())
                                    <span>Sem role associado</span>
                                @else
                                    @foreach ($ability->roles as $role)
                                        <span class="badge badge-dark">{{ $role->name }}</span>
                                    @endforeach
                                @endif
							</td>
							
							<td class="text-start">
								<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acções
								<i class="ki-duotone ki-down fs-5 ms-1"></i></a>
								<!--begin::Menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
									
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="{{ route('ability.edit', ['id' => $ability->id ]) }}" class="menu-link px-3">Editar</a>
									</div>
									<!--end::Menu item-->

									<form method="POST" action="{{ route('ability.destroy', $ability->id) }}" class="menu-item px-3 delete-form">
										@csrf
										@method('delete')

										<button type="submit" class="menu-link px-3"
                                        > Apagar </button>
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
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Listagem de Veiculos-->
@endsection

@section('custom_js_pre') 
    <script>
        // Make the DIV element draggable:
        var element = document.querySelector('#modal_apagar');
        dragElement(element);

        function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            if (elmnt.querySelector('.modal-content')) {
                // if present, the header is where you move the DIV from:
                elmnt.querySelector('.modal-content').onmousedown = dragMouseDown;
            } else {
                // otherwise, move the DIV from anywhere inside the DIV:
                elmnt.onmousedown = dragMouseDown;
            }

            function dragMouseDown(e) {
                e = e || window.event;
                // get the mouse cursor position at startup:
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                // call a function whenever the cursor moves:
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // set the element's new position:
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            }

            function closeDragElement() {
                // stop moving when mouse button is released:
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
    </script>
@endsection


