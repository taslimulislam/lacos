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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Team Member List') }}</h6>
                        </div>
                    </div>
                    {{-- <div class="text-end">
                        <div class="actions">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New </a>
                        </div>
                    </div> --}}
                </div>
                @include('teams::modal.add_team')

                        
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="teamList" class="table display table-bordered table-striped table-hover">

                            <thead>
                                <tr>
                                    <th >{{__('Image')}}</th>
                                    <th >{{__('User Type')}}</th>
                                    <th >{{__('Name')}}</th>
                                    <th >{{__('Description')}}</th>
                                    <th >{{__('Position')}}</th>
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
                $('#position').val('');
                $('#id').val('');
                $('#about').val('');

                $('.modal-title').text('Add New Member');
                $('.actionBtn').text('Add');
                $('.ajaxForm').removeClass('was-validated');
                $('#myModal').modal('show');
                $('#ajaxForm').attr('action',"{{route('teams.store')}}");
            });
    
    
            
            $('#teamList').on('click', '#editAction', function(e) {
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
                        $('#position').val(res.position);
                        $('#about').val(res.about);

                        $("#ajaxForm").attr("action", action_url);
                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');
                        $('#myModal').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });


            

            $('#teamList').on('click', '#deleteAction', function(e) {
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
                            //$("#teamList").load(" #teamList > *");
                        },
                        error: function() {
                        }
                    });
                }
            });

            var teamList = $('#teamList').DataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{route('get-teams')}}",
                    data : function(d) {
                        d._token= "{{ csrf_token() }}";
                    },
                },

                columns: [
                    { data: 'image', name: 'image' },
                    { data: 'type', name: 'type' },
                    { data: 'name', name: 'name' },
                    { data: 'about', name: 'about' },
                    { data: 'position', name: 'position' },
                    { data: 'action', name: 'action' }
                ]

            });

            $(".go").click(function(){
                teamList.draw();
            });


      
        });

</script>
@endpush

