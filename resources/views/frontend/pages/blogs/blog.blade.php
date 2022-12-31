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
				{{-- <!--begin::Title-->
				<h1 class="d-flex fs-2hx fw-bolder text-white">Bamboo Investment launches in Ghana.</h1>
				<!--end::Title-->
				<p class="fs-4 text-white">Get access to Africa’s wide range of investors.</p> --}}
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
										<h3 class="text-black mb-7">Latest Articles, News &amp; Updates</h3>
										<!--end::Title-->
										<!--begin::Separator-->
										<div class="separator separator-dashed mb-9"></div>
										<!--end::Separator-->
										<!--begin::Row-->
										<div class="row">
											<!--begin::Col-->
											<div class="col-md-6">
												<!--begin::Feature post-->
												<div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
													<!--begin::Video-->
													<div class="mb-3">
														<img src="{{$post['image_1']}}" alt=""  class="embed-responsive-item card-rounded h-275px w-100" />
														{{-- <iframe class="embed-responsive-item card-rounded h-275px w-100" src="https://www.youtube.com/embed/qIHXpnASPAA" allowfullscreen="allowfullscreen"></iframe> --}}
													</div>
													<!--end::Video-->
													<!--begin::Body-->
													<div class="mb-5">
														<!--begin::Title-->
														<a href="{{$post['link_1']}}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base">
															{{$post['title_1']}}
														</a>
														<!--end::Title-->
														<!--begin::Text-->
														<div class="fw-bold fs-5 text-gray-600 text-dark mt-4">
															{!!Str::limit($post['content_1'],350)!!}
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
																<a href="" class="text-gray-700 text-hover-primary">David Morgan</a>
																<span class="text-muted">{{$post['post_date_1']}}</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Label-->
														<span class="badge badge-light-primary fw-bolder my-2">{{$post['category_1']}}</span>
														<!--end::Label-->
													</div>
													<!--end::Footer-->
												</div>
												<!--end::Feature post-->
											</div>
											<!--end::Col-->

											<!--begin::Col-->
											<div class="col-md-6 justify-content-between d-flex flex-column">
												<!--begin::Post-->
												@for ($i = 2; $i<=4; $i++)
												<div class="ps-lg-6 mb-16 mt-md-0 mt-17">
													<!--begin::Body-->
													<div class="mb-6">
														<!--begin::Title-->
														<a href="{{$post['link_'.$i]}}" class="fw-bolder text-dark mb-4 fs-2 lh-base text-hover-primary">
															{{$post['title_'.$i]}}
														</a>
														<!--end::Title-->
														<!--begin::Text-->
														<div class="fw-bold fs-5 mt-4 text-gray-600 text-dark">
															{!!Str::limit($post['content_'.$i],150)!!}
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
																<img src="{{$post['author_image_'.$i]}}" class="" alt="" />
															</div>
															<!--end::Avatar-->
															<!--begin::Text-->
															<div class="fs-5 fw-bolder">
																<a href="" class="text-gray-700 text-hover-primary">{{$post['author_name_'.$i]}}</a>
																<span class="text-muted">{{$post['post_date_'.$i]}}</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Label-->
														<span class="badge badge-light-info fw-bolder my-2">{{$post['category_'.$i]}}</span>
														<!--end::Label-->
													</div>
													<!--end::Footer-->
												</div>
												@endfor
												
												<!--end::Post-->
											</div>
											<!--end::Col-->
										</div>
										<!--begin::Row-->
									</div>


									<div class="mb-17">

										<div class="d-flex flex-stack mb-5">
											<h3 class="text-black"></h3>
										</div>
										<div class="separator separator-dashed mb-9"></div>
										
										<div class="row g-10">

											@for ($i = 5; $i<=11; $i++)
												@if (!isset($post['title_'.$i]))
														@continue
												@endif
												<div class="col-md-4">
													<div class="card-xl-stretch me-md-6">
														<a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{$post['image_'.$i]}}">
															<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{$post['image_'.$i]}}')"></div>
															<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
																<i class="bi bi-eye-fill fs-2x text-white"></i>
															</div>
														</a>
														<div class="mt-5">
															<a href="{{$post['link_'.$i]}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">
																{{$post['title_'.$i]}}
															</a>
															<div class="fw-bold fs-5 text-gray-600 text-dark mt-3">{!!Str::limit($post['content_'.$i],80)!!}</div>
														</div>
													</div>
												</div>
											@endfor
										</div>
									</div>
									
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

@push('js')


@endpush

