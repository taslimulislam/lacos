@extends('backend.layouts.app')
@push('css')
@endpush
@section('content')
  <!--Content Header (Page header)-->
  <div class="content-header row align-items-center g-0"> 
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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{__("Edit Currency")}}</h6>
                        </div>
                        <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                <a href="{{route('currencies.index')}}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>&nbsp{{__('Currency List')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('currencies.update',$currency->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="card-body col-md-6 offset-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    @input(['input_name' => 'title' , 'value' => $currency->title])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @input(['input_name' => 'symbol' , 'value' => $currency->symbol])
                                </div>                              
                                <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                    <label class="col-sm-3 col-form-label ps-0">Country<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 pe-0">
                                        <select name="country_id" id="country_id" class="form-control {{ $errors->first('country_id') ? 'is-invalid' : '' }} form-control-sm basic-single" >
                                            <option value="">Select One</option>
                                            @foreach($countries as $key => $country)
                                            <option value="{{  $country->id }}" {{ ($country->id ==  $currency->country_id) ? 'selected' : ''}}>{{ $country->country_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            <div class="error text-danger">{{ $errors->first('country_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                              <label>Status</label>
                                            </div>
                                            <div class="col-md-1">
                                                :
                                            </div>
                                            <div  class="col-md-7 ">
                                                <input type="radio" name="status"  value="1" {{ ($currency->status=="1")? "checked" : "" }} >&nbsp;Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="status"  value="0" {{ ($currency->status=="0")? "checked" : "" }} >&nbsp;Inactive
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-md-3">
                        </div>
                    </div>
                    <div class="card-footer form-footer">
                        <button type="submit" class="btn btn-primary btn-sm ">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush
