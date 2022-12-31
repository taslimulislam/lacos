    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if (@$post)
      <meta name="description" content="{{$post->meta_description}}">
      <meta name="keywords" content="{{$post->meta_title}}">
      @else
      <meta name="description" content="{{$settings->metadescription}}">
      <meta name="keywords" content="{{$settings->metatag}}">
    @endif
  
    <meta name="author" content="{{$settings->title}}">
    <title>{{$settings->title}}</title>

    <link rel="shortcut icon" href="{{ ($settings->febicon) ? url('/public/storage/'.$settings->febicon) : url('avatar.png') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  

{{-- @dd($settings); --}}
  
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

  <link rel="stylesheet" href="{{ asset('public/assets') }}/toastr.min.css">

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link href="{{ asset('public/backend') }}/assets/plugins/sumoselect/css/sumoselect.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/plugins/dropzone-5.7.0/dropzone.min.css" rel="stylesheet">

  <link href="{{ asset('public/backend') }}/assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend') }}/assets/jquery.smartmenus.bootstrap-4.css" rel="stylesheet">
  <link href="{{ asset('public/newAdmin') }}/assets/dist/css/style-new.css" rel="stylesheet">
  <link href="{{asset('public/backend') }}/assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
  <!--Global script(used by all pages)-->
  <script src="{{ asset('public/backend') }}/assets/plugins/jQuery/jquery.min.js"></script>

