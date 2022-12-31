<div class="mb-5 mb-xl-10">
    @if (Session::has('exception'))
        <div class="alert alert-danger"> <strong>Error!</strong> {{ Session::get('exception') }}</div>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-success"> <strong>Success!</strong> {{ Session::get('message') }}</div>
    @endif
</div>


<div class="card card-xl-stretch mb-5 mb-xl-10">

    
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
       <!--begin::Card title-->
       <div class="card-title m-0">
           <h3 class="fw-bolder m-0">Password Setting</h3>
       </div>
   </div>
   <!--begin::Card header-->
  
   
    <div class="card-body py-3">

        <form action="{{route('userpanel.update-password')}}" method="POST" accept-charset="UTF-8">
            @csrf
            <div class="w-lg-500px  p-10 p-lg-15 mx-auto" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                
                <div class="col-md-12 fv-row mb-5">
                    <label class="required fs-5 fw-bold mb-2 ">Current Password </label>
                    <input type="password" class="form-control form-control-solid"  id="current_password" name="current_password" required/>
                </div>

                <div class="fv-row" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bold fs-6 mb-2 required">New Password</label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid"
                                type="password"  name="new_password" required autocomplete="off" />

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>

                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                    </div>
                    <div class="text-muted"> Use 8 or more . </div>
                </div>


                <div class="col-md-12 fv-row mb-5">
                    <label class="required fs-5 fw-bold mb-2 required">New Confirm Password </label>
                    <input type="password" class="form-control form-control-solid" name="new_confirm_password" required/>
                </div>
            </div>

            <div class="modal-footer flex-center">
                <button type="submit" class="btn btn-success"> Update Password</button>
            </div>
        </form>
    </div>
</div>






<script>

    var showCallBackData = function() {
        $('#id').val('');
        $('.ajaxForm')[0].reset();
        $('#myEvents').modal('hide');
        location.reload();
    }

</script>
