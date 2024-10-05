<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title>@yield('title', 'Dtsr')</title>
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
					@include('admin.dtsr.partials.header-primary')
					<!--end::Header primary-->
	
					<!--begin::Header secondary-->
					@include('admin.dtsr.partials.header-secondary')
					<!--end::Header secondary-->
				</div>
				<!--end::Header-->
	
	
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
												<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">DTSR</h1>
												<!--end::Title-->
												<!--begin::Breadcrumb-->
												<ul class="breadcrumb breadcrumb-separatorless fw-semibold">
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
													<li class="breadcrumb-item text-gray-700 fw-bold lh-1">Dtsr</li>
													<!--end::Item-->
													<!--begin::Item-->
													<li class="breadcrumb-item">
														<i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
													</li>
													<!--end::Item-->
													<!--begin::Item-->
													<li class="breadcrumb-item text-gray-700 fw-bold lh-1">Home</li>
													<!--end::Item-->
												</ul>
												<!--end::Breadcrumb-->
											</div>
											<!--end::Page title-->
										</div>
										<!--end::Toolbar wrapper-->
									</div>
									<!--end::Toolbar container-->
								</div>
								<!--end::Toolbar-->
							</div>
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content pb-0">
								@yield('content')
							</div>
							<!--end::Content wrapper-->
				
							<!--begin::Footer-->
							@include('admin.dtsr.partials.footer')
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
		<script src="{{ asset('admin/js/custom/apps/ecommerce/catalog/products.js') }}"></script>
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
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>