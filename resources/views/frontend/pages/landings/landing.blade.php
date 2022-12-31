@extends('frontend.layouts.app')

@push('css')

@endpush

@section('content')

@php
$assetsurl = asset('public/frontend');
@endphp

        <!--begin::Header Section-->
        <div class="mb-0" id="home">

        <!--begin::Wrapper-->
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url({{$assetsurl}}/assets/media/svg/illustrations/landing.svg)">

            <!--begin::Header-->
            @include('frontend.layouts.navber')
            <!--end::Header-->

            <!--begin::Landing hero-->
            <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                
                <!--begin::Heading-->
                @include('frontend.pages.landings.landing_header')
                <!--end::Heading-->

                <!--begin::Statistics-->
                <div class="d-flex flex-center">
                    <!--begin::Items-->
                    <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-10 mx-auto text-center">
                        <!--begin::Item-->
                        <div
                            class="d-flex flex-column flex-center h-200px w-200px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{$assetsurl}}/assets/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                                    height="24" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                            fill="#12131A" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$startups}}">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-bold fs-5 lh-0">Companies</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div
                            class="d-flex flex-column flex-center h-200px w-200px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{$assetsurl}}/assets/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z"
                                            fill="#12131A" opacity="0.3" />
                                        <path
                                            d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z"
                                            fill="#12131A" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$investor}}">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-bold fs-5 lh-0">Investors</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div
                            class="d-flex flex-column flex-center h-200px w-200px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{$assetsurl}}/assets/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M9,15 L7.5,15 C6.67157288,15 6,15.6715729 6,16.5 C6,17.3284271 6.67157288,18 7.5,18 C8.32842712,18 9,17.3284271 9,16.5 L9,15 Z M9,15 L9,9 L15,9 L15,15 L9,15 Z M15,16.5 C15,17.3284271 15.6715729,18 16.5,18 C17.3284271,18 18,17.3284271 18,16.5 C18,15.6715729 17.3284271,15 16.5,15 L15,15 L15,16.5 Z M16.5,9 C17.3284271,9 18,8.32842712 18,7.5 C18,6.67157288 17.3284271,6 16.5,6 C15.6715729,6 15,6.67157288 15,7.5 L15,9 L16.5,9 Z M9,7.5 C9,6.67157288 8.32842712,6 7.5,6 C6.67157288,6 6,6.67157288 6,7.5 C6,8.32842712 6.67157288,9 7.5,9 L9,9 L9,7.5 Z M11,13 L13,13 L13,11 L11,11 L11,13 Z M13,11 L13,7.5 C13,5.56700338 14.5670034,4 16.5,4 C18.4329966,4 20,5.56700338 20,7.5 C20,9.43299662 18.4329966,11 16.5,11 L13,11 Z M16.5,13 C18.4329966,13 20,14.5670034 20,16.5 C20,18.4329966 18.4329966,20 16.5,20 C14.5670034,20 13,18.4329966 13,16.5 L13,13 L16.5,13 Z M11,16.5 C11,18.4329966 9.43299662,20 7.5,20 C5.56700338,20 4,18.4329966 4,16.5 C4,14.5670034 5.56700338,13 7.5,13 L11,13 L11,16.5 Z M7.5,11 C5.56700338,11 4,9.43299662 4,7.5 C4,5.56700338 5.56700338,4 7.5,4 C9.43299662,4 11,5.56700338 11,7.5 L11,11 L7.5,11 Z"
                                            fill="#7E8299" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$hubs}}">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-bold fs-5 lh-0">Hubs</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->


                        <!--begin::Item-->
                        {{-- <div
                            class="d-flex flex-column flex-center h-200px w-200px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{$assetsurl}}/assets/media/svg/misc/octagon.svg')">
                            <!--begin::Symbol-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                                    height="24" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#7E8299" opacity="0.3" cx="12" cy="12" r="9" />
                                        <path
                                            d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z"
                                            fill="#7E8299" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="125">0</div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-bold fs-5 lh-0">Multinationals</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div> --}}
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Statistics-->
            </div>
            <!--end::Landing hero-->
        </div>
        <!--end::Wrapper-->


        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->


        <!--end::Header Section-->
        <div class="container">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-12">
                    <div class="card border card-flush h-xl-100">

                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Accelerating the </span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">growth of Africa's tech ecosystem</span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav" id="kt_chart_widget_8_tabs">
                                    <li class="nav-item">
                                            <div class="input-group mb-3">
                                                <input type="text" name="mydaterenge" data-route="{{route('chart-one')}}" graph-type="c1"  class="form-control form-control-solid chart-1 reportrange" placeholder="Pick date range" autocomplete="off" />
                                            </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="card-body pt-6">
                            <div class="tab-content">
                              

                                <div class="tab-pane fade active show" id="kt_chart_widget_8_month_tab" role="tabpanel">
                                    <div class="mb-5">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="fs-1 fw-semibold text-gray-400 me-1 mt-n1">$</span>
                                            <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">{{@$totalinvestment}} K</span>
                                            <span class="badge badge-light-success fs-base">
												<span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
															fill="currentColor" />
													</svg>
												</span>
                                            <!--end::Svg Icon-->{{number_format(($totalinvestment>0?$totalinvestment:1)/$industry,2)}}%
                                            </span>
                                        </div>
                                    </div>
                                    <div id="c1">
                                        <div id="series_chart_div" class="ms-n5 min-h-auto" style="height: 425px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="col-xl-6">
                    <div class="card border card-xl-stretch mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Investments ($)</span>
                                <span class="text-muted fw-bold fs-7">${{$totalinvestment}}k</span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav" id="kt_chart_widget_8_tabs">
                                    <li class="nav-item">
                                        <div class="input-group mb-3">
                                            <input type="text" name="mydaterenge" data-route="{{route('chart-two')}}" graph-type="c2"  class="form-control form-control-solid reportrange"  placeholder="Pick date range" autocomplete="off" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="c2">
                                <div id="columnchart_material" style="height: 350px"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6">
                    <div class="card border card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Deals</span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav" id="kt_chart_widget_8_tabs">
                                    <li class="nav-item">
                                        <div class="input-group mb-3">
                                            <input type="text" name="mydaterenge" data-route="{{route('chart-three')}}" graph-type="c3"  class="form-control form-control-solid reportrange"  placeholder="Pick date range" autocomplete="off" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="c3">
                                <div id="dealschart" style="height: 350px"></div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xl-6">
                    <div class="card border card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Product Stage</span>
                                <span class="text-muted fw-bold fs-7">No. of Companies</span>
                            </h3>

                            <div class="card-toolbar">
                                <ul class="nav" id="kt_chart_widget_8_tabs">
                                    <li class="nav-item">
                                        <div class="input-group mb-3">
                                            <input type="text" name="mydaterenge"  data-route="{{route('chart-four')}}" graph-type="c4"  class="form-control form-control-solid  reportrange"  placeholder="Pick date range" autocomplete="off" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="c4">
                            <div id="product" style="height: 350px"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6">
                    <div class="card border card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Companies</span>
                                <span class="text-muted fw-bold fs-7">{{$startups}}</span>
                            </h3>

                            <div class="card-toolbar">
                                <ul class="nav" id="kt_chart_widget_8_tabs">
                                    <li class="nav-item">
                                        <div class="input-group mb-3">
                                            <input type="text" name="mydaterenge" data-route="{{route('chart-five')}}" graph-type="c5"  class="form-control form-control-solid reportrange"  placeholder="Pick date range" autocomplete="off" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="c5">
                                <div id="chartdiv1" style="height: 350px"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <!--begin::Team Section-->
        <div class="container">
            <div class="py-10 py-lg-20">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-center mb-12">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">News and insights
                        </h3>
                        <!--end::Title-->
                        <!--begin::Sub-title-->
                        <div class="fs-5 text-muted fw-bold">It’s no doubt that when a development takes longer to complete,
                            additional costs to
                            <br />integrate and test each extra feature creeps up and haunts most of us.
                        </div>
                        <!--end::Sub-title=-->
                    </div>
                    <!--end::Heading-->


                    <!--begin::Section-->
                    <div class="mb-17">
                        <!--begin::Content-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Title-->
                            <h3 class="text-black">News</h3>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <a href="{{url('blog')}}" class="fs-6 fw-bold link-primary">View All News</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            @for ($i = 1; $i<=3; $i++)
                                @if (!isset($post['title_'.$i]))
                                        @continue
                                @endif
                                <div class="col-md-4">
                                    <!--begin::Hot sales post-->
                                    <div class="card-xl-stretch me-md-6">
                                        
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{$post['image_'.$i]}}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{$post['image_'.$i]}}')"></div>
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
                                            <a href="{{$post['link_'.$i]}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">
                                                {{$post['title_'.$i]}}
                                            </a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">{!!Str::limit($post['content_'.$i],80)!!}</div>
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
                <!--end::Container-->
            </div>
        </div>
        <!--end::Team Section-->

