<!doctype html>
<html lang="en">
<!--begin::Head-->
@php
$assetsurl = asset('public/frontend');
@endphp

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="{{$assetsurl}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{$assetsurl}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{$assetsurl}}/style.css" rel="stylesheet" type="text/css" />
	<script src="{{$assetsurl}}/assets/plugins/global/plugins.bundle.js"></script>
	<script src="{{$assetsurl}}/assets/js/scripts.bundle.js"></script>
	
</head>



	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                     <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        @yield('content')
                      </div>
				</div>
				
			</div>
			<!--end::Authentication - Sign-up-->
		</div>

		
		{{-- <script src="{{$assetsurl}}/assets/js/custom/authentication/password-reset/password-reset.js"></script> --}}

		
	</body>
	<!--end::Body-->
</html>