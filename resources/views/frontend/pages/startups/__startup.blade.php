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
        <div class="toolbar py-5 py-lg-10 align-items-center  " id="kt_toolbar">
          <!--begin::Container-->
          <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3 align-items-center">
              @include('frontend.pages.__search')
            </div>
            <!--end::Page title-->


            <!--begin::Actions-->
						<div class="d-flex align-items-center py-3 py-md-1 filterarea">
							<!--begin::Wrapper-->
              @include('frontend.pages.__filter')
						</div>
						<!--end::Actions-->



          </div>
          <!--end::Container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Container-->
        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container mb-15">
          <!--begin::Post-->
          <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Toolbar-->
            <div class="d-flex flex-wrap flex-stack mb-6">
             
            </div>
            <!--end::Toolbar-->
            <!--begin::Row-->
            <div class="row g-6 g-xl-9">

              @if (!empty($startups))

              @foreach ($startups as $item)
              <!--begin::Col-->
              <div class="col-sm-6 col-xl-4">
                <!--begin::Card-->
                <div class="card h-100">
                  <!--begin::Card header-->
                  <div class="card-header flex-nowrap border-0 pt-9">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">

                          @php
                            if($item->logo){
                              $dom = explode('//',$item->logo);
                              //dd($dom[0]);
                              // $dom = parse_url($item->logo);
                              if(count($dom)>1){
                                $img = $item->logo;
                              }else{
                                $img =  url('/public/storage/startups/'.@$item->logo);
                              }

                            }else{
                              $img = url('/public/demoimg/placeholder.jpg');
                            }
                          @endphp 
                          <!--begin::Image-->
                          <img src="{{ $img }}" alt="{{ @$item->name }}" alt="" class="h-100px p-1 rounded-circle shadow-sm w-100px">
                          <!--end::Image-->
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <!--begin::Heading-->
                          <div class="fs-1 fw-bolder mb-0"><a href="{{route('startup.detail',$item->uuid)}}"> {{$item->name}} </a></div>
                          <!--end::Heading-->
                          <div class="fs-6 fw-bold text-primary">{{$item?->investstage?->name}}</div>
                        </div>
                      </div>
                    </div>
                    <!--end::Card title-->
                  </div>
                  <!--end::Card header-->


                  <!--begin::Card body-->
                  <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                    <!--begin::Indicator-->
                    <div class="d-flex align-items-center fw-bold">
                      <span class="badge bg-light-primary me-2 px-3 py-2 text-primary"> {{$item->industryadd?$item->industryadd->name:'---'}}</span>
                    </div>
                    <!--end::Indicator-->
                    <!--begin::Stats-->
                    <div class="fw-bold text-gray-400 mt-5 fs-6">{{Illuminate\Support\Str::limit($item->description,80)}} </div>
                    <!--end::Stats-->
                  </div>
                  <!--end::Card body-->
                </div>
                <!--end::Card-->
              </div>
              <!--end::Col-->

              @endforeach
              @endif


            </div>
            <!--end::Row-->
            <!--begin::Pagination-->
            <div class="d-flex flex-stack flex-wrap pt-10">
              {{-- <div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div> --}}
              <!--begin::Pages-->
              <ul class="pagination">
                  {{ $startups->onEachSide(1)->links() }}
              </ul>
              <!--end::Pages-->
            </div>
            <!--end::Pagination-->

            
            <!--begin::Modals-->
            <!--begin::Modal - Offer A Deal-->
            <div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
              <!--begin::Modal dialog-->
              <div class="modal-dialog modal-dialog-centered mw-1000px">
                <!--begin::Modal content-->
                <div class="modal-content">
                  <!--begin::Modal header-->
                  <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Offer a Deal</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                      <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                      <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                          height="24px" viewBox="0 0 24 24" version="1.1">
                          <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                            fill="#000000">
                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                            <rect fill="#000000" opacity="0.5"
                              transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                              x="0" y="7" width="16" height="2" rx="1" />
                          </g>
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                  </div>
                  <!--begin::Modal header-->
                  <!--begin::Modal body-->
                  <div class="modal-body scroll-y m-5">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_offer_a_deal_stepper">
                      <!--begin::Nav-->
                      <div class="stepper-nav justify-content-center py-2">
                        <!--begin::Step 1-->
                        <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Deal Type</h3>
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Deal Details</h3>
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Finance Settings</h3>
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Completed</h3>
                        </div>
                        <!--end::Step 4-->
                      </div>
                      <!--end::Nav-->
                      <!--begin::Form-->
                      <form class="mx-auto mw-500px w-100 pt-15 pb-10" novalidate="novalidate"
                        id="kt_modal_offer_a_deal_form">
                        <!--begin::Type-->
                        <div class="current" data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            <div class="mb-13">
                              <!--begin::Title-->
                              <h2 class="mb-3">Deal Type</h2>
                              <!--end::Title-->
                              <!--begin::Description-->
                              <div class="text-muted fw-bold fs-5">If you need more info, please check out
                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                              </div>
                              <!--end::Description-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-15" data-kt-buttons="true">
                              <!--begin::Option-->
                              <label
                                class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 mb-6 active">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" checked="checked" name="offer_type" value="1" />
                                <!--end::Input-->
                                <!--begin::Label-->
                                <span class="d-flex">
                                  <!--begin::Icon-->
                                  <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                                  <span class="svg-icon svg-icon-3hx">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                      width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                          d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                          fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                          d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                          fill="#000000" fill-rule="nonzero" />
                                      </g>
                                    </svg>
                                  </span>
                                  <!--end::Svg Icon-->
                                  <!--end::Icon-->
                                  <!--begin::Info-->
                                  <span class="ms-4">
                                    <span class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Personal Deal</span>
                                    <span class="fw-bold fs-4 text-muted">If you need more info, please check it
                                      out</span>
                                  </span>
                                  <!--end::Info-->
                                </span>
                                <!--end::Label-->
                              </label>
                              <!--end::Option-->
                              <!--begin::Option-->
                              <label
                                class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6">
                                <!--begin::Input-->
                                <input class="btn-check" type="radio" name="offer_type" value="2" />
                                <!--end::Input-->
                                <!--begin::Label-->
                                <span class="d-flex">
                                  <!--begin::Icon-->
                                  <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                  <span class="svg-icon svg-icon-3hx">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                      width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                      </g>
                                    </svg>
                                  </span>
                                  <!--end::Svg Icon-->
                                  <!--end::Icon-->
                                  <!--begin::Info-->
                                  <span class="ms-4">
                                    <span class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Corporate Deal</span>
                                    <span class="fw-bold fs-4 text-muted">Create corporate account to manage
                                      users</span>
                                  </span>
                                  <!--end::Info-->
                                </span>
                                <!--end::Label-->
                              </label>
                              <!--end::Option-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                              <button type="button" class="btn btn-lg btn-primary" data-kt-element="type-next">
                                <span class="indicator-label">Offer Details</span>
                                <span class="indicator-progress">Please wait...
                                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                              </button>
                            </div>
                            <!--end::Actions-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Type-->
                        <!--begin::Details-->
                        <div data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            <div class="mb-13">
                              <!--begin::Title-->
                              <h2 class="mb-3">Deal Details</h2>
                              <!--end::Title-->
                              <!--begin::Description-->
                              <div class="text-muted fw-bold fs-5">If you need more info, please check out
                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                              </div>
                              <!--end::Description-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                              <!--begin::Label-->
                              <label class="required fs-6 fw-bold mb-2">Customer</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <select class="form-select form-select-solid" data-control="select2"
                                data-placeholder="Select an option" name="details_customer">
                                <option></option>
                                <option value="1" selected="selected">Keenthemes</option>
                                <option value="2">CRM App</option>
                              </select>
                              <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                              <!--begin::Label-->
                              <label class="required fs-6 fw-bold mb-2">Deal Title</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <input type="text" class="form-control form-control-solid" placeholder="Enter Deal Title"
                                name="details_title" value="Marketing Campaign" />
                              <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                              <!--begin::Label-->
                              <label class="fs-6 fw-bold mb-2">Deal Description</label>
                              <!--end::Label-->
                              <!--begin::Label-->
                              <textarea class="form-control form-control-solid" rows="3"
                                placeholder="Enter Deal Description"
                                name="details_description">Experience share market at your fingertips with TICK PRO stock investment mobile trading app</textarea>
                              <!--end::Label-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                              <label class="required fs-6 fw-bold mb-2">Activation Date</label>
                              <div class="position-relative d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="symbol symbol-20px me-4 position-absolute ms-4">
                                  <span class="symbol-label bg-secondary">
                                    <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-grid.svg-->
                                    <span class="svg-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <rect x="0" y="0" width="24" height="24" />
                                          <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="1" />
                                          <path
                                            d="M5,10 L7,10 C7.55228475,10 8,10.4477153 8,11 L8,13 C8,13.5522847 7.55228475,14 7,14 L5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 L14,7 C14,7.55228475 13.5522847,8 13,8 L11,8 C10.4477153,8 10,7.55228475 10,7 L10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,13 C14,13.5522847 13.5522847,14 13,14 L11,14 C10.4477153,14 10,13.5522847 10,13 L10,11 C10,10.4477153 10.4477153,10 11,10 Z M17,4 L19,4 C19.5522847,4 20,4.44771525 20,5 L20,7 C20,7.55228475 19.5522847,8 19,8 L17,8 C16.4477153,8 16,7.55228475 16,7 L16,5 C16,4.44771525 16.4477153,4 17,4 Z M17,10 L19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 L17,14 C16.4477153,14 16,13.5522847 16,13 L16,11 C16,10.4477153 16.4477153,10 17,10 Z M5,16 L7,16 C7.55228475,16 8,16.4477153 8,17 L8,19 C8,19.5522847 7.55228475,20 7,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,17 C4,16.4477153 4.44771525,16 5,16 Z M11,16 L13,16 C13.5522847,16 14,16.4477153 14,17 L14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 L10,17 C10,16.4477153 10.4477153,16 11,16 Z M17,16 L19,16 C19.5522847,16 20,16.4477153 20,17 L20,19 C20,19.5522847 19.5522847,20 19,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,16.4477153 16.4477153,16 17,16 Z"
                                            fill="#000000" />
                                        </g>
                                      </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                  </span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Datepicker-->
                                <input class="form-control form-control-solid ps-12" placeholder="Pick date range"
                                  name="details_activation_date" />
                                <!--end::Datepicker-->
                              </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-15">
                              <!--begin::Wrapper-->
                              <div class="d-flex flex-stack">
                                <!--begin::Label-->
                                <div class="me-5">
                                  <label class="required fs-6 fw-bold">Notifications</label>
                                  <div class="fs-7 fw-bold text-muted">Allow Notifications by Phone or Email</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Checkboxes-->
                                <div class="d-flex">
                                  <!--begin::Checkbox-->
                                  <label class="form-check form-check-custom form-check-solid me-10">
                                    <!--begin::Input-->
                                    <input class="form-check-input h-20px w-20px" type="checkbox" value="email"
                                      name="details_notifications[]" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <span class="form-check-label fw-bold">Email</span>
                                    <!--end::Label-->
                                  </label>
                                  <!--end::Checkbox-->
                                  <!--begin::Checkbox-->
                                  <label class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input h-20px w-20px" type="checkbox" value="phone"
                                      checked="checked" name="details_notifications[]" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <span class="form-check-label fw-bold">Phone</span>
                                    <!--end::Label-->
                                  </label>
                                  <!--end::Checkbox-->
                                </div>
                                <!--end::Checkboxes-->
                              </div>
                              <!--begin::Wrapper-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack">
                              <button type="button" class="btn btn-lg btn-light me-3"
                                data-kt-element="details-previous">Deal Type</button>
                              <button type="button" class="btn btn-lg btn-primary" data-kt-element="details-next">
                                <span class="indicator-label">Financing</span>
                                <span class="indicator-progress">Please wait...
                                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                              </button>
                            </div>
                            <!--end::Actions-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Budget-->
                        <div data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            <div class="mb-13">
                              <!--begin::Title-->
                              <h2 class="mb-3">Finance</h2>
                              <!--end::Title-->
                              <!--begin::Description-->
                              <div class="text-muted fw-bold fs-5">If you need more info, please check out
                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                              </div>
                              <!--end::Description-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                              <!--begin::Label-->
                              <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Setup Budget</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                  data-bs-trigger="hover" data-bs-html="true"
                                  data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-bold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bolder mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
                              </label>
                              <!--end::Label-->
                              <!--begin::Dialer-->
                              <div class="position-relative w-lg-250px" id="kt_modal_finance_setup"
                                data-kt-dialer="true" data-kt-dialer-min="50" data-kt-dialer-max="50000"
                                data-kt-dialer-step="100" data-kt-dialer-prefix="$" data-kt-dialer-decimals="2">
                                <!--begin::Decrease control-->
                                <button type="button"
                                  class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0"
                                  data-kt-dialer-control="decrease">
                                  <!--begin::Svg Icon | path: icons/duotone/Code/Minus.svg-->
                                  <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                      viewBox="0 0 24 24" version="1.1">
                                      <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                      <rect fill="#000000" x="6" y="11" width="12" height="2" rx="1" />
                                    </svg>
                                  </span>
                                  <!--end::Svg Icon-->
                                </button>
                                <!--end::Decrease control-->
                                <!--begin::Input control-->
                                <input type="text" class="form-control form-control-solid border-0 ps-12"
                                  data-kt-dialer-control="input" placeholder="Amount" name="finance_setup"
                                  readonly="readonly" value="$50" />
                                <!--end::Input control-->
                                <!--begin::Increase control-->
                                <button type="button"
                                  class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0"
                                  data-kt-dialer-control="increase">
                                  <!--begin::Svg Icon | path: icons/duotone/Code/Plus.svg-->
                                  <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                      viewBox="0 0 24 24" version="1.1">
                                      <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                      <path
                                        d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z"
                                        fill="#000000" />
                                    </svg>
                                  </span>
                                  <!--end::Svg Icon-->
                                </button>
                                <!--end::Increase control-->
                              </div>
                              <!--end::Dialer-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                              <!--begin::Label-->
                              <label class="fs-6 fw-bold mb-2">Budget Usage</label>
                              <!--end::Label-->
                              <!--begin::Row-->
                              <div class="row g-9" data-kt-buttons="true"
                                data-kt-buttons-target="[data-kt-button='true']">
                                <!--begin::Col-->
                                <div class="col-md-6 col-lg-12 col-xxl-6">
                                  <!--begin::Option-->
                                  <label
                                    class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6"
                                    data-kt-button="true">
                                    <!--begin::Radio-->
                                    <span
                                      class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                      <input class="form-check-input" type="radio" name="finance_usage" value="1"
                                        checked="checked" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Info-->
                                    <span class="ms-5">
                                      <span class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Precise Usage</span>
                                      <span class="fw-bold fs-7 text-gray-600">Withdraw money to your bank account per
                                        transaction under $50,000 budget</span>
                                    </span>
                                    <!--end::Info-->
                                  </label>
                                  <!--end::Option-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 col-lg-12 col-xxl-6">
                                  <!--begin::Option-->
                                  <label
                                    class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6"
                                    data-kt-button="true">
                                    <!--begin::Radio-->
                                    <span
                                      class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                      <input class="form-check-input" type="radio" name="finance_usage" value="2" />
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Info-->
                                    <span class="ms-5">
                                      <span class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Extreme Usage</span>
                                      <span class="fw-bold fs-7 text-gray-600">Withdraw money to your bank account per
                                        transaction under $50,000 budget</span>
                                    </span>
                                    <!--end::Info-->
                                  </label>
                                  <!--end::Option-->
                                </div>
                                <!--end::Col-->
                              </div>
                              <!--end::Row-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-15">
                              <!--begin::Wrapper-->
                              <div class="d-flex flex-stack">
                                <!--begin::Label-->
                                <div class="me-5">
                                  <label class="fs-6 fw-bold">Allow Changes in Budget</label>
                                  <div class="fs-7 fw-bold text-muted">If you need more info, please check budget
                                    planning</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                  <input class="form-check-input" type="checkbox" value="1" name="finance_allow"
                                    checked="checked" />
                                  <span class="form-check-label fw-bold text-muted">Allowed</span>
                                </label>
                                <!--end::Switch-->
                              </div>
                              <!--end::Wrapper-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack">
                              <button type="button" class="btn btn-lg btn-light me-3"
                                data-kt-element="finance-previous">Project Settings</button>
                              <button type="button" class="btn btn-lg btn-primary" data-kt-element="finance-next">
                                <span class="indicator-label">Build Team</span>
                                <span class="indicator-progress">Please wait...
                                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                              </button>
                            </div>
                            <!--end::Actions-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Budget-->
                        <!--begin::Complete-->
                        <div data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            <div class="mb-13">
                              <!--begin::Title-->
                              <h2 class="mb-3">Deal Created!</h2>
                              <!--end::Title-->
                              <!--begin::Description-->
                              <div class="text-muted fw-bold fs-5">If you need more info, please check out
                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                              </div>
                              <!--end::Description-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-center pb-20">
                              <button type="button" class="btn btn-lg btn-light me-3"
                                data-kt-element="complete-start">Create New Deal</button>
                              <a href="#" class="btn btn-lg btn-primary" data-bs-toggle="tooltip"
                                title="Coming Soon">View Deal</a>
                            </div>
                            <!--end::Actions-->
                            <!--begin::Illustration-->
                            <div class="text-center px-4">
                              <img src="{{$assetsurl}}/assets/media/illustrations/presentation.png" alt="" class="mw-100 mh-300px" />
                            </div>
                            <!--end::Illustration-->
                          </div>
                        </div>
                        <!--end::Complete-->
                      </form>
                      <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                  </div>
                  <!--begin::Modal body-->
                </div>
              </div>
            </div>
            <!--end::Modal - Offer A Deal-->
            <!--end::Modals-->
          </div>
          <!--end::Post-->
        </div>
        <!--end::Container-->

      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    


@endsection

