@extends('frontend.layouts.app')

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
        <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
          <!--begin::Container-->
          <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
              <!--begin::Page title-->
              <div class="page-title d-flex flex-column me-3">
                  <!--begin::Title-->
                  <h1 class="d-flex text-white fw-bolder my-1 fs-3">{{$event->event_title}}</h1>
                  <!--end::Title-->
              </div>
              <!--end::Page title-->
              <!--begin::Actions-->
              <div class="d-flex align-items-center py-3 py-md-1">
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
              <!--begin::Home card-->
              <div class="card">
                  <!--begin::Body-->
                  <div class="card-body p-xl-10 p-xlx-20">
                      <!--begin::Section-->
                      <div class="mb-17">
                          <!--begin::Row-->
                          <div class="row g-4">
                              <!--begin::Col-->
                              <div class="col-12 pe-xxl-15 order-md-first">

                                  <div class="mb-10">
                                      <h2 class="fw-bold fw-bolder mb-4">{{$event->event_title}}</h2>
                                      <div class="separator separator-dashed mb-9"></div>
                                      <div class="d-flex align-items-center mb-8">
                                          <img class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" alt="Pic" src="{{getImage($event->image)}}" />
                                      </div>
                                      <p class="fw-bold fs-5 mt-4 text-gray-600 text-dark">{{$event->description}}</p>
                                  </div>

                                  @if($event->link)
                                    <div class="mb-10">
                                      <a href="{{$event->link}}" class="btn btn-lg btn-success text-center w-100">Join With Us</a>
                                    </div>
                                  @endif

                                  <div class="mb-10">
                                      <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="text-center fw-bold fs-7 ">
                                                <th class="min-w-125px">Event Start Date</th>
                                                <th class="min-w-125px">Event End Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-bold text-center">
                                            <!--begin::Table row-->
                                            <tr>
                                              <td>{{ date('d-M-Y',strtotime($event->start_date)) }}</td>
                                              <td>{{ date('d-M-Y',strtotime($event->end_date)) }}</td>
                                            </tr>
                                            <!--end::Table row-->
                                        </tbody>
                                      </table>
                                  </div>

                                  <div class="mb-10">
                                      <!--begin::Title-->
                                      <h2 class="fw-bold fw-bolder mb-4">Our Great Speaker</h2>
                                      <!--end::Title-->
                                      <!--begin::Separator-->
                                      <div class="separator separator-dashed mb-9"></div>
                                      <!--end::Separator-->
                                      <!--begin::Wrapper-->
                                      <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gy-10">

                                        @foreach ($event->speakers as $speaker)
                                            
                                          <!--begin::Item-->
                                          <div class="col text-center mb-9">
                                              <!--begin::Photo-->
                                              <div class="octagon mx-auto mb-2 d-flex w-100px h-100px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{getImage($speaker->speaker_image,StoragePath::speaker)}}')"></div>
                                              <!--end::Photo-->
                                              <!--begin::Person-->
                                              <div class="mb-0">
                                                  <!--begin::Name-->
                                                  <a href="#" class="text-dark fw-bold text-hover-primary fs-3">{{$speaker->speaker_name}}</a>
                                                  <!--end::Name-->
                                                  <!--begin::Position-->
                                                  <div class="text-muted fs-6 fw-semibold">{{$speaker->speaker_position}}</div>
                                                  <!--begin::Position-->
                                              </div>
                                              <!--end::Person-->
                                          </div>
                                          <!--end::Item-->
                                          @endforeach
                                      </div>
                                      <!--end::Wrapper-->
                                  </div>
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

