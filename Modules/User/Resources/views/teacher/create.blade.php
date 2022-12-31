@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')

<!--/.Content Header (Page header)-->
<div class="body-content">
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">Add New Teacher</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <a href="#" class="action-item"><i class="ti-reload"></i></a>
                        <a href="{{route('teachers.index')}}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>&nbsp;Teacher List</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <form id="leadForm" action="{{route('teachers.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="row">                      
                        <div class="col-md-6">

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="company_id" class="col-sm-3 col-form-label ps-0">Institute Name <span class="text-danger">*</span></label>
                                <div class="col-lg-9 pe-0">                                    
                                    <select name="company_id" class="form-select common" id="company_id">
                                        <option value="">Select Institute</option>
                                        @foreach($companies as $key => $company)
                                        <option value="{{ $company->id }}" {{old('company_id') == $company->id ? 'selected' : ''}}>{{$company->institute_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('company_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="branch_id" class="col-sm-3 col-form-label ps-0">School Name <span class="text-danger">*</span></label>
                                <div class="col-lg-9 pe-0">                                    
                                    <select name="branch_id" class="form-select common" id="branch_id">
                                        <option value="">Select School</option>
                                        @foreach($branches as $key => $school)
                                        <option value="{{ $school->id }}" {{old('branch_id') == $school->id ? 'selected' : ''}} data-uuid="{{$school->uuid}}">{{$school->branch_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('branch_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('branch_id') }}</div>
                                    @endif
                                </div>
                            </div>                            
                                          
                            
                            @input(['input_name' => 'first_name'])
                            @input(['input_name' => 'middle_name', 'required' => 'false'])
                            @input(['input_name' => 'last_name'])
                            @input(['input_name' => 'dob', 'type' => 'date', 'additional_class' => 'common'])

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="gender_id" class="col-sm-3 col-form-label ps-0">Gender<span class="text-danger">*</span></label>
                                <div class="col-lg-9 pe-0">
                                    <select name="gender_id" class="form-select" id="gender_id">
                                        <option value="">Select Gender</option>
                                        @foreach($genders as $key => $gender)
                                        <option value="{{ $gender->id }}" {{old('gender_id') == $gender->id ? 'selected' : ''}}>{{$gender->gender_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('gender_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('gender_id') }}</div>
                                    @endif
                                </div>
                            </div>
                            @input(['input_name' => 'contact_no'])
                            @input(['input_name' => 'email', 'type' => 'email'])

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="nationality_id" class="col-sm-3 col-form-label ps-0">Nationality<span class="text-danger">*</span></label>
                                <div class="col-lg-9 pe-0">
                                    <select name="nationality_id" class="form-select" id="nationality_id">
                                        <option value="">Select Nationality</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{$nationality->id}}" {{old('nationality_id') == $nationality->id ? 'selected' : ''}}>{{$nationality->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('nationality_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('nationality_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            @textarea(['input_name' => 'address'])
                        </div>


                        <div class="col-md-6">   

                            @input(['input_name' => 'blood_group', 'required' => 'false'])
                            @input(['input_name' => 'nid'])
                            @input(['input_name' => 'punch_card_id', 'required' => 'false'])

                            @input(['input_name' => 'father_name'])
                            @input(['input_name' => 'father_contact'])
                            @input(['input_name' => 'mother_name'])
                            @input(['input_name' => 'spouse_name'])
                            @input(['input_name' => 'joining_date', 'type' => 'date'])
                            @radio(['input_name'=>'is_teacher','data_set' => [1 => 'Yes' ,0 => 'No'], 'value' => 1])
                            @radio(['input_name'=>'is_staff','data_set' => [1 => 'Yes' ,0 => 'No'], 'value' => 0])
                            @radio(['input_name'=>'is_active','data_set' => [1 => 'Active' ,0 => 'Inactive'], 'value' => 1])

                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-warning">Reset</button>
                      <button type="submit"  class="btn btn-primary" id="create_submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/.body content-->
@endsection
@push('js')       
@endpush
