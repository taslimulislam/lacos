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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{__("Create Application")}}</h6>
                        </div>

                        {{-- <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                <a href="{{route('applications.index')}}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>&nbsp{{__('Application List')}}</a>
                            </div>   
                        </div> --}}
                        
                    </div>
                </div>
                <form action="{{route('applications.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="card-body col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    @input(['input_name' => 'title' , ])
                                    @input(['input_name' => 'email','type'=>'email'])
                                    @textarea(['input_name' => 'address' ])
                                </div>
                                <div class="col-md-6">
                                    @input(['input_name' => 'phone','type'=>'number'])
                                    @input(['input_name' => 'tax_no','required' => false])
                                    @textarea(['input_name' => 'footer_text'])
                                </div>

                                {{-- <div class="col-md-6 mt-2">
                                    <label class="role col-md-3 mt-2">Currency<span class="text-danger">*</span></label>
                                    <select name="currency_id" id="currency_id" class="form-control {{ $errors->first('currency_id') ? 'is-invalid' : '' }} form-control-sm basic-single" >
                                        <option value="">Select One</option>
                                        @foreach($currencies as $key => $currency)
                                        <option value="{{  $currency->id }}">{{ $currency->title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('currency_id'))
                                        <div class="error text-danger">{{ $errors->first('currency_id') }}</div>
                                    @endif
                                </div> --}}
                                {{-- <div class="col-md-6 mt-3">
                                    @radio(['input_name'=>'rtl_ltr','data_set' => [1 => 'LTR' ,2 => 'RTL']])
                                </div> --}}
                            </div>
                        </div>


                        <div class="card-body col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    @imageWithPreview(['input_name' => 'logo'])
                                </div>
                                <div class="col-md-12 mt-5">
                                    @imageWithPreview(['input_name' => 'febicon'])
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
