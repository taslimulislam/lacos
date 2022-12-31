@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')

<!--/.Content Header (Page header)-->
<div class="body-content">
    @include('backend.layouts.common.validation')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">User Type List</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <a href="#" class="action-item"><i class="ti-reload"></i></a>
                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#create-user-type"><i class="fa fa-plus-circle"></i>&nbsp;Add User Type</a>
                         @include('user::modal.user-type-create')
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table display table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="10%">Sl.</th>
                            <th width="50%">Title</th>
                            <th width="30%">Status</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($userTypes as $key => $userType)
                        <tr>
                            <td>#{{ $key + 1 }}</td>
                            <td>{{$userType->user_type_title }}</td>
                            <td>
                                @if($userType->is_active == 1)
                                   <span class="badge bg-success">Active</span>
                                @elseif($userType->is_active == 0)
                                <span class="badge bg-danger ">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary-soft btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit-user_type-{{ $userType->id }}" title="Edit"><i class="fa fa-edit"></i></a>

                                <a href="javascript:void(0)" class="btn btn-danger-soft btn-sm delete-confirm" data-bs-toggle="tooltip" title="Delete" data-route="{{ route('user-types.destroy',$userType->uuid) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @include('user::modal.user-type-edit')
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Empty Data</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
<!--/.body content-->
@endsection
@push('js')
       <script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script>
@endpush
