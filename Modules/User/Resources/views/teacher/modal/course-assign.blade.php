<!-- Modal -->
<div class="modal fade" id="course-teacher-assign-{{$teacher->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
                Assign Course to <strong>{{ $teacher->full_name }}</strong>
            </h5>
        </div>
        <form id="leadForm" action="{{route('courses.teacher-assign')}}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
                <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                    <label for="ac_year" class="col-sm-3 col-form-label ps-0">Academic Year  <span class="text-danger">*</span></label>
                    <div class="col-lg-9 pe-0">
                        <select name="academic_year_id" class="form-select custom-select {{ $errors->first('academic_year_id') ? 'is-invalid' : '' }}" >
                            <option value="">Select Academic Year</option>
                            @foreach($academic_years as $key => $year)
                                <option value="{{ $year->id }}" {{ @old('academic_year_id') == $year->id ? 'selected' : '' }}>{{$year->academic_year}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('academic_year_id'))
                            <div class="error text-danger text-start">{{ $errors->first('academic_year_id') }}</div>
                        @endif
                    </div>
                  </div>
                  <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                      <label for="ac_year" class="col-sm-3 col-form-label ps-0">{{__('language.semester')}} <span class="text-danger">*</span></label>
                      <div class="col-lg-9 pe-0">
                          <select name="semester_id" class="form-select custom-select {{ $errors->first('semester_id') ? 'is-invalid' : '' }}" >
                              <option value="">{{__('language.select_semester')}}</option>
                              @foreach($semesters as $key => $semester)
                                  <option value="{{ $semester->id }}" {{ @old('semester_id') == $semester->id ? 'selected' : '' }}>{{$semester->semester_name}}</option>
                              @endforeach
                          </select>
                          @if ($errors->has('semester_id'))
                              <div class="error text-danger text-start">{{ $errors->first('semester_id') }}</div>
                          @endif
                      </div>
                  </div>
                  <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                      <label for="program_id" class="col-sm-3 col-form-label ps-0">Program <span class="text-danger">*</span></label>
                      <div class="col-lg-9 pe-0">  
                          <select class="form-select custom-select {{ $errors->first('semester_id') ? 'is-invalid' : '' }}" name="program_id" >
                                <option value="">Select Program</option>
                                @foreach($programs as $key => $program)
                                    <option value="{{ $program->id }}" {{ @old('program_id') == $program->id ? 'selected' : '' }}>{{$program->program_name}}</option>
                                @endforeach
                          </select>                        
                          @if ($errors->has('program_id'))
                              <div class="error text-danger text-start">{{ $errors->first('program_id') }}</div>
                          @endif
                      </div>
                  </div>
                  <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                    <label for="ac_year" class="col-sm-3 col-form-label ps-0">Course <span class="text-danger">*</span> </label>
                      <div class="col-lg-9 pe-0">
                          <select name="course_id[]" class="basic-multiple form-select custom-select {{ $errors->first('course_id') ? 'is-invalid' : '' }}" multiple >
                              <option value="">Select Course</option>
                              @foreach($courses as $key => $course)
                                  <option value="{{ $course->id }}" {{ @old('course_id') == $course->id ? 'selected' : '' }}>{{$course->course_name}}</option>
                              @endforeach
                          </select>
                          @if ($errors->has('course_id'))
                              <div class="error text-danger text-start">{{ $errors->first('course_id') }}</div>
                          @endif
                      </div>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button  class="btn btn-primary" id="create_submit">Assign</button>
          </div>
        </form>
      </div>
    </div>
  </div>