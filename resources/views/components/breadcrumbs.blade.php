@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\URL;

    $segments = request()->segments();

    /**
     * Mapa de tradução de segmento => label.
     * Ajusta os nomes conforme o teu projeto.
     */
    $labels = [
        'alerts'     => 'Alertas',
        'dashboard'  => 'Dashboard',
        'home'       => 'Home',
        'cidades'    => 'Cidades',
        'veiculos'   => 'Veículos',
        'users'      => 'Utilizadores',
        // adiciona mais conforme precisares
    ];

    /**
     * Opcional: quando tiveres rotas com /model/{id} e queres exibir o nome do registo em vez do id,
     * mapeia o segmento para a respectiva classe do Model.
     * Ex: 'cidades' => \App\Models\Cidade::class
     */
    $modelMap = [
        // 'cidades' => \App\Models\Cidade::class,
        // 'users' => \App\Models\User::class,
    ];

    // Função que tenta resolver um segmento em label "amigável".
    $segmentLabel = function($segment, $prevSegment = null) use ($labels, $modelMap) {
        // se houver tradução no mapa
        if (isset($labels[$segment])) {
            return $labels[$segment];
        }

        // se for numérico e existir mapping para o segmento anterior, tenta buscar nome do modelo
        if (is_numeric($segment) && $prevSegment && isset($modelMap[$prevSegment])) {
            try {
                $modelClass = $modelMap[$prevSegment];
                $model = $modelClass::find($segment);
                if ($model) {
                    // tenta propriedades comuns name/title
                    return $model->name ?? $model->title ?? ($model->getKey());
                }
            } catch (\Throwable $e) {
                // fallback abaixo
            }
        }

        // transformar slug em palavra legível: exemplo "minha-rota" -> "Minha Rota"
        return Str::title(str_replace(['-','_'], ' ', $segment));
    };
@endphp

<nav aria-label="breadcrumb" class="breadcrumb-container">
    <ol class="breadcrumb-list">
        {{-- Ícone / link para Home --}}
        <li class="breadcrumb-item">
            <a href="{{ route('home') ?? url('/') }}" title="Home">
                <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M12 3l9 8h-3v8h-5v-5H11v5H6v-8H3z" fill="currentColor"/>
                </svg>
            </a>
        </li>

        @php $acc = ''; @endphp

        @foreach($segments as $i => $segment)
            @php
                $acc .= '/'.$segment;
                $isLast = $i === array_key_last($segments);
                $prev = $segments[$i - 1] ?? null;
                $label = $segmentLabel($segment, $prev);
            @endphp

            <li class="breadcrumb-item {{ $isLast ? 'active' : '' }}" aria-current="{{ $isLast ? 'page' : '' }}">
                @if(!$isLast)
                    <a href="{{ url($acc) }}">{{ $label }}</a>
                @else
                    <span>{{ $label }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

{{-- Estilos simples: adapta ao teu tema (coloca em css/global ou blade inline) --}}
<style>
    .breadcrumb-container { padding: .5rem 1rem; }
    .breadcrumb-list { display:flex; gap:.5rem; list-style:none; align-items:center; padding:0; margin:0; font-weight:600; color:#111827; }
    .breadcrumb-item a { text-decoration:none; color:inherit; opacity:.85; }
    .breadcrumb-item.active span { color:#111827; opacity:1; }
    .breadcrumb-item svg { vertical-align:middle; margin-right:.25rem; }
    .breadcrumb-item::before { content: "›"; margin: 0 .5rem; color:#9ca3af; }
    .breadcrumb-item:first-child::before { content: ""; margin:0; }
</style>
