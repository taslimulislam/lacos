@extends('layouts.backend')
@push('css')
@endpush

@section('content')
    <!--/.Content Header (Page header)--> 
    <div class="body-content" id="settingview">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 fw-semi-bold mb-0">Payment Gateway Setting</h6>
                            </div>
                        </div>
                    </div>
                    
                   

        <form action="{{route('update-gateway')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">

                @csrf
                    <div class="card-body">

                        <input type="hidden" name="id" id="id" value="{{@$flutterwave->id}}">
                        @php
                            $f = json_decode($flutterweb->details);
                        @endphp
                       
                        <div class="row ">
                            <div class="col-md-6">
                                <label for="flutter_public_key" class="col-form-label fw-bold">Public Key <i class="text-danger">*</i></label>
                                <input type="text"  name="flutter_public_key" value="{{@$f->flutter_public_key}}" id="flutter_public_key" class="form-control" placeholder="Public Key"  required>
                            </div>

                            <div class="col-md-6">
                                <label for="flutter_secret_key" class="col-form-label fw-bold">Secret Key<i class="text-danger">*</i></label>
                                <input type="text"  name="flutter_secret_key" value="{{@$f->flutter_secret_key}}" id="flutter_secret_key" class="form-control" placeholder="Secret Key" required>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                <label for="flutter_encription_key" class="col-form-label fw-bold">Encryption Key  <i class="text-danger">*</i></label>
                                <input class="form-control" type="text" value="{{@$f->flutter_encription_key}}" name="flutter_encription_key" id="flutter_encription_key" placeholder="Encryption Key" required>
                            </div>

                            <div class="col-md-6">
                                    <label class="col-form-label text-end fw-semi-bold">Publish Mode</label>
                                    <select class="form-control placeholder-single" id="flutter_publich" name="flutter_publich">  
                                        @foreach (gatewayMode() as $key => $item)

                                        <option value="{{$key}}" {{$key==$f->flutter_publich?'selected':''}}>{{$item}}</option>

                                        @endforeach      
                                    </select>
                            </div>
                        </div>

                        
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success modal_action actionBtn">Update</button>
                    </div>

        </form>
                   
                </div>
            </div>
           
        </div>
    </div><!--/.body content-->





    <script type="text/javascript">
        // delete items
      
        var showCallBackData = function() {
            $('#id').val('');
            $('.ajaxForm')[0].reset();
            $('#myModal').modal('hide');
            //$('#clientlist').DataTable().ajax.reload(null, false);
            $("#settingview").load(" #settingview > *");
        }
      
 
      </script>

    @endsection

    @push('js')
    @endpush
