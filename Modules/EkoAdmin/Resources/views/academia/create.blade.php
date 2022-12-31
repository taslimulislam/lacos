@extends('backend.layouts.app')
@section('content')
    <!--/.Content Header (Page header)-->
    <div class="body-content">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 fw-semi-bold mb-0">Academia Add</h6>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.academia.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-10 pe-0">
                                    <input type="text" class="form-control" name="name" placeholder="" value="" required>
                                    @if ($errors->has('name'))
                                        <div class="error text-danger text-start">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Industry</label>
                                <div class="col-lg-10 pe-0">
                                    <select type="text" class="form-select search_test" name="industry_id" required>
                                        <option value="">Select Industry</option>
                                        @foreach($industries as $industry)
                                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('industry_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('industry_id') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Country</label>
                                <div class="col-lg-10 pe-0">
                                    <select class="form-select search_test" id="" name="country_id" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <div class="error text-danger text-start">{{ $errors->first('country_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="vat" class="col-sm-2 col-form-label ps-0">Academia Up Logo</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="file" class="form-control" name="academiaup_logo" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="create_submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/.body content-->
@endsection
@push('js')

@endpush

