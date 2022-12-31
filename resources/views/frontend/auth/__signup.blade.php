
	@extends('frontend.auth.__layout')

	@section('content')
	
	@if (Session::has('message'))
		<div class="alert alert-success"> <strong>Success!</strong> {{ Session::get('message') }}</div>
	@endif

	@if (Session::has('exception'))
			<div class="alert alert-danger"> <strong>Wops!</strong> {{ Session::get('exception') }}</div>
	@endif

	<!--begin::Form-->
	<form class="{{url('sign-up-check')}}" method="GET">
		@csrf
		<!--begin::Heading-->
		<div class="mb-10 text-center">
			<!--begin::Title-->
			<h1 class="text-dark mb-3">Create an Account</h1>
			<!--end::Title-->

			<!--begin::Link-->
			<div class="text-gray-400 fw-bold fs-4">Already have an account?
			<a href="{{url('sign-in')}}" class="link-primary fw-bolder">Sign in here</a></div>
			<!--end::Link-->
		</div>
		<!--end::Heading-->

		<!--begin::Action-->
		{{-- <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
		<img alt="Logo" src="{{$assetsurl}}/assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Sign in with Google</button> --}}
		<!--end::Action-->

		<!--begin::Separator-->
		<div class="d-flex align-items-center mb-10">
			<div class="border-bottom border-gray-300 mw-50 w-100"></div>
			<span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
			<div class="border-bottom border-gray-300 mw-50 w-100"></div>
		</div>
		<!--end::Separator-->

		<!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-12">
				<label class="form-label fw-bolder text-dark fs-6">User Name <span class="text-danger">*</span></label>
				<input class="form-control form-control-lg form-control-solid @error('user_name') is-invalid @enderror" type="text"  name="user_name" value="{{ old('user_name') }}" required autocomplete="name" autofocus />
				@error('user_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<!--end::Col-->

			<!--begin::Col-->
			{{-- <div class="col-xl-6">
				<label class="form-label fw-bolder text-dark fs-6">Last Name <span class="text-danger">*</span></label>
				<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last-name" autocomplete="off" />
			</div> --}}
			<!--end::Col-->


		</div>
		<!--end::Input group-->

		<div class="fv-row mb-7">
			<label class="form-label fw-bolder text-dark fs-6">Type <span class="text-danger">*</span></label>

			<select name="type" data-control="select2" required  data-placeholder="Select a Type..." class="form-select form-select-solid">
				<option value="">Select Type</option>
				@foreach (userType() as $key => $val )
					<option value="{{$key}}">{{$val}}</option>
				@endforeach
				@error('type')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</select>

		</div>

		<!--begin::Input group-->
		<div class="fv-row mb-7">
			<label class="form-label fw-bolder text-dark fs-6">Email <span class="text-danger">*</span></label>
			<input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email"   name="email" value="{{ old('email') }}" required autocomplete="email" />
			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<!--end::Input group-->

		<!--begin::Input group-->
		<div class="mb-10 fv-row" data-kt-password-meter="true">
			<!--begin::Wrapper-->
			<div class="mb-1">
				<!--begin::Label-->
				<label class="form-label fw-bolder text-dark fs-6">Password <span class="text-danger">*</span></label>
				<!--end::Label-->
				<!--begin::Input wrapper-->
				<div class="position-relative mb-3">
					<input class="form-control form-control-lg form-control-solid  @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" />
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
						<i class="bi bi-eye-slash fs-2"></i>
						<i class="bi bi-eye fs-2 d-none"></i>
					</span>
				</div>
				<!--end::Input wrapper-->

				<!--begin::Meter-->
				<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
					<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
					<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
					<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
					<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
				</div>
				<!--end::Meter-->
			</div>
			<!--end::Wrapper-->

			<!--begin::Hint-->
			<div class="text-muted">Use 8 or more </div>
			<!--end::Hint-->
		</div>
		<!--end::Input group=-->


		<!--begin::Input group-->
		<div class="fv-row mb-5">
			<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
			<input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" required autocomplete="new-password" />
		</div>
		<!--end::Input group-->
		
		<!--begin::Input group-->
		{{-- <div class="fv-row mb-10">
			<label class="form-check form-check-custom form-check-solid form-check-inline">
				<input class="form-check-input" type="checkbox" name="toc" value="1" />
				<span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
				<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
			</label>
		</div> --}}
		<!--end::Input group-->

		<!--begin::Actions-->
		<div class="text-center">
			<button type="submit" id="" class="btn btn-lg btn-primary">
				<span class="indicator-label">Sign Up</span>
				<span class="indicator-progress">Please wait...
				<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
			</button>
		</div>
		<!--end::Actions-->
	</form>

	@endsection



						