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
                    <h6 class="fs-17 fw-semi-bold mb-0">Plans</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <a href="{{route('admin.plans.create')}}" class="btn btn-success btn-sm" ><i class="fa fa-plus-circle"></i>&nbsp;Add </a>

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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
{{--                            <th>DISCOUNT</th>--}}
                            <th>Duration</th>
                            <th>Features</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$plan->name }}</td>
                                <td>{{$plan->description }}</td>
                                <td>{{$plan->price }}</td>
                                <td>{{$plan->duration }}</td>
                                <td>{{ $plan->features }}</td>
                                <td>
                                    <a href="{{route('admin.plans.edit',$plan->uuid)}}" class="btn btn-primary-soft btn-sm me-1" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.plans.delete',$plan->uuid)}}" title="Delete" class="btn btn-danger-soft btn-sm me-1"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $plans->links() }}
            </div>
        </div>


    </div>
</div>
<!--/.body content-->
@endsection
@push('js')
       <!-- <script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script> -->
@endpush
