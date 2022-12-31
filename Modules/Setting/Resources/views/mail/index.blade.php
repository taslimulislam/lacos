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
                <h1 class="fw-bold">Mail Configuration</h1> 
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
                            <h6 class="fs-17 fw-semi-bold mb-0">Edit Mail</h6>
                        </div>
                        <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('mails.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ @$mail->id }}">
                    <div class="row">
                        <div class="card-body col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    @input(['input_name' => 'protocol' , 'value' => @$mail->protocol])
                                    @input(['input_name' => 'smtp_port', 'value' => @$mail->smtp_port])
                                    @input(['input_name' => 'smtp_pass', 'value' => @$mail->smtp_pass ])
                                </div>
                                <div class="col-md-6">
                                    @input(['input_name' => 'smtp_host', 'value' => @$mail->smtp_host])
                                    @input(['input_name' => 'smtp_user','value' => @$mail->smtp_user]) 
                                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                        <label class="col-sm-3 col-form-label ps-0">Mail Type<span class="text-danger">*</span></label>
                                        <div class="col-lg-9 pe-0">
                                            <select name="mailtype" id="mailtype" class="form-control {{ $errors->first('mailtype') ? 'is-invalid' : '' }} form-control" >
                                                <option value=""></option>
                                                <option value="html" {{  @$mail->mailtype == 'html' ? 'selected' : '' }}>HTML</option>
                                                <option value="text"  {{  @$mail->mailtype == 'text' ? 'selected' : '' }}>TEXT</option>
                                            </select>
                                            @if ($errors->has('mailtype'))
                                                <div class="error text-danger">{{ $errors->first('mailtype') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        
                        <div class="card-body col-md-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                      <label>Is Invoice</label>
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div  class="col-md-7 ">
                                        <input type="radio" name="isinvoice"  value="1" {{ (@$mail->isinvoice=="1")? "checked" : "" }} >&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="isinvoice"  value="0" {{ (@$mail->isinvoice=="0")? "checked" : "" }} >&nbsp;No
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <div class="row">
                                    <div class="col-md-4">
                                      <label>Is Service</label>
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div  class="col-md-7 ">
                                        <input type="radio" name="isservice"  value="1" {{ (@$mail->isservice=="1")? "checked" : "" }} >&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="isservice"  value="0" {{ (@$mail->isservice=="0")? "checked" : "" }} >&nbsp;No
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <div class="row">
                                    <div class="col-md-4">
                                      <label>Is Quotation</label>
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div  class="col-md-7 ">
                                        <input type="radio" name="isquotation"  value="1" {{ (@$mail->isquotation=="1")? "checked" : "" }} >&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="isquotation"  value="0" {{ (@$mail->isquotation=="0")? "checked" : "" }} >&nbsp;No
                                    </div>
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
