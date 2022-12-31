<div class="modal fade" id="addCurrencyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="currency-form" action="{{route('currencies.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Currency</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="currency_id" id="currency-id">
                    @input(['input_name' => 'title', 'additional_id' => 'currency_title'])                        
                    @input(['input_name' => 'symbol', 'additional_id' => 'symbol'])                       
                    
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="countries" class="col-sm-2 col-form-label ps-0">Country<span class="text-danger">*</span></label>
                        <div class="col-lg-10 pe-0">
                            <select name="country_id" id="countries" class="form-control {{ $errors->first('country_id') ? 'is-invalid' : '' }} form-control-sm basic-single" >
                                <option value="">Select One</option>
                                @foreach($countries as $country)
                                    <option value="{{  $country->id }}">{{ $country->title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country_id'))
                                <div class="error text-danger">{{ $errors->first('country_id') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="" class="col-sm-2 col-form-label ps-0">Status</label>
                        <div class="col-lg-10 pe-0">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="status" value="1" id="currency_status_active" checked>   
                                <label for="currency_status_active" class="form-check-label">Active</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="status" value="0" id="currency_status_inactive" > 
                                <label for="currency_status_inactive" class="form-check-label">Inactive</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" id="currency-submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
    <script>
        $('.edit-currency').click(function (e) {
            e.preventDefault();
            var currency_id = $(this).val();
            $.get('currencies/' + currency_id + '/edit', function (response) {
                $('#currency-id').val(currency_id);
                $('#currency_title').val(response.data.title);
                $('#symbol').val(response.data.symbol);
                $('#countries').val(response.data.country_id).change();
                response.data.status == 1 ? $('#currency_status_active').attr("checked", "checked").change() : $('#currency_status_inactive').attr("checked", "checked").change();            
                $('#addCurrencyModal').modal('show');
            })

            $("#currency-submit").click(function(e){ 
                e.preventDefault();
                var currency_id = $('#currency-id').val();
                var currencyData = $('#currency-form').serializeArray();            
                var currencyRoute = "{{ route('currencies.update', ':id')}}";
                currencyRoute = currencyRoute.replace(':id', currency_id);
                ajaxSubmit(currencyRoute, 'PUT', currencyData);
                $('#addCurrencyModal').modal('hide');
                location.reload();
            });
        });
    </script>
@endpush