@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')

<!--/.Content Header (Page header)-->
<div class="body-content">
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')


    <form id="leadForm" action="{{route('assignrolepermissions.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="row">

            <div class="card-title">
                Role Permission For <b>{{ $roles->name }}</b>
            </div>


            <input type="hidden" name="role_id" id="role_id" value="{{ $roles->id }}">

            @forelse ($perMenu as $pkye => $permissionMenuName  )

            @if (($permissionMenuName->lable == 1)&&($permissionMenuName->parentmenu_id == 0))
                <div class="row mt-4 mb-2">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <div class="card">

                            <div class="card-body">
                                @include('permission::assignpermissiontorole.parentmenupermissin')
                                {{-- @include('permission::assignpermissiontorole.childmenupermission') --}}

                            </div>

                        </div>
                    </div>
                </div>
            @endif

            @empty

            @endforelse



          </div>
        </div>
        <div class="form-group text-center">

            <button type="submit" class="btn btn-success" >{{ __('language.submit') }}</button>
          </div>
      </form>

</div>
<!--/.body content-->





@endsection
@push('js')
       <script src="{{ asset('public/backend/assets/sweetalert.js') }}"></script>
@endpush
