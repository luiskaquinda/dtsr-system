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

    <form class="container p-4 bg-white rounded" action="{{ route('role.update', $role->id ) }}" method="POST">
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

                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Content-->
                        <div id="kt_account_settings_notifications" class="collapse show">
                            <!--begin::Form-->
                            <div class="form">
                                <!--begin::Card body-->

                                <div class="row g-3 mb-4 px-9 pt-3 pb-4">
                                    <div class="col">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Role ID</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Não se pode editar">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" id="nome_completo" name="name" class="form-control" placeholder="e.g. admin" aria-label="First name" value="{{ $role->id }}" readonly>
                                    </div>

                                    <div class="col">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Nome da Role</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o nome da abilidade separada por _ (underscore)">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" id="nome_completo" name="name" class="form-control" placeholder="e.g. admin" aria-label="First name" value="{{ $role->name }}">
                                    </div>
                                </div>

                                <div class="card-body border-top px-9 pt-3 pb-4">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                                            <tbody class="fs-6 fw-semibold">
                                                <!--begin::Table row-->
                                                <tr>
                                                    <td class="min-w-250px fs-4 fw-bold">Abilidades</td>
                                                    
                                                    <td class="w-125px">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_phone" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=phone]" />
                                                            <label class="form-check-label ps-2" for="kt_settings_notification_phone">Todas</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--begin::Table row-->
                                                @foreach ($abilities as $ability)    
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="{{ $ability->id }}" id="billing2" name="ability[{{ $ability->name }}]" data-kt-settings-notification="phone" {{ ($role->abilities->contains('name', $ability->name)) ? 'checked': '' }} />
                                                                <label class="form-check-label ps-2" for="billing2">
                                                                    {{ $ability->name }}
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <!--begin::Table row-->
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                                
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>

                    <!--end::Notifications-->

                    {{-- Butões --}}
                                        
                    <div class="d-flex flex-end mt-4">
                        <a href="{{ route('role.index') }}" 
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


