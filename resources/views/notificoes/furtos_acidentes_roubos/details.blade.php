@extends('notificoes.furtos_acidentes_roubos.layout.app')
@section('title', 'Sentinel - Benguela')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
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
                                            <div class="mt-auto pt-2">
                                                <!-- data, botões e confirmações -->

                                                <!--begin::Info-->
                                                <div class="d-flex flex-wrap mb-5">
                                                    <!--begin::Due-->
                                                    @php
                                                        // Data de criação como Carbon
                                                        $created = $alerta->created_at;
                                                        $days    = $created->diffInDays(now());
                                                        $hours   = $created->diffInHours(now());
                                                        $minutes = $created->diffInMinutes(now());
                                                    @endphp

                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                                        <div class="fs-6 text-gray-800 fw-bold">
                                                            Ocorrido em: {{ $alerta->data_ocorrido->format('d/m/Y') }} | {{ $alerta->hora_ocorrido->format('H:i') }}
                                                        </div>
                                                        <div class="fw-semibold text-gray-400">
                                                            Alertado em: {{ $created->format('d/m/Y') }}
                                                            &nbsp;•&nbsp;
                                                            @if($days >= 1)
                                                                {{ $days }} {{ Str::plural('dia', $days) }} atrás
                                                            @elseif($hours >= 1)
                                                                {{ $hours }} {{ Str::plural('hora', $hours) }} atrás
                                                            @else
                                                                {{ $minutes }} {{ Str::plural('minuto', $minutes) }} atrás
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!--end::Due-->                                 
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Wrapper-->
                                        {{-- <div class="mb-11">
                                            <!--begin::Image-->
                                            <img class="card-rounded min-h-325px w-100" src="{{ asset('storage/public/' . $alerta->imagem) }}" alt="">
                                            <!--end::Image-->
                                        </div> --}}
                                        @if($alerta->imagens->isNotEmpty())
                                            <div class="alerta-gallery position-relative" id="alertaGallery{{ $alerta->id }}">
                                                
                                                {{-- Imagem principal dentro do wrapper --}}
                                                <div class="main-alerta-wrapper">
                                                    <img
                                                        id="mainImage{{ $alerta->id }}"
                                                        src="{{ asset('storage/public/'.$alerta->imagens->first()->path) }}"
                                                        class="main-alerta-img"
                                                        alt="Imagem principal do alerta"
                                                    >
                                                </div>

                                                {{-- Miniaturas no canto inferior direito --}}
                                                <div class="thumbs-container" aria-label="Miniaturas do alerta">
                                                    @foreach($alerta->imagens as $i => $img)
                                                        <button
                                                            type="button"
                                                            class="thumb-btn {{ $i === 0 ? 'active' : '' }}"
                                                            data-target="#mainImage{{ $alerta->id }}"
                                                            data-src="{{ asset('storage/public/'.$img->path) }}"
                                                            aria-label="Ver imagem {{ $i + 1 }}"
                                                            title="Ver imagem {{ $i + 1 }}"
                                                        >
                                                            <img src="{{ asset('storage/public/'.$img->path) }}" alt="Miniatura {{ $i + 1 }}" loading="lazy">
                                                        </button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <div class="mb-11">
                                                <!--begin::Image-->
                                                <img class="card-rounded min-h-325px w-100" src="{{ asset('storage/public/' . $alerta->imagem) }}" alt="">
                                                <!--end::Image-->
                                            </div>
                                        @endif

                                        <!--end::Wrapper-->
                                        <!--begin::Section-->
                                        <div class="fs-5 fw-semibold text-gray-600 mt-4">
                                            <!--begin::Text-->
                                            <p class="mb-8">{{ Str::limit($alerta->descricao, 20, '...') }}</p>
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
                                                    <div class="symbol-label" style="background-image: url({{ asset('storage/public/'.$alerta_item->imagem)}})"></div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="m-0">
                                                    <a href="{{ route('alertas.show', $alerta_item->id)}}" class="text-dark fw-bold text-hover-primary fs-6">{{ $alerta_item->titulo }}</a>
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
                                                <img src="{{ asset('media/svg/brand-logos/facebook-4.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Facebook</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                        <!--begin::Items-->
                                        <div class="mb-6">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('media/svg/brand-logos/github.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Github</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                        <!--begin::Items-->
                                        <div class="mb-6">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('media/svg/brand-logos/twitter.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Twitter</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                        <!--begin::Items-->
                                        <div class="mb-6">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('media/svg/brand-logos/dribbble-icon-1.svg') }}" class="h-20px me-2" alt="" />
                                                <span class="text-gray-700 text-hover-primary fs-5 mb-6">Dribbble</span>
                                            </a>
                                            <!--end::Link-->
                                        </div>
                                        <!--begin::Items-->
                                        <!--begin::Items-->
                                        <div class="">
                                            <!--begin::Link-->
                                            <a href="#" class="mb-6">
                                                <img src="{{ asset('media/svg/brand-logos/instagram-2016.svg') }}" class="h-20px me-2" alt="" />
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

