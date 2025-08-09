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

    <form class="container p-4 bg-white rounded" action="{{ route('ability.update', $ability->id ) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row p-4">
            <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">

                    <div class="pb-12">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-dark">Editar Abilidade</h1>
                        <!--end::Title-->
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Nome da Abilidade</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Digite o nome da abilidade separada por _ (underscore)">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="text" id="nome_completo" name="name" class="form-control" placeholder="nome_da_abilidade" aria-label="First name" value="{{ $ability->name }}">
                        </div>
                    </div>

                    {{-- Butões --}}
                                        
                    <div class="d-flex flex-end mt-4">
                        <a href="{{ route('ability.index') }}" 
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


