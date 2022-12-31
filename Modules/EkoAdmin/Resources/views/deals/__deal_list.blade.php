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
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Deal List') }}</h6>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New Deal</a>
                        </div>
                    </div>
                </div>

                @include('ekoadmin::deals.add_deal')

                        
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dealList" class="table display table-bordered table-striped table-hover">

                            <thead>
                                <tr>
                                    <th >{{__('ID')}}</th>
                                    <th >{{__('Deal Name')}}</th>
                                    <th >{{__('Deal Amount')}}</th>
                                    <th >{{__('Startup')}}</th>
                                    <th >{{__('Investor')}}</th>
                                    <th >{{__('Date Time')}}</th>
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

        $('#dealList').DataTable().ajax.reload(null, false);
        // location.reload();
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
                $('#deal_name').val('');
                $('#deal_amount').val('');
                $('#comment').val('');
                $('#startup_user_id').val('').trigger('change');
                $('#investor_user_id').val('').trigger('change');

                $("#acmethods").val('');

                $('.modal-title').text('Add New Deal');
                $('.actionBtn').text('Add');
                $('.ajaxForm').removeClass('was-validated');
                $('#myModal').modal('show');
                $('#ajaxForm').attr('action',"{{route('admin.deals.store')}}");
            });
    
    
            
            $('#dealList').on('click', '#editAction', function(e) {
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
                        // alert(res.startup_user_id);

                        $('#id').val(res.id);
                        $('#deal_name').val(res.deal_name);
                        $('#deal_amount').val(res.deal_amount);
                        $('#comment').val(res.comment);

                        $('#startup_user_id').val(res.startup_user_id).trigger('change');
                        $('#investor_user_id').val(res.investor_user_id).trigger('change');

                        $("#ajaxForm").attr("action", action_url);
                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');
                        $('#myModal').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });


            

            $('#dealList').on('click', '#deleteAction', function(e) {
                e.preventDefault();

                $('#ajaxForm').removeClass('was-validated');

                var submit_url = $(this).attr('data-delete-route');

                var check = confirm('Are you sure');
                if (check == true) {
                    $.ajax({
                        type: 'DELETE',
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
                            $('#dealList').DataTable().ajax.reload(null, false);
                            //$("#dealList").load(" #dealList > *");
                        },
                        error: function() {
                        }
                    });
                }
                
            });

            var dealList = $('#dealList').DataTable({

                "order": [[ 0, "desc" ]],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{route('admin.deals.deal-list')}}",
                    data : function(d) {
                        d._token= "{{ csrf_token() }}";
                    },
                },

                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'deal_name', name: 'deal_name' },
                    { data: 'deal_amount', name: 'deal_amout' },
                    { data: 'startup', name: 'startup' },
                    { data: 'investor', name: 'investor' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ]

            });

            $(".go").click(function(){
                dealList.draw();
            });


      
        });

</script>
@endpush

