    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard">
    <meta name="author" content="Startuplagos">
    <title>{{$settings->title}}</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ ($settings->febicon) ? url('/public/storage/'.$settings->febicon) : url('avatar.png') }}">
    {{-- <link rel="shortcut icon" href="assets/dist/img/favicon.png"> --}}
	<!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  

  <!--Global Styles(used by all pages)-->
  <link href="{{ asset('public/backend') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/metisMenu/metisMenu.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet">

  <!--Start Your Custom Style Now-->
  <link href="{{ asset('public/backend') }}/assets/image-preview.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/select2-bootstrap4/dist/select2-bootstrap4.min.css" rel="stylesheet">
  <link href="{{ asset('public/assets') }}/toastr.min.css" rel="stylesheet" >

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <link href="{{ asset('public/backend') }}/assets/plugins/sumoselect/css/sumoselect.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/dropzone-5.7.0/dropzone.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/jquery.smartmenus.bootstrap-4.css" rel="stylesheet">
  <link href="{{ asset('public/newAdmin') }}/assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('public/newAdmin') }}/assets/dist/css/style-new.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
  <!--Global script(used by all pages)-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
  <script src="{{ asset('public/backend') }}/assets/plugins/jQuery/jquery.min.js"></script>

<script src="{{ asset('public/backend') }}/assets/plugins/ckeditor/ckeditor.js"></script>

