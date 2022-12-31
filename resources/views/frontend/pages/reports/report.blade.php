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
        <!--end::Header-->


        <!--begin::Toolbar-->
        <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
          <!--begin::Container-->
          <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
              <!--begin::Title-->
              <h1 class="d-flex fs-2hx fw-bolder text-white">Statistical reports</h1>
              <!--end::Title-->
              <p class="fs-4 text-white">Access a collection of statistical analysis and interpretation of data<br> in
                order to uncover patterns and trends.</p>
                @include('frontend.pages.__search')
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
            <!--begin::Home card-->
            <div class="card">
              <!--begin::Body-->
              <div class="card-body p-lg-20">
                <!--begin::Section-->
                <div>
                  <!--begin::Row-->
                  <div class="row g-10">

                    
                    <!--begin::Col-->
                    @for ($i = 1; $i<=9; $i++)
												@if (!isset($report['name_'.$i]))
														@continue
												@endif
                        
                      <div class="col-md-4">
                        <!--begin::Hot sales post-->
                        <a href="{{$report['link_'.$i]}}" >
                        <div class="card-xl-stretch me-md-6">
                          <!--begin::Image-->
                          <div
                            class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                            style="background-image:url('{{$report['report_image_'.$i]}}')"></div>
                          <!--end::Image-->
                          <!--begin::Body-->
                          <div class="mt-5">
                            <!--begin::Title-->
                            <h4 class="fs-4 text-dark fw-bolder text-dark lh-base">{{$report['name_'.$i]}}</h4>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">{{Str::limit($report['about_report_'.$i],50)}}</div>
                            <!--end::Text-->
                            <!--begin::Text-->
                            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                              <!--begin::Label-->
                              <span class="badge border-dashed fs-2 fw-bolder text-dark p-2">
                                <span class="fs-6 fw-bold text-gray-400">₦</span> {{$report['price_'.$i]}}</span>
                              <!--end::Label-->
                              <!--begin::Action-->
                              <a href="{{$report['link_'.$i]}}" class="btn btn-primary">Buy report</a>
                              <!--end::Action-->
                            </div>
                            <!--end::Text-->
                          </div>
                          <!--end::Body-->
                        </div>
                        </a>
                        <!--end::Hot sales post-->
                      </div>
                    @endfor
                    <!--end::Col-->

                  </div>
                  <!--end::Row-->
                </div>
                <!--end::Section-->
              </div>
              <!--end::Body-->
            </div>
            <!--end::Home card-->
          </div>
          <!--end::Post-->
        </div>
        <!--end::Container-->

      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    

@endsection

