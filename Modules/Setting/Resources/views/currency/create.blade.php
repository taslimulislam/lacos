@extends('backend.layouts.app')
@push('css')
@endpush
@section('content')
  <!--Content Header (Page header)-->
  <div class="content-header row align-items-center g-0">
    <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last text-sm-end mb-3 mb-sm-0">
        <ol class="breadcrumb rounded d-inline-flex fw-semi-bold fs-13 bg-white mb-0 shadow-sm">
            <li class="breadcrumb-item"><a href="#">{{ __('default.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ __('currency.Currency') }}</a></li>
            <li class="breadcrumb-item active">{{ __('currency.Currency') }} / {{ __('default.Create') }}</li>
        </ol>
    </nav>
    <div class="col-sm-8 header-title">
        <div class="d-flex align-items-center">
            <div class="header-icon d-flex align-items-center justify-content-center rounded shadow-sm text-success flex-shrink-0">
                <i class="typcn typcn-document-text"></i>
            </div>
            <div class="">
                <h1 class="fw-bold">{{__("Currency Management")}}</h1>
            </div>
        </div>
    </div>
</div>
<!--/.Content Header (Page header)-->
<div class="body-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 fw-semi-bold mb-0">{{__("Create Currency")}}</h6>
                        </div>
                        <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                <a href="{{route('currencies.index')}}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>&nbsp{{__('Currency List')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('currencies.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="card-body col-md-6 offset-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    @input(['input_name' => 'title'])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @input(['input_name' => 'symbol'])
                                </div>
                                <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                    <label class="col-sm-3 col-form-label ps-0">Country<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 pe-0">
                                        <select name="country_id" id="country_id" class="form-control {{ $errors->first('country_id') ? 'is-invalid' : '' }} form-control-sm basic-single" >
                                            <option value="">Select One</option>
                                            @foreach($countries as $key => $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            <div class="error text-danger">{{ $errors->first('country_id') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    @radio(['input_name'=>'status','data_set' => [1 => 'Active' ,0 => 'Inactive'], 'value' => 1])
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-md-3">
                        </div>
                    </div>
                    <div class="card-footer form-footer text-end">
                        <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush
