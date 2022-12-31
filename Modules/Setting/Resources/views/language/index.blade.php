@extends('dashboard.app')
@push('css')
@endpush
@section('content')
  <!--Content Header (Page header)-->
  <div class="content-header row align-items-center g-0">
    <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last text-sm-end mb-3 mb-sm-0">
        <ol class="breadcrumb rounded d-inline-flex fw-semi-bold fs-13 bg-white mb-0 shadow-sm">
            <li class="breadcrumb-item"><a href="#">{{ __('default.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ __('Language') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Language') }} / {{ __('List') }}</li>
        </ol>
    </nav>
    <div class="col-sm-8 header-title">
        <div class="d-flex align-items-center">
            <div class="header-icon d-flex align-items-center justify-content-center rounded shadow-sm text-success flex-shrink-0">
                <i class="typcn typcn-document-text"></i>
            </div>
            <div class="">
                <h1 class="fw-bold">{{ __('Language Management') }}</h1>
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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Language List') }}</h6>
                        </div>
                        <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#langModal"><i class="fa fa-user-plus"  ></i>&nbsp{{__('Add Language')}}</button>
                                @include('setting::modal.lang_modal')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table display table-bordered table-sm table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th width="10%">Sl.</th>
                                    <th width="60%">Title</th>
                                    <th width="20%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($languages as $key => $lang)
                                <tr>
                                    <td>#{{ $key + 1 }}</td>
                                    <td>{{ $lang->title }}</td>
                                    <td>
                                        @if($lang->status == 1)
                                           <button class="btn btn-success btn-sm">Active</button>
                                        @else()
                                           <button class="btn btn-danger btn-sm">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a title="Edit" href="{{ route('lang.edit',$lang->slug) }}" class="btn btn-primary btn-sm m-1" ><i class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="10%">Sl.</th>
                                    <th width="60%">Title</th>
                                    <th width="20%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
 <script src="{{ asset('vendor/user/assets/sweetalert-script.js') }}"></script>
@endpush