</div>



@endsection

@push('js')

<script src="{{$assetsurl}}/assets/plugins/custom/amcharts5/index.js"></script>
<script src="{{$assetsurl}}/assets/plugins/custom/amcharts5/xy.js"></script>
<script src="{{$assetsurl}}/assets/plugins/custom/amcharts5/themes/Animated.js"></script>
<script src="{{$assetsurl}}/assets/plugins/custom/amcharts5/percent.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  



<script >

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawSeriesChart);
    function drawSeriesChart() {
        var data = google.visualization.arrayToDataTable([
            <?=rtrim($chartOne,',')?>
        ]);
        var options = {
            title: '',
            hAxis: {title: 'Number Of Company'},
            vAxis: {title: 'Number Of Deals'},
            bubble: {textStyle: {fontSize: 11}},
            colorAxis: {colors: ['yellow', 'green']}
        };
        var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
        chart.draw(data, options);
    }

</script>  





<script >

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable(
            [
                <?=rtrim($chartDataTwo,',')?>
            ]
        );
        var options = {
          chart: {
            title: 'Performance',
            subtitle: '',
          }
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>








<script>
        
    function getJsonData1(req_url){
        var php_data;
        $.ajax({
            type: 'POST',
            url: req_url,
            data: {"_token": "{{ csrf_token() }}","mydaterenge":$('.chartOneDate').val()},
            async: false,
            success: function (respo) {
                php_data = respo;
            }
        });
        return php_data;
    }

    // // Get 
    var surl = "{{route('chart-three')}}";
    var chartDatThree = getJsonData1(surl);
    // console.log(chartDatThree);

        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("dealschart");
            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                layout: root.verticalLayout
            }));

            // Add legend
            // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
            var legend = chart.children.push(
                am5.Legend.new(root, {
                    centerX: am5.p50,
                    x: am5.p50
                })
            );

            var data = chartDatThree

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                categoryField: "year",
                renderer: am5xy.AxisRendererX.new(root, {
                    cellStartLocation: 0.1,
                    cellEndLocation: 0.9
                }),
                tooltip: am5.Tooltip.new(root, {})
            }));
            xAxis.data.setAll(data);
            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            function makeSeries(name, fieldName) {

                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    name: name,
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: fieldName,
                    categoryXField: "year"
                }));

                series.columns.template.setAll({
                    tooltipText: "{name}, {categoryX}:{valueY}",
                    width: am5.percent(90),
                    tooltipY: 0
                });

                series.data.setAll(data);

                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                series.appear();

                series.bullets.push(function() {
                    return am5.Bullet.new(root, {
                        locationY: 0,
                        sprite: am5.Label.new(root, {
                            text: "{valueY}",
                            fill: root.interfaceColors.get("alternativeText"),
                            centerY: 0,
                            centerX: am5.p50,
                            populateText: true
                        })
                    });
                });

                legend.data.push(series);
            }

            makeSeries("Deals", "Deals");
            makeSeries("Investment", "Investment");
            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>

    

