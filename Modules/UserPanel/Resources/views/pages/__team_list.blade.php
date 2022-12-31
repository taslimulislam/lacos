@extends('userpanel::layouts.master')
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
                    <h1 class="d-flex text-white fw-bolder my-1 fs-3">{{ @$startup->name }}</h1>
                    <!--end::Title-->
                    </div>
                </div>
                <!--end::Container-->
            </div>
            <!--end::Toolbar-->


            <!--begin::Container-->
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container mb-15">
                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">

                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container">
                            
                            <!--begin::Navbar-->
                            @if (auth()->user()->user_type_id==3)
                                @include('userpanel::layouts.header')
                            @endif
                            @if (auth()->user()->user_type_id==4)
                                @include('userpanel::components.investors.__header')
                            @endif
                            @if (auth()->user()->user_type_id==5)
                                @include('userpanel::components.hubs.__header')
                            @endif
                            <!--end::Navbar-->
                            
                            <!--begin::Row-->
                            @include('userpanel::components.__team_list')
                            <!--end::Row-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                  
                </div>
                <!--end::Post-->
            </div>
            <!--end::Container-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->

@endsection


