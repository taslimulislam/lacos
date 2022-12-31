@extends('dashboard.app')
@push('css')
@endpush
@section('content')
  <!--Content Header (Page header)-->
  <div class="content-header row align-items-center g-0">
    <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last text-sm-end mb-3 mb-sm-0">
        <ol class="breadcrumb rounded d-inline-flex fw-semi-bold fs-13 bg-white mb-0 shadow-sm">
            <li class="breadcrumb-item"><a href="#">{{ __('default.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ __('Database') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Database') }} / {{ __('Import') }}</li>
        </ol>
    </nav>
    <div class="col-sm-8 header-title">
        <div class="d-flex align-items-center">
            <div class="header-icon d-flex align-items-center justify-content-center rounded shadow-sm text-success flex-shrink-0">
                <i class="typcn typcn-document-text"></i>
            </div>
            <div class="">
                <h1 class="fw-bold">{{ __('Database Management') }}</h1>
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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Database Import') }}</h6>
                        </div>
                        <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 text-center">
                            <h4><strong><span class="text-warning">Warning : </span></strong><strong>If You import your new database.Then You lost your previous data</strong></h4>
                            <p>please select a .sql file</p>
                        </div>
                            <form action="{{ route('import.confirm') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4 offset-md-4 text-center row mt-3">
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control">
                                        @if ($errors->has('image'))
                                            <div class="error text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success import-button"><strong>Import</strong></button>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12 text-center mt-3">
                                <a class="btn btn-success import-button" href="{{route('backup.restore')}}">Restore Data</a>                                
                            </div>
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