<script>


        am5.ready(function() {

            var php_data;
            var surl1 = "{{route('chart-four')}}";
            $.ajax({
                type: 'POST',
                url: surl1,
                data: {"_token": "{{ csrf_token() }}","mydaterenge":''},
                async: false,
                success: function (respo) {
                    php_data = respo;
                }
            });


            var chartDatFour = php_data;
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("product");
            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                pinchZoomX: true
            }));
            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);
            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });
            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });
            
            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "country",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Create series
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "country",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            var data = chartDatFour;
            xAxis.data.setAll(data);
            series.data.setAll(data);
            series.appear(1000);
            chart.appear(1000, 100);

        }); 
    </script>



<script>

        

function getJsonData5(req_url){
    var php_data;
    $.ajax({
        type: 'POST',
        url: req_url,
        data: {"_token": "{{ csrf_token() }}","mydaterenge":$('.chartOneDate').val()},
        async: false,
        success: function (respo) {
            php_data = respo;
        }
    });
    return php_data;
}

// // Get 
var surl5 = "{{route('chart-five')}}";
var chartDatFive = getJsonData5(surl5);
 console.log(chartDatFive);


        am5.ready(function() {
            var root = am5.Root.new("chartdiv1");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            var chart = root.container.children.push(am5percent.PieChart.new(root, {
                layout: root.verticalLayout,
                innerRadius: am5.percent(40)
            }));

            var series0 = chart.series.push(am5percent.PieSeries.new(root, {
                valueField: "bottles",
                categoryField: "name",
                alignLabels: false
            }));

            var bgColor = root.interfaceColors.get("background");

            series0.ticks.template.setAll({
                forceHidden: true
            });
            series0.labels.template.setAll({
                forceHidden: true
            });
            series0.slices.template.setAll({
                stroke: bgColor,
                strokeWidth: 2,
                tooltipText: "{category}: {valuePercentTotal.formatNumber('0.00')}% ({value} bottles)"
            });
            series0.slices.template.states.create("hover", {
                scale: 0.95
            });

            var series1 = chart.series.push(am5percent.PieSeries.new(root, {
                valueField: "companies",
                categoryField: "name",
                alignLabels: true
            }));

            series1.slices.template.setAll({
                stroke: bgColor,
                strokeWidth: 2,
                tooltipText: "{category}: {valuePercentTotal.formatNumber('0.00')}% ({value} companies)"
            });

            data = chartDatFive;
            series0.data.setAll(data);
            series1.data.setAll(data);

            series0.appear(1000, 100);
            series1.appear(1000, 100);

        }); // end am5.ready()
    </script>


<script>

    var start = moment().subtract(29, "days").startOf("hour");
    var end = moment().startOf("hour").add(32, "hour");
    function cb(start, end) {
        $(".reportrange").html(start.format("YYYY-MM-DD") + " / " + end.format("YYYY-MM-DD"));
        $(".reportrange").val('');
    }

  
    $('.reportrange').daterangepicker({
        // "showDropdowns": true,

        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        "alwaysShowCalendars": true,
        "startDate": start,
        "endDate": end,
        locale : {
            separator: ' / ',
            format : 'YYYY-MM-DD',
        },
        }, function (start, end, label) {
            
            var daterage=start.format('YYYY-MM-DD')+' / '+end.format('YYYY-MM-DD');
                var url=this.element.attr('data-route');
                var graphtype=this.element.attr('graph-type');
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {"_token": "{{ csrf_token() }}","mydaterenge":daterage},
                    async: false,
                    success: function (res) {
                        $('#'+graphtype).html(res);
                    }
                });
        });



      

</script>


@endpush




