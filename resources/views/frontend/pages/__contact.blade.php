@extends('frontend.layouts.app')
@push('css')
<link href="{{asset('public/frontend')}}/assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')

@php
$assetsurl = asset('public/frontend');
@endphp

    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
      <!--begin::Wrapper-->
      <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
		@include('frontend.layouts.navber')
        <!--end::Header-->


		 <!--begin::Toolbar-->
		 <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
			<!--begin::Container-->
			<div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
			  <!--begin::Page title-->
			  <div class="page-title d-flex flex-column me-3">
				<!--begin::Title-->
				<h1 class="d-flex fs-2hx fw-bolder text-white">Contact Us</h1>
				<!--end::Title-->
				<p class="fs-4 text-white"></p>
			  </div>
			  <!--end::Page title-->
			</div>
			<!--end::Container-->
		  </div>
		  <!--end::Toolbar-->


        <!--begin::Container-->
        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container mb-15">
          <!--begin::Post-->
            <div class="content flex-row-fluid" id="kt_content">
               <div class="card">
                <div class="card-body p-lg-17">
                    <div class="row mb-3">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>
                                @foreach ($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </strong>
                        </div>
                        @endif

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <strong> {{ session()->get('message') }}</strong>
                            </div>
                        @endif

                       
                        <div class="col-md-6 pe-lg-10">
                            <form action="{{route('send-mail')}}" method="POST" class="form mb-15">
                                @csrf
                                <h1 class="fw-bolder text-dark mb-9">Send Us Email</h1>
                                <div class="row mb-5">
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold mb-2">Name</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="name" required/>
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold mb-2">Email</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="email" required />
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <label class="fs-5 fw-bold mb-2">Subject</label>
                                    <input class="form-control form-control-solid" placeholder="" name="subject" required />
                                </div>
                                <div class="d-flex flex-column mb-10 fv-row">
                                    <label class="fs-6 fw-bold mb-2">Message</label>
                                    <textarea class="form-control form-control-solid" rows="6" minlength="250" maxlength="500" name="message" placeholder="" required></textarea>
                                    <span class="text-danger">Message box whould be a little and min 250 and max 500  </span>
                                </div>
                                <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                                    <span class="indicator-label">Send </span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </form>
                        </div>

                        <div class="col-md-6 ps-lg-10">
                            <div id="kt_contact_map" class="w-100 rounded mb-2 mb-lg-0 mt-2" style="height: 486px"></div>
                        </div>
                    </div>
                    
                    <div class="row g-5 mb-5 mb-lg-15">
                        <div class="col-sm-6 pe-lg-10">
                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">
                                
                                <span class="svg-icon svg-icon-3tx svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0)">
                                            <path opacity="0.25" d="M21.3902 19.5804L19.4852 21.4853C19.4852 21.4853 14.5355 23.6066 7.46441 16.5356C0.39334 9.46451 2.51466 4.51476 2.51466 4.51476L4.41959 2.60983C5.28021 1.74921 6.70355 1.85036 7.43381 2.82404L9.25208 5.24841C9.84926 6.04465 9.77008 7.15884 9.06629 7.86262L7.46441 9.46451C7.46441 9.46451 7.46441 10.8787 10.2928 13.7071C13.1213 16.5356 14.5355 16.5356 14.5355 16.5356L16.1374 14.9337C16.8411 14.2299 17.9553 14.1507 18.7516 14.7479L21.1759 16.5662C22.1496 17.2964 22.2508 18.7198 21.3902 19.5804Z" fill="#191213" />
                                            <path d="M4.41959 2.60987L3.92887 3.10059L8.17151 8.75745L9.06629 7.86267C9.77007 7.15888 9.84926 6.0447 9.25208 5.24846L7.4338 2.82409C6.70354 1.85041 5.28021 1.74926 4.41959 2.60987Z" fill="#121319" />
                                            <path d="M21.3901 19.5804L20.8994 20.0711L15.2426 15.8285L16.1373 14.9337C16.8411 14.2299 17.9553 14.1507 18.7515 14.7479L21.1759 16.5662C22.1496 17.2965 22.2507 18.7198 21.3901 19.5804Z" fill="#121319" />
                                        </g>
                                    </svg>
                                </span>
                                <h1 class="text-dark fw-bolder my-5">Let’s Speak</h1>
                                <div class="text-gray-700 fw-bold fs-2">{{@$websetup->phone}}</div>
                            </div>
                        </div>
                        <div class="col-sm-6 ps-lg-10">
                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">
                                <span class="svg-icon svg-icon-3tx svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.25" d="M21 10C21 15.4917 16.1746 20.1791 13.5904 22.2957C12.6534 23.0631 11.3466 23.0631 10.4096 22.2957C7.82537 20.1791 3 15.4917 3 10C3 5.02944 7.02944 1 12 1C16.9706 1 21 5.02944 21 10Z" fill="#191213" />
                                        <path d="M15 9C15 10.6569 13.6569 12 12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9Z" fill="#121319" />
                                    </svg>
                                </span>
                                <h1 class="text-dark fw-bolder my-5">Our Head Office</h1>
                                <div class="text-gray-700 fs-3 fw-bold">{{@$websetup->address}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 bg-light text-center">
                        <!--begin::Body-->
                        <div class="card-body py-12">
                            <!--begin::Icon-->
                            <a href="{{@$social_link->facebook}}" class="mx-4">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/facebook-4.svg" class="h-30px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="{{@$social_link->instagram}}" class="mx-4">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/instagram-2-1.svg" class="h-30px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="{{@$social_link->github}}" class="mx-4">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/github.svg" class="h-30px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                            
                            <!--begin::Icon-->
                            <a href="{{@$social_link->twitter}}" class="mx-4">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/twitter.svg" class="h-30px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a href="{{@$social_link->dribbble}}" class="mx-4">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-30px my-2" alt="" />
                            </a>
                            <!--end::Icon-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Contact-->
                
            </div>
			<!--end::Post-->
        </div>
        <!--end::Container-->
		

      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    

@endsection

@push('js')
<script src="{{$assetsurl}}/assets/plugins/custom/leaflet/leaflet.bundle.js"></script>

<script src="{{$assetsurl}}/assets/js/custom/pages/company/contact.js"></script>
@endpush

