@extends('backend.layouts.app')
@section('content')
    <link href="{{ asset('public/backend') }}/assets/plugins/bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="{{ asset('public/backend') }}/assets/plugins/jQuery/jquery.min.js"></script>
    <script src="{{ asset('public/backend') }}/assets/plugins/bootstrap/js/bootstrap-datepicker.min.js"></script>
    <!--/.Content Header (Page header)-->
    <div class="body-content">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 fw-semi-bold mb-0">Startups Add</h6>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="leadForm" action="{{route('admin.startups.store')}}" method="POST" enctype="multipart/form-data">
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
                                <label for="email" class="col-sm-2 col-form-label ps-0">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-10 pe-0">
                                    <input type="email" class="form-control" name="email"  required>
                                    @if ($errors->has('email'))
                                        <div class="error text-danger text-start">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="password" class="col-sm-2 col-form-label ps-0">Password <span class="text-danger">*</span></label>
                                <div class="col-lg-10 pe-0">
                                    <input type="password" class="form-control" name="password"  required>
                                    @if ($errors->has('password'))
                                        <div class="error text-danger text-start">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Short description</label>
                                <div class="col-lg-10 pe-0">
                                    <textarea class="form-control" id="" cols="30" rows="1" name="description"  required></textarea>
                                    @if ($errors->has('description'))
                                        <div class="error text-danger text-start">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Address</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="text" class="form-control" name="address" placeholder="" value="" required>
                                    @if ($errors->has('address'))
                                        <div class="error text-danger text-start">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>

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
                                <label for="year" class="col-sm-2 col-form-label ps-0">No. of employees</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="number" class="form-control" name="no_of_employees" placeholder="" value="" autocomplete="off" required>
                                    @if ($errors->has('no_of_employees'))
                                        <div class="error text-danger text-start">{{ $errors->first('no_of_employees') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Year Launched</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="text" class="form-control year_launched" name="year_launched" placeholder="YYYY" value="" readonly required>
                                    @if ($errors->has('year_launched'))
                                        <div class="error text-danger text-start">{{ $errors->first('year_launched') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Industry</label>
                                <div class="col-lg-10 pe-0">
                                    <select type="text" class="form-select search_test" name="industry" required>
                                        <option value="">Select Industry</option>
                                        @foreach($industries as $industry)
                                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('industry'))
                                        <div class="error text-danger text-start">{{ $errors->first('industry') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Market Segment</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="text" class="form-control" name="market_segment" placeholder="" value="">
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Funding Stage</label>
                                <div class="col-lg-10 pe-0">
                                    <select name="funding_stage" class="search_test form-select">
                                        <option value="">Select {{__('Funding Stage')}}</option>
                                        @foreach($investstage as $key => $type)
                                        <option value="{{ $type->id }}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="product_stage" class="col-sm-2 col-form-label ps-0">Product Stage</label>
                                <div class="col-lg-10 pe-0">
                                    <select name="product_stage_id" class="search_test form-select">
                                        <option value="">Select {{__('Product Stage')}}</option>
                                            @foreach(productStage() as $key => $stage)
                                            <option value="{{ $key }}">{{$stage}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">About the startup <span class="text-danger">*</span></label>
                                <div class="col-lg-10 pe-0">
                                    <textarea name="about" class="form-control" id="" cols="30" rows="1" required></textarea>
                                    @if ($errors->has('about'))
                                        <div class="error text-danger text-start">{{ $errors->first('about') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Website link</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="link" class="form-control" name="web_link" placeholder="" value="">
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="year" class="col-sm-2 col-form-label ps-0">Twitter link</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="link" class="form-control" name="twitter_link" placeholder="" value="">
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="vat" class="col-sm-2 col-form-label ps-0">Facebook link</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="link" class="form-control" name="fb_link" placeholder="" value="">
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="vat" class="col-sm-2 col-form-label ps-0">Instagram link</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="link" class="form-control" name="insta_link" placeholder="" value="">
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="vat" class="col-sm-2 col-form-label ps-0">LinkedIn link</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="link" class="form-control" name="linkedIn_link" placeholder="" value="">
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="vat" class="col-sm-2 col-form-label ps-0">Select News Post</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="text" class="form-control" name="news_post_id" placeholder="" value="">
                                </div>
                            </div>

                            <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                                <label for="vat" class="col-sm-2 col-form-label ps-0">Startup up logo</label>
                                <div class="col-lg-10 pe-0">
                                    <input type="file" class="form-control" name="startup_logo" placeholder="" value="" required>
                                    @if ($errors->has('startup_logo'))
                                        <div class="error text-danger text-start">{{ $errors->first('startup_logo') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive" id="document_table">
                                <thead>
                                    <tr>
                                        <th>Document Title</th>
                                        <th>Document Upload</th>
                                        <th><button type="button" class="btn btn-primary" id="add_row"><i class="fa fa-plus"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="document_title[]" id="document_title_0" placeholder="" required value="">
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" name="document_upload[]" id="document_upload_0" placeholder="" required value="">
                                        </td>
                                        <td>
                                            <button type="button" id="remove_row" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
    <script>
        $(".year_launched").datepicker( {
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
@endsection
@push('js')

    <script type="text/javascript">
        var i = 1;
        $(document).on("click", "#add_row", function() {
            var $new_row = $(`
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="document_title[]" id="document_title_`+i+`" placeholder="" value="" required>
                                    </td>
                                    <td>
                                        <input type="file" class="form-control" name="document_upload[]" id="document_upload_`+i+`" placeholder="" value="" required>
                                    </td>
                                    <td>
                                        <button type="button" id="remove_row" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            `);

            $("#document_table").append($new_row);
            i++;
        });
        $("#document_table").on('click', '#remove_row', function() {
            $(this).closest('tr').remove();
            i--;
        });
    </script>
@endpush

