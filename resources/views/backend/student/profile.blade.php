@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')
<div class="body-content">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ $student->full_name }}</span><span class="text-black-50">{{ $student->student_email }}</span><span> </span></div>
            </div>
            <div class="col-md-9">
                <div class="accordion p-5" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <strong>Student Information</strong>
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                               <div class="col-md-6">
                                <table class="table table-sm table-bordered text-start">
                                    <tr>
                                        <td  width="40%">Name</td>
                                        <td  width="60%">{{ $student->full_name ?? '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Student Code</td>
                                        <td>{{  $student->student_code ? $student->student_code : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%">Email</td>
                                        <td width="60%">{{ $student->email ? $student->email : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>{{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('j F, Y') : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{ $student->gender->gender_name ? $student->gender->gender_name : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>---</td>
                                        <td>---</td>
                                    </tr>
                                </table>
                               </div>
                               <div class="col-md-6">
                                <table class="table table-sm table-bordered text-start">
                                    <tr>
                                        <td width="40%">Student Contact No.</td>
                                        <td  width="60%">{{ $student->student_contact_no ? $student->student_contact_no : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Student Contact No2.</td>
                                        <td>{{ $student->student_contact_no2 ? $student->student_contact_no2 : '---' }}</td>
                                    </tr>
    
    
                                    <tr>
                                        <td>Nationality</td>
                                        <td>{{ $student->nationality ? $student->nationality->name : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>NID No.</td>
                                        <td>{{ $student->nid ? $student->nid : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Current Address</td>
                                        <td>{{ $student->current_address  ? $student->current_address : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Parmanent Address</td>
                                        <td>{{ $student->parmanent_address ? $student->parmanent_address : '---' }}</td>
                                    </tr>
                                </table>
                               </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong>Academic Information</strong>
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6">
                                 <table class="table table-sm table-bordered text-start">
                                    <tr>
                                        <td>Student ID</td>
                                        <td>{{ $student->student_roll_id ? $student->student_roll_id : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td  width="40%">Institute</td>
                                        <td  width="60%">{{ $student->student ? $student->company->institute_name : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td  width="40%">School</td>
                                        <td  width="60%">{{ $student->student ? $student->branch->branch_name : '---' }}</td>
                                    </tr>
                                     <tr>
                                         <td  width="40%">Academic Year</td>
                                         <td  width="60%">{{ $student->academicYear ? $student->academicYear->academic_year : '---' }}</td>
                                     </tr>
                                     <tr>
                                         <td>{{__('language.semester')}}</td>
                                         <td>{{  $student->semester ? $student->semester->semester_name : '---' }}</td>
                                     </tr>
                                     <tr>
                                         <td>Program</td>
                                         <td>{{ $student->program ? $student->program->program_name : '---' }}</td>
                                     </tr>
                                     <tr>
                                         <td>Registration No.</td>
                                         <td>{{ $student->reg_no ? $student->reg_no : '---' }}</td>
                                     </tr>
    
                                 </table>
                                </div>
                                <div class="col-md-6">
                                 <table class="table table-sm table-bordered text-start">
    
                                    <tr>
                                        <td width="40%">Registration Date</td>
                                        <td width="60%">{{ $student->reg_date ? \Carbon\Carbon::parse($student->reg_date)->format('j F, Y') : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Admission No.</td>
                                        <td>{{ $student->adm_no ? $student->adm_no : '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Admission Date</td>
                                        <td>{{ $student->adm_date ? \Carbon\Carbon::parse($student->adm_date)->format('j F, Y') : '---' }}</td>
                                    </tr>
                                    <tr>
                                       <td>Last Qualification</td>
                                       <td>{{ $student->last_qualification ? $student->last_qualification : '---' }}</td>
                                   </tr>
                                   <tr>
                                       <td>Passing Year</td>
                                       <td>{{ $student->passing_year ? $student->passing_year : '---' }}</td>
                                   </tr>
                                   <tr>
                                       <td>Program Fee</td>
                                       <td>{{ $student->program_fee ? $student->program_fee : '---' }}</td>
                                   </tr>
                                   <tr>
                                       <td>Program Duration</td>
                                       <td>{{ $student->program_duration ? $student->program_duration.' Years': '---' }}</td>
                                   </tr>
    
                                 </table>
                                </div>
                             </div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong>Payment Information</strong>
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong>Family Information</strong>
                          </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush
