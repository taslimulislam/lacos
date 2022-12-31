<!-- Modal -->
<div class="modal fade" id="editRole{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">
                Edit Role
            </h5>
        </div>
        <form id="leadForm" action="{{route('roles.update',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="modal-body">
            <div class="row">


                <div class="col-md-12 mt-3">
                    <div class="row">
                      <label for="name" class="col-form-label col-sm-3 col-md-12 col-xl-3 fw-semibold">Role Name <span class="text-danger">*</span></label>
                      <div class="col-sm-9 col-md-12 col-xl-9">
                        <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') ?? $data->name }}" required>
                      </div>

                      @if($errors->has('name'))
                        <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                      @endif
                    </div>
                </div>



            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button  class="btn btn-primary" id="create_submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
