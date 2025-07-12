<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title>@yield('title', 'Dashboard')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		{{-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> --}}
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="{{ asset('admin/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		{{-- Toastr --}}
		<link href="{{ asset('admin/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />
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
				<!--begin::Header-->
				<div id="kt_app_header" class="app-header">
					<!--begin::Header primary-->
					@include('notificoes.furtos_acidentes_roubos.partials.header-primary')
					<!--end::Header primary-->
                    <!--begin::Header primary-->
					@include('notificoes.furtos_acidentes_roubos.partials.header-secondary')
					<!--end::Header primary-->
				</div>
				<!--end::Header-->
	
	
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Wrapper container-->
					<div class="app-container container-xxl d-flex flex-row flex-column-fluid">
						<!--begin::Main-->
						<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
							<div id="kt_app_content" class="app-content pb-0">
								@yield('content')
							</div>
							<!--end::Content wrapper-->
				
							<!--begin::Footer-->
							@include('notificoes.furtos_acidentes_roubos.partials.footer')
							<!--end::Footer-->
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

		{{-- Form Validator --}}
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<!-- Bootstrap 5 JS -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
		
			<!-- FormValidation core + plugin Bootstrap 5 -->
			<script src="https://cdn.jsdelivr.net/npm/formvalidation@1.10.0/dist/js/FormValidation.full.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/formvalidation@1.10.0/dist/js/plugins/Bootstrap5.min.js"></script>
		{{-- End Form Validator  --}}
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset('admin/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
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
		<script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('admin/js/widgets.bundle.js') }}"></script>
		<script src="{{ asset('admin/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/create-project/type.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/create-project/budget.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/create-project/settings.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/create-project/team.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/create-project/targets.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/create-project/files.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/create-project/complete.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/create-project/main.js') }}"></script>
		<script src="{{ asset('admin/js/custom/utilities/modals/users-search.js')}}"></script>
		<script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('admin/plugins/custom/toastr/toastr.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		
		<script>
			$(document).ready(function() {
				$('.js-example-basic-multiple').select2();
			});
		</script>

		<script>
			@if(session('toast_success'))
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
				toastr.success("{{ session('toast_success') }}");
				// toastr.success("Logado", "Login efetuado com sucesso!");
			@endif
		</script>
		<!--end::Custom Javascript-->

		@stack('anonimo')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>