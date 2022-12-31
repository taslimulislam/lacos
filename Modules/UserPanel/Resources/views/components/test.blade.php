<div class="card-toolbar">
    <!--begin::Toolbar-->
    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
        <!--begin::Filter-->
        <!--begin::Add user-->
        <button type="button" class="btn btn-primary addRoute" data-update-route="{{route('userpanel.startup.update')}}" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address"> Add User</button>
        <!--end::Add user-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Modal - Add task-->
    
    <!--begin::Modal - New Target-->
    <div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-lg-1000px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                    <form action="" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="kt_modal_new_address_form" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">

            
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_new_address_header">
                        <!--begin::Modal title-->
                        <h2>Update Information</h2>
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
                    <!--end::Modal header-->


                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll"
                            data-kt-scroll-offset="300px">

                        
                            <!--begin::Input group-->
                            <div class="row g-9 mb-4">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                        <span class="required">Country</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Your payment statements may very based on selected country"></i>
                                    </label>
                                    <select name="country" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="Select a Country..." class="form-select form-select-solid">
                                        <option value="">Select a Country...</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                    </select>

                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">Facebook link</label>
                                    <input type="text" class="form-control form-control-solid" />
                                </div>
                            </div>


                            <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <input type="text" class="form-control form-control-solid" name="name" value="{{@$info->name}}" required />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <label class="required fs-6 fw-bold mb-2">About the startup</label>
                                <!--begin::Input-->
                                <textarea name="about" class="form-control form-control-solid"  rows="6" required> {{@$info->about}}</textarea>
                                <span class="text-danger">About section should be  maximum 500 words</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Short description</label>
                                <textarea class="form-control form-control-solid" name="description" rows="2" style="height: 43px;"> {{@$info->description}}</textarea>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class=" fs-6 fw-bold mb-2">Website link</label>
                                <input type="link" class="form-control form-control-solid" name="web_link" value="{{@$info->web_link}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Address</label>
                                <input type="text" class="form-control form-control-solid" name="address" value="{{@$info->address}}" />
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class=" fs-6 fw-bold mb-2">Twitter link</label>
                                <!--begin::Input-->
                                <input type="link" class="form-control form-control-solid" name="twitter_link" value="{{@$info->twitter_link}}" />
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
                                <label class="fs-6 fw-bold mb-2">Facebook link</label>
                                <!--begin::Input-->
                                <input type="link" class="form-control form-control-solid" name="fb_link" value="{{@$info->fb_link}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">No. of employees</label>
                                <input type="number" name="no_of_employees" value="{{@$info->no_of_employees}}" class="form-control form-control-solid" />
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class=" fs-6 fw-bold mb-2">Instagram link</label>
                                <!--begin::Input-->
                                <input type="link" class="form-control form-control-solid" name="insta_link" value="{{@$info->insta_link}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold form-label mb-2">Year Launched</label>
                                <input type="text" class="form-control form-control-solid" value="{{@$info->year_launched}}" name="year_launched"/>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class=" fs-6 fw-bold mb-2">LinkedIn link</label>
                                <!--begin::Input-->
                                <input type="link" class="form-control form-control-solid" name="linkedIn_link" value="{{@$info->linkedIn_link}}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                
                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                    <span class="required">Industry</span>
                                </label>

                                <!--end::Label-->
                                <select name="industry" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="Select a Industry..." class="form-select form-select-solid">
                                    <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{$industry->id}}" {{$industry->id== @$info->industry?"selected":''}}>{{$industry->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Funding Stage</label>
                                <select name="funding_stage" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="Select a Industry..." class="form-select form-select-solid">
                                    <option value="">Select Funding Stage</option>
                                    @foreach(fundingStage() as $stage)
                                        <option value="{{$stage}}" {{$stage == @$info->funding_stage?"selected":''}}>{{$stage}}</option>
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
                                <label class="required fs-6 fw-bold mb-2">Market Segment</label>
                                <input type="text" name="market_segment" value="{{@$info->market_segment}}" class="form-control form-control-solid" />
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Startup up logo</label>
                                <!--begin::Input-->
                                <input type="file" name="startup_logo" class="form-control form-control-solid" />

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                      

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive document_table" id="document_table">
                                    <thead>
                                        <tr>
                                            <th class="fs-6 fw-bold mb-2">Document Title</th>
                                            <th class="fs-6 fw-bold mb-2">Document Upload</th>
                                            <th><button type="button" class="btn btn-primary" id="add_row"><i class="fa fa-plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($startup_docs)>0)

                                            @foreach($startup_docs as $key=>$startup_doc)
                                                <tr id="trid_{{$key}}">
                                                    <td>{{$startup_doc->title}}</td>

                                                    <td>
                                                        <a href="{{url('/public/storage/startups').'/'.$startup_doc->file}}" target="_blank" class="btn btn-success"><i class="fa fa-download"></i></a>
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0)" data-trid="trid_{{$key}}" delete-delete_doc-route="{{route('userpanel.startup.delete_doc',$startup_doc->uuid)}}" class="btn btn-danger deleteAction"><i class="fa fa-trash"></i></a>
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

                    <div class="modal-footer flex-center">
                        <button type="submit" class="btn btn-success modal_action actionBtn"> Update</button>
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Modal - New Target-->

</div>

