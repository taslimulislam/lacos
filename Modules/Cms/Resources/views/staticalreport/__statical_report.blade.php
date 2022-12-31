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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Reports List') }}</h6>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New </a>
                            @include('cms::modal.report_modal')
                        </div>
                    </div>
                </div>

                        
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="reportList" class="table display table-bordered table-striped table-hover">

                            <thead>
                                <tr>
                                    <th >{{__('Image')}}</th>
                                    <th >{{__('Title')}}</th>
                                    <th >{{__('Description')}}</th>
                                    <th >{{__('price')}}</th>
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

                $('#name').val('');
                $('#price').val('');
                $('#id').val('');
                $('#about_report').val('');

                $('.modal-title').text('Add New Report');
                $('.actionBtn').text('Add');
                $('.ajaxForm').removeClass('was-validated');
                $('#myModal').modal('show');
                $('#ajaxForm').attr('action',"{{route('statistical-report.store')}}");
            });
    
    
            
            $('#reportList').on('click', '#editAction', function(e) {
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
                        $('#name').val(res.name);
                        $('#price').val(res.price);
                        $('#about_report').val(res.about_report);
                        $("#ajaxForm").attr("action", action_url);
                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');
                        $('#myModal').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });


            

            $('#reportList').on('click', '#deleteAction', function(e) {
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
                            //$("#reportList").load(" #reportList > *");
                        },
                        error: function() {
                        }
                    });
                }
            });

            var reportList = $('#reportList').DataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{route('get-report-list')}}",
                    data : function(d) {
                        d._token= "{{ csrf_token() }}";
                    },
                },

                columns: [
                    { data: 'report_image', name: 'report_image' },
                    { data: 'name', name: 'name' },
                    { data: 'about_report', name: 'about_report' },
                    { data: 'price', name: 'price' },
                    { data: 'action', name: 'action' }
                ]

            });

            $(".go").click(function(){
                reportList.draw();
            });


      
        });

</script>
@endpush

