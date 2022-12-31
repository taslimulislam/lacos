@extends('frontend.auth.__layout')

@section('content')

@if (Session::has('message'))
		<div class="alert alert-success"> <strong>Success!</strong> {{ Session::get('message') }}</div>
@endif

@if (Session::has('exception'))
		<div class="alert alert-danger"> <strong>Wops!</strong> {{ Session::get('exception') }}</div>
@endif


<!--begin::Form-->
<form class="form w-100" novalidate="novalidate" method="POST" action="{{route('login')}}">
                          
  @csrf
  <!--begin::Heading-->
  <div class="text-center mb-10">
    <!--begin::Title-->
    <h1 class="text-dark mb-3">Sign In to Startup Lagos</h1>
    <!--end::Title-->
    <!--begin::Link-->
    <div class="text-gray-400 fw-bold fs-4">New Here?
      <a href="{{url('sign-up')}}" class="link-primary fw-bolder">Create an Account</a>
    </div>
    <!--end::Link-->
  </div>
  
  <div class="fv-row mb-10">
    <!--begin::Label-->
    <label class="form-label fs-6 fw-bolder text-dark">Email</label>
    <input type="email" name="email" class="form-control form-control-lg form-control-solid" id="emial" placeholder="Enter email">
    @error('email')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <!--end::Input-->
  </div>
  
  <div class="fv-row mb-10">
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack mb-2">
      <!--begin::Label-->
      <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
      <!--end::Label-->
      <!--begin::Link-->
      {{-- @if (Route::has('password.request'))
          <div class="mb-1 text-end text-muted">
            <a class="link-primary fs-6 fw-bolder" href="{{ route('request.password') }}"><small>Forgot Password ?</small></a>
        </div>
      @endif --}}
      <!--end::Link-->
    </div>
    
    <input class="form-control form-control-lg form-control-solid" id="pass" type="password" name="password"
      autocomplete="off" />
      @error('password')
          <span class="text-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="text-center">
    <!--begin::Submit button-->
    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
      <span class="indicator-label">Sign In</span>
      <span class="indicator-progress">Please wait...
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
    <!--end::Submit button-->
  </div>
  <!--end::Actions-->
</form>
<!--end::Form-->

@endsection
