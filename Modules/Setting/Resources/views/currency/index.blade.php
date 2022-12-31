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
                <h1 class="fw-bold">{{ __('Currency Management') }}</h1>
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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Currency List') }}</h6>
                        </div>
                        <div class="text-end">
                            <div class="actions">
                                <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                <a href="{{route('currencies.create')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i>&nbsp{{__('Add Currency')}}</a>
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
                                    <th width="20%">Title</th>
                                    <th width="20%">Symbol</th>
                                    <th width="20%">Country</th>
                                    <th width="20%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currencies as $key => $currency)
                                <tr>
                                    <td>#{{ $key + 1 }}</td>
                                    <td>{{ $currency->title }}</td>
                                    <td>{{ $currency->symbol }}</td>
                                    <td>{{ $currency->country ? $currency->country->country_name : '' }}</td>
                                    <td>
                                        @if($currency->status == 1)
                                           <button class="btn btn-success btn-sm">Active</button>
                                        @else()
                                           <button class="btn btn-danger btn-sm">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a title="Edit" href="{{ route('currencies.edit',$currency->id) }}" class="btn btn-primary btn-sm m-1" ><i class="fa fa-edit"></i></a>
                                            <a title="Delete" href="javascript:void(0)"  class="btn btn-danger btn-sm delete-confirm m-1" data-route="{{ route('currencies.destroy',$currency->id) }}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="10%">Sl.</th>
                                    <th width="20%">Title</th>
                                    <th width="20%">Symbol</th>
                                    <th width="20%">Country</th>
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

