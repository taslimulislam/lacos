<!-- Modal -->
<div class="modal fade" id="editPermission{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">
                Edit Role
            </h5>
        </div>
        <form id="leadForm" action="{{route('permissions.update',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="modal-body">
            <div class="row">

                <div class="col-md-12 text-start">
                    <div class="row mt-3">
                        <label for="per_menu_id" class="col-form-label col-sm-3 col-md-12 col-xl-3 fw-semibold required">Menu Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9 col-md-12 col-xl-9">
                            <select name="per_menu_id" class="form-select" required>
                                    <option value=""  >None</option>
                                @foreach ($perMenu as $perMenuValue )
                                    <option value="{{ $perMenuValue->id }}" {{( $data->per_menu_id == $perMenuValue->id ) ? "selected" : "" }}>{{ $perMenuValue->menu_name }}</option>
                                @endforeach

                                </select>

                                @if($errors->has('per_menu_id'))
                                    <div class="error text-danger m-2">{{ $errors->first('per_menu_id') }}</div>
                                @endif
                            </div>

                        </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="row">
                      <label for="name" class="col-form-label col-sm-3 col-md-12 col-xl-3 fw-semibold">Permission Name <span class="text-danger">*</span></label>
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
