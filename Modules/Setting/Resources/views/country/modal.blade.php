<!-- Add Country Modal -->
<div class="modal fade" id="addCountryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{route('countries.store')}}" id="add-country" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title" id="countryModalLabel">{{__('country.Add Country')}}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                                          
                    @input(['input_name' => 'title', 'additional_id' => 'country_title'])                        
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="flag" class="col-sm-2 col-form-label ps-0">{{__('form.flag')}}</label>
                        <div class="col-lg-10 pe-0">
                            <input class="form-control" type="file" name="thumbnail" id="flag">
                        </div>
                    </div>
                    <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                        <label for="" class="col-sm-2 col-form-label ps-0">Status</label>
                        <div class="col-lg-10 pe-0">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="status" value="1" id="country_status_active" checked>   
                                <label for="country_status_active" class="form-check-label">Active</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="status" value="0" id="country_status_inactive" > 
                                <label for="country_status_inactive" class="form-check-label">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button id="country-submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
