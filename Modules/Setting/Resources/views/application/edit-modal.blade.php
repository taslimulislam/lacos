<!-- Application edit Modal -->
<div class="modal fade" id="editAppModal" tabindex="-1" aria-labelledby="appModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="app-form" action="{{ route('applications.update',$app->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                
                <div class="modal-header">
                    <h6 class="modal-title" id="appodal">Update Application</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @input(['input_name' => 'title', 'value' => "$app->title", 'additional_id'=>'app_title', ])                  
                    @input(['input_name' => 'email', 'value' => "$app->email", 'additional_id'=>'app_email','type'=>'email'])
                    @input(['input_name' => 'phone', 'value' => "$app->phone", 'additional_id'=>'app_phone', 'required' => false,'type'=>'number'])
                    @input(['input_name' => 'tax_no', 'value' => "$app->tax_no", 'required' => false , 'additional_id' => 'tax_no'])                   
                    @textarea(['input_name' => 'address', 'value' => $app->address ])                
                    @textarea(['input_name' => 'footer_text', 'value' => $app->footer_text])    
                                    
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label class="col-sm-2 col-form-label ps-0">Currency<span class="text-danger">*</span></label>
                        <div class="col-lg-10 pe-0">
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
                    </div>

                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label class="col-sm-2 col-form-label ps-0">Language</span></label>
                        <div class="col-lg-10 pe-0">
                            <select name="language_id" id="language_id" class="form-control" >
                                <option value="">Select One</option>
                                @foreach($languages as $key => $lang)
                                    <option value="{{  $lang->id }}" {{ $app->language_id == $lang->id ? 'selected' : ''}}>{{ $lang->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">                        
                        <label class="col-sm-2 col-form-label ps-0">{{ __('form.rtl_ltr') }}</label>                            
                        <div  class="col-lg-10 pe-0">
                            <input type="radio" name="rtl_ltr"  value="1" {{ ($app->rtl_ltr=="1")? "checked" : "" }} >&nbsp;LTR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="rtl_ltr"  value="2" {{ ($app->rtl_ltr=="2")? "checked" : "" }} >&nbsp;RTL
                        </div>
                    </div>
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="logo" class="col-sm-2 col-form-label ps-0">Logo</label>
                        <div class="col-lg-10 pe-0">
                            <input class="form-control" type="file" name="logo" id="logo">
                        </div>
                    </div>
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="favicon" class="col-sm-2 col-form-label ps-0">Favicon</label>
                        <div class="col-lg-10 pe-0">
                            <input class="form-control" type="file" name="favicon" id="favicon">
                        </div>
                    </div>                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="align-items-center btn btn-danger d-flex me-2" type="reset">
                        <span class="me-2">Reset</span>
                    </button>
                    <button id="app-submit" class="align-items-center btn btn-primary d-flex me-2" value="submit" type="submit">
                        <span class="me-2">Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>