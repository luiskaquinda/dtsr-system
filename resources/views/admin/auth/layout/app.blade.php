<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../"/>
		<title>@yield('title', 'Auth')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:url" content="https://keenthemes.com/products/oswald-html-pro" />
		<link rel="canonical" href="https://preview.keenthemes.com/axel-html-free" />
		<link rel="shortcut icon" href="{{ asset('/admin/media/logos/favicon.ico') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>
            var defaultThemeMode = "light"; 
            var themeMode; 
            
            if ( document.documentElement ) { 
                if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");                     
                } else { 
                    if ( localStorage.getItem("data-bs-theme") !== null ) {
                        themeMode = localStorage.getItem("data-bs-theme"); 
                    } else { themeMode = defaultThemeMode; } 
                } if (themeMode === "system") { 
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
                } 
                
                document.documentElement.setAttribute("data-bs-theme", themeMode); 
            } 
        </script>

		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
            @yield('content')
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>
            var hostUrl = "admin/";
        </script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="{{ asset('/admin/plugins/global/plugins.bundle.js') }}"></script>
            <script src="{{ asset('/admin/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		    <script src="{{ asset('/admin/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->

		@stack('validacao')
	</body>
	<!--end::Body-->
</html>