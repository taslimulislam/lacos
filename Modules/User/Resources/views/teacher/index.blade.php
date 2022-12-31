@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')

<!--/.Content Header (Page header)-->
<div class="body-content">

    <div class="card mb-4">
        @include('backend.layouts.common.validation')
        @include('backend.layouts.common.message')

        <div class="card-header mt-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">Teacher List</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <a href="#" class="action-item"><i class="ti-reload"></i></a>
                        <a href="{{route('teachers.create')}}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus-circle"></i>
                            &nbsp;Add Teacher
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="example" class="table display table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="5%">Sl.</th>
                            <th width="7%">Teacher Code</th>
                            <th width="13%">Name</th>
                            <th width="10%">Email</th>
                            <th width="5%">Gender</th>
                            <th width="5%">Age</th>
                            <th width="10%">Company</th>
                            <th width="10%">Branch</th>
                            <th width="10%">Join Date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teachers as $key => $teacher)
                        <tr>
                            <td>#{{ $key + 1 }}</td>
                            <td>{{$teacher->teacher_code }}</td>
                            <td>{{$teacher->full_name }} </td>
                            <td>{{$teacher->email }}</td>
                            <td>{{$teacher->gender ? $teacher->gender->gender_name : '' }}</td>
                            <td>{{age($teacher->dob)}}</td> 
                            <td>{{$teacher->company ? $teacher->company->institute_name : '' }}</td>
                            <td>{{$teacher->branch ? $teacher->branch->branch_name : '' }}</td>
                            <td>{{$teacher->joining_date}}</td>
                            <td> 
                                <a href="#" class="btn btn-primary-soft btn-sm me-1" data-bs-toggle="modal" data-bs-target="#course-teacher-assign-{{$teacher->id}}" title="Asssign Course"><i class="fa-solid fa-square-plus"></i></a>
                                @include('user::teacher.modal.course-assign')

                                <a href="{{ route('teachers.edit',$teacher->uuid) }}" class="btn btn-primary-soft btn-sm me-1"  title="Edit"><i class="fa-solid fa-soft fa-edit"></i></a>

                                <a href="javascript:void(0)" class="btn btn-danger-soft btn-sm delete-confirm" data-bs-toggle="tooltip" title="Delete" data-route="{{ route('teachers.destroy',$teacher->uuid) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="10" class="text-center">Empty Data</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            {!! $teachers->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>


    </div>
</div>
<!--/.body content-->
@endsection
@push('js')
<script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script>
@endpush
