<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<link rel="shortcut icon" href="{{ asset('images/logo-curug.png') }}" type="image/x-icon">

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/core.css') }}" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('admin/vendors/styles/icon-font.min.css') }}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('admin/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}"
		/>
		
		<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/style.css') }}" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
	</head>
	<body>

        @include('admin.komponen.topbar')

        @include('admin.komponen.sidebar')

		<div class="mobile-menu-overlay"></div>

        @yield('content')
		<!-- js -->
		<script src="{{ asset('admin/vendors/scripts/core.js') }}"></script>
		<script src="{{ asset('admin/vendors/scripts/script.min.js') }}"></script>
		<script src="{{ asset('admin/vendors/scripts/process.js') }}"></script>
		<script src="{{ asset('admin/vendors/scripts/layout-settings.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
		<script src="{{ asset('admin/vendors/scripts/dashboard3.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
		<!-- buttons for Export datatable -->
		<script src="{{ asset('admin/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('admin/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
		<!-- Datatable Setting js -->
		<script src="{{ asset('admin/vendors/scripts/datatable-setting.js') }}"></script>
	</body>
</html>
