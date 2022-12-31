<div class="card card-xl-stretch mb-5 mb-xl-10">


    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
       <!--begin::Card title-->
       <div class="card-title m-0">
           <h3 class="fw-bolder m-0">My Events</h3>
       </div>
       <!--end::Card title-->
       <a href="javascript:void(0)" class="btn btn-primary align-self-center newEvent">Add New Event</a>

       <!--end::Action-->
   </div>
   <!--begin::Card header-->
  
   
   <!--begin::Body-->
   <div class="card-body py-3">
       <!--begin::Table container-->
       <div class="table-responsive">
           <!--begin::Table-->
           <table class="table align-middle gs-0 gy-5" id="eventList">

               <!--begin::Table head-->
               <thead>
                   <tr>
                       <th class="fw-bolder">image</th>
                       <th class=" fw-bolder"> Event Title</th>
                       <th class=" fw-bolder"> Start Date</th>
                       <th class=" fw-bolder"> End Date</th>
                       <th class=" fw-bolder"> Status</th>
                       <th class=" fw-bolder"> Action</th>
                   </tr>
               </thead>
               <!--end::Table head-->

               <!--begin::Table body-->
               <tbody>
                @foreach ($events as $item )
                    @php
                        if($item->image){
                            $img =  url('/public/storage/'.@$item->image);
                        }else{
                            $img = url('/public/demoimg/placeholder.jpg');
                        }
                    @endphp 
                <tr>

                    <td>
                        <div class="symbol symbol-50px me-2">
                            <span class="symbol-label">
                                <img src="{{$img}}" class="h-50 align-self-center" alt="" />
                            </span>
                        </div>
                    </td>
                    
                    <td>
                        {{$item->event_title}}
                    </td>

                    <td>{{ date('d-M-Y',strtotime($item->start_date)) }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->end_date)) }}</td>

                    <td>
                        @if ($item->status==0)
                        <span class="btn btn-sm btn-light-warning fw-bolder ms-2 fs-8 py-1 px-3">Pending..</span>
                            @else
                            <span class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3">Publish</span>
                        @endif
                    </td>
                    

                    <td>
                        <a href="javascript:void(0)" id="editAction" data-update-route="{{route('userpanel.event.update',$item->uuid)}}" data-edit-route="{{route('userpanel.event.edit',$item->uuid)}}" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a> 
                        <a href="javascript:void(0)" id="deleteAction" data-delete-route="{{route('userpanel.event.delete',$item->uuid)}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
               </tbody>
               <!--end::Table body-->
           </table>
           <!--end::Table-->
       </div>
       <!--end::Table container-->
   </div>
</div>




<!--begin::Modal - New Address-->
<div class="modal fade" id="myEvents" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-lg-1000px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form action="{{route('userpanel.news-create')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
            
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_new_address_header">
                    <!--begin::Modal title-->
                    <h2>Add New Event</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Notice-->
                        
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row mb-5">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Event Title </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="event_title" name="event_title" required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-12 fv-row mb-5">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">Shart Description </label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <textarea  class="form-control form-control-solid" rows="5" id="description" minlength="250" maxlength="500" name="description" required> </textarea>
                            <span class="text-danger">Short description box whould be a little and min 250 and max 500</span>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-12 fv-row mb-5">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">Start Date</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="date" class="form-control form-control-solid datepic"  id="startdate" name="start_date" required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-12 fv-row mb-5">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">End Date</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="date" class="form-control form-control-solid datepic"  id="enddate" name="end_date" required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-12 fv-row mb-5">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">Link </label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="link" class="form-control form-control-solid"  id="link" name="link" required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-12 fv-row mb-5">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">Event Image </label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="file" class="form-control form-control-solid"  name="image" />
                            <span class="text-danger">Image Should be file jpg | jpeg | png</span>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive document_table" id="speakerTable">

                                    <thead>
                                        <tr>
                                            <th class="fs-6 fw-bold mb-2">Speaker name</th>
                                            <th class="fs-6 fw-bold mb-2">Speaker Position</th>
                                            <th class="fs-6 fw-bold mb-2">Speaker Image</th>
                                            <th><button type="button" class="btn btn-primary" id="add_row"><i class="fa fa-plus"></i></button></th>
                                        </tr>
                                    </thead>

                                    <tbody id="exSpeaker"></tbody>


                                    <tbody>


                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-success modal_action actionBtn"> Add</button>
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New Address-->




<script>


    var showCallBackData = function() {
        $('#id').val('');
        $('.ajaxForm')[0].reset();
        $('#myEvents').modal('hide');
        location.reload();
    }

    $(document).ready(function() {

        "use strict";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('.newEvent').on('click', function() {
            $('.modal-title').text('Add New Event');
            $('.actionBtn').text('Add');
            $('.ajaxForm').removeClass('was-validated');
            $('#myEvents').modal('show');
            $("#ajaxForm").attr("action", "{{route('userpanel.add.event')}}");

        });



        
        $('#eventList').on('click', '#editAction', function(e) {

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

                    $('#event_title').val(res.event_title);
                    $('#link').val(res.link);
                    $('#description').val(res.description);
                    $('#startdate').val(res.start_date);
                    $('#enddate').val(res.end_date);

                    $('#exSpeaker').html(res.speaker);

                    $("#ajaxForm").attr("action", action_url);
                    $('.modal-title').text('Update Information');
                    $('.actionBtn').text('Update');
                    $('#myEvents').modal('show');

                },
                error: function(request, status, error) {
                }
            });
        });


        $('body').on('click', '#deleteAction', function(e) {
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

        
        $('body').on('click', '.deleteSpeaker', function(e) {
            e.preventDefault();

            $('#ajaxForm').removeClass('was-validated');

            var submit_url = $(this).attr('delete-speaker-route');
            var trid = $(this).attr('data-tr-id');

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

                        $("#"+trid).closest('tr').remove();
                        
                    },
                    error: function() {
                    }
                });
            }
        });


        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();

        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var minDate = year + '-' + month + '-' + day;

        $('.datepic').attr('min', minDate);

        // $(function () {
        //     $('.datepic').datetimepicker({
        //         format: 'YYYY-MM-DD hh:mm'
        //     });
        // });


    });
</script>

        
<script>
    var i = 1;

    $(document).on("click", "#add_row", function() {
        var $new_row = $(`
                            <tr>
                                <td>
                                    <input type="text" class="form-control"  name="speaker_name[]" id="speaker_name_` + i + `"  value="" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="speaker_position[]" id="speaker_position_` + i + `"  required value="">
                                </td>
                                <td>
                                    <input type="file" class="form-control" onchange="validatedDoc(` + i + `)" name="speaker_image[]" id="speaker_image_` + i + `" placeholder="" value="" required>
                                </td>
                                <td>
                                    <button type="button" id="remove_row" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        `);

        $("#speakerTable").append($new_row);
        i++;
    });

    $("#speakerTable").on('click', '#remove_row', function() {
        $(this).closest('tr').remove();
        i--;
    });



</script>
