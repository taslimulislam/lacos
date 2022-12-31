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
                    <h6 class="fs-17 fw-semi-bold mb-0">Hubs List</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#create-financial-year"><i class="fa fa-upload"></i>&nbsp;Hubs Import</a>
                        <a href="{{route('admin.hubs.export')}}" class="btn btn-success btn-sm"><i
                                class="fa fa-download"></i>&nbsp;Hubs Export </a>
                        <a href="{{route('admin.hubs.create')}}" class="btn btn-success btn-sm" ><i class="fa fa-plus-circle"></i>&nbsp;Add </a>
                        
                        <div class="modal fade" id="create-financial-year" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">
                                        Hubs Import
                                        </h5>
                                    </div>
                                    <form id="leadForm" action="{{ route('admin.hubs.import') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                                    <label for="companylogo"
                                                        class="col-sm-3 col-form-label ps-0">Import file<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-9 pe-0">
                                                        <input class="form-control" name="file" type="file">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" >Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                            
                            <th>{{__('language.hub_logo')}}</th>
                            <th>{{__('language.name')}}</th>
                            <th>{{__('language.country')}}</th>
                            <th>{{__('language.industry')}}</th>
                            <th>{{__('language.no_investments')}}</th>
                            <th>{{__('language.year_launched')}}</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hubs as $key => $hub)

                            @php
                                if($hub->logo){
                                    $dom = explode('//',$hub->logo);
                                    if(count($dom)>1){
                                        $img = $hub->logo;
                                    }else{
                                        $img =  url('/public/storage/'.@$hub->logo);
                                    }

                                }else{
                                    $img = url('/public/demoimg/placeholder.jpg');
                                }
                            @endphp 
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{$img}}" height="75" width="75" alt="" /></td>
                            
                            <td>{{$hub?->name }}</td>
                            <td>{{$hub?->country?->country_name }}</td>
                            <td>{{$hub?->industry?->name }}</td>
                            <td>{{$hub?->num_of_investment }}</td>
                            <td>{{$hub?->year_launched }}</td>
                            <td >
                                <a href="{{ route('admin.hubs.edit',$hub->uuid)}}" class="btn btn-success btn-sm"  title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.hubs.delete',$hub->uuid) }}" onclick="return confirm(' You want to delete?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Empty Data</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{ $hubs->links() }}
            </div>
        </div>


    </div>
</div>
<!--/.body content-->
@endsection
@push('js')
       <!-- <script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script> -->
@endpush
