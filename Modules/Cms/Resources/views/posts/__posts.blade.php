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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Post List') }}</h6>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                            <a href="{{route('posts.create')}}" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New </a>
                            {{-- @include('cms::modal.post_modal') --}}
                        </div>
                    </div>
                </div>

                        
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="postList" class="table display table-bordered table-striped table-hover">

                            <thead>
                                <tr>
                                    <th >{{__('Image')}}</th>
                                    <th >{{__('Title')}}</th>
                                    <th >{{__('Meta Title')}}</th>
                                    <th >{{__('Meta Description')}}</th>
                                    <th >{{__('Content')}}</th>
                                    <th >Action</th>
                                </tr>
                            </thead>

                            
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

                $('#id').val('');
                $('#title').val('');
                $('#category_id').val('');
                $('#meta_title').val('');
                $('#meta_description').val('');
                $('#content').val('');

                $('.modal-title').text('Add New Post');
                $('.actionBtn').text('Add');
                $('.ajaxForm').removeClass('was-validated');
                $('#myModal').modal('show');
                $('#ajaxForm').attr('action',"{{route('posts.store')}}");
            });
    
            
            $('#postList').on('click', '#editAction', function(e) {

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
                        $('#id').val(res.id);
                        $('#title').val(res.title);
                        $('#category_id').val(res.post_category_id);
                        $('#meta_title').val(res.meta_title);
                        $('#meta_description').val(res.meta_description);
                    
                        CKEDITOR.instances.content.setData(res.content);

                        $("#ajaxForm").attr("action", action_url);
                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');

                        $('#myModal').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });


        
            $('#postList').on('click', '#deleteAction', function(e) {
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
                        },
                        error: function() {
                        }
                    });
                }
            });


            var postList = $('#postList').DataTable({

                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{route('get-post-list')}}",
                    data : function(d) {
                        d._token= "{{ csrf_token() }}";
                    },
                },

                columns: [
                    { data: 'post_image', name: 'post_image' },
                    { data: 'title', name: 'title' },
                    { data: 'meta_title', name: 'meta_title' },
                    { data: 'meta_description', name: 'meta_description' },
                    { data: 'content', name: 'content' },
                    { data: 'action', name: 'action' }
                ]

            });

            $(".go").click(function(){
                postList.draw();
            });
      
        });

</script>





@endpush

