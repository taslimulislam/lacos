@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')


<!--/.Content Header (Page header)-->
<div class="body-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Category List') }}</h6>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New </a>
                            @include('cms::modal.cat_modal')
                        </div>
                    </div>
                </div>

                        
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="categoryList" class="table display table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th >Sl.</th>
                                    <th >{{__('Category Name')}}</th>
                                    <th >{{__('Category Slug')}}</th>
                                    <th >Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($categories as $key => $cat)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$cat->category_name }}</td>
                                        <td>{{$cat->category_slug }}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-success-soft btn-sm me-1" id="editAction" data-edit-route="{{ route('categories.edit',$cat->id) }}" data-update-route="{{ route('categories.update',$cat->id) }}" ><i class="far fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger-soft btn-sm" id="deleteAction" data-delete-route="{{ route('delete-category',$cat->id) }}"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Empty Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                        
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


            
    $(document).ready(function() {
            "use strict";
      
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            
            $('.addShowModal').on('click', function() {

                $('#category_name').val('');
                $('#category_slug').val('');
                $('#id').val('');

                $('.modal-title').text('Add New Category');
                $('.actionBtn').text('Add');
                $('.ajaxForm').removeClass('was-validated');
                $('#myModal').modal('show');
                $('#ajaxForm').attr('action',"{{route('categories.store')}}");
            });
    
    
            
            $('#categoryList').on('click', '#editAction', function(e) {
                e.preventDefault();
                var submit_url = $(this).attr('data-edit-route');
                var action_url = $(this).attr('data-update-route');
                $.ajax({
                    type: 'GET',
                    url: submit_url,
                    data: {"_token": "{{ csrf_token() }}"},
                    dataType: 'JSON',
                    success: function(res) {

                        $("#acmethods").val('PUT');
                        $("#ajaxForm").attr("method", 'PUT');
                        $('#id').val(res.id);
                        $('#category_name').val(res.category_name);
                        $('#category_slug').val(res.category_slug);
                        $("#ajaxForm").attr("action", action_url);
                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');
                        $('#myModal').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });


            

            $('#categoryList').on('click', '#deleteAction', function(e) {
                e.preventDefault();

                $('#ajaxForm').removeClass('was-validated');

                var submit_url = $(this).attr('data-delete-route');

                var check = confirm('Are you sure');
                if (check == true) {
                    $.ajax({
                        type: 'GET',
                        url: submit_url,
                        data: {"_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                        success: function(response) {
                            if(response.success==true) {
                                toastr.success(response.message, response.title);
                            }else if(response.success=='exist'){
                                toastr.warning(response.message, response.title);
                            }else{
                                toastr.error(response.message, response.title);
                            }
                            location.reload();
                            //$("#categoryList").load(" #categoryList > *");
                        },
                        error: function() {
                        }
                    });
                }
            });
      
        });

</script>
@endpush

