@extends('dashboard.app')
@push('css')
@endpush
@section('content')
  <!--Content Header (Page header)-->
  <div class="content-header row align-items-center g-0">
    <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last text-sm-end mb-3 mb-sm-0">
        <ol class="breadcrumb rounded d-inline-flex fw-semi-bold fs-13 bg-white mb-0 shadow-sm">
            <li class="breadcrumb-item"><a href="#">{{ __('default.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ __('country.Country') }}</a></li>
            <li class="breadcrumb-item active">{{ __('country.Country') }} / {{ __('default.Edit') }}</li>
        </ol>
    </nav>
    <div class="col-sm-8 header-title">
        <div class="d-flex align-items-center">
            <div class="header-icon d-flex align-items-center justify-content-center rounded shadow-sm text-success flex-shrink-0">
                <i class="typcn typcn-document-text"></i>
            </div>
            <div class="">
                <h1 class="fw-bold">{{__("country.Country Management")}}</h1>
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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{__("country.Edit Country")}}</h6>
                        </div>
                        <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                <a href="{{route('countries.index')}}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>&nbsp{{__('country.Country List')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('countries.update',$country->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="card-body col-md-4 offset-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    @input(['input_name' => 'title' , 'value' => $country->title])
                                </div>
                                <div class="col-md-12 mt-5">
                                    @imageWithPreview(['input_name' => 'thumbnail' , 'preview_image' => @$country->picture ? $country->picture->febicon : null])
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
                                                <input type="radio" name="status"  value="1" {{ ($country->status=="1")? "checked" : "" }} >&nbsp;Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="status"  value="0" {{ ($country->status=="0")? "checked" : "" }} >&nbsp;Inactive
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-md-4">
                        </div>
                    </div>
                    <div class="card-footer form-footer">
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
