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
                        <form action="{{route('admin.investor.index')}}" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-4 mb-3">
                                    
                                    <label class="col-form-label text-end fw-semi-bold">Country</label>
                                    <div class="col-12">
                                        <select name="country_id" class="form-control placeholder-single">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{$country->id==request()->get('country_id')?'selected':''}}>{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            

                                <div class="col-4 mb-3">
                                    <label class="col-form-label text-end fw-semi-bold">Industry</label>
                                    <div class="col-12">
                                        <select class="form-select placeholder-single" name="industry" >
                                            <option value="">Select Industry</option>
                                            @foreach($industries as $industry)
                                                <option value="{{$industry->id}}" {{$industry->id==request()->get('industry')?'selected':''}}>{{$industry->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4 mb-3">
                                    <label class="col-form-label text-end fw-semi-bold">Funding Stage</label>
                                    <div class="col-12">
                                        <select name="funding_stage" class="placeholder-single form-select">
                                            <option value="">Select {{__('Funding Stage')}}</option>
                                            @foreach($investstage as $key => $type)
                                            <option value="{{ $type->id }}" {{$type->id==request()->get('funding_stage')?'selected':''}}>{{$type->name}}</option>
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


    @include('backend.layouts.common.validation')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">Investor List</h6>
                </div>
                <div class="text-end">
                    <div class="actions">

                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#create-financial-year"><i class="fa fa-upload"></i>&nbsp;Investor Import</a>
                        <a href="{{route('admin.investor.export')}}" class="btn btn-success btn-sm"><i
                                class="fa fa-download"></i>&nbsp;investor Export </a>
                        <a href="{{route('admin.investor.create')}}" class="btn btn-success btn-sm"><i
                                class="fa fa-plus-circle"></i>&nbsp;Add </a>
                        <div class="modal fade" id="create-financial-year" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">
                                        Investor Import
                                        </h5>
                                    </div>
                                    <form id="leadForm" action="{{ route('admin.investor.import') }}" method="POST" enctype="multipart/form-data">
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
                            <th width="10%">Sl.</th>
                            <th width="10%">{{__('language.companylogo')}}</th> 
                            <th width="10%">{{__('language.company_name')}}</th>
                            <th width="10%">{{__('language.country')}}</th>
                            <th width="10%">{{__('language.industry')}}</th>
                            <th width="10%">{{__('language.investortype')}}</th>
                            <th width="10%">{{__('language.investstage')}}</th>
                            <th width="10%">{{__('language.investexit')}}</th>
                            <th width="10%">{{__('language.year_founded')}}</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($investor as $key => $inv)

                        @php
                            if($inv->logo){
                              $dom = explode('//',$inv->logo);
                              if(count($dom)>1){
                                $img = $inv->logo;
                              }else{
                                $img =  url('/public/storage/'.@$inv->logo);
                              }

                            }else{
                              $img = url('/public/demoimg/placeholder.jpg');
                            }
                          @endphp 
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{$img}}" height="75" width="75" alt="" /></td> 
                            <td>{{$inv?->company_name }}</td>
                            <td>{{$inv?->country?->country_name }}</td>
                            <td>{{$inv?->industry?->name }}</td>
                            <td>{{$inv?->investorType?->name }}</td>
                            <td>{{$inv?->investmentStage?->name }}</td>
                            <td>{{$inv?->investmentExit?->name }}</td>
                            <td>{{$inv?->year_founded }}</td>

                            <td>
                                <a href="{{ route('admin.investor.edit',$inv->uuid)}}"
                                    class="btn btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.investor.delete',$inv->uuid) }}"
                                    onclick="return confirm(' You want to delete?');"
                                    class="btn btn-danger btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="10" class="text-center">Empty Data</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{ $investor->links() }}
            </div>
        </div>


    </div>
</div>
<!--/.body content-->
@endsection
@push('js')
<script>
$('.reset').click(function(e) {
    e.preventDefault();
    $('.accordion-item').find('select').val('').trigger('change') ;
    $('.mydaterenge').val('');
});
</script>
<!-- <script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script> -->
@endpush