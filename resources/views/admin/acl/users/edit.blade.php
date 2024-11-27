@extends('admin.layout.admin-app')
@section('title', 'Editar')

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

    <form class="container p-4 bg-white rounded" action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row p-4">
            <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">

                    <div class="pb-12">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-dark">Editar Role</h1>
                        <!--end::Title-->
                    </div>

                    <!--begin::Notifications-->

                    <!--begin::Basic info-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Content-->
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Imagem</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-1.jpg)"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                <i class="ki-duotone ki-pencil fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nome completo</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nome completo" value="{{ $user->name }}" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Empresa</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="empresa" class="form-control form-control-lg form-control-solid" placeholder="Nome da empresa" value="" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Telemóvel</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="tel" name="telemovel" class="form-control form-control-lg form-control-solid" placeholder="Número de telemóvel" value="e.g. +244 939 434 550" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Role</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select name="role" aria-label="Select a Country" data-control="select2" data-placeholder="Sem role associada" class="form-select form-select-solid form-select-lg fw-semibold">
                                            @if ($user->roles->isEmpty())
                                                <option value="" selected>Selecione uma role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{(($user->roles->pluck('name')->first()) == $role->name) ? 'selected' : ''}}>{{ $role->name }} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Comunicação por</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <!--begin::Options-->
                                        <div class="d-flex align-items-center mt-3">
                                            <!--begin::Option-->
                                            <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="communication[]" type="checkbox" value="1" />
                                                <span class="fw-semibold ps-2 fs-6">Email</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                <input class="form-check-input" name="communication[]" type="checkbox" value="2" />
                                                <span class="fw-semibold ps-2 fs-6">Telemóvel</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                {{-- <div class="row mb-0">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
                                            <label class="form-check-label" for="allowmarketing"></label>
                                        </div>
                                    </div>
                                    <!--begin::Label-->
                                </div> --}}
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Basic info-->

                    <!--end::Notifications-->

                    {{-- Butões --}}
                                        
                    <div class="d-flex flex-end mt-4">
                        <a href="{{ route('user.index') }}" 
                        class="btn btn-lg btn-light me-3" data-kt-element="settings-previous"
                        >Cancelar</a>
                        <button type="button" class="btn btn-lg btn-primary" data-kt-element="settings-next"
                        data-bs-toggle="modal"
                        data-bs-stacked-modal="#modal_salvar"
                        >
                            <span class="indicator-label">Salvar</span>
                        </button>
                    </div>


                    {{-- Modal --}}

                    <div class="modal fade bg-opacity-50 bg-dark" tabindex="-1" id="modal_salvar">
                        <div class="modal-dialog">
                            <div class="modal-content position-absolute bg-active-opacity-25 bg-warning">
                                <div class="modal-header">
                                    <h2 class="modal-title">
                                        <i class="ki-duotone ki-information-2 fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </h2>
                    
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                    
                                <div class="modal-body">
                                    <p class="fs-2">Tem certeza que quer alterar esta <strong>Abilidade</strong>?</p>
                                </div>
                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- End Modal --}}

                </div>
                <!--end::Wrapper-->
            </div>
        </div>
    </form>
@endsection

@section('custom_js_pre')

<script>

    // Make the DIV element draggable:
    var element = document.querySelector('#modal_salvar');
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


