@extends('admin.layout.app')
@section('title', 'Pedido')

@section('content')

    @if (session('success'))
        <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Detalhe do Pedido</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <form class="row person-button-container">

                {{-- Atribuir Matricula --}}

                @can('atribuir_matricula')
                    @if ($pedido->veiculo->matricula_id == null)
                        <a href="../dist/account/settings.html" class="btn btn-sm btn-warning align-self-center text-center"
                        type="button" data-bs-toggle="modal" data-bs-target="#atribuir_matricula"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0"/>
                            </svg>
                        </a>
                    @endif

                @endcan

                @can('atribuir_multa')    
                    @if ($pedido->veiculo->matricula_id !== null)
                        <a href="../dist/account/settings.html" class="btn btn-sm btn-warning align-self-center text-center"
                        type="button" data-bs-toggle="modal" data-bs-target="#atribuir_multa"
                        >
                            MLT
                        </a>
                    @endif
                @endcan
          

                <a href="../dist/account/settings.html" class="btn btn-sm btn-warning align-self-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                        <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
                        <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
                      </svg>
                </a>
                
            </form>
            <!--end::Action-->
        </div>
        <!--begin::Card header-->

        <!--begin::Card body-->
        <div class="card-body p-9">
            Show
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection

@section('custom_js')
    <script src="{{ asset('js/custom/apps/ecommerce/catalog/products.js') }}"></script>
    <script src="{{ asset('js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/main.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/users-search.js') }}"></script>
@endsection
