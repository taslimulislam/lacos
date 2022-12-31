@extends('frontend.layouts.app')
@push('css')

@endpush
@section('content')

@php
$assetsurl = asset('public/frontend');
@endphp

<style>
    button, input, optgroup, select, textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        width: 100%;
    }
</style>

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
				<h1 class="d-flex fs-2hx fw-bolder text-white">{{$post->title}}</h1>
				<!--end::Title-->
				<p class="fs-4 text-white">{{ date('d M Y',strtotime($post->post_date)) }}</p>
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
                              <!--begin::Post card-->
                              <div class="card">
                                  <!--begin::Body-->
                                  <div class="card-body p-lg-20 pb-lg-0">
                                      <!--begin::Layout-->
                                      <div class="d-flex flex-column flex-xl-row">
                                          <!--begin::Content-->
                                          <div class="flex-lg-row-fluid me-xl-15">
                                              <!--begin::Post content-->
                                              <div class="mb-17">
                                                  <!--begin::Wrapper-->
                                                  <div class="mb-8">
                                                      <!--begin::Info-->
                                                      <div class="d-flex flex-wrap mb-6">
                                                          <!--begin::Item-->
                                                          <div class="me-9 my-1">
                                                              <!--begin::Icon-->
                                                              <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks.svg-->
                                                              <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                          <rect x="0" y="0" width="24" height="24" />
                                                                          <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                                          <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                                      </g>
                                                                  </svg>
                                                              </span>
                                                              <!--end::Svg Icon-->
                                                              <!--end::Icon-->
                                                              <!--begin::Label-->
                                                              <span class="fw-bolder text-gray-400">{{ date('d-M-Y',strtotime($post->post_date)) }}</span>
                                                              <!--end::Label-->
                                                          </div>
                                                          <!--end::Item-->

                                                          <!--begin::Item-->
                                                            <div class="me-9 my-1">
                                                              <!--begin::Icon-->
                                                              <!--begin::Svg Icon | path: icons/duotone/Interface/Folder.svg-->
                                                              <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                      <path opacity="0.25" d="M13 6L12.4104 5.01732C11.8306 4.05094 10.8702 3.36835 9.75227 3.22585C8.83875 3.10939 7.66937 3 6.5 3C5.68392 3 4.86784 3.05328 4.13873 3.12505C2.53169 3.28325 1.31947 4.53621 1.19597 6.14628C1.09136 7.51009 1 9.43529 1 12C1 13.8205 1.06629 15.4422 1.15059 16.7685C1.29156 18.9862 3.01613 20.6935 5.23467 20.8214C6.91963 20.9185 9.17474 21 12 21C14.8253 21 17.0804 20.9185 18.7653 20.8214C20.9839 20.6935 22.7084 18.9862 22.8494 16.7685C22.9337 15.4422 23 13.8205 23 12C23 10.9589 22.9398 9.97795 22.8611 9.14085C22.7101 7.53313 21.4669 6.2899 19.8591 6.13886C19.0221 6.06022 18.0411 6 17 6H13Z" fill="#12131A" />
                                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H1.21033C1.39381 4.46081 2.58074 3.27842 4.13877 3.12505C4.86788 3.05328 5.68396 3 6.50004 3C7.66941 3 8.83879 3.10939 9.75231 3.22585C10.8702 3.36835 11.8306 4.05094 12.4104 5.01732L13 6Z" fill="#12131A" />
                                                                  </svg>
                                                              </span>
                                                              <!--end::Svg Icon-->
                                                              <!--end::Icon-->
                                                              <!--begin::Label-->
                                                              <span class="fw-bolder text-gray-400">{{$post->category}}</span>
                                                              <!--begin::Label-->
                                                            </div>
                                                          <!--end::Item-->

                                                      </div>
                                                      <!--end::Info-->


                                                      <!--begin::Title-->
                                                      <a href="#" class="text-dark text-hover-primary fs-2 fw-bolder">{{$post->title}}
                                                      <span class="fw-bolder text-muted fs-5 ps-1">{{$post->post_date}}</span></a>
                                                      <!--end::Title-->

                                                      <!--begin::Container-->
                                                      <div class="overlay mt-8">
                                                          <!--begin::Image-->
                                                          <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{$post->image}}')"></div>
                                                          <!--end::Image-->
                                                         
                                                      </div>
                                                      <!--end::Container-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Description-->
                                                  <div class="fs-5  text-black-600">
                                                      <p class="mb-17">
                                                        {!! $post->content !!}
                                                      </p>
                                                  </div>
                                                  <!--end::Description-->


                                                  <!--begin::Block-->
                                                  {{-- <div class="d-flex align-items-center border-dashed card-rounded p-5 p-lg-10 mb-14">
                                                      <!--begin::Section-->
                                                      <div class="text-center flex-shrink-0 me-7 me-lg-13">
                                                          <!--begin::Avatar-->
                                                          <div class="symbol symbol-70px symbol-circle mb-2">
                                                              <img src="{{$post->author_image}}" class="" alt="" />
                                                          </div>
                                                          <!--end::Avatar-->
                                                          <!--begin::Info-->
                                                          <div class="mb-0">
                                                              <a href="" class="text-gray-700 fw-bolder text-hover-primary">{{$post->author_name}}</a>
                                                              <span class="text-gray-400 fs-7 fw-bold d-block mt-1">Co-founder</span>
                                                          </div>
                                                          <!--end::Info-->
                                                      </div>
                                                      <!--end::Section-->
                                                      <!--begin::Text-->
                                                      <div class="mb-0 fs-6">
                                                          <div class="text-muted fw-bold lh-lg mb-2">{{$post->author_about}}</div>
                                                          <a href="../../demo2/dist/pages/profile/overview.html" class="fw-bold link-primary">Author’s Profile</a>
                                                      </div>
                                                      <!--end::Text-->
                                                  </div> --}}
                                                  <!--end::Block-->
                                                  <!--begin::Icons-->
                                                  {{-- <div class="d-flex flex-center">
                                                    
                                                      <!--begin::Icon-->
                                                      <a href="#" class="mx-4">
                                                          <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px my-2" alt="" />
                                                      </a>
                                                      <!--end::Icon-->
                                                      <!--begin::Icon-->
                                                      <a href="#" class="mx-4">
                                                          <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px my-2" alt="" />
                                                      </a>
                                                      <!--end::Icon-->
                                                      <!--begin::Icon-->
                                                      <a href="#" class="mx-4">
                                                          <img src="assets/media/svg/brand-logos/github.svg" class="h-20px my-2" alt="" />
                                                      </a>
                                                      <!--end::Icon-->
                                                      <!--begin::Icon-->
                                                      <a href="#" class="mx-4">
                                                          <img src="assets/media/svg/brand-logos/behance.svg" class="h-20px my-2" alt="" />
                                                      </a>
                                                      <!--end::Icon-->
                                                      <!--begin::Icon-->
                                                      <a href="#" class="mx-4">
                                                          <img src="assets/media/svg/brand-logos/pinterest-p.svg" class="h-20px my-2" alt="" />
                                                      </a>
                                                      <!--end::Icon-->
                                                      <!--begin::Icon-->
                                                      <a href="#" class="mx-4">
                                                          <img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px my-2" alt="" />
                                                      </a>
                                                      <!--end::Icon-->
                                                      <!--begin::Icon-->
                                                      <a href="#" class="mx-4">
                                                          <img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px my-2" alt="" />
                                                      </a>
                                                      <!--end::Icon-->
                                                  </div> --}}
                                                  <!--end::Icons-->
                                              </div>
                                              <!--end::Post content-->
                                          </div>
                                          <!--end::Content-->
                                          <!--begin::Sidebar-->
                                          <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                                              <!--begin::Search blog-->
                                              <div class="mb-16">
                                                <form action="{{url('post-search')}}" method="GET">
                                                  <h4 class="text-black mb-7">Search Blog</h4>
                                                  <!--begin::Input group-->
                                                  <div class="position-relative">
                                                      <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                                      <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                  <rect x="0" y="0" width="24" height="24" />
                                                                  <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                  <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                              </g>
                                                          </svg>
                                                      </span>
                                                      <!--end::Svg Icon-->
                                                      <input type="text" class="form-control form-control-solid ps-10" name="keyword" placeholder="Search" />
                                                  </div>
                                                  <!--end::Input group-->
                                                </form>
                                              </div>
                                              <!--end::Search blog-->
                                              <!--begin::Catigories-->
                                              <div class="mb-16">
                                                  <h4 class="text-black mb-7">Categories</h4>
                                                  
                                                  @foreach ($categories as $cat)
                                                       <!--begin::cat-->
                                                        <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                                            <!--begin::Text-->
                                                            <a href="{{url('category-post').'/'.$cat->category_slug}}" class="text-muted text-hover-primary pe-2">{{$cat->category_name}}</a>
                                                            <!--end::Text-->
                                                            <!--begin::Number-->
                                                            <div class="m-0">{{$cat->posts_count}}</div>
                                                            <!--end::Number-->
                                                        </div>
                                                        <!--end::Item-->
                                                  @endforeach
                                                 
                                              </div>
                                              <!--end::Catigories-->


                                              <!--begin::Recent posts-->
                                              <div class="m-0">
                                                  <h4 class="text-black mb-7">Recent Posts</h4>

                                                  <!--begin::Item-->

                                                  @for ($i = 1; $i<=5; $i++)
                                                        @if (!isset($recentpost['title_'.$i]))
                                                                @continue
                                                        @endif
                                                  <div class="d-flex flex-stack mb-7">
                                                      <!--begin::Symbol-->
                                                      <div class="symbol symbol-60px symbol-2by3 me-4">
                                                          <div class="symbol-label" style="background-image: url('{{$recentpost['image_'.$i]}}')"></div>
                                                      </div>
                                                      <!--end::Symbol-->
                                                      <!--begin::Title-->
                                                      <div class="m-0">
                                                          <a href="{{$recentpost['link_'.$i]}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$recentpost['title_'.$i]}}</a>
                                                          <span class="text-gray-600 fw-bold d-block pt-1 fs-7">{!!Str::limit($recentpost['content_'.$i],50)!!}</span>
                                                      </div>
                                                      <!--end::Title-->
                                                  </div>
                                                  @endfor
                                                  <!--end::Item-->

                                              </div>
                                              <!--end::Recent posts-->
                                          </div>
                                          <!--end::Sidebar-->
                                      </div>
                                      <!--end::Layout-->


                                    
                                      <!--begin::Section-->
                                      <div class="mb-17">
                                          <!--begin::Content-->
                                          <div class="d-flex flex-stack mb-5">
                                              <!--begin::Title-->
                                              <h3 class="text-black">Related Post</h3>
                                              <!--end::Title-->
                                              <!--begin::Link-->
                                              
                                              <!--end::Link-->
                                          </div>
                                          <!--end::Content-->
                                          <!--begin::Separator-->
                                          <div class="separator separator-dashed mb-9"></div>
                                          <!--end::Separator-->
                                          <!--begin::Row-->
                                          <div class="row g-10">
                                              <!--begin::Col-->
                                              @for ($i = 2; $i<=4; $i++)
												@if (!isset($rpost['title_'.$i]))
														@continue
												@endif
											<div class="col-md-4">
												<!--begin::Hot sales post-->
												<div class="card-xl-stretch me-md-6">
													
													<!--begin::Overlay-->
													<a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{$rpost['image_'.$i]}}">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{$rpost['image_'.$i]}}')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-2x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Overlay-->

													<!--begin::Body-->
													<div class="mt-5">
														<!--begin::Title-->
														<a href="{{$rpost['link_'.$i]}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">
															{{$rpost['title_'.$i]}}
														</a>
														<!--end::Title-->
														<!--begin::Text-->
														<div class="fw-bold fs-5 text-gray-600 text-dark mt-3">{!!Str::limit($rpost['content_'.$i],80)!!}</div>
														<!--end::Text-->
														
													</div>
													<!--end::Body-->
												</div>
												<!--end::Hot sales post-->
											</div>
											@endfor

                                              
                                          </div>
                                          <!--end::Row-->
                                      </div>
                                      <!--end::Section-->
                                  </div>
                                  <!--end::Body-->
                              </div>
                              <!--end::Post card-->
                          </div>
                          <!--end::Post-->
          </div>
          <!--end::Container-->

      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    

@endsection

