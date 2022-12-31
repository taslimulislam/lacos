@extends('backend.layouts.app')
@section('content')
    <link href="{{asset('public/backend/assets/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css">
    <!--/.Content Header (Page header)-->
    <div class="body-content">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 fw-semi-bold mb-0">Add Plan</h6>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.plans.update',$plan->uuid)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-10 pe-0">
                                    <input type="text" class="form-control" name="name" placeholder="" value="{{$plan->name}}" required>
                                    @if ($errors->has('name'))
                                        <div class="error text-danger text-start">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Price</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="number" class="form-control" name="price" placeholder="" value="{{$plan->price}}" required>
                                    @if ($errors->has('price'))
                                        <div class="error text-danger text-start">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">No of Startup views</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="number" class="form-control" name="startup_views" placeholder="" value="{{$plan->startup_views}}" required>
                                    @if ($errors->has('startup_views'))
                                        <div class="error text-danger text-start">{{ $errors->first('startup_views') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">No of Report views</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="number" class="form-control" name="report_views" placeholder="" value="{{$plan->report_views}}" required>
                                    @if ($errors->has('report_views'))
                                        <div class="error text-danger text-start">{{ $errors->first('report_views') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Short Description</label>
                                <div class="col-lg-10 pe-0">
                                    <textarea name="description" class="form-control" id="" cols="30" rows="1" required>{{$plan->description}}</textarea>
                                    @if ($errors->has('description'))
                                        <div class="error text-danger text-start">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="vat" class="col-sm-2 col-form-label ps-0">Duration</label>
                                <div class="col-lg-10 pe-0">
                                    <select class="form-select" name="duration" id="duration">
                                        <option value="">Select Plan Duration</option>
                                        <option value="1" @if($plan->duration == 1) selected @endif> 1 month</option>
                                        <option value="2" @if($plan->duration == 2) selected @endif> 2 months</option>
                                        <option value="3" @if($plan->duration == 3) selected @endif> 3 months</option>
                                        <option value="4" @if($plan->duration == 4) selected @endif> 4 months</option>
                                        <option value="5" @if($plan->duration == 5) selected @endif> 5 months</option>
                                        <option value="6" @if($plan->duration == 6) selected @endif> 6 months</option>
                                        <option value="7" @if($plan->duration == 7) selected @endif> 7 months</option>
                                        <option value="8" @if($plan->duration == 8) selected @endif> 8 months</option>
                                        <option value="9" @if($plan->duration == 9) selected @endif> 9 months</option>
                                        <option value="10" @if($plan->duration == 10) selected @endif > 10 months</option>
                                        <option value="11" @if($plan->duration == 11) selected @endif > 11 months</option>
                                        <option value="12" @if($plan->duration == 12) selected @endif > 12 months</option>
                                    </select>
                                    {{$plan->feature}}
                                    @if ($errors->has('name'))
                                        <div class="error text-danger text-start">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Features</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="text" style="width: 100% !important" value="{{$plan->features}}" name="feature" data-role="tagsinput" />

                                    @if ($errors->has('feature'))
                                        <div class="error text-danger text-start">{{ $errors->first('feature') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="create_submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/.body content-->
    <script src="{{asset('public/backend/assets/bootstrap-tagsinput.js')}}"></script>
@endsection
@push('js')

@endpush

