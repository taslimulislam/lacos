@extends('frontend.layouts.app')
@push('css')

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

        
		 <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
			<!--begin::Container-->
			<div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
			  <!--begin::Page title-->
			  <div class="page-title d-flex flex-column me-3">
				<!--begin::Title-->
				<h1 class="d-flex fs-2hx fw-bolder text-white"></h1>
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
               <!--begin::Contact-->
               <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-17">
                        <!--begin::About-->
                        <div class="mb-18">
                            <div class="mb-10">
                                <div class="text-center mb-15">
                                    <h3 class="fs-2hx text-dark mb-5">Privecy policy</h3>
                                    <div class="fs-5 text-muted fw-bold"></div>
                                </div>
                            </div>

                            @php
                                $p = json_decode($CmsSetting?->details);
                            @endphp
                            
                            <div class="fs-5 fw-bold text-black-600">{!! $p->privacypolicy !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    
@endsection

@push('js')
@endpush

