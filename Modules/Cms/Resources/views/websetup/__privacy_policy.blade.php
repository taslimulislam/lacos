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
                            <h6 class="fs-17 fw-semi-bold mb-0">Privacy Policy </h6>
                        </div>
                    </div>
                </div>
                @php
                    $websetup = json_decode($CmsSetting?->details);
                @endphp

                <form action="{{route('privacy-policy-update')}}"  method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
                    @csrf
                    <input type="hidden" name="id" value="{{$CmsSetting?->id}}">
                    <div class="row">
                        <div class="card-body col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label text-end fw-bold">Content: <span class="text-danger"> *</span></label>
                                    <textarea name="privacypolicy" id="privacypolicy" class="form-control">{{@$websetup->privacypolicy}}</textarea>
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
    }

    $(document).ready(function () {
      "use strict"; 
        CKEDITOR.replace('privacypolicy', {});
    });


</script>
@endpush

