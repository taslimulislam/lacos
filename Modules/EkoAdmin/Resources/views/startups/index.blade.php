@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')

    <!--/.Content Header (Page header)-->
    <div class="body-content">

        <div class="row">
            <div class="col-12 pe-3">
                <div class="accordion accordion-flush px-0 mb-2" id="accordionFlushExample">
                    <div class="accordion-item">

                        <h2 class="accordion-header d-flex justify-content-end mb-3" id="flush-headingOne">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Filter</button>
                        </h2>
                        
                        <div id="flush-collapseOne" class="accordion-collapse collapse bg-white px-3 {{empty(request()->all())?'':'show'}}" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <form action="{{route('admin.startups.index')}}" method="GET" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-4 mb-3">
                                        <label class="col-form-label text-end fw-semi-bold">Country</label>
                                        <div class="col-12">

                                            <select class="form-select search_test" id="" name="country_id" >
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                @endforeach
                                            </select>

                                        
                                        </div>
                                    </div>
                                

                                    <div class="col-4 mb-3">
                                        <label class="col-form-label text-end fw-semi-bold">Industry</label>
                                        <div class="col-12">
                                            <select type="text" class="form-select search_test" name="industry" >
                                                <option value="">Select Industry</option>
                                                @foreach($industries as $industry)
                                                    <option value="{{$industry->id}}">{{$industry->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-4 mb-3">
                                        <label class="col-form-label text-end fw-semi-bold">Funding Stage</label>
                                        <div class="col-12">
                                            <select name="funding_stage" class="search_test form-select">
                                                <option value="">Select {{__('Funding Stage')}}</option>
                                                @foreach($investstage as $key => $type)
                                                <option value="{{ $type->id }}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-4 mb-3">
                                        <label class="col-form-label text-end fw-semi-bold"></label>
                                        <div class="col-12 " style="margin-top:15px;">
                                            <button class="btn btn-primary me-2 go">Filter</button>
                                            <button class="btn btn-danger reset">Reset</button>
                                        </div>
                                    </div>

                                
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 fw-semi-bold mb-0">Startups List</h6>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#create-financial-year"><i class="fa fa-upload"></i>&nbsp;Startups Import</a>
                        <a href="{{route('admin.startups.export')}}" class="btn btn-success btn-sm"><i
                                class="fa fa-download"></i>&nbsp;Startups Export </a>

                        <div class="modal fade" id="create-financial-year" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">
                                        Startups Import
                                        </h5>
                                    </div>
                                    <form id="leadForm" action="{{ route('admin.startups.import') }}" method="POST" enctype="multipart/form-data">
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
                    <table id="example" class="table display table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Logo</th>
                                <th>Company Name</th>
                                <th>Industry Name</th>
                                <th>Description</th>
                                <th>Web Link</th>
                                <th>No. of Employees</th>
                                <th>Year Launched</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($startups as $startup)
                                @php
                                    if($startup->logo){
                                        $dom = explode('//',$startup->logo);
                                        if(count($dom)>1){
                                            $img = $startup->logo;
                                        }else{
                                            $img =  url('/public/storage/startups/'.@$startup->logo);
                                        }
                                    }else{
                                        $img = url('/public/demoimg/placeholder.jpg');
                                    }
                                @endphp 
                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <td><img style="width: 50px; height: 50px" src="{{$img}}" alt="nai"></td>
                                    <td>{{$startup->name}}</td>
                                    <td>{{$startup->industryadd?->name}}</td>
                                    <td>{{Str::limit($startup->description,50)}}</td>
                                    <td>
                                        {{$startup->address}} <br>
                                        {{$startup->web_link}}
                                    </td>
                                    <td>{{$startup->no_of_employees}}</td>
                                    <td>{{$startup->year_launched}}</td>
                                    <td>
                                        <a href="{{route('admin.startups.edit',$startup->uuid)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.startups.delete',$startup->uuid)}}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $startups->links() }}
             
            </div>


        </div>
    </div>
    <!--/.body content-->
@endsection
@push('js')

@endpush
