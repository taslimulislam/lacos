@extends('dashboard.app')
@push('css')

@endpush
@section('content')

    <!-- Page Content  -->
    <div class="content-wrapper">
        <div class="main-content">            
            <div class="body-content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card flex-fill w-100">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-md-12 col-lg-2 setting_sidebar">
                                        <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSoftSetup" aria-expanded="false" aria-controls="collapseSoftSetup">
                                                    <span>{{__(setLang('Software Setting')) }}</span><i class="ti-angle-up"></i>
                                                </button>
                                                <div class="collapse show" id="collapseSoftSetup">
                                                    <div class="card card-body pe-0 py-1 shadow-none">
                                                        <ul class="nav flex-column" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active w-100" id="pills-manageUser-tab" data-bs-toggle="pill" data-bs-target="#pills-manageUser" type="button" role="tab" aria-controls="pills-manageUser" aria-selected="true">{{__('sidebar.Manage User')}}</button>
                                                            </li>
                                                            @if(admin() == true || @read(subMod($a = 'Manage Application')->id) == 1)
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-manageApps-tab" data-bs-toggle="pill" data-bs-target="#pills-manageApps" type="button" role="tab" aria-controls="pills-manageApps" aria-selected="false">{{__('sidebar.Manage Application')}}</button>
                                                            </li>
                                                            @endif
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-countrySetup-tab" data-bs-toggle="pill" data-bs-target="#pills-countrySetup" type="button" role="tab" aria-controls="pills-countrySetup" aria-selected="false">{{__('country.Country Setup')}}</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-currency-tab" data-bs-toggle="pill" data-bs-target="#pills-currency" type="button" role="tab" aria-controls="pills-currency" aria-selected="false">{{__('currency.Currency Setup')}}</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-email-tab" data-bs-toggle="pill" data-bs-target="#pills-email" type="button" role="tab" aria-controls="pills-email" aria-selected="false">{{__('sidebar.Email Setup')}}</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-sms-tab" data-bs-toggle="pill" data-bs-target="#pills-sms" type="button" role="tab" aria-controls="pills-sms" aria-selected="false">{{__('sidebar.SMS Setup')}}</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-language-tab" data-bs-toggle="pill" data-bs-target="#pills-language" type="button" role="tab" aria-controls="pills-language" aria-selected="false">{{__('sidebar.Language Setup')}}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link w-100 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRolePermission" aria-expanded="false" aria-controls="collapseRolePermission">
                                                    <span>{{__('role.Role Permission')}}</span><i class="ti-angle-up"></i>
                                                </button>
                                                <div class="collapse" id="collapseRolePermission">
                                                    <div class="card card-body pe-0 py-1 shadow-none">
                                                        <ul class="nav flex-column" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-manageRole-tab" data-bs-toggle="pill" data-bs-target="#pills-manageRole" type="button" role="tab" aria-controls="pills-manageRole" aria-selected="true">{{__('role.Manage Role')}}</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-userAssignRole-tab" data-bs-toggle="pill" data-bs-target="#pills-userAssignRole" type="button" role="tab" aria-controls="pills-userAssignRole" aria-selected="false">{{__('role.User Assign Role')}}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link w-100 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDataSync" aria-expanded="false" aria-controls="collapseDataSync">
                                                    <span>{{__('sidebar.Data Synchronizer')}}</span><i class="ti-angle-up"></i>
                                                </button>
                                                <div class="collapse" id="collapseDataSync">
                                                    <div class="card card-body pe-0 py-1 shadow-none">
                                                        <ul class="nav flex-column" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-dataBackup-tab" data-bs-toggle="pill" data-bs-target="#pills-dataBackup" type="button" role="tab" aria-controls="pills-dataBackup" aria-selected="true">{{__('Backup')}}</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link w-100" id="pills-dataImport-tab" data-bs-toggle="pill" data-bs-target="#pills-dataImport" type="button" role="tab" aria-controls="pills-dataImport" aria-selected="false">{{__('Import')}}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-10 setting_content">
                                        <div class="ps-0 ps-lg-3 tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-manageUser" role="tabpanel" aria-labelledby="pills-manageUser-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start">{{__('user.User List')}} </h6>
                                                            <button class="btn btn_addMore btn-md" data-bs-toggle="modal" data-bs-target="#addUserModal">{{__('sidebar.Add User')}}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive text-start">
                                                            <table class="table display table-bordered table-striped table-hover basic">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl</th>
                                                                        <th>{{__('form.image')}}</th>
                                                                        <th>{{__('form.username')}}</th>
                                                                        <th>{{__('form.email')}}</th>
                                                                        <th>{{__('form.phone')}}</th>
                                                                        <th>{{__('form.status')}}</th>
                                                                        <th>{{__('form.action')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($users as $user)
                                                                        <tr>
                                                                            <td>#{{ $loop->iteration }}</td>
                                                                            <td>
                                                                                <img  src="{{ $user->picture ? asset('storage/'.$user->picture->thumbnail) : url('avatar.png') }}" alt="{{$user->first_name}}" width="50" height="50">
                                                                            </td>
                                                                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                                                                            <td>{{$user->email}}</td>
                                                                            <td>{{$user->phone}}</td>
                                                                            <td>
                                                                                <input type="hidden" id="status_route{{$user->id}}" value={{ route('user.status',$user->id) }}>
                                                                                @if($user->status == 1)
                                                                                <a href="javascript:void(0)"  class="btn btn-success btn-sm" onclick="confirm(status_route{{$user->id}})">Active</a>
                                                                                @else()
                                                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirm(status_route{{$user->id}})">Inactive</a>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex">
                                                                                    <button title="Edit User data" class="btn btn-primary btn-sm m-1 edit-user" value="{{$user->id}}">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </button>
                                                                                    <button title="Details" class="btn btn-secondary btn-sm m-1 view-user" value="{{$user->id}}">
                                                                                        <i class="fa fa-eye"></i>
                                                                                    </button>
                                                                                    
                                                                                    <a title="Delete" href="javascript:void(0)"  class="btn btn-danger btn-sm delete-confirm m-1" data-route="{{ route('users.destroy',$user->id) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-manageApps" role="tabpanel" aria-labelledby="pills-manageApps-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start py-2">{{__('application.Application List')}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive text-start">
                                                            <table class="table display table-bordered table-striped table-hover basic">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl.</th>
                                                                        <th>Logo</th>
                                                                        <th>{{__('form.title')}}</th>
                                                                        <th>{{__('form.email')}}</th>
                                                                        <th>{{__('form.phone')}}</th>
                                                                        <th>{{__('form.tax_no')}}</th>
                                                                        <th>Language</th>
                                                                        <th>{{__('currency.Currency')}}</th>
                                                                        <th>{{__('form.rtl_ltr')}}</th>
                                                                        <th>{{__('form.footer_text')}}</th>
                                                                        <th>{{__('form.action')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>#1</td>
                                                                        <td><img src="{{ ($app->logo) ? asset('storage/'.$app->logo) : url('avatar.png') }}" alt="{{ $app->title }}" width="100px"></td>
                                                                        <td>{{ $app->title }}</td>
                                                                        <td>{{ $app->email }}</td>
                                                                        <td>{{ $app->phone }}</td>
                                                                        <td>{{ $app->tax_no }}</td>
                                                                        <td>{{ $app->language ? $app->language->title : '---'}}</td>
                                                                        <td>{{ $app->currency->title ?? ''}} {{$app->currency->symbol??''}}</td>
                                                                        <td>
                                                                            {{($app->rtl_ltr == 1) ? 'LTR' : 'RLT'}}
                                                                        </td>
                                                                        <td>{{ $app->footer_text }}</td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                @if(admin() == true || @update(subMod($a = 'Manage Application')->id) == 1)
                                                                                <button class="btn btn-primary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#editAppModal" >
                                                                                    <i class="fa fa-edit"></i>
                                                                                </button>
                                                                                {{-- <a title="Edit" href="{{ route('applications.edit',$app->id) }}" class="btn btn-primary btn-sm m-1" ><i class="fa fa-edit"></i></a> --}}
                                                                                @endif
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-countrySetup" role="tabpanel" aria-labelledby="pills-countrySetup-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start">{{ __('country.Country List') }}</h6>
                                                            <button class="btn btn_addMore btn-md" data-bs-toggle="modal" data-bs-target="#addCountryModal">{{__('country.Add Country')}}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive text-start">
                                                            <table class="table display table-bordered table-striped table-hover basic">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl.</th>
                                                                        <th>{{__('form.title')}}</th>
                                                                        <th>{{__('form.flag')}}</th>
                                                                        <th>{{__('form.status')}}</th>
                                                                        <th>{{__('form.action')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($countries as $key => $country)
                                                                        <tr>
                                                                            <td>#{{ $key + 1 }}</td>
                                                                            <td>{{ $country->title }}</td>
                                                                            <td>
                                                                                <img src="{{ $country->picture ? asset('storage/'.$country->picture->febicon) : url('avatar.png')}}" alt="{{ $country->title  }}" width="30" height="30">
                                                                            </td>
                                                                            <td>
                                                                                <input type="hidden" id="countryStatus{{$country->id}}" value={{ route('countries.status',$country->id) }}>
                                                                                @if($country->status == 1)
                                                                                    <button class="btn btn-success btn-sm" onclick="confirm(countryStatus{{$country->id}})">Active</button>
                                                                                @else
                                                                                    <button class="btn btn-danger btn-sm" onclick="confirm(countryStatus{{$country->id}})">Inactive</button>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex">
                                                                                    <button class="btn btn-primary btn-sm m-1 edit-country" value="{{$country->id}}">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </button>
                                                                                    {{-- <a title="Edit" href="{{ route('countries.edit',$country->id) }}" class="btn btn-primary btn-sm m-1" ><i class="fa fa-edit"></i></a> --}}
                                                                                    <a title="Delete" href="javascript:void(0)"  class="btn btn-danger btn-sm delete-confirm m-1" data-route="{{ route('countries.destroy',$country->id) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-currency" role="tabpanel" aria-labelledby="pills-currency-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start">{{__('currency.Currency List')}}</h6>
                                                            <button class="btn btn_addMore btn-md" data-bs-toggle="modal" data-bs-target="#addCurrencyModal">{{__('currency.Add Currency')}}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive text-start">
                                                            <table class="table display table-bordered table-striped table-hover basic">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl.</th>
                                                                        <th>{{__('form.title')}}</th>
                                                                        <th>{{__('form.symbol')}}</th>
                                                                        <th>Country</th>
                                                                        <th>{{__('form.status')}}</th>
                                                                        <th>{{__('form.action')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($currencies as $key => $currency)
                                                                        <tr>
                                                                            <td>#{{ $key + 1 }}</td>
                                                                            <td>{{ $currency->title }}</td>
                                                                            <td>{{ $currency->symbol }}</td>
                                                                            <td>{{ $currency->country->title??'' }}</td>
                                                                            <td>
                                                                                <input type="hidden" id="currencyStatus{{$currency->id}}" value={{ route('currencies.status',$currency->id) }}>
                                                                                @if($currency->status == 1)
                                                                                    <button class="btn btn-success btn-sm" onclick="confirm(currencyStatus{{$currency->id}})">Active</button>
                                                                                @else
                                                                                    <button class="btn btn-danger btn-sm" onclick="confirm(currencyStatus{{$currency->id}})">Inactive</button>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex">
                                                                                    <button class="btn btn-primary btn-sm m-1 edit-currency" value="{{$currency->id}}">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </button>
                                                                                    {{-- <a title="Edit" href="{{ route('currencies.edit',$currency->id) }}" class="btn btn-primary btn-sm m-1" ><i class="fa fa-edit"></i></a> --}}
                                                                                    <a title="Delete" href="javascript:void(0)"  class="btn btn-danger btn-sm delete-confirm m-1" data-route="{{ route('currencies.destroy',$currency->id) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-language" role="tabpanel" aria-labelledby="pills-language-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start">Language List</h6>
                                                            <button class="btn btn_addMore btn-md" data-bs-toggle="modal" data-bs-target="#addLangModal">{{__('Add Language')}}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        {{-- language list  --}}
                                                        <div id="lang-list" class="table-responsive text-start">
                                                            <table class="table display table-bordered table-striped table-hover basic">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl.</th>
                                                                        <th>Title</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($languages as $key => $lang)
                                                                        <tr>
                                                                            <td>#{{ $key + 1 }}</td>
                                                                            <td>{{ $lang->title }}</td>
                                                                            <td>
                                                                                <input type="hidden" id="langStatus{{$lang->id}}" value={{ route('lang.status',$lang->id) }}>
                                                                                @if($lang->status == 1)
                                                                                    <button class="btn btn-success btn-sm" onclick="confirm(langStatus{{$lang->id}})">Active</button>
                                                                                @else
                                                                                    <button class="btn btn-danger btn-sm" onclick="confirm(langStatus{{$lang->id}})">Inactive</button>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex">
                                                                                    <button class="btn btn-primary btn-sm m-1 edit-lang" value="{{$lang->slug}}">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </button>
                                                                                    {{-- <a title="Edit" href="{{ route('lang.edit',$lang->slug) }}" class="btn btn-primary btn-sm m-1" ><i class="fa fa-edit"></i></a> --}}
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        {{-- edit language phrase --}}
                                                        <div id="edit-lang-pharse" class="edit-lang-pharse">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start py-2">{{__('mail.Edit Mail')}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="">
                                                    <input type="hidden" id="mail_id" name="id" value="{{ @$mail->id }}">
                                                    @input(['input_name' => 'protocol' , 'additional_id' => 'protocol', 'value' => @$mail->protocol])                
                                                    @input(['input_name' => 'smtp_host', 'additional_id' => 'smtp_host', 'value' => @$mail->smtp_host])                
                                                    @input(['input_name' => 'smtp_port', 'additional_id' => 'smtp_port', 'value' => @$mail->smtp_port])                
                                                    @input(['input_name' => 'smtp_user', 'additional_id' => 'smtp_user','value' => @$mail->smtp_user])                
                                                    @input(['input_name' => 'smtp_pass', 'additional_id' => 'smtp_pass', 'type'=>'password', 'value' => @$mail->smtp_pass ])
                                                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                                        <label class="col-sm-2 col-form-label ps-0">Mail Type<span class="text-danger">*</span></label>
                                                        <div class="col-lg-10 pe-0">
                                                            <select name="mailtype" id="mailtype" class="form-control {{ $errors->first('mailtype') ? 'is-invalid' : '' }}" >
                                                                <option value="">Select Mail Type</option>
                                                                <option value="html" {{  @$mail->mailtype == 'html' ? 'selected' : '' }}>HTML</option>
                                                                <option value="text"  {{  @$mail->mailtype == 'text' ? 'selected' : '' }}>TEXT</option>
                                                            </select>
                                                            @if ($errors->has('mailtype'))
                                                                <div class="error text-danger">{{ $errors->first('mailtype') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="align-items-center cust_border form-group mb-3 mx-0 pb-3 row">
                                                        <div class="col-sm-10 offset-sm-2 pe-0">
                                                            <div class="d-flex">
                                                                <button class="align-items-center btn btn-primary d-flex me-2" id="mail-submit" type="button">
                                                                    <span class="me-2">Submit</span>
                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="pills-sms" role="tabpanel" aria-labelledby="pills-sms-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start">{{__('sms.Edit SMS')}}</h6>                                
                                                            <a href="https://dashboard.nexmo.com/sign-up" target="_blank" class="btn btn_addMore btn-md">Nexmo Registration</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="">
                                                    <input type="hidden" id="sms_id" name="id" value="{{ @$sms->id }}">
                                                    @input(['input_name' => 'api_key' , 'value' => @$sms->api_key, 'additional_id' => 'api_key'])                
                                                    @input(['input_name' => 'api_secret', 'value' => @$sms->api_secret, 'additional_id' => 'api_secret'])                
                                                    @input(['input_name' => 'from', 'value' => @$sms->from, 'additional_id' => 'sms_from'])

                                                    <div class="align-items-center cust_border form-group mb-3 mx-0 pb-3 row">
                                                        <div class="col-sm-10 offset-sm-2 pe-0">
                                                            <div class="d-flex">
                                                                <button id="sms-submit" class="align-items-center btn btn-primary d-flex me-2" type="button">
                                                                    <span class="me-2">Submit</span>
                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="pills-manageRole" role="tabpanel" aria-labelledby="pills-manageRole-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start">{{__("role.Role List")}}</h6>
                                                            <button class="btn btn_addMore btn-md" data-bs-toggle="modal" data-bs-target="#addRoleModal">{{__("role.Add Role")}}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive text-start">
                                                            <table class="table display table-bordered table-striped table-hover basic">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl.</th>
                                                                        <th>{{__('form.title')}}</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($roles as $key => $role)
                                                                        <tr>
                                                                            <td>#{{ $key + 1 }}</td>
                                                                            <td>{{ $role->type }}</td>
                                                                            <td>
                                                                                {{-- <a title="Edit" href="{{ route('roles.edit',$role->id) }}"   class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> --}}
                                                                                <button class="btn btn-primary btn-sm m-1 edit-role" value="{{$role->id}}">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </button>
                                                                                <a title="Delete" href="javascript:void(0)"  class="btn btn-danger btn-sm delete-confirm m-1" data-route="{{ route('roles.destroy',$role->id) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-userAssignRole" role="tabpanel" aria-labelledby="pills-userAssignRole-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start">{{__("role.Assign Role To User")}}</h6>
                                                            <button class="btn btn_addMore btn-md" data-bs-toggle="modal" data-bs-target="#roleListModal">{{__("role.Role List")}}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <form action="{{route('user.assign.role.store')}}" method="POST" id="role-user">
                                                            @csrf
                                                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">                            
                                                                <label class="col-sm-2 col-form-label ps-0">User<span class="text-danger">*</span></label>
                                                                <div class="col-lg-10 pe-0">
                                                                    <select name="user_id" id="user_id" class="form-control {{ $errors->first('user_id') ? 'is-invalid' : '' }} " >
                                                                        <option value="">{{__('form.Select')}} {{__('form.User')}}</option>
                                                                        @foreach($users as $key => $user)
                                                                            <option value="{{  $user->id }}">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('user_id'))
                                                                        <div class="error text-danger">{{ $errors->first('user_id') }}</div>
                                                                    @endif
                                                                </div>                            
                                                            </div>
                                                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">                            
                                                                <label class="col-sm-2 col-form-label ps-0">{{__('form.Role')}}<span class="text-danger">*</span></label>
                                                                <div class="col-lg-10 pe-0">
                                                                    <select name="role_id" class="form-control {{ $errors->first('role_id') ? 'is-invalid' : '' }}  ">
                                                                        <option value="">{{__('form.Select')}} {{__('form.Role')}}</option>
                                                                        @foreach($roles as $key => $role)
                                                                            <option value="{{  $role->id }}">{{ $role->type }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('user_id'))
                                                                        <div class="error text-danger">{{ $errors->first('role_id') }}</div>
                                                                    @endif
                                                                </div>                            
                                                            </div>
                                                            <div class="align-items-center cust_border form-group mb-3 mx-0 pb-3 row">
                                                                <div class="col-sm-10 offset-sm-2 pe-0">
                                                                    <div class="d-flex">
                                                                        <button id="assign-role-submit" class="align-items-center btn btn-primary d-flex me-2" type="submit">
                                                                            <span class="me-2">{{__('form.submit')}}</span>
                                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-dataBackup" role="tabpanel" aria-labelledby="pills-dataBackup-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start py-2">{{ __('Database Backup') }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="py-4">
                                                            <h4 class="mb-4">If You want to take backup your database . Please click on confirm button.</h4>
                                                            <a href="{{ route('backup.confirm') }}" class="btn btn-success px-4 py-2"><strong>{{ __(setLang('Confirm')) }}</strong></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-dataImport" role="tabpanel" aria-labelledby="pills-dataImport-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="align-items-center d-flex justify-content-between px-3 py-2 mb-3 settings_heading">
                                                            <h6 class="mb-0 text-start py-2">{{ __('Database Backup') }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="py-4">
                                                            <h4 class="mb-4">
                                                                <strong class="text-warning">Warning : </strong>If You import your new database.Then You lost your previous data
                                                            </h4>
                                                            <form id="db-import" action="{{ route('import.confirm') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="align-items-center d-flex justify-content-center">
                                                                    <input type="file" name="image" class="form-control me-4" style="max-width: 350px">
                                                                    <button id="import-submit" type="submit" class="btn btn-success px-4 py-2">{{__('Import')}}</button>
                                                                    @if ($errors->has('image'))
                                                                        <br>
                                                                        <div class="error text-danger">{{ $errors->first('image') }}</div>
                                                                    @endif
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="py-4">
                                                            <div class="col-md-12 text-center mt-3">
                                                                <a class="btn btn-success import-button" href="{{route('backup.restore')}}">{{__('Restore Data')}}</a>                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.body content-->
        </div>
    </div>
    <!--/.wrapper-->
    
            
    <!-- User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="userModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="user-form" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">                    
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title" id="userModal">Add User</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @input(['input_name' => 'first_name','additional_id'=>'first_name', ])
                        @input(['input_name' => 'last_name','additional_id'=>'last_name', ])                            
                        @input(['input_name' => 'email','additional_id'=>'email','type'=>'email'])
                        @input(['input_name' => 'phone' ,'additional_id'=>'phone', 'required' => false,'type'=>'number'])
                        @input(['input_name' => 'date_of_birth' , 'required' => false , 'additional_id' => 'dob','type' => 'date'])
                        @select(['input_name'=>'gender','required' => false , 'data_set' => ['Male' ,'Female' ,'Others'], 'additional_id' => 'gender'])
                        @input(['input_name' => 'password' , 'type'=>'password', 'additional_id' => 'password'])                        
                        @input(['input_name' => 'confirm_password' , 'type'=>'password', 'additional_id' => 'confirm_password'])
                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="formFile" class="col-sm-2 col-form-label ps-0">Image</label>
                            <div class="col-lg-10 pe-0">
                                <input class="form-control" type="file" name="thumbnail" id="formFile">
                            </div>
                        </div>                       
                        @radio(['input_name' =>  'status','data_set' => [1 => 'Active' ,0 => 'Inactive'], 'additional_id' => 'status'])
                        @radio(['input_name' =>  'user_type','data_set' => [1 => 'Admin' ,0 => 'User'], 'additional_id' => 'user_type'])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="align-items-center btn btn-danger d-flex me-2" type="reset">
                            <span class="me-2">Reset</span>
                        </button>
                        <button id="user-submit" class="align-items-center btn btn-primary d-flex me-2" value="submit" type="submit">
                            <span class="me-2">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modals -->
    
    @include('user::view-modal')
    @include('user::edit-modal') 
    @include('setting::application.edit-modal')
    @include('setting::country.modal')    
    @include('setting::country.edit-modal')
    @include('setting::currency.modal')    
    @include('setting::language.create-modal')
    @include('role::create-modal')
    @include('role::edit-modal')   

@endsection

@push('js')
    <script src="{{ asset('vendor/user/assets/sweetalert-script.js') }}"></script>
    <script src="{{ asset('vendor/role/assets/js/user-assign-script.js')}}"></script>

    <script type="text/javascript">
        //ajax submit for sms
        $('#sms-submit').click(function(e){ 
            e.preventDefault();    
            var smsData = {
                id : $("#sms_id").val(),
                api_key : $("input[name=api_key]").val(),
                api_secret : $("input[name=api_secret]").val(),
                from : $("input[name=from]").val(),
            };

            var smsRoute = "{{route('sms.store')}}";
            ajaxSubmit(smsRoute, 'POST', smsData);
            
        });
        //ajax submit for email configuration
        $("#mail-submit").click(function(e){ 
            e.preventDefault();
            var mailData = {
                id : $("#mail_id").val(),
                protocol : $("input[name=protocol]").val(),
                smtp_host : $("input[name=smtp_host]").val(),
                smtp_port : $("input[name=smtp_port]").val(),
                smtp_user : $("input[name=smtp_user]").val(),        
                smtp_pass : $("input[name=smtp_pass]").val(),        
                mailtype : $("select[name=mailtype]").val(),
            }
            var mailRoute = "{{ route('mails.store') }}";
            ajaxSubmit(mailRoute, 'POST', mailData);
        });     

        //ajax submit for add language
        $("#lang-submit").click(function(e){ 
            e.preventDefault();
            var langFormData = $("#add-lang").serializeArray();
            var langRoute = "{{ route('lang.store') }}";
            ajaxSubmit(langRoute, 'POST', langFormData);
            $('#addLangModal').modal('hide');
        });       

        $('.edit-lang').click(function (e) {
            e.preventDefault();
            var slug = $(this).val();   
            // $('#lang-form').find("tr:gt(0)").remove();
            $.get('lang-edit/' + slug , function (data) {
                $('#pills-language').find('#edit-lang-pharse').first().html(data);
                $('#pills-language').find('#lang-list').hide();
                
                $('#pharse-list').DataTable({
                    columnDefs: [
                        {
                            orderable: false,
                            targets: [2],
                        }
                    ]
                });
                
            })
        });


    </script>
@endpush

