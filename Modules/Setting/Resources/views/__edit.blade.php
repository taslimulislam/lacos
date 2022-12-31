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
                <h1 class="fw-bold">{{__("Application Management")}}</h1>
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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{__("Edit Application")}}</h6>
                        </div>
                        {{-- <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                <a href="{{route('applications.index')}}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>&nbsp{{__('Application List')}}</a>
                            </div>
                        </div> --}}
                    </div>
                </div>


                
                <form action="{{route('applications.update',$app->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="card-body col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    @input(['input_name' => 'title' , 'value' => $app->title])
                                </div>
                                <div class="col-md-6">
                                    @input(['input_name' => 'email','type'=>'email' , 'value' => $app->email])
                                </div>
                                <div class="col-md-6">
                                    @input(['input_name' => 'phone','type'=>'number', 'value' => $app->phone])
                                </div>
                                <div class="col-md-6">
                                    @input(['input_name' => 'tax_no','required' => false, 'value' => $app->tax_no])
                                </div>
                                <div class="col-md-6">
                                    @textarea(['input_name' => 'address', 'value' => $app->address ])
                                </div>
                                <div class="col-md-6">
                                    @textarea(['input_name' => 'footer_text', 'value' => $app->footer_text])
                                </div>
                                {{-- <div class="col-md-6 mt-2">
                                    <label class="role col-md-3 mt-2">Currency<span class="text-danger">*</span></label>
                                    <select name="currency_id" id="currency_id" class="form-control {{ $errors->first('currency_id') ? 'is-invalid' : '' }} form-control-sm basic-single" >
                                        <option value="">Select One</option>
                                        @foreach($currencies as $key => $currency)
                                        <option value="{{  $currency->id }}" {{ $app->currency_id == $currency->id ? 'selected' : ''}}>{{ $currency->title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('currency_id'))
                                        <div class="error text-danger">{{ $errors->first('currency_id') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label class="role col-md-3 mt-2">Language</span></label>
                                    <select name="language_id" id="language_id" class="form-control  form-control-sm basic-single" >
                                        <option value="">Select One</option>
                                        @foreach($langs as $key => $lang)
                                        <option value="{{  $lang->id }}" {{ $app->language_id == $lang->id ? 'selected' : ''}}>{{ $lang->title}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                {{-- <div class="col-md-6 mt-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                          <label>{{ __('form.rtl_ltr') }}</label>
                                        </div>
                                        <div class="col-md-1">
                                            :
                                        </div>
                                        <div  class="col-md-7 ">
                                            <input type="radio" name="rtl_ltr"  value="1" {{ ($app->rtl_ltr=="1")? "checked" : "" }} >&nbsp;LTR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="rtl_ltr"  value="2" {{ ($app->rtl_ltr=="2")? "checked" : "" }} >&nbsp;RTL
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>


                        <div class="card-body col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    @imageWithPreview(['input_name' => 'logo','preview_image' => @$app->logo ? $app->logo : null])
                                </div>
                                <div class="col-md-12 mt-5">
                                    @imageWithPreview(['input_name' => 'febicon','preview_image' => @$app->picture ? $app->picture->febicon : null])
                                </div>

                            </div>
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
