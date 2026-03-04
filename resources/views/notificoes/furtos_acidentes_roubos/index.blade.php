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
                                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Alertas</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    {{-- <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                            <a href="../dist/index.html" class="text-gray-500">
                                                <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                            </a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Alertas</li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-gray-500">Home</li>
                                        <!--end::Item-->
                                    </ul> --}}
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-3 gap-lg-5">
                                    <!--begin::Primary button-->
                                    <a href="{{ route('servicos.home') }}" class="btn btn-flex btn-center btn-primary btn-sm px-4">Serviços</a>
                                    <!--end::Primary button-->
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

                    {{-- Mensagens de erro genérico --}}
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content pb-0">
                        
                        <!--begin::Stats-->
                        <div class="row g-6 g-xl-9">
                            <div class="col-lg-6 col-xxl-4">
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Heading-->
                                        <div class="fs-2hx fw-bold">{{ $alertasTodos }}</div>
                                        <div class="fs-4 fw-semibold text-gray-400 mb-7">Alertas</div>
                                        <!--end::Heading-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Labels-->
                                            <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                                @foreach ($alertasPorStatus as $item)  
                                                    <!--begin::Label-->
                                                    <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                        @switch($item['status'])
                                                            @case('aberto')
                                                                <div class="bullet bg-primary me-3"></div>
                                                                <div class="text-gray-400">{{ ucfirst($item['status']) }}</div>
                                                                @break
                                                            @case('fechado')
                                                                <div class="bullet bg-success me-3"></div>
                                                                <div class="text-gray-400">{{ ucfirst($item['status']) }}</div>
                                                                @break
                                                            @default

                                                        @endswitch
                                                        <div class="ms-auto fw-bold text-gray-700">{{ $item['total_alertas'] }}</div>
                                                    </div>
                                                    <!--end::Label-->   
                                                @endforeach
                                                
                                            </div>
                                            <!--end::Labels-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="col-lg-6 col-xxl-4">
                                <!--begin::Budget-->
                                <div class="card h-100">
                                    <div class="card-body p-9">
                                        <div class="fs-2hx fw-bold">Cidades</div>
                                        <div class="fs-4 fw-semibold text-gray-400 mb-7">Top</div>
                                        @if ($alertasPorMunicipio->isEmpty())
                                            <div class="fs-6 d-flex justify-content-center mb-4">
                                                <div class="fw-semibold">Sem alertas no momento!</div>
                                            </div>
                                        @else
                                            @foreach($alertasPorMunicipio as $item)
                                                <div class="fs-6 d-flex justify-content-between mb-4">
                                                    <div class="fw-semibold">{{ $item['municipio'] }}</div>
                                                    <div class="d-flex fw-bold">
                                                    <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>{{ $item['total_alertas'] }}</div>
                                                </div>
                                                <div class="separator separator-dashed"></div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <!--end::Budget-->
                            </div>
                        </div>
                        <!--end::Stats-->

                        <!--begin::Toolbar-->
                        <div class="d-flex flex-wrap flex-stack my-5">
                            <!--begin::Heading-->
                            <h2 class="fs-2 fw-semibold my-2">Alertas
                            <span class="fs-6 text-gray-400 ms-1">por Status</span></h2>
                            <!--end::Heading-->
                            <!--begin::Controls-->
                            <div class="d-flex flex-wrap my-1">
                                <!--begin::Select wrapper-->
                                <div class="m-0">
                                    <!--begin::Select-->
                                    <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body fw-bold w-125px" onchange="if (this.value) window.location = this.value">
                                        <option value="Active" selected="selected">Todos</option>
                                        @foreach ($tipos_notificacao as $tipo)
                                            <option value="{{ route('alertas.tipo', $tipo->id) }}">
                                                {{ $tipo->tipo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Select wrapper-->
                            </div>
                            <!--end::Controls-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Row-->
                        <div class="row g-6 g-xl-9">
                            <!--begin::Col-->
                            @forelse ($alertas as $alerta)
                                <div class="col-md-6 col-xl-4">
                                    <!--begin::Card-->
                                    <div class="card position-relative h-100 d-flex flex-column" class="card border-hover-primary">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0 pt-9">
                                            <!--begin::Card Title-->
                                            <div class="card-title m-0">
                                                
                                                
                                                <!--begin::Avatar-->
                                                <div class="w-100 h-100 bg-light text-center">
                                                    {{-- @if($alerta->imagem)

                                                        <div class="symbol symbol-200px">
                                                            <div class="symbol-label fs-2 fw-semibold text-success w-100 h-100">
                                                                <img
                                                                    src="{{ asset('storage/' . $alerta->imagem) }}"
                                                                    class="img-fluid rounded"
                                                                    alt="Imagem do alerta"
                                                                >
                                                            </div>
                                                        </div>
                                                    @else
                                                        <img src="{{ asset('media/avatars/300-1.jpg') }}" alt="image" class="p-3 max-w-100" />
                                                    @endif --}}
                                                    @if($alerta->imagens->isNotEmpty())
                                                    <div class="alerta-gallery position-relative">
                                                        <!-- Imagem principal -->
                                                        <div class="main-alerta-wrapper">
                                                            <img
                                                                id="mainImage{{ $alerta->id }}"
                                                                src="{{ asset('storage/'.$alerta->imagens->first()->path) }}"
                                                                class="main-alerta-img rounded"
                                                                alt="Imagem principal do alerta"
                                                            >
                                                        </div>
                                                
                                                        <!-- Miniaturas -->
                                                        <div class="thumbs-container">
                                                            @foreach($alerta->imagens as $i => $img)
                                                                <button
                                                                    type="button"
                                                                    class="thumb-btn {{ $i === 0 ? 'active' : '' }}"
                                                                    data-target="#mainImage{{ $alerta->id }}"
                                                                    data-src="{{ asset('storage/'.$img->path) }}"
                                                                >
                                                                    <img src="{{ asset('storage/'.$img->path) }}" alt="Miniatura {{ $i+1 }}">
                                                                </button>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-200px">
                                                        <div class="symbol-label fs-2 fw-semibold text-success w-100 h-100">
                                                            <img
                                                                src="{{ asset('storage/' . $alerta->imagem) }}"
                                                                class="img-fluid rounded"
                                                                alt="Imagem do alerta"
                                                            >
                                                        </div>
                                                    </div>
                                                @endif
                                                
                                                </div>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::Car Title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar w-100">
                                                @switch($alerta->tipos_notificacoes->tipo)
                                                    @case('Furto')
                                                        <span class="badge badge-info fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @case('Acidente')
                                                        <span class="badge badge-warning fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break

                                                    @case('Assalto')
                                                        <span class="badge badge-danger fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @case('Roubo')
                                                        <span class="badge badge-secondary fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @case('Multa')
                                                        <span class="badge badge-primary fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @case('Outro')
                                                        <span class="badge badge-dark fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                        @break
                                                    @default
                                                       <span class="badge badge-success fw-bold px-1 py-3 me-2">{{ $alerta->tipos_notificacoes->tipo }}</span>
                                                @endswitch 
                                                | <span class="badge ms-2 badge-light-success fw-bold me-auto px-4 py-3">{{ $alerta->municipio->nome_municipio }}</span>
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end:: Card header-->
                                        <!--begin:: Card body-->
                                        <div class="card-body p-9 flex-grow-1 d-flex flex-column">
                                            <!--begin::Name-->
                                            <div class="fs-3 fw-bold text-dark">{{ $alerta->titulo }}</div>
                                            <!--end::Name-->
                                            <!--begin::Description-->
                                            <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">{{ $alerta->descricao }}</p>
                                            <!--end::Description-->

                                            <div class="mt-auto">
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

                                                    <a href="{{ route('alertas.show', $alerta->id) }}" class="btn btn-dark">Ver mais</a>

                                                    @if($alerta->isConfirmedBy($user))
                                                        <form action="{{route('confirmacao.destroy', $alerta->id)}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class=" ms-2 btn btn-danger">Desconfirmar</button>
                                                        </form>
                                                    @else
                                                        <form action="{{route('confirmacao.store', $alerta->id)}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <button type="submit" class=" ms-2 btn btn-primary">Confirmar</button>
                                                        </form>
                                                    @endif


                                                    
                                                </div>
                                                <!--end::Info-->
                                                <!--begin::Users-->
                                                <div class="symbol-group symbol-hover">
                                                    <!--begin::User-->
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Quantidade de usuários que confirmaram o alerta">
                                                        {{-- <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span> --}}
                                                        <small class="text-muted">
                                                            {{ $alerta->confirmacoes()->count() }} confirmações
                                                        </small>
                                                    </div>
                                                    <!--begin::User-->
                                                </div>
                                                <!--end::Users-->
                                            </div>
                                        </div>
                                        <!--end:: Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                            @empty
                                <!--begin::Alert-->
                                    <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-notification-bing fs-2hx text-danger me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column pe-0 pe-sm-10">
                                            <!--begin::Title-->
                                            <h4 class="fw-semibold">Alerta!</h4>
                                            <!--end::Title-->

                                            <!--begin::Content-->
                                            <span>Felizmente sem alertas.</span>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                <!--end::Alert-->
                            @endforelse
                            <!--end::Col-->
                            
                            {{ $alertas->links() }}
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper container-->
    </div>
    <!--end::Wrapper-->

    @include('notificoes.furtos_acidentes_roubos.create')
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            // use o ID do <div class="modal">, não do <form>
            var myModal = new bootstrap.Modal(
                document.getElementById('kt_modal_scrollable_2')
            );
            myModal.show();
            });
        </script>
    @endif
    
