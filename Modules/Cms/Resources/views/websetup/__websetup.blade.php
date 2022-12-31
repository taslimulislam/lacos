@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')
  <!--Content Header (Page header)-->
  <div class="content-header row align-items-center g-0">  
    <div class="col-sm-8 header-title">
        <div class="d-flex align-items-center">
            <div class="header-icon d-flex align-items-center justify-content-center rounded shadow-sm text-success flex-shrink-0">
                <i class="typcn typcn-document-text"></i>
            </div>
            <div class="">
                <h1 class="fw-bold">{{ __('Web Setup') }}</h1>
            </div>
        </div>
    </div>
</div>

<!--/.Content Header (Page header)-->
<div class="body-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Application List') }}</h6>
                        </div>
                    </div>
                </div>
                @php
                    $websetup = json_decode($CmsSetting?->details);
                @endphp

                <form action="{{route('update-setup')}}"  method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
                    @csrf
                    <input type="hidden" name="id" value="{{$CmsSetting?->id}}">
                    <div class="row">
                        <div class="card-body col-md-8">
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="col-form-label text-end fw-bold">Title: <span class="text-danger"> *</span></label>
                                    <input type="text" name="title" class="form-control" required="1" value="{{@$websetup->title}}">
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label text-end fw-bold">Email: <span class="text-danger"> *</span></label>
                                    <input type="text" name="email" class="form-control" required="1" value="{{@$websetup->email}}">
                                </div>

                                

                                <div class="col-md-6">
                                    <label class="col-form-label text-end fw-bold">Copy Right: <span class="text-danger"> *</span></label>
                                    <input type="text" name="copyright" class="form-control" value="{{@$websetup->copyright}}">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="col-form-label text-end fw-bold">Phone: <span class="text-danger"> *</span></label>
                                    <input type="text" name="phone" class="form-control" required="1" value="{{@$websetup->phone}}">
                                </div>
                                

                                <div class="col-md-6">
                                    <label class="col-form-label text-end fw-bold">Footer Text: <span class="text-danger"> *</span></label>
                                    <textarea name="footertext" class="form-control">{{@$websetup->footertext}}</textarea>
                                </div> 

                                <div class="col-md-6">
                                    <label class="col-form-label text-end fw-bold">Address: <span class="text-danger"> *</span></label>
                                    <textarea name="address" class="form-control">{{@$websetup->address}}</textarea>
                                </div> 

                                <div class="col-md-6">
                                    <label class="col-form-label text-end fw-bold">Meta Tag: <span class="text-danger"> *</span></label>
                                    <textarea name="metatag" class="form-control">{{@$websetup->metatag}}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label text-end fw-bold">Meta Description: <span class="text-danger"> *</span></label>
                                    <textarea name="metadescription" class="form-control">{{@$websetup->metadescription}}</textarea>
                                </div>
                                
                            </div>
                        </div>


                        <div class="card-body col-md-3">

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label text-end fw-bold">Primary Web Logo : <span class="text-danger"> *</span></label>
                                    <input type="file" name="weblogo" class="form-control" accept="image/*">
                                    <input type="hidden" name="oldweblogo" value="{{ (@$websetup->weblogo)}}" >
                                    @if (@$websetup->weblogo)
                                    <img class="mt-2" src="{{ (@$websetup->weblogo) ? url('/public/storage/'.@$websetup->weblogo) : url('avatar.png') }}" alt="{{ @$websetup->title }}" width="100px">
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label class="col-form-label text-end fw-bold">Secondary Web Logo : <span class="text-danger"> *</span></label>
                                    <input type="file" name="stikyweblogo" class="form-control" accept="image/*">
                                    <input type="hidden" name="oldstikyweblogo" value="{{ (@$websetup->stikyweblogo)}}" >
                                    @if (@$websetup->stikyweblogo)
                                    <img class="mt-2" src="{{ (@$websetup->stikyweblogo) ? url('/public/storage/'.@$websetup->stikyweblogo) : url('avatar.png') }}" alt="{{ @$websetup->title }}" width="100px">
                                    @endif
                                </div>

                                <div class="col-md-12 ">
                                    <label class="col-form-label text-end fw-bold">Favicon : <span class="text-danger"> *</span></label>
                                    <input type="file" name="favicon" class="form-control" accept="image/*">
                                    <input type="hidden" name="oldfavicon" value="{{ (@$websetup->favicon)}}" >
                                    <br>
                                    @if (@$websetup->favicon)
                                        <img class="mt-2" src="{{ (@$websetup->favicon) ? url('/public/storage/'.@$websetup->favicon) : url('avatar.png') }}" alt="{{ @$websetup->title }}" width="32px">
                                    @endif
                                </div> 

                                <div class="col-md-12">
                                    <label class="col-form-label text-end fw-bold">Footer Logo : <span class="text-danger"> *</span></label>
                                    <input type="file" name="footerlogo" class="form-control" accept="image/*">
                                    <input type="hidden" name="oldfooterlogo" value="{{ (@$websetup->footerlogo)}}" >

                                    @if (@$websetup->footerlogo)
                                    <img class="mt-2" src="{{ (@$websetup->footerlogo) ? url('/public/storage/'.@$websetup->footerlogo) : url('avatar.png') }}" alt="{{ @$websetup->title }}" width="100px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer form-footer">
                        <button type="submit" class="btn btn-primary btn-sm ">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')

<script>

    var showCallBackData = function() {
        $('#id').val('');
        $('.ajaxForm')[0].reset();
        $('#myModal').modal('hide');
        location.reload();
        // $('#education_list').DataTable().draw();
    }

</script>
@endpush

