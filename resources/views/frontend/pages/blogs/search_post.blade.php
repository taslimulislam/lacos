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
         <div class="toolbar py-5 py-lg-10" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
              <!--begin::Page title-->
              <div class="page-title d-flex flex-column me-3 text-center">
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
									<div class="mb-17">
										<!--begin::Title-->
										<h3 class="text-black mb-7">Your Search-> <span class="text-success">{{$keyword}}</span></h3>
										<!--end::Title-->
										<!--begin::Separator-->
										<div class="separator separator-dashed mb-9"></div>
										<!--end::Separator-->
										<!--begin::Row-->
										<div class="row">
											<!--begin::Col-->

                                            @if (empty($post))
                                                <div class="col-md-12 mb-10">
                                                    <div class="d-flex align-items-center border-dashed card-rounded p-5 p-lg-10 mb-14">
                                                        <div class="text-muted fw-bold lh-lg mb-2">Search Result Not Found..</div>   
                                                    </div>
                                                </div>
                                            @endif
                                            @for ($i = 1; $i<=12; $i++)
                                                @if(!isset($post['title_'.$i]))
                                                        @continue
                                                @endif
											<div class="col-md-6 mb-10">
												<!--begin::Feature post-->
												<div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
													<!--begin::Video-->
													<div class="mb-3">
														<img src="{{@$post['image_'.$i]}}" alt=""  class="embed-responsive-item card-rounded h-275px w-100" />
														{{-- <iframe class="embed-responsive-item card-rounded h-275px w-100" src="https://www.youtube.com/embed/qIHXpnASPAA" allowfullscreen="allowfullscreen"></iframe> --}}
													</div>
													<!--end::Video-->
													<!--begin::Body-->
													<div class="mb-5">
														<!--begin::Title-->
														<a href="{{@$post['link_'.$i]}}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base">
															{{@$post['title_'.$i]}}
														</a>
														<!--end::Title-->
														<!--begin::Text-->
														<div class="fw-bold fs-5 text-gray-600 text-dark mt-4">
															{!!Str::limit(@$post['content_'.$i],350)!!}
														</div>
														<!--end::Text-->
													</div>
													<!--end::Body-->

													<!--begin::Footer-->
													<div class="d-flex flex-stack flex-wrap">
														<!--begin::Item-->
														<div class="d-flex align-items-center pe-2">
															<!--begin::Avatar-->
															<div class="symbol symbol-35px symbol-circle me-3">
																<img alt="" src="{{$post['image_1']}}" />
															</div>
															<!--end::Avatar-->
															<!--begin::Text-->
															<div class="fs-5 fw-bolder">
																<a href="../../demo2/dist/pages/profile/overview.html" class="text-gray-700 text-hover-primary">David Morgan</a>
																<span class="text-muted">{{@$post['post_date_'.$i]}}</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Label-->
														<span class="badge badge-light-primary fw-bolder my-2">{{@$post['category_'.$i]}}</span>
														<!--end::Label-->
													</div>
													<!--end::Footer-->
												</div>
												<!--end::Feature post-->
											</div>
											<!--end::Col-->
                                            @endfor

										</div>
										<!--begin::Row-->
									</div>
									<!--end::Section-->

									<!--begin::Section-->
									<div class="mb-17">

										<!--begin::Content-->
										<div class="d-flex flex-stack mb-5">
											<!--begin::Title-->
											<h3 class="text-black"></h3>
											<!--end::Title-->
											<!--begin::Link-->
											<!--end::Link-->
										</div>
										<!--end::Content-->

										<!--begin::Separator-->
										<div class="separator separator-dashed mb-9"></div>
										<!--end::Separator-->
										
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

