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
              <h1 class="d-flex fs-2hx fw-bolder text-white">Statistical reports</h1>
              <!--end::Title-->
              <p class="fs-4 text-white">Access a collection of statistical analysis and interpretation of data<br> in
                order to uncover patterns and trends.</p>
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


             <!--begin::Layout-->
             <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                    <!--begin::Form-->
                    <form class="form" action="#" id="kt_subscriptions_create_new">
                        <!--begin::Customer-->
                        <div class="card card-flush pt-3 mb-5 mb-lg-10">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bolder">{{$report['name']}}</h2>
                                </div>
                                <!--begin::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Selected customer-->
                                <div class="d-flex align-items-center mb-8">
                                    <img class="w-100 h-350px" alt="Pic" src="{{$report['report_image']}}" />
                                </div>
                                <!--end::Selected customer-->
                              
                                <!--begin::Notice-->
                                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-bold">
                                            <h4 class="text-gray-900 fw-bolder">Report Details</h4>
                                            <div class="fs-6 text-gray-700">{{$report['about_report']}}</div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Customer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
                
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
                    <!--begin::Card-->
                    <div class="card card-flush pt-3 mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px"
                        data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                        <!--begin::Card header-->
                        <div class="card-header border-bottom">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Summary</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->

                        @if($buyinfo)


                        <div class="card-body pt-0 fs-6">

                            <!--begin::Table-->
                            <div class="table-responsive  mb-9">

                                <table class="table mb-3">
                                    
                                    <tbody>
                                        <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                            <td>Buy Date</td>
                                            <td class="fs-5 text-dark fw-boldest">{{$buyinfo->created_at}}</td>
                                        </tr>
                                        <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                            <td>Buy Price</td>
                                            <td class="fs-5 text-dark fw-boldest">${{$buyinfo->buy_price}}</td>
                                        </tr>
                                        <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                            <td>Download Doc</td>
                                            <td class="fs-5 text-dark fw-boldest"><a href="{{url('/public/storage/').'/'.$buyinfo->report->report_doc}}" target="_blank" class="btn btn-success"><i class="fa fa-download"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                           
                        </div>

                        @else
                        <!--begin::Card body-->
                        <div class="card-body pt-0 fs-6">
                            {{-- @dd(Session::has('message')); --}}
                            @if (Session::has('message'))
                                <div class="alert alert-success"> <strong>Success!</strong> {{ Session::get('message') }}</div>
                            @endif
                            @if (Session::has('exception'))
                                <div class="alert alert-danger"> <strong>Wops!</strong> {{ Session::get('exception') }}</div>
                            @endif
                            
                            <!--begin::Section-->
                            {{-- <div class="mb-7">
                                <!--begin::Title-->
                                <h5 class="mb-3">Customer details</h5>
                                <!--end::Title-->
                                <!--begin::Details-->
                                <div class="d-flex align-items-center mb-1">
                                    <!--begin::Name-->
                                    <a href="../../demo2/dist/apps/customers/view.html" class="fw-bolder text-gray-800 text-hover-primary me-2">Sean Bean</a>
                                    <!--end::Name-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Email-->
                                <a href="#" class="fw-bold text-gray-600 text-hover-primary">sean@dellito.com</a>
                                <!--end::Email-->
                            </div> --}}
                            <!--end::Section-->
                            <!--begin::Seperator-->
                            <div class="separator separator-dashed mb-7"></div>
                            <!--end::Seperator-->

                            <form action="{{route('report.buy')}}" method="GET" >
                                @csrf
                                <!--begin::Section-->
                                <div class="mb-10">
                                    <!--begin::Title-->

                                    <!--end::Title-->
                                    <!--begin::Details-->
                                    <div class="mb-0">
                                        <!--begin::Card info-->
                                        <label class="required fs-5 fw-bolder form-label mb-4">Payment Method</label>
                                        <select name="payment_method" required  class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Payment type">
                                            <option></option>
                                            <option value="Flutterwave">Flutterwave</option>
                                        </select>
                                        @error('payment_method')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <!--end::Card info-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Section-->

                                <!--begin::Seperator-->
                                <div class="separator separator-dashed mb-7"></div>
                                <!--end::Seperator-->
                                    <input type="hidden" name="report_id" value="{{$report['uuid']}}">
                                <!--begin::Content-->
                                <div class="flex-grow-1 mb-8">
                                    
                                    <!--begin::Table-->
                                    <div class="table-responsive border-bottom mb-9">
                                        <table class="table mb-3">
                                            <thead>
                                                <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                    <th class="min-w-80px text-end pb-2">Rate</th>
                                                    <th class="min-w-100px text-end pb-2">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td>${{$report['price']}}</td>
                                                    <td class="fs-5 text-dark fw-boldest">${{$report['price']}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->

                                    <!--begin::Container-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Section-->
                                        <div class="mw-300px">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountname-->
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Subtotal:</div>
                                                <!--end::Accountname-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bolder fs-6 text-gray-800">$ {{$report['price']}}</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountname-->
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">VAT 0%</div>
                                                <!--end::Accountname-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bolder fs-6 text-gray-800">0.00</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Subtotal + VAT</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bolder fs-6 text-gray-800">$ {{$report['price']}}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Code-->
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Total</div>
                                                <!--end::Code-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bolder fs-6 text-gray-800">$ {{$report['price']}}</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Actions-->
                                <div class="mb-0 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary actionBtn" id="kt_subscriptions_create_button">                                      
                                        <span class="indicator-label">Pay Now</span>                                      
                                    </button>
                                </div>
                            </form>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card body-->
                        @endif
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
            
          </div>
          <!--end::Post-->
        </div>
        <!--end::Container-->

      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    
    <script>
        var showCallBackData = function() {
            location.reload();
        }
    </script>

@endsection

