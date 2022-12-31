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
                    <h6 class="fs-17 fw-semi-bold mb-0">Edit Teacher</h6>
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
                <form id="leadForm" action="{{route('teachers.update', $teacher->uuid)}}" method="POST">
                    @method('PATCH')
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
                                        <option value="{{ $company->id }}" {{ $teacher->company_id == $company->id ? 'selected' : ''}}>{{$company->institute_name}}</option>
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
                                        <option value="{{ $school->id }}" {{$teacher->branch_id == $school->id ? 'selected' : ''}} data-uuid="{{$school->uuid}}">{{$school->branch_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('branch_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('branch_id') }}</div>
                                    @endif
                                </div>
                            </div>  
                            
                            @input(['input_name' => 'first_name', 'value' => $teacher->first_name])
                            @input(['input_name' => 'middle_name', 'required' => 'false', 'value' => $teacher->middle_name])
                            @input(['input_name' => 'last_name', 'value' => $teacher->last_name])
                            @input(['input_name' => 'dob', 'type' => 'date', 'value' => $teacher->dob])

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="gender_id" class="col-sm-3 col-form-label ps-0">Gender<span class="text-danger">*</span></label>
                                <div class="col-lg-9 pe-0">
                                    <select name="gender_id" class="form-select" id="gender_id">
                                        <option value="">Select Gender</option>
                                        @foreach($genders as $key => $gender)
                                        <option value="{{ $gender->id }}" {{$teacher->gender_id == $gender->id ? 'selected' : ''}}>{{$gender->gender_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('gender_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('gender_id') }}</div>
                                    @endif
                                </div>
                            </div>
                            @input(['input_name' => 'contact_no', 'value' => $teacher->contact_no])
                            @input(['input_name' => 'email', 'type' => 'email', 'value' => $teacher->email])

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="nationality_id" class="col-sm-3 col-form-label ps-0">Nationality<span class="text-danger">*</span></label>
                                <div class="col-lg-9 pe-0">
                                    <select name="nationality_id" class="form-select" id="nationality_id">
                                        <option value="">Select Nationality</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{$nationality->id}}" {{$teacher->nationality_id == $nationality->id ? 'selected' : ''}}>{{$nationality->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('nationality_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('nationality_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            @textarea(['input_name' => 'address', 'value' => $teacher->address])
                        </div>


                        <div class="col-md-6">   

                            @input(['input_name' => 'blood_group', 'required' => 'false', 'value' => $teacher->blood_group])
                            @input(['input_name' => 'nid', 'value' => $teacher->nid])
                            @input(['input_name' => 'punch_card_id', 'required' => 'false', 'value' => $teacher->punch_card_id])

                            @input(['input_name' => 'father_name', 'value' => $teacher->father_name])
                            @input(['input_name' => 'father_contact', 'value' => $teacher->father_name])
                            @input(['input_name' => 'mother_name', 'value' => $teacher->mother_name])
                            @input(['input_name' => 'spouse_name', 'value' => $teacher->spouse_name])
                            @input(['input_name' => 'joining_date', 'type' => 'date', 'value' => $teacher->joining_date])
                            @radio(['input_name'=>'is_teacher','data_set' => [1 => 'Yes' ,0 => 'No'], 'value' => $teacher->is_teacher])
                            @radio(['input_name'=>'is_staff','data_set' => [1 => 'Yes' ,0 => 'No'], 'value' => $teacher->is_staff])
                            @radio(['input_name'=>'is_active','data_set' => [1 => 'Active' ,0 => 'Inactive'], 'value' => $teacher->is_active])

                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit"  class="btn btn-primary" id="edit_submit">Update</button>
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
