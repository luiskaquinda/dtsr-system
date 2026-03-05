<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title>@yield('title', 'Veiculo')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		{{-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> --}}
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body 
        id="kt_body" 
        data-kt-app-header-stacked="true" 
        data-kt-app-header-primary-enabled="true" data-kt-app-header-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default"
    >
		<!--begin::Theme mode setup on page load-->
			<script>
				var defaultThemeMode = "light"; 
				var themeMode; 
			
				if ( document.documentElement ) { 
					if ( document.documentElement.hasAttribute("data-bs-theme-mode")) 
					{ 
						themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
					} else 
					{ 
						
						if ( localStorage.getItem("data-bs-theme") !== null ) 
						{ 
							themeMode = localStorage.getItem("data-bs-theme"); 
						} else { themeMode = defaultThemeMode; } 

					} if (themeMode === "system") 
					{ 
						themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
					} 
					
					document.documentElement.setAttribute("data-bs-theme", themeMode); 
				}
			
			</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Wrapper container-->
					<div class="app-container container-xxl d-flex flex-row flex-column-fluid">
						<!--begin::Main-->
						<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
							
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content pb-0">
								<!--begin::details View-->
                                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                                       

                                        <!--begin::Card body-->
                                        <div class="card-body p-9">

                                            <!--begin::Row-->
                                            <div class="row mb-5">
                                                <!--begin::Label-->
                                                <label class="col-lg-6 fw-semibold text-muted">
                                                    Data do Pedido
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6 text-end">
                                                    <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->created_at }}</span>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->

                                            <!--begin::Row-->
                                            <div class="row mb-5">
                                                <!--begin::Label-->
                                                <label class="col-lg-6 fw-semibold text-muted">
                                                    Status do Pedido
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6 text-end">
                                                    @if ($pedido->status == "0")
                                                        <span class="badge badge-danger">A Processar...</span>
                                                    @else
                                                        <span class="badge badge-success">Processado</span>
                                                    @endif
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->

                                            <!--begin::Row-->
                                            <div class="row mb-5">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold bg-dark p-4">
                                                    @if ($pedido->tipo_pedido->tipo == "Matricula")
                                                        <span class="text-white fs-5 badge badge-success">Matrícula</span>
                                                    @else
                                                        <span class="text-white fs-5">Matrícula</span>
                                                    @endif
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fw-semibold bg-dark p-4">
                                                    @if ($pedido->tipo_pedido->tipo == "Emissao")
                                                        <span class="text-white fs-5 badge badge-success">Emissão</span>
                                                    @else
                                                        <span class="text-white fs-5">Emissão</span>
                                                    @endif
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fw-semibold bg-dark p-4">
                                                    @if ($pedido->tipo_pedido->tipo == "Duplicado")
                                                        <span class="text-white fs-5 badge badge-success">Duplicado</span>
                                                    @else
                                                        <span class="text-white fs-5">Duplicado</span>
                                                    @endif
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fw-semibold bg-dark p-4">
                                                    @if ($pedido->tipo_pedido->tipo == "Alteração de Características")
                                                        <span class="text-white fs-5 badge badge-success">Alteração de Características</span>
                                                    @else
                                                        <span class="text-white fs-5">Alteração de Características</span>
                                                    @endif
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->

                                            <!--begin::Row-->
                                            <div class="row mb-5">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Matricula
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4">
                                                    @if ($pedido->veiculo->matricula_id == null)
                                                        <span class="fw-semibold text-danger fs-6">Sem matricula atribuido</span>
                                                    @else
                                                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->matricula->matricula }}</span>
                                                    @endif
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->

                                            <!--begin::Row-->
                                            <div class="row mb-5">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Data do Primeiro Registro
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4">
                                                    @if ($pedido->veiculo->primeiro_registro == null)
                                                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->created_at }}</span>
                                                    @else
                                                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->primeiro_registro }}</span>
                                                    @endif
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->

                                            {{-- Proprietário --}}

                                            <!--begin::Input group-->
                                            <div class="row mb-7">
                                                <hr>
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <h4 class="fw-semibold fs-4 text-gray-800">Proprietário (a)</h4>
                                                </div>
                                                <!--end::Col-->
                                                <hr>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Apelido(s)/Nome da Empresa
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row"> 
                                                    @if ($pedido->veiculo->proprietario->apelido_empresa == null)
                                                        <span class="fw-semibold text-danger fs-6">Sem apelido(s) ou nome da empresa</span>
                                                    @else
                                                        <span class="fw-semibold text-gray-800 fs-6">{{ $pedido->veiculo->proprietario->apelido_empresa }}</span>
                                                    @endif
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Nome Completo
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->proprietario->nome_completo }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Data Nascimento
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->proprietario->data_nascimento }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Label-->
                                                <label class="col-lg-2 fw-semibold text-muted">
                                                    Sexo
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-2 fv-row">
                                                    <span class="badge badge-success fs-6">{{ $pedido->veiculo->proprietario->sexo }}</span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <!--end::Input group-->

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Residência Actual
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <span class="fw-semibold text-gray-400 fs-6">
                                                        Bairro: 
                                                    </span>      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->proprietario->residencia->bairro }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <span class="fw-semibold text-gray-400 fs-6">
                                                        Rua: 
                                                    </span>         
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->proprietario->residencia->rua }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Bilhete
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->proprietario->bilhete->numero_bilhete }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Email
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->proprietario->email }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <label class="col-lg-4 fw-semibold text-muted">
                                                    Telefone
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->proprietario->telemovel }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <!--begin::Input group-->
                                            <div class="row mb-7">
                                                <hr>
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <h4 class="fw-semibold fs-4 text-gray-800">Características do Veículo</h4>
                                                </div>
                                                <!--end::Col-->
                                                <hr>
                                            </div>
                                            <!--end::Input group-->

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Marca
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->marca }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Modelo
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->modelo }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Quadro
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->quadro }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Motor
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->motor }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Cor
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->cor }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Número de Cilíndros
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->numero_cilindros }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Classe
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">    
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        @foreach ($classes as $classe)
                                                            @if (($classe->id == $pedido->veiculo->classe_id))
                                                                <span class="badge badge-success fs-6">
                                                                    {{ $classe->classe }}
                                                                </span>
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Combustível
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        @foreach ($combustiveis as $combustivel)
                                                            @if (($combustivel->id == $pedido->veiculo->combustivel_id))
                                                                <span class="badge badge-success fs-6">
                                                                    {{ $combustivel->combustivel }}
                                                                </span>
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Medidas Pneumáticas 
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->medidas_pneumaticas }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->

                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    País de Origem 
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->pais_origem }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            {{-- Caixa do Veículo --}}

                                            <!--begin::Input group-->
                                            <div class="row mb-7">
                                                <hr>
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <h4 class="fw-semibold fs-4 text-gray-800">Caixa</h4>
                                                </div>
                                                <!--end::Col-->
                                                <hr>
                                            </div>
                                            <!--end::Input group-->

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Tipo de Caixa
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    @foreach ($tipoCaixas as $tipoCaixa)
                                                        @if (($tipoCaixa->id == $pedido->veiculo->caixa_id))
                                                            <span class="badge badge-success fs-6">
                                                                {{ $tipoCaixa->tipo_caixa }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Distançia entre eixos
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    @foreach ($tipoCaixas as $tipoCaixa)
                                                        @if (($tipoCaixa->id == $pedido->veiculo->caixa_id))
                                                            <span class="fw-semibold text-gray-800 fs-6">
                                                                {{ $tipoCaixa->distancia_entre_eixos }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Altura
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    @foreach ($tipoCaixas as $tipoCaixa)
                                                        @if (($tipoCaixa->id == $pedido->veiculo->caixa_id))
                                                            <span class="fw-semibold text-gray-800 fs-6">
                                                                {{ $tipoCaixa->altura }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Ano de Fabrico
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    <span class="badge badge-warning fs-6">
                                                        {{ $pedido->veiculo->ano_fabrico }}
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            {{-- Peso Bruto --}}

                                            <!--begin::Input group-->
                                            <div class="row mb-7">
                                                <hr>
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <h4 class="fw-semibold fs-4 text-gray-800">Peso Bruto</h4>
                                                </div>
                                                <!--end::Col-->
                                                <hr>
                                            </div>
                                            <!--end::Input group-->

                                            <div class="row mb-7">
                                                <!--begin::Label-->

                                                @php
                                                    $total = 0;    
                                                @endphp

                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    A Frente
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    @foreach ($pesosBruto as $pesoBruto)
                                                        @if (($pesoBruto->id == $pedido->veiculo->peso_id))
                                                            <span class="fw-semibold text-gray-800 fs-6">
                                                                {{ $pesoBruto->a_frente }} kg
                                                            </span>

                                                            @php
                                                                $total += $pesoBruto->a_frente  
                                                            @endphp

                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Ao Meio
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    @foreach ($pesosBruto as $pesoBruto)
                                                        @if (($pesoBruto->id == $pedido->veiculo->peso_id))
                                                            <span class="fw-semibold text-gray-800 fs-6">
                                                                {{ $pesoBruto->ao_meio }} kg
                                                            </span>

                                                            @php
                                                                $total += $pesoBruto->ao_meio  
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    A Retaguarda
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    @foreach ($pesosBruto as $pesoBruto)
                                                        @if (($pesoBruto->id == $pedido->veiculo->peso_id))
                                                            <span class="fw-semibold text-gray-800 fs-6">
                                                                {{ $pesoBruto->a_retaguarda }} kg
                                                            </span>

                                                            @php
                                                                $total += $pesoBruto->a_retaguarda  
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Total
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    <span class="badge badge-warning fs-6">
                                                        {{ $total }} kg
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Tara
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->tara }} kg
                                                    </span>
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Lotação
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">      
                                                    <span class="fw-semibold text-gray-800 fs-6">
                                                        {{ $pedido->veiculo->lugares }} lugares
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            {{-- Serviços --}}

                                            <!--begin::Input group-->
                                            <div class="row mb-7">
                                                <hr>
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <h4 class="fw-semibold fs-4 text-gray-800">Serviço</h4>
                                                </div>
                                                <!--end::Col-->
                                                <hr>
                                            </div>
                                            <!--end::Input group-->

                                            <div class="row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-3 fw-semibold text-muted">
                                                    Serviço
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-3 fv-row">
                                                    @foreach ($servicos as $servico)
                                                        @if (($servico->id == $pedido->veiculo->servico_id))
                                                            <span class="badge badge-warning fs-6">
                                                                {{ $servico->servico }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            {{-- Documentos --}}

                                            <!--begin::Input group-->
                                            <div class="row mb-7">
                                                <hr>
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <h4 class="fw-semibold fs-4 text-gray-800">Documentos</h4>
                                                </div>
                                                <!--end::Col-->
                                                <hr>
                                            </div>
                                            <!--end::Input group-->

                                            <div class="row mb-7">

                                                <div class="col-lg-12">
                                                    <label for="formFile" class="form-label">Bilhete de Identidade</label>
                                                    <div class="ms-4 my-2">
                                                        @php
                                                            $encontrado = false;
                                                        @endphp
                                                
                                                        @foreach ($documentos as $documento)    
                                                            @if ($documento->tipo_documento == 'bilhete' && isset($documento->url))
                                                                <strong>Bilhete:</strong> 
                                                                <a href="{{ asset('storage/public/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
                                                                @php
                                                                    $encontrado = true;
                                                                @endphp
                                                                @break
                                                            @endif
                                                        @endforeach
                                                
                                                        @if (!$encontrado)
                                                            <span class="text-danger">Sem ficheiro</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                    

                                                <div class="col-lg-12">
                                                    
                                                    <label for="formFile" class="form-label">Registro Inicial ou Modelo O</label>
                                                    <div class="ms-4 my-2">
                                                        @php
                                                            $encontrado = false;
                                                        @endphp
                                                
                                                        @foreach ($documentos as $documento)    
                                                            @if ($documento->tipo_documento == 'modelo_o' && isset($documento->url))
                                                                <strong>Registro Inicial ou Modelo O:</strong> 
                                                                <a href="{{ asset('storage/public/' . $documento->url) }}" target="_blank">
                                                                    {{ basename($documento->url) }}
                                                                </a>
                                                                @php
                                                                    $encontrado = true;
                                                                @endphp
                                                                @break
                                                            @endif
                                                        @endforeach
                                                
                                                        @if (!$encontrado)
                                                            <span class="text-danger">Sem ficheiro</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <label for="formFile" class="form-label">Registro de Compra e Venda</label>
                                                    <div class="ms-4 my-2">
                                                        @php
                                                            $encontrado = false;
                                                        @endphp
                                                
                                                        @foreach ($documentos as $documento)    
                                                            @if ($documento->tipo_documento == 'compra_venda' && isset($documento->url))
                                                                <strong>Registro de Compra e Venda:</strong> 
                                                                <a href="{{ asset('storage/public/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
                                                                @php
                                                                    $encontrado = true;
                                                                @endphp
                                                                @break
                                                            @endif
                                                        @endforeach
                                                
                                                        @if (!$encontrado)
                                                            <span class="text-danger">Sem ficheiro</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <label for="formFile" class="form-label">Recibo de Pagamento</label>
                                                    <div class="ms-4 my-2">
                                                        @php
                                                            $encontrado = false;
                                                        @endphp
                                                
                                                        @foreach ($documentos as $documento)    
                                                            @if ($documento->tipo_documento == 'recibo_pagamento' && isset($documento->url))
                                                                <strong>Registro Inicial ou Modelo O:</strong> 
                                                                <a href="{{ asset('storage/public/' . $documento->url) }}" target="_blank">{{ basename($documento->url) }}</a>
                                                                @php
                                                                    $encontrado = true;
                                                                @endphp
                                                                @break
                                                            @endif
                                                        @endforeach
                                                
                                                        @if (!$encontrado)
                                                            <span class="text-danger">Sem ficheiro</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                </fieldset> 
                                            </div>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::details View-->
							</div>
							<!--end::Content wrapper-->
						</div>
						<!--end:::Main-->
					</div>
					<!--end::Wrapper container-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
	
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
		<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('js/custom/apps/ecommerce/catalog/products.js') }}"></script>
		<script src="{{ asset('js/widgets.bundle.js') }}"></script>

		<script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/create-project/type.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/create-project/budget.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/create-project/settings.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/create-project/team.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/create-project/targets.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/create-project/files.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/create-project/complete.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/create-project/main.js') }}"></script>
		<script src="{{ asset('js/custom/utilities/modals/users-search.js')}}"></script>

		<script>
			$("#kt_daterangepicker_1").daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1975,
					maxYear: parseInt(moment().format("YYYY"),12)
				}
			);
			$("#kt_daterangepicker_2").daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1975,
					drops: 'up',
					maxYear: parseInt(moment().format("YYYY"),12)
				}
			);
			$("#kt_daterangepicker_3").daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1975,
					drops: 'up',
					maxYear: parseInt(moment().format("YYYY"),12)
				}
			);
			$("#kt_daterangepicker_4").daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1975,
					drops: 'up',
					maxYear: parseInt(moment().format("YYYY"),12)
				}
			);
			$("#kt_daterangepicker_5").daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1975,
					drops: 'up',
					maxYear: parseInt(moment().format("YYYY"),12)
				}
			);
			$("#kt_daterangepicker_6").daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1975,
					drops: 'up',
					maxYear: parseInt(moment().format("YYYY"),12)
				}
			);
		</script>

		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>