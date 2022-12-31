@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')

    <!--/.Content Header (Page header)-->
    <div class="body-content">

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 fw-semi-bold mb-0">Academia List</h6>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table display table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Logo</th>
                                <th>Institute Name</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($academias as $academia)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img style="width: 50px; height: 50px" src="{{asset('public/storage/academia/'.$academia->logo)}}" alt="no img"></td>
                                <td>{{$academia->name}}</td>
                                <td>{{ date('d-M-Y', strtotime($academia->created_at)) }}</td>
                                <td>
                                    <a href="{{route('admin.academia.edit',$academia->uuid)}}" class="btn btn-primary-soft btn-sm me-1" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.academia.delete',$academia->uuid)}}" title="Delete" class="btn btn-danger-soft btn-sm me-1"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
    </div>
    <!--/.body content-->
@endsection
@push('js')

@endpush
