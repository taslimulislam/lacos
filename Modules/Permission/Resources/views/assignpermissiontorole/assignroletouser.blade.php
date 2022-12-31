

<div class="modal fade" id="assignRoleToUser{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">
                Assign Role To User
            </h5>
        </div>
        <form id="leadForm" action="{{route('assignrolepermissions.storeroleuser')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="row">

                <h6>
                    User Name : {{$data?->user_name}}
                </h6>

                <input type="hidden" class="form-control" id="user_id" name="user_id"  value="{{  $data?->id }}" required>

                <div class="col-md-12 text-start">
                    <div class="row mt-3">
                        <label for="role_name" class="col-form-label col-sm-3 col-md-12 col-xl-3 fw-semibold required">Role Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9 col-md-12 col-xl-9">
                            <select name="role_name" class="form-select" required>
                                    <option value=""  >None</option>
                                @foreach ($roles as $roleValue )
                                @php
                                    if (!empty($data?->roles[0]))
                                        {$roleName = $data?->roles[0]->name; }
                                        else{
                                            $roleName = "";
                                        }

                                @endphp
                                  <option value="{{ $roleValue->name }}"  {{( $roleName == $roleValue->name ) ? "selected" : "" }} > {{ $roleValue->name }}</option>
                                @endforeach
                                </select>

                                @if($errors->has('role_name'))
                                    <div class="error text-danger m-2">{{ $errors->first('role_name') }}</div>
                                @endif
                            </div>

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


   {{-- @if ({{ Arr::has($data?->getRoleNames(), $roleName) }})
                                <option value="{{ $roleValue->name }}" selected>{{ $roleValue->name }}</option>
                                @endif --}}
