@extends('notificoes.furtos_acidentes_roubos.layout.app')
@section('title', 'Sentinel - Benguela')

@section('content')
    <!--begin::Wrapper-->
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <!--begin::Wrapper container-->
        <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar pt-lg-9 pt-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-4 w-100">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column gap-3 me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Alerta</h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-3 gap-lg-5">
                                    <!--begin::Primary button-->
                                    <a href="#" class="btn btn-flex btn-center btn-dark btn-sm px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_2">Alertar</a>
                                    <!--end::Primary button-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content pb-0">
                        <!--begin::About main-->
                        <div class="d-flex flex-column flex-xl-row">
                            <!--begin::Content-->
                            <div class="card bg-body me-9 pb-lg-18">
                                <div class="card-body pb-lg-20">
                                    <!--begin::Blog-->
                                    <div class="mb-13">
                                        <!--begin::Title-->
                                        <div class="mb-9">
                                            <h3 class="fs-2qx fw-bold text-dark">{{ $alerta->titulo }}</h3>
                                            @if (($alerta->anonima == 1) || ($alerta->anonima !== 0))
                                                <span class="fs-5 fw-semibold text-gray-400">Publicado por: Anonimo</span>
                                            @else
                                                <span class="fs-5 fw-semibold text-gray-400">Publicado por: {{ $alerta->nome_denuciante }}</span>
                                            @endif
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Wrapper-->
                                        <div class="mb-11">
                                            <!--begin::Image-->
                                            <img class="card-rounded min-h-325px w-100" src="{{ asset('storage/' . $alerta->imagem) }}" alt="">
                                            <!--end::Image-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Section-->
                                        <div class="fs-5 fw-semibold text-gray-600 mt-4">
                                            <!--begin::Text-->
                                            <p class="mb-8">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words per minute and your writing skills are sharp. From the seed of the idea to finally hitting “Publish,” you might spend several days or maybe even a week “writing” a blog post, but it’s important to spend those vital hours planning your post and even thinking about
                                            <a href="#" class="link-primary pe-1">Your Post</a>(yes, thinking counts as working if you’re a blogger) before you actually write it.</p>
                                            <!--end::Text-->
                                            <!--begin::Text-->
                                            <p class="m-0">Before you do any of the following steps, be sure to pick a topic that actually interests you. Nothing – and
                                            <a href="../dist/pages/blog/home.html" class="link-primary pe-1">I mean NOTHING</a>– will kill a blog post more effectively than a lack of enthusiasm from the writer. You can tell when a writer is bored by their subject, and it’s so cringe-worthy it’s a little embarrassing.</p>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Blog-->
                                </div>
                            </div>
                            <!--end::Content-->
                            <!--begin::Sidebar-->
                            <div class="flex-column flex-lg-row-auto w-100 w-xl-350px">
                                <!--begin::Careers about-->
                                <div class="card card-flush bg-body mb-9">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Top-->
                                        <div class="mb-7">
                                            <!--begin::Title-->
                                            <h2 class="fs-1 text-gray-800 w-bolder mb-6">Anúncios</h2>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <p class="fw-semibold fs-6 text-gray-600">Anuncie conosco.</p>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Top-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Careers about-->
                                <!--begin::Recent posts-->
                                <div class="card card-flush bg-body mb-9">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <h4 class="card-title fw-bold text-gray-800 fs-2">Alertas recentes</h4>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-2">
                                        @foreach ($alertas as $alerta_item)
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-7">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-60px symbol-2by3 me-4">
                                                    <div class="symbol-label" style="background-image: url({{ asset('storage/' . $alerta_item->imagem)}})"></div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="m-0">
                                                    <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{ $alerta_item->titulo }}</a>
                                                    <span class="text-gray-600 fw-semibold d-block pt-1 fs-8">{{ $alerta_item->descricao }}...</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                        @endforeach
                                        <!--begin::Link-->
                                        <a href="{{ route('notificacao.alertas.index') }}" class="text-primary opacity-75-hover pt-8 fs-6 fw-semibold d-block">Ler mais</a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Recent posts-->
                                <!--begin::Connected-->
                                <div class="card card-flush bg-body">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <h4 class="card-title fw-bold text-text-gray-800 fs-2">Segue a DTSR</h4>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Items-->
                                        <div class="mb-6">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('admin/media/svg/brand-logos/facebook-4.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Facebook</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                        <!--begin::Items-->
                                        <div class="mb-6">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('admin/media/svg/brand-logos/github.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Github</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                        <!--begin::Items-->
                                        <div class="mb-6">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('admin/media/svg/brand-logos/twitter.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Twitter</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                        <!--begin::Items-->
                                        <div class="mb-6">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('admin/media/svg/brand-logos/dribbble-icon-1.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Dribbble</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                        <!--begin::Items-->
                                        <div class="">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('admin/media/svg/brand-logos/instagram-2016.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Instagram</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Connected-->
                            </div>
                            <!--end::Sidebar-->
                        </div>
                        <!--end::About main-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->

                @include('notificoes.furtos_acidentes_roubos.create')
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper container-->
    </div>
    <!--end::Wrapper-->
@endsection