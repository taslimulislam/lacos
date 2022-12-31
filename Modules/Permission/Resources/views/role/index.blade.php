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
                    <h6 class="fs-17 fw-semi-bold mb-0">Role List</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addRole"><i class="fa fa-plus-circle"></i>&nbsp;Add Role</a>
                         @include('permission::role.create')
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="example" class="table display table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Role Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dbData as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$data?->name}}</td>

                            <td>
                                <a href="#" class="btn btn-primary-soft btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editRole{{ $data->id }}" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger-soft btn-sm delete-confirm" data-bs-toggle="tooltip" title="Delete" data-route="{{ route('roles.destroy',$data->id) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @include('permission::role.edit')
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">Empty Data</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            {{$dbData->links()}}
        </div>


    </div>
</div>
<!--/.body content-->
@endsection
@push('js')
       <script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script>
@endpush
