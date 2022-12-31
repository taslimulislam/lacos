

<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    @php
                        if(@$info->logo){
                        $dom = explode('//',$info->logo);
                        if(count($dom)>1){
                            $img = @$info->logo;
                        }else{
                            $img =  url('/public/storage/'.@$info->logo);
                        }
                        }else{
                            $img = url('/public/demoimg/placeholder.jpg');
                        }
                    @endphp 
                    <img src="{{$img}}" alt="image" class="border-dotted" />
                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                </div>
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
                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{@$info->name}}</a>
                        </div>
                        <!--end::Name-->



                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                            <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                            <span class="svg-icon svg-icon-4 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{@$info->industry?$info->industry->name:'---'}}</a>
                            
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                    <!--begin::Actions-->
                    
                    <!--end::Actions-->
                </div>
                <!--end::Title-->
                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--end::Svg Icon-->
                                    <div class="fs-2 fw-bolder">{{@$info->year_launched}}</div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-bold fs-6 text-gray-400">Year Launched</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                             <!--begin::Stat-->
                             <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{@$info->num_of_investment}}" data-kt-countup-prefix="$">0</div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-bold fs-6 text-gray-400">No. of investments</div>
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
                            <span class="fw-bold fs-6 text-gray-400">Profile Compleation</span>
                            <span class="fw-bolder fs-6">{{@$profileMark}}%</span>
                        </div>
                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                            <div class="bg-success rounded h-5px" role="progressbar" style="width: {{@$profileMark}}%;" aria-valuenow="{{@$profileMark}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!--end::Progress-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->


        <!--begin::Navs-->
        <div class="d-flex overflow-auto h-55px">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ hasActive('overview') }}" href="{{url('userpanel/overview')}}">Overview</a>
                </li>
                <!--end::Nav item-->

                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ hasActive('team-list') }}" href="{{route('userpanel.team-list')}}">Team</a>
                </li>
                <!--end::Nav item-->

                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ hasActive('news-list') }}" href="{{route('userpanel.news-list')}}">News</a>
                </li>
                <!--end::Nav item-->

                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ hasActive('report-list') }}" href="{{route('userpanel.report.list')}}">Report</a>
                </li>
                <!--end::Nav item-->

                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ hasActive('event-list') }}" href="{{route('userpanel.event.list')}}">Event</a>
                </li>
                <!--end::Nav item-->

                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 {{ hasActive('tag-list') }}" href="{{route('userpanel.tag.list')}}">Tag </a>
                </li>
                <!--end::Nav item-->
               
            </ul>
        </div>
        <!--begin::Navs-->
    </div>
</div>
								<!--end::Navbar-->