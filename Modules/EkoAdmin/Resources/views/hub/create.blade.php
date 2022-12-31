@extends('backend.layouts.app')
@section('content')

<link href="{{ asset('public/backend') }}/assets/plugins/bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="{{ asset('public/backend') }}/assets/plugins/jQuery/jquery.min.js"></script>
<script src="{{ asset('public/backend') }}/assets/plugins/bootstrap/js/bootstrap-datepicker.min.js"></script>

<!--/.Content Header (Page header)-->
<div class="body-content">
    @include('backend.layouts.common.validation')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">Hubs Add</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="leadForm" action="{{route('admin.hubs.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">                   
                    <div class="col-lg-6">
                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="name" class="col-sm-3 col-form-label ps-0">{{__('language.name')}}<span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <input type="text" name="name" class="form-control" placeholder="{{__('language.name')}}"
                                required>
                               
                            </div>
                        </div>


                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="email" class="col-sm-3 col-form-label ps-0">Email <span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <input type="email" class="form-control" name="email"  required>
                                @if ($errors->has('email'))
                                    <div class="error text-danger text-start">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="password" class="col-sm-3 col-form-label ps-0">Password <span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <input type="password" class="form-control" name="password"  required>
                                @if ($errors->has('password'))
                                    <div class="error text-danger text-start">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>


                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="country" class="col-sm-3 col-form-label ps-0">{{__('language.country')}}<span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <select name="country_id" class="search_test form-select">
                                    <option value="">Select {{__('language.country')}}</option>
                                    @foreach($country as $key => $type)
                                    <option value="{{ $type->id }}">{{$type->country_name}}</option>
                                    @endforeach
                                </select>
                               
                            </div>
                        </div>

                        


                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="no_investments" class="col-sm-3 col-form-label ps-0">{{__('language.no_investments')}}<span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <input type="number" name="num_of_investment" class="form-control" placeholder="{{__('language.no_investments')}}"
                                required>
                               
                            </div>
                        </div>
                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="industry" class="col-sm-3 col-form-label ps-0">{{__('language.industry')}}<span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <select name="industry_id" class="search_test form-select">
                                    <option value="">Select {{__('language.industry')}}</option>
                                    @foreach($industry as $key => $type)
                                    <option value="{{ $type->id }}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                               
                            </div>
                        </div>
                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="address" class="col-sm-3 col-form-label ps-0">{{__('language.address')}}<span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <input type="text" name="address" class="form-control" placeholder="{{__('language.address')}}"
                                 required >
                                
                            </div>
                        </div>
                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="website_link"
                                class="col-sm-3 col-form-label ps-0">{{__('language.website_link')}}<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <input type="link" name="web_link" class="form-control"
                                    placeholder="{{__('language.website_link')}}" required>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        
                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="year_launched" class="col-sm-3 col-form-label ps-0">{{__('language.year_launched')}}<span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <input type="text" name="year_launched" class="form-control yearpicker" placeholder="{{__('language.year_launched')}}"
                                 required >
                                
                            </div>
                        </div>
                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="hub_logo" class="col-sm-3 col-form-label ps-0">{{__('language.hub_logo')}}<span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                            <input class="form-control" name="logo" type="file">
                                
                            </div>
                        </div>
                        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                            <label for="hub_about" class="col-sm-3 col-form-label ps-0">{{__('language.hub_about')}}<span class="text-danger">*</span></label>
                            <div class="col-lg-9 pe-0">
                                <textarea name="about" id="" class="form-control" cols="30" rows="7"></textarea>
                                
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
                                    <th><button type="button" class="btn btn-primary" id="add_row"><i
                                                class="fa fa-plus"></i></button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="document_title[]"
                                            id="document_title_0" placeholder="" required value="">
                                    </td>
                                    <td>
                                        <input type="file" class="form-control" name="document_upload[]"
                                            id="document_upload_0" placeholder="" required value="">
                                    </td>
                                    <td>
                                        <button type="button" id="remove_row" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>           
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="create_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.body content-->



<script>
    $(".yearpicker").datepicker( {
    format: "yyyy", // Notice the Extra space at the beginning
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
