

	@extends('frontend.auth.__layout')
	@section('content')
	
		@if (Session::has('message'))
			<div class="alert alert-success"> <strong>Success!</strong> {{ Session::get('message') }}</div>
		@endif



<!--begin::Form-->
{{-- <form class="form w-100" novalidate="novalidate" method="POST" action="{{route('login')}}"> --}}
	<form class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
                          
	@csrf


	<!--begin::Heading-->
	<div class="text-center mb-10">

	 <!--begin::Title-->
	 <h1 class="text-dark mb-3">Forgot Password ?</h1>
	 <!--end::Title-->
	 <!--begin::Link-->
	 <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
	 <!--end::Link-->

	  <div class="text-gray-400 fw-bold fs-4">New Here?
		<a href="{{url('sign-in')}}" class="link-primary fw-bolder">Sign in here</a>
	  </div>
	  <!--end::Link-->
	</div>

	<div class="fv-row mb-10">
		<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
		<input class="form-control form-control-solid" type="email" id="email" placeholder="Email Address" name="email" autocomplete="off" />
		@error('email')
			<span class="text-danger" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>

	
	
  
  
	<div class="text-center">
	  <!--begin::Submit button-->
	  <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary w-100 mb-5">
		<span class="indicator-label">Send Password Reset Link</span>
		<span class="indicator-progress">Please wait...
		  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
	  </button>
	  <!--end::Submit button-->
	</div>
	<!--end::Actions-->
  </form>
  <!--end::Form-->


  <script>
	"use strict";
	var KTPasswordResetGeneral = (function () {
		var t, e, i;
		return {
			init: function () {
				(t = document.querySelector("#kt_password_reset_form")),
					(e = document.querySelector("#kt_password_reset_submit")),
					(i = FormValidation.formValidation(t, {
						fields: { email: { validators: { notEmpty: { message: "Email address is required" }, emailAddress: { message: "The value is not a valid email address" } } } },
						plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
					})),
					e.addEventListener("click", function (o) {
						o.preventDefault(),
							i.validate().then(function (i) {
								"Valid" == i
									? (e.setAttribute("data-kt-indicator", "on"),
									(e.disabled = !0),
									setTimeout(function () {
										e.removeAttribute("data-kt-indicator"),
											(e.disabled = !1),
											Swal.fire({ text: "You have successfully logged in!", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } }).then(function (e) {
												e.isConfirmed && (t.querySelector('[name="email"]').value = "");
											});
									}, 1500))
									: Swal.fire({
										text: "Sorry, looks like there are some errors detected, please try again.",
										icon: "error",
										buttonsStyling: !1,
										confirmButtonText: "Ok, got it!",
										customClass: { confirmButton: "btn btn-primary" },
									});
							});
					});
			},
		};
	})();

	KTUtil.onDOMContentLoaded(function () {
		KTPasswordResetGeneral.init();
	});

  </script>
		
@endsection

