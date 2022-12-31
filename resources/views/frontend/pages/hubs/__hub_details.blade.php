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
                        <h1 class="d-flex text-white fw-bolder my-1 fs-3">{{$hub->name}}</h1>
                        <!--end::Title-->
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
               
                     <!--begin::Navbar-->
                     <div class="card mb-6">
                        <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="align-items-center d-flex flex-sm-nowrap flex-wrap mb-3">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                @php
                                    if($hub->logo){
                                    $dom = explode('//',$hub->logo);
                                    if(count($dom)>1){
                                        $img = $hub->logo;
                                    }else{
                                        $img =  url('/public/storage/'.@$hub->logo);
                                    }

                                    }else{
                                        $img = url('/public/demoimg/placeholder.jpg');
                                    }
                                @endphp 
                                <img src="{{$img}}" alt="image" class="h-70px" />
                            </div>
                            <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2">
                                    <h3 href="#" class="text-gray-900 fs-1 fw-bolder me-1 mb-0">{{ @$hub->name }}</h3>
                                    
                                </div>
                                <!--end::Name-->

                                <!--begin::Description-->
                                <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">{{$hub->industry?$hub->industry->name:'---'}}
                                </div>
                                <!--end::Description-->
                                </div>
                                <!--end::User-->
                                
                                
                            </div>
                            <!--end::Title-->
        
        
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                    
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{@$hub->year_launched}}" data-kt-countup-prefix="">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Launched Year</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{@$hub->num_of_investment}}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Investment</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->


                                <!--begin::Progress-->
                                <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-bold  text-gray-400">Profile Compleation</span>
                                        <span class="fw-bolder fs-6">{{@$profileMark}}%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: {{@$profileMark}}%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->

                            
                        </div>
                        <!--end::Details-->
       
                        </div>
                    </div>
                    <!--end::Navbar-->

                <!--begin::Home card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-xl-10 p-xlx-20">
                    <!--begin::Section-->
                    <div class="mb-17">
                        <!--begin::Row-->
                        <div class="row g-4">
                        <!--begin::Col-->
                        <div class="col-md-4">
                            <div class="bg-light p-8 rounded-3">
                            <div class="mb-8">
                                <!--begin::Heading-->
                                <h2 class="fw-bold fw-bolder mb-8 text-center">Company Profile</h2>
                                <!--end::Heading-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">

                                    <!--begin::Stat-->
                                    <div class="bg-white border-gray-300 mb-3 me-3 px-4 py-3 rounded shadow-sm text-center">
                                        <div class="fs-3 fw-bolder">{{$hub->year_launched}}</div>
                                        <!--begin::Label-->
                                        <div class="fw-bold  text-gray-400">Founded</div>
                                        <!--end::Label-->
                                    </div>

                                    <!--begin::Stat-->
                                    <div class="bg-white border-gray-300 mb-3 me-3 px-4 py-3 rounded shadow-sm text-center">
                                        <div class="fs-3 fw-bolder">{{$hub->num_of_investment}}</div>
                                        <!--begin::Label-->
                                        <div class="fw-bold  text-gray-400">Investment</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->


                                    
                                </div>
                                <!--end::Stats-->
                                </div>
                            </div>
                            <div class="mb-8">
                                <!--begin::Heading-->
                                <h4 class="fw-bold fw-bolder mb-3">Geographhical Markets</h4>
                                <!--end::Heading-->
                                <div class="fw-bold">
                                    {{$hub->country?$hub->country->country_name:'---'}}
                                </div>
                            </div>

                 

                            <div class="mb-8">
                                <div class="d-flex mb-4">
                                <div class="flex-shrink-0">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Earth.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="9" />
                                        <path
                                            d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z"
                                            fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <a href="#" class="flex-grow-1 fw-bold ms-2">{{$hub->web_link}}</a>
                                </div>

                                <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Map/Marker1.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="flex-grow-1 fw-bold ms-2">
                                    <address>
                                        {{$hub->address}}
                                    </address>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-8 pe-xxl-15 order-md-first">
                            <div class="mb-10">
                                <!--begin::Title-->
                                <h2 class="fw-bold fw-bolder mb-4">About</h2>
                                <!--end::Title-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed mb-9"></div>
                                <!--end::Separator-->
                                <p class="fw-bold fs-5 mt-4 text-gray-600 text-dark">{{ @$hub->about }}</p>
                            </div>
                            <div class="mb-10">
                            <!--begin::Title-->
                            <h2 class="fw-bold fw-bolder mb-4">Tags</h2>
                            <!--end::Title-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed mb-9"></div>
                            <!--end::Separator-->
                            <div class="d-flex flex-wrap">
                                @if ($tags)
                                    @foreach ($tags as $item)
                                    <a href="javascript:void(0)" class="badge bg-light-primary border border-primary mb-2 me-2 px-3 py-2 text-primary">{{$item->tag_name}}</a>
                                    @endforeach
                                @endif
                                
                            </div>
                            </div>
                            <div class="mb-10">
                            <!--begin::Title-->
                            <h2 class="fw-bold fw-bolder mb-4">Our Great Team</h2>
                            <!--end::Title-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed mb-9"></div>
                            <!--end::Separator-->
                            <!--begin::Wrapper-->
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gy-10">

                                <!--begin::Item-->
                                @if ($tags)
                                    @foreach ($teams as $item)

                                    @php
                                        if($item->image){
                                            $img =  url('/public/storage/'.@$item->image);
                                        }else{
                                            $img = url('/public/demoimg/placeholder.jpg');
                                        }
                                    @endphp
        
                                    <div class="col text-center mb-9">
                                    <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-2 d-flex w-100px h-100px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('{{$img}}')"></div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="javascript:void(0)"
                                            class="text-dark fw-bold text-hover-primary fs-3">{{$item->name}}</a>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold">{{$item->position}}</div>
                                            <!--begin::Position-->
                                        </div>
                                    <!--end::Person-->
                                    </div>
                                    @endforeach
                                @endif
                                <!--end::Item-->

                            </div>
                            <!--end::Wrapper-->
                            </div>
                            <!--begin::Title-->
                            <h2 class="fw-bold fw-bolder mb-4">In The News</h2>
                            <!--end::Title-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed mb-9"></div>
                            <!--end::Separator-->
                            <!--begin::Post-->
                            @if ($tags)
                            @foreach ($news as $item)

                            @php
                                if($item->news_image){
                                    $img =  url('/public/storage/'.@$item->news_image);
                                }else{
                                    $img = url('/public/demoimg/placeholder.jpg');
                                }
                            @endphp 
                            
                            <div class="mb-16 mt-md-0 mt-17">

                                <!--begin::Body-->
                                <div class="mb-6">
                                    <!--begin::Title-->
                                    <a href="{{$item->news_link}}" target="__blank" class="fw-bolder text-dark mb-4 fs-2 lh-base text-hover-primary">{{$item->news_title}}</a>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fw-bold fs-5 mt-4 text-gray-600 text-dark">{{$item->description}}</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Body-->
                            
                                <!--begin::Footer-->
                                <div class="d-flex flex-stack flex-wrap">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pe-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle me-3">
                                        <img src="{{$img}}" class="" alt="" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Text-->
                                    <div class="fs-5 fw-bolder">
                                        <a href="javascript:void(0)"
                                        class="text-gray-700 text-hover-primary">{{@$hub->name}}</a>
                                        <span class="text-muted">on {{$item->created_at}}</span>
                                    </div>
                                    <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                
                                </div>
                                <!--end::Footer-->

                            </div>
                            @endforeach
                            @endif
                            <!--end::Post-->
                        </div>
                        </div>
                        <!--begin::Row-->
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

