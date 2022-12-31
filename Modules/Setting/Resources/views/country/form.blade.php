<form action="{{ route('countries.update', $country->id)}}" id="edit-country" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="modal-header">
        <h6 class="modal-title" id="countryModalLabel">{{__('country.Edit Country')}}</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id" id="country-id" value="{{$country->id}}">                            
        @input(['input_name' => 'title', 'additional_id' => 'edit_country_title', 'value' => "$country->title"])                        
        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
            <label for="flag" class="col-sm-2 col-form-label ps-0">{{__('form.flag')}}</label>
            <div class="col-lg-10 pe-0">
                <input class="form-control" type="file" name="thumbnail" id="edit_flag">
            </div>
        </div>
        <div class="cust_border form-group mb-3 mx-0 pb-3 row">
            <label class="col-sm-2 col-form-label ps-0">Status</label>
            <div class="col-lg-10 pe-0">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="status" value="1" id="csa" {{$country->status == 1 ? 'checked' : '' }}>   
                    <label for="csa" class="form-check-label">Active</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="status" value="0" id="csi" {{$country->status == 0 ? 'checked' : '' }} > 
                    <label for="csi" class="form-check-label">Inactive</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <button id="edit-country-submit" type="submit" class="btn btn-primary">Update</button>
    </div>
</form>