@push('anonimo')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // para cada galeria encontrada na página
        document.querySelectorAll('.alerta-gallery').forEach(function(gallery) {
            const thumbs = gallery.querySelectorAll('.thumb-btn');
            thumbs.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const targetSelector = btn.getAttribute('data-target');
                    const src = btn.getAttribute('data-src');
                    if (!targetSelector || !src) return;
    
                    // troca a src da imagem principal
                    const mainImg = document.querySelector(targetSelector);
                    if (mainImg) {
                        // animação simples: fade_out -> change -> fade_in
                        mainImg.style.transition = 'opacity .18s ease';
                        mainImg.style.opacity = '0';
                        setTimeout(function() {
                            mainImg.src = src;
                            mainImg.style.opacity = '1';
                        }, 180);
                    }
    
                    // actualiza classe active nas miniaturas
                    thumbs.forEach(t => t.classList.remove('active'));
                    btn.classList.add('active');
                });
            });
        });
    });
    </script>      
@endpush
@push('css_imagem')
<style>
    /* ----------------------------
   Galeria: imagem principal fixa, responsiva
   ---------------------------- */
:root{
  --main-aspect-ratio: 16 / 9;   /* altera para 4/3, 1/1 etc se preferires */
  --main-max-height: 500px;      /* máxima altura em px (desktop) */
  --main-max-width: 100%;        /* largura máxima do bloco */
  --thumb-w: 72px;
  --thumb-h: 54px;
}

/* wrapper que mantém a proporção */
.alerta-gallery {
  width: 100%;
  max-width: var(--main-max-width);
  position: relative;
}

/* método moderno: usa aspect-ratio se suportado */
.main-alerta-wrapper {
  width: 100%;
  aspect-ratio: var(--main-aspect-ratio);
  max-height: var(--main-max-height);
  overflow: hidden;
  border-radius: 6px;
  background: #f0f0f0; /* cor de fundo enquanto a imagem carrega */
  display: block;
  position: relative;
}

/* fallback para browsers que não suportam aspect-ratio:
   usa o pseudo-elemento para fixar a altura (padding-top) */
@supports not (aspect-ratio: 1/1) {
  .main-alerta-wrapper {
    height: 0;
    padding-top: calc(100% / (var(--main-aspect-ratio)));
  }
  .main-alerta-wrapper img {
    position: absolute;
    top: 0; left: 0;
  }
}

/* imagem principal: ocupa 100% da caixa e faz crop centrado */
.main-alerta-wrapper img,
.main-alerta-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  display: block;
  transition: opacity .18s ease, transform .18s ease;
}

/* garante que não apareçam inline-styles a atrapalhar */
.main-alerta-wrapper img[style] {
  /* opcional: remove inline max-height/width via CSS override */
  max-height: none !important;
  height: 100% !important;
  width: 100% !important;
}

/* ----------------------------
   Miniaturas
   ---------------------------- */
.alerta-gallery .thumbs-container {
  position: absolute;
  right: 12px;
  bottom: 12px;
  display: flex;
  flex-direction: column;
  gap: 8px;
  z-index: 30;
  padding: 6px;
  border-radius: 8px;
  background: rgba(0,0,0,0.04);
  max-height: calc(var(--main-max-height) - 24px);
  overflow-y: auto;
}

/* thumbnail buttons */
.thumb-btn {
  width: var(--thumb-w);
  height: var(--thumb-h);
  padding: 0;
  border-radius: 6px;
  overflow: hidden;
  border: 2px solid rgba(255,255,255,0.35);
  background: #fff;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  cursor:pointer;
}

.thumb-btn img {
  width:100%;
  height:100%;
  object-fit:cover;
  object-position:center;
  display:block;
}

/* active/hover state para destaque */
.thumb-btn.active { box-shadow: 0 0 0 3px rgba(0,0,0,0.08) inset; border-color:#fff; }
.thumb-btn:hover img { transform: scale(1.03); }

/* responsivo: em ecrãs pequenos mostra miniaturas em linha em baixo */
@media (max-width: 576px) {
  .alerta-gallery .thumbs-container {
    right: 8px;
    bottom: 8px;
    flex-direction: row;
    gap: 6px;
    max-height: 80px;
  }
  :root { --thumb-w: 56px; --thumb-h: 40px; --main-max-height: 300px; --main-aspect-ratio: 16 / 9; }
}
</style>
@endpush