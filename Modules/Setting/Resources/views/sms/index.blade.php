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
                <h1 class="fw-bold">{{__('SMS Configuration')}}</h1>
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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{__('Edit SMS')}}</h6>
                        </div>
                        {{-- <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                <a href="https://dashboard.nexmo.com/sign-up" target="_blank" class="bt btn-secondary btn-sm"><strong>Nexmo Registration?</strong></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <form action="{{route('sms.store')}}" method="POST">
                    @csrf
                     <input type="hidden" name="id" value="{{ @$sms->id }}">
                    <div class="row">
                        <div class="card-body col-md-5 offset-md-1">
                            <div class="row">
                                @input(['input_name' => 'api_key' , 'value' => @$sms->api_key])
                                @input(['input_name' => 'api_secret', 'value' => @$sms->api_secret])
                                @input(['input_name' => 'from', 'value' => @$sms->from])
                                <div class="col-md-12">
                                </div>
                                <div class="col-md-12">
                                </div>
                                <div class="col-md-12">
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-md-6 col-6">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                      <label>Sale</label>
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div  class="col-md-6">
                                        <input type="radio" name="isinvoice"   value="1" {{ (@$sms->isinvoice=="1")? "checked" : "" }} >&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="isinvoice"  value="0" {{ (@$sms->isinvoice=="0")? "checked" : "" }} >&nbsp;No
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="row">
                                    <div class="col-md-5">
                                      <label>Service</label>
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div  class="col-md-6">
                                        <input type="radio" name="isservice"  value="1" {{ (@$sms->isservice=="1")? "checked" : "" }} >&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="isservice"  value="0" {{ (@$sms->isservice=="0")? "checked" : "" }} >&nbsp;No
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="row">
                                    <div class="col-md-5">
                                      <label>Customer Receive</label>
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div  class="col-md-6 ">
                                        <input type="radio" name="isreceive"  value="1" {{ (@$sms->isreceive=="1")? "checked" : "" }} >&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="isreceive"  value="0" {{ (@$sms->isreceive=="0")? "checked" : "" }} >&nbsp;No
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer form-footer text-end">
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
