$(document).ready(function() {


    "use strict";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    

    $('.updateStartupDetails').on('click',  function(e) {
        var action_url = $(this).attr('data-update-route');
        $(".ajaxForm").attr("action", action_url);
    });




    $('.deleteAction').on('click', function(e) {
        e.preventDefault();

        $('#ajaxForm').removeClass('was-validated');
        var submit_url = $(this).attr('delete-delete_doc-route');
        var trid = $(this).attr('data-trid');
        
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
                        $('#document_table').closest('tr').remove();
                        i--;
                    }else if(response.success=='exist'){
                        toastr.warning(response.message, response.title);
                    }else{
                        toastr.error(response.message, response.title);
                    }
                    if(trid){
                        $("#"+trid).closest('tr').remove();
                    }else{
                        location.reload();
                    }
                },

                error: function() {
                }

            });
        }
    });



});