@endsection
@push('anonimo')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.thumb-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const target = document.querySelector(this.dataset.target);
                    if (target) {
                        target.src = this.dataset.src;
                        this.closest('.thumbs-container')
                            .querySelectorAll('.thumb-btn')
                            .forEach(b => b.classList.remove('active'));
                        this.classList.add('active');
                    }
                });
            });
        });
    </script>

    {{-- Inserir imagens --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnAdicionar = document.getElementById('btnAdicionarImagens');
            const fileInput = document.getElementById('imagensInput');
            const previewContainer = document.getElementById('previewImagens');
            const form = document.getElementById('alerta'); // o teu form tem id="alerta"
        
            // limite máximo de imagens (ajusta se quiseres)
            const MAX_IMAGES = 8;
        
            // array onde guardamos os File seleccionados
            let selectedFiles = [];
        
            // abre o file picker
            btnAdicionar?.addEventListener('click', () => fileInput.click());
        
            // quando o utilizador selecciona ficheiros
            fileInput?.addEventListener('change', (e) => {
                const files = Array.from(e.target.files || []);
        
                // evita exceder MAX_IMAGES
                if (selectedFiles.length + files.length > MAX_IMAGES) {
                    alert('Limite de ' + MAX_IMAGES + ' imagens.');
                    fileInput.value = '';
                    return;
                }
        
                // junta ao array (filtra duplicados simples por name+size)
                files.forEach(f => {
                    const duplicate = selectedFiles.some(s => s.name === f.name && s.size === f.size && s.lastModified === f.lastModified);
                    if (!duplicate) selectedFiles.push(f);
                });
        
                renderPreviews();
                // limpa o input para permitir seleccionar os mesmos ficheiros novamente
                fileInput.value = '';
            });
        
            // renderiza as miniaturas
            function renderPreviews() {
                // limpa container
                previewContainer.innerHTML = '';
        
                selectedFiles.forEach((file, index) => {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'preview-thumb';
        
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.alt = file.name;
        
                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'preview-remove';
                    removeBtn.innerHTML = '&times;';
                    removeBtn.title = 'Remover imagem';
                    removeBtn.addEventListener('click', () => {
                        // revoke URL
                        URL.revokeObjectURL(img.src);
                        // remove do array
                        selectedFiles.splice(index, 1);
                        // re-render
                        renderPreviews();
                    });
        
                    const fname = document.createElement('div');
                    fname.className = 'preview-filename';
                    fname.textContent = file.name.length > 28 ? file.name.slice(0,25) + '...' : file.name;
        
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    wrapper.appendChild(fname);
                    previewContainer.appendChild(wrapper);
                });
            }
        
            // Antes do submit, colocamos os Files no input real usando DataTransfer (browser moderno)
            form?.addEventListener('submit', function (e) {
                // se não há ficheiros seleccionados, deixa submeter normalmente
                if (selectedFiles.length === 0) {
                    return true;
                }
        
                // tenta usar DataTransfer
                try {
                    const dt = new DataTransfer(); // moderno; não disponível em browsers antigos
                    selectedFiles.forEach(f => dt.items.add(f));
                    fileInput.files = dt.files;
                    // permite que o form submeta normalmente (enctype multipart/form-data)
                    return true;
                } catch (err) {
                    // Fallback: faz upload via fetch com FormData (AJAX)
                    e.preventDefault();
                    const fd = new FormData(form); // já recolhe os inputs do form
                    selectedFiles.forEach(f => fd.append('imagens[]', f));
        
                    // CSRF token se existir meta tag
                    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                    const headers = tokenMeta ? { 'X-CSRF-TOKEN': tokenMeta.getAttribute('content') } : {};
        
                    fetch(form.action, {
                        method: form.method || 'POST',
                        headers: headers,
                        body: fd,
                        credentials: 'same-origin'
                    })
                    .then(async response => {
                        if (!response.ok) {
                            const text = await response.text();
                            console.error('Upload falhou', text);
                            alert('Falha no upload. Ver console para detalhes.');
                            return;
                        }
                        // sucesso — redireciona ou recarrega página
                        window.location.reload();
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Erro ao enviar (ver console).');
                    });
        
                    return false;
                }
            });
        
            // Opcional: limita o total a MAX_IMAGES no caso de quereres evitar selecções muito grandes via drag&drop
            // Poderias também adicionar suporte a drag & drop aqui.
        });
    </script>
        
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        $('#kt_modal_scrollable_2').on('shown.bs.modal', function () {
            $('#selectTipoAlertaModal')   // <<< este id deve existir no <select>
            .select2({
                placeholder: 'Selecione um tipo de alerta...',
                allowClear:  true,
                minimumResultsForSearch: 0,   // 0 = sempre mostrar a caixa de busca
                dropdownParent: $('#kt_modal_scrollable_2')
            });
        });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        $('#kt_modal_scrollable_2').on('shown.bs.modal', function () {
            $('#selectMunicipio')   // <<< este id deve existir no <select>
            .select2({
                placeholder: 'Selecione o municipio...',
                allowClear:  true,
                minimumResultsForSearch: 0,   // 0 = sempre mostrar a caixa de busca
                dropdownParent: $('#kt_modal_scrollable_2')
            });
        });
        });
    </script>

    <script>
        // Captura os elementos
        const toggle = document.getElementById('anonima');
        const nomeContainer = document.getElementById('nomeContainer');

        // Função que mostra ou esconde o input
        function atualizaVisibilidade() {
            // Se estiver marcado (anônimo), esconda o campo de nome
            if (toggle.checked) {
                nomeContainer.style.display = 'none';
            } else {
                nomeContainer.style.display = 'block';
            }
        }

        // Atacha o listener ao change do checkbox
        toggle.addEventListener('change', atualizaVisibilidade);

        // Inicializa o estado ao carregar a página
        atualizaVisibilidade();
    </script>

    {{-- Toaster de susseco --}}
    <script>
        @if(session('success'))
            // Você pode configurar opções adicionais aqui, se quiser
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "3000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('success') }}");
            // toastr.success("Logado", "Login efetuado com sucesso!");
        @endif
    </script>

    {{-- Toaster de erro --}}
    <script>
        @if(session('error'))
            // Você pode configurar opções adicionais aqui, se quiser
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "3000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('error') }}");
            // toastr.success("Logado", "Login efetuado com sucesso!");
        @endif
    </script>

    {{-- Validação na criação do alert --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ajuste: pegue o modal pelo ID da DIV, não do form
            var modal = document.getElementById('kt_modal_scrollable_2');
        
            modal.addEventListener('shown.bs.modal', function () {
            // Se já existir uma instância anterior, destrua-a
            if (modal.fv) {
                modal.fv.dispose();
            }
        
            // Ajuste: use o ID “formCreateAlerta” que deve existir no seu <form>
            modal.fv = FormValidation.formValidation(
                document.getElementById('formCreateAlerta'),
                {
                fields: {
                    titulo: {
                    validators: {
                        notEmpty: {
                        message: 'O título é obrigatório entendeu!'
                        },
                        stringLength: {
                        max: 255,
                        message: 'Máximo de 255 caracteres'
                        }
                    }
                    },
                    data_ocorrido: {
                    validators: {
                        notEmpty: { message: 'A data é obrigatória' },
                        date: {
                        format: 'YYYY-MM-DD',
                        message: 'Use o formato YYYY-MM-DD'
                        }
                    }
                    },
                    tipo_alerta: {
                    validators: {
                        notEmpty: { message: 'Selecione um tipo de alerta' }
                    }
                    }
                    // … outros campos
                },
                plugins: {
                    // Declara o Trigger apenas uma vez, com os eventos que deseja
                    trigger: new FormValidation.plugins.Trigger({
                    event: {
                        titulo:        ['input', 'blur'],   // valida ao digitar e ao sair
                        data_ocorrido: ['change', 'blur'],  // datepicker → change
                        tipo_alerta:   ['change']           // select → change
                    }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit()
                }
                }
            );
            });
        });
    </script> 
@endpush

@push('css_imagem')
    <style>
        /* wrapper da imagem principal */
        .main-alerta-wrapper {
            width: 100%;
            aspect-ratio: 16/9; /* mantém proporção fixa e responsiva */
            overflow: hidden;
            border-radius: 8px;
            background: #f8f9fa;
        }

        /* imagem principal */
        .main-alerta-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* container das miniaturas */
        .thumbs-container {
            position: absolute;
            bottom: 10px;
            right: 10px;
            display: flex;
            gap: 6px;
        }

        /* cada miniatura */
        .thumb-btn {
            border: 2px solid transparent;
            border-radius: 6px;
            padding: 0;
            background: none;
            cursor: pointer;
            width: 60px;
            height: 45px;
            overflow: hidden;
        }

        .thumb-btn.active {
            border-color: #0d6efd; /* destaque na imagem ativa */
        }

        .thumb-btn img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 4px;
        }
    </style>

    <style>
        /* Força todas as imagens de alerta a terem mesmo tamanho e recorte central */
        .alerta-img {
        width: 100%;
        height: 180px;       /* ajuste a altura que achar melhor */
        object-fit: cover;   /* corta qualquer excesso mantendo proporção */
        display: block;
        }

        /* Opcional: garante que a área .symbol seja do mesmo tamanho */
        .symbol-200px {
        width: 100%;
        height: 180px;       /* mesma altura da .alerta-img */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        }

    </style>
    <style>
        .preview-thumb {
            width: 140px;
            height: 100px;
            position: relative;
            overflow: hidden;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            }

            .preview-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            }

            /* botão X no canto */
            .preview-remove {
            position: absolute;
            top: 4px;
            right: 4px;
            background: rgba(0,0,0,0.6);
            color: #fff;
            border: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor: pointer;
            z-index: 5;
            }

            .preview-filename {
            position: absolute;
            left: 6px;
            bottom: 4px;
            right: 6px;
            font-size: 11px;
            color: #fff;
            text-shadow: 0 1px 2px rgba(0,0,0,0.6);
            background: rgba(0,0,0,0.35);
            padding: 2px 4px;
            border-radius: 3px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            }

    </style>
@endpush