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

              @if (!empty($investors))

              @foreach ($investors as $item)

    

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
                              if(count($dom)>1){
                                $img = $item->logo;
                              }else{
                                $img =   getImage($item->logo);
                              }

                            }else{
                              $img = url('/public/demoimg/placeholder.jpg');
                            }
                          @endphp 
                          
                          <!--begin::Image-->
                          <img src="{{ $img }}" alt="{{ @$item->company_name }}" alt="" class="h-100px p-1 rounded-circle shadow-sm w-100px">
                          <!--end::Image-->
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <!--begin::Heading-->
                          <div class="fs-1 fw-bolder mb-0"><a href="{{route('investor.detail',$item->uuid)}}"> {{$item->company_name}} </a></div>
                          <!--end::Heading-->
                          <div class="fs-6 fw-bold text-primary">{{$item->investmentStage?$item->investmentStage->name:'---'}}</div>
                        </div>
                      </div>
                    </div>
                    <!--end::Card title-->
                  </div>
                  <!--end::Card header-->

                  {{-- @dd($item->investment_stage); --}}

                  <!--begin::Card body-->
                  <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                    <!--begin::Indicator-->
                    <div class="d-flex align-items-center fw-bold">
                      <span class="badge bg-light-primary me-2 px-3 py-2 text-primary"> {{$item->industry?$item->industry->name:'---'}}</span>
                    </div>
                    <!--end::Indicator-->
                    <!--begin::Stats-->
                    <div class="fw-bold text-gray-400 mt-5 fs-6"> {{Str::limit($item->about,80)}}</div>
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
                  {{ $investors->onEachSide(1)->links() }}
              </ul>
              <!--end::Pages-->
            </div>
            <!--end::Pagination-->

          
          </div>
          <!--end::Post-->
        </div>
        <!--end::Container-->

      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    

@endsection

