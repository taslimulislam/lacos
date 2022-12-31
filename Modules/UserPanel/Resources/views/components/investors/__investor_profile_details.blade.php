<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Profile Details</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <button type="button" class="btn btn-primary align-self-center updateStartupDetails" data-update-route="{{route('userpanel.investor.update')}}" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address"> Update Details</button>
  
        <!--end::Action-->
    </div>
    <!--begin::Card header-->

    <!--begin::Card body-->
    <div class="card-body p-9">
       
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Company Name</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-bold text-gray-800 fs-6">{{@$info->company_name}}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Country </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bolder fs-6 text-gray-800 me-2">{{@$info->country->country_name?@$info->country->country_name:'--'}}</span>
            </div>
            <!--end::Col-->
        </div>
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Year Founded</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bolder fs-6 text-gray-800 me-2">{{@$info->year_founded}}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Company Site</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <a href="{{@$info->web_link}}" target="__blank" class="fw-bold fs-6 text-gray-800 text-hover-primary">{{@$info->web_link}}</a>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Investment Exist</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800">{{@$info->investmentExit?$info->investmentExit->name:'--'}}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Investment Segment</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800">{{@$info->investmentStage?$info->investmentStage->name:'--'}}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">	Industry Type</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800">{{@$info->investorType?$info->investorType->name:'--'}}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Industry</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{@$info->industry?$info->industry->name:'---'}}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->

      
     

         <!--begin::Input group-->
         <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">About</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{@$info->about?@$info->about:'---'}}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->




        <!--begin::Input group-->
        <div class="row mb-10">

            <table class="table align-middle table-row-dashed fs-6 gy-5" >

                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-8 text-uppercase gs-1">
                        <th class="fs-6 fw-bold mb-2">Document Title</th>
                        <th class="fs-6 fw-bold mb-2">Document Upload</th>
                        <th>Action</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
              
                <tbody>

                    @if (count($info_docs)>0)
                        @foreach($info_docs as $info_doc)
                            <tr>
                                <td>{{$info_doc->title}}</td>

                                <td>
                                    <a href="{{url('/public/storage/investor').'/'.$info_doc->file}}" target="_blank" class="btn btn-success"><i class="fa fa-download"></i></a>
                                </td>

                                <td>
                                    <a href="javascript:void(0)"  delete-delete_doc-route="{{route('userpanel.investor.delete_doc',$info_doc->uuid)}}" class="btn btn-danger deleteAction"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                   
                </tbody>
            </table>
           
        </div>


        <!--begin::Notice-->
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                    <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                    <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-bold">
                    <h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
                    
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>


        <!--end::Notice-->
    </div>
    <!--end::Card body-->
</div>




<div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-lg-1000px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form action="{{route('userpanel.investor.update')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_new_address_header">
                    <!--begin::Modal title-->
                    <h2 id="mtitle">Update Profile</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>

                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll"
                                                            data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Company Name</label>
                                <input type="text" class="form-control form-control-solid" name="company_name" value="{{@$info->company_name}}" required />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <label class="required fs-6 fw-bold mb-2">About </label>
                                <!--begin::Input-->
                                <textarea name="about" class="form-control form-control-solid"  rows="6" required> {{@$info->about}}</textarea>
                                <span class="text-danger">About section should be maximum 500 words</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                    
                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Country</span>
                                </label>

                                <select name="country_id" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="Select a Country..." class="form-select form-select-solid">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{$country->id == @$info->country_id?"selected":''}}>{{$country->country_name}}</option>
                                    @endforeach
                                </select>

                               

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Exits</label>

                                <select name="exits_id"  required  data-placeholder="Select a Exits..." class="form-select form-select-solid">
                                    <option value="">Select Exits</option>
                                    @foreach($investexit as $key => $type)
                                    <option value="{{ $type->id }}" {{$type->id == $info->exits_id ? 'selected' : ''}}>{{$type->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                       
                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold form-label mb-2">Year Founded</label>
                                <input type="text" class="form-control form-control-solid" value="{{@$info->year_founded}}" name="year_founded"/>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Industry</span>
                                </label>
                                <!--end::Label-->
                                <select name="industry_id" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="Select a industry..." class="form-select form-select-solid">
                                    <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{$industry->id}}" {{$industry->id== @$info->industry_id?"selected":''}}>{{$industry->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>


                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Investment Stage</label>
                                <select name="investment_stage_id" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="Select a Investment Stage..." class="form-select form-select-solid">
                                    <option value="">Select {{__('language.investstage')}}</option>
                                    @foreach($investstage as $key => $type)
                                    <option value="{{ $type->id }}" {{$type->id == $info->investment_stage_id ? 'selected' : ''}}>{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Investor Type</label>

                                <select name="investor_types_id" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="Select a Investor Type..." class="form-select form-select-solid">

                                    <option value="">Select {{__('language.investortype')}}</option>
                                    @foreach($investortype as $key => $type)
                                    <option value="{{ $type->id }}" {{$type->id == $info->investor_types_id ? 'selected' : ''}}>{{$type->name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <!--end::Col-->
                        </div>

                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Company logo</label>
                                <input type="file" name="logo" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Website link</label>
                                <input type="link" class="form-control form-control-solid" name="web_link" value="{{@$info->web_link}}" />
                                
                            </div>
                        </div>
                        <!--end::Input group-->

                      

                        <div class="row" id="refrash">
                            <div class="col-md-12">
                                <table class="table table-responsive" id="document_table">
                                    <thead>
                                        <tr>
                                            <th class="fs-6 fw-bold mb-2">Document Title</th>
                                            <th class="fs-6 fw-bold mb-2">Document Upload</th>
                                            <th><button type="button" class="btn btn-primary" id="add_row"><i class="fa fa-plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($info_docs)>0)

                                            @foreach($info_docs as $key => $info_doc)
                                                <tr id="trid_{{$key}}">
                                                    <td>{{$info_doc->title}}</td>

                                                    <td>
                                                        <a href="{{url('/public/storage/startups').'/'.$info_doc->file}}" target="_blank" class="btn btn-success"><i class="fa fa-download"></i></a>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0)" data-trid="trid_{{$key}}"  delete-delete_doc-route="{{route('userpanel.investor.delete_doc',$info_doc->uuid)}}" class="btn btn-danger deleteAction"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        @else
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="document_title[]" id="document_title_0"  required value="">
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control" onchange="validatedDoc(0)" name="document_upload[]" id="document_upload_0" required value="">
                                                    <span class="text-danger">Please upload file  pdf | docx | jpg | jpeg | png</span>
                                                </td>
                                                <td>
                                                    <button type="button" id="remove_row" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                        @endif
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-success modal_action actionBtn"> Update</button>
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New Address-->

@push('js')
    <script src="{{ asset('Modules/userpanel/resources/assets/js/_investor.js') }}"></script>
@endpush

