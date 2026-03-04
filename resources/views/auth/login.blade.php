@extends('admin.auth.layout.app')
@section('title', 'Login')

@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->

                        <!--begin::Alert-->
                        @if($errors->any())
                            <div class="alert alert-dismissible bg-light-danger border border-danger d-flex flex-column flex-sm-row p-5 mb-10">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-information-3 fs-2hx text-danger me-4 mb-5 mb-sm-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--end::Icon-->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column pe-0 pe-sm-10">
                                    <!--begin::Title-->
                                    <h5 class="mb-1">Atenção!</h5>
                                    <!--end::Title-->
                                    @foreach($errors->all() as $error)
                                        <!--begin::Content-->
                                        <span>{{ $error }}</span>
                                        <!--end::Content--> 
                                        <br>
                                    @endforeach
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Close-->
                                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                    <i class="ki-duotone ki-cross fs-1 text-danger"><span class="path1"></span><span class="path2"></span></i>
                                </button>
                                <!--end::Close-->
                            </div>
                        @endif
                        
                        <!--end::Alert-->

                        <form id="kt_docs_formvalidation_email" class="form w-100" method="POST" action="{{ route('login') }}">

                            @method('POST')
                            @csrf

                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <a href="{{ route('home') }}" class="py-2 py-lg-20">
                                    <img alt="Logo" src="{{ asset('media/logos/sicva_mobile_1.png') }}" class="h-300px h-lg-310px" />
                                </a>
                                {{-- <h1 class="text-dark mb-3">Bem Vindo ao DTSR-System</h1> --}}
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->

                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="required form-label fs-6 fw-bold text-dark">Email</label>
                                <!--end::Label-->
                        
                                <!--begin::Input-->
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid" placeholder="" value="" 
                                name="email" 
                                autocomplete="off"
                                id="email"  
                                required 
                                autofocus/>
                                <!--end::Input-->
                            </div>

                            {{-- <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label 
                                class="form-label fs-6 fw-bold text-dark"
                                >Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input 
                                class="form-control form-control-lg form-control-solid" 
                                name="email" 
                                autocomplete="off"
                                id="email"
                                type="email"  
                                required 
                                autofocus 
                                autocomplete="username"
                                />
                                <!--end::Input-->
                            </div> --}}
                            <!--end::Input group-->

                            <div class="fv-row mb-10">

                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="required form-label fw-bold text-dark fs-6 mb-0">Senha</label>
                                    <!--end::Label-->
                                    <!--begin::Link-->

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bold">Esqueceu a palavra passe?</a>
                                    @endif
                                    <!--end::Link-->
                                </div>
                        
                                <!--begin::Input-->
                                <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="" value="" 
                                name="password" 
                                autocomplete="off"
                                id="password" 
                                required 
                                autofocus/>
                                <!--end::Input-->
                            </div>
                            {{-- <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold text-dark fs-6 mb-0">Senha</label>
                                    <!--end::Label-->
                                    <!--begin::Link-->

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bold">Esqueceu a palavra passe?</a>
                                    @endif
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" 
                                autocomplete="off" 
                                id="password"
                                type="password"
                                name="password"
                                required 
                                autocomplete="current-password"
                                />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group--> --}}
                            <!--begin::Actions-->

                            
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5" id="kt_docs_formvalidation_input_group_submit">
                                    <span class="indicator-label">Entrar</span>
                                    {{-- <span class="indicator-progress">
                                        Por favor aguarde...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span> --}}
                                </button>
                                {{-- <!--end::Submit button-->

                                <button id="kt_docs_formvalidation_input_group_submit" type="submit" class="btn btn-primary">
                                    <span class="indicator-label">
                                        Validation Form
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <!--begin::Separator--> --}}
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <!--begin::Links-->
                    <div class="d-flex flex-center fw-semibold fs-6">
                        <a href="#" class="text-muted text-hover-primary px-2" target="_blank">Sobre</a>
                        <a href="#" class="text-muted text-hover-primary px-2" target="_blank">Suporte</a>
                        {{-- <a href="https://keenthemes.com/products/oswald-html-pro" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a> --}}
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
@endsection

@push('validacao')
<script>

    // Define form element
    const form = document.getElementById('kt_docs_formvalidation_email');

    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validator = FormValidation.formValidation(
    form,
    {
        fields: {
            'email': {
                validators: {
                    emailAddress: {
                        message: 'O endereço de mail inserido é inválido. Exemplo de endereço válido: meuemail@exemplo.com'
                    },
                    notEmpty: {
                        message: 'Endereço de email é campo obrigatório'
                    }
                }
            },
            'password': {
                validators: {
                    notEmpty: {
                        message: 'A senha é campo obrigatório'
                    }
                }
            },
        },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    }
);

    // Submit button handler
    const submitButton = document.getElementById('kt_docs_formvalidation_email_submit');
    submitButton.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();

    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            console.log('validated!');

            if (status == 'Valid') {
                // Show loading indication
                submitButton.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                submitButton.disabled = true;

                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                setTimeout(function () {
                    // Remove loading indication
                    submitButton.removeAttribute('data-kt-indicator');

                    // Enable button
                    submitButton.disabled = false;

                    // Show popup confirmation
                    Swal.fire({
                        text: "Form has been successfully submitted!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });

                    //form.submit(); // Submit form
                }, 2000);
            }
        });
        }
    });

</script>
@endpush


