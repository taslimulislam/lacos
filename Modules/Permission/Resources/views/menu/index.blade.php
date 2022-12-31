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
                    <h6 class="fs-17 fw-semi-bold mb-0">Menu List</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addmenu"><i class="fa fa-plus-circle"></i>&nbsp;Add Menu</a>
                         @include('permission::menu.create')
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
                            <th>Menu Name</th>
                            <th>Parent Menu</th>
                            <th>Head Lable</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dbData as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{__('language.'.$data?->menu_name)}} </td>
                            <td>
                                {{-- {{parentMenu($data->parentmenu_id) ?? "" }} --}}
                                {{empty(parentMenu($data->parentmenu_id)) ? "" : __('language.'.parentMenu($data->parentmenu_id)) }}
                            </td>
                            <td>{{$data?->lable }}</td>

                            <td>
                                <a href="#" class="btn btn-primary-soft btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editMenu{{ $data->id }}" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger-soft btn-sm delete-confirm" data-bs-toggle="tooltip" title="Delete" data-route="{{ route('permissionmenu.destroy',$data->uuid) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @include('permission::menu.edit')
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
