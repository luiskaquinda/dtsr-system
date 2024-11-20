@extends('admin.layout.admin-app')
@section('title', 'Adicionar')

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

    <form class="container p-4 bg-white rounded" action="{{ route('ability.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="row p-4">
            <div data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">

                    <div class="pb-12">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-dark">Cadastrar Abilidade</h1>
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
                            <input type="text" id="nome_completo" name="name" class="form-control" placeholder="nome_da_abilidade" aria-label="First name">
                        </div>
                    </div>

                    {{-- Butões --}}
                                        
                    <div class="d-flex flex-end mt-4">
                        <a href="{{ route('ability.index') }}" 
                        class="btn btn-lg btn-light me-3" data-kt-element="settings-previous"
                        >Cancelar</a>
                        <button type="submit" class="btn btn-lg btn-primary" data-kt-element="settings-next">
                            <span class="indicator-label">Cadastrar</span>
                        </button>
                    </div>

                </div>
                <!--end::Wrapper-->
            </div>
        </div>
    </form>
@endsection

@section('custom_js_pre')

@endsection


