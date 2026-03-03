<div class="app-header-secondary">
    <!--begin::Header secondary container-->
    <div class="app-container container-xxl d-flex align-items-center w-100">
        <!--begin::Search-->
        <div class="d-flex align-items-center w-100 pt-5 pt-lg-0">
            <!--begin::Search-->
            <div id="kt_header_search" class="header-search d-flex align-items-center w-100 w-lg-100" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
                <!--begin::Form(use d-none d-lg-block classes for responsive search)-->

                <form method="GET" action="{{ route('notificacao.alertas.index') }}" class="w-100 position-relative mb-5 mb-lg-0 custom-search">
                    <input type="text" 
                           class="search-input form-control ps-8" 
                           name="search"
                           value="{{ $search ?? '' }}" 
                           placeholder="Digite o alerta aqui...">
                
                    <button type="submit" class="custom-btn btn btn-lg btn-primary d-inline">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                
                <!--end::Form-->
            </div>
            <!--end::Search-->
        </div>
        <!--end::Search-->
    </div>
    <!--end::Header secondary container-->
</div>