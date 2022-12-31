<div class="card card-xl-stretch mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
       <!--begin::Card title-->
       <div class="card-title m-0">
           <h3 class="fw-bolder m-0">Tag List</h3>
       </div>

       <a href="javascript:void(0)" class="btn btn-primary align-self-center tagS">Add New Tags</a>
       <!--end::Action-->
   </div>
   <!--begin::Card header-->
<!--begin::Body-->
<div class="card-body py-3">
   <!--begin::Table container-->
   <div class="table-responsive">
      <!--begin::Table-->
       <table class="table align-middle gs-0 gy-5" id="teamList">

           <!--begin::Table head-->
           <thead>
               <tr>
                   <th class=" fw-bolder">Tag name</th>
                   <th class=" fw-bolder"> Action</th>
               </tr>
           </thead>
           <!--end::Table head-->

           <!--begin::Table body-->
           <tbody>
               @foreach ($tags as $tag )
               
               <tr>
                   <td>
                       <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$tag->tag_name}}</a>
                   </td>
                   <td>
                       <a href="javascript:void(0)" id="deleteAction" data-delete-route="{{route('userpanel.tag.delete',$tag->id)}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
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
<div class="modal fade" id="myTag" tabindex="-1" aria-hidden="true">
<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-650px">
   <!--begin::Modal content-->
   <div class="modal-content">
       <!--begin::Form-->
       <form action="{{route('userpanel.add.tag')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
       
           <!--begin::Modal header-->
           <div class="modal-header" id="kt_modal_new_address_header">
               <!--begin::Modal title-->
               <h2>Add New Tag</h2>
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
                       <label class="required fs-5 fw-bold mb-2">Tag Name</label>
                       <!--end::Label-->
                       <!--begin::Input-->
                       <input type="text" class="form-control form-control-solid" placeholder="" id="tag_name" name="tag_name" required/>
                       <!--end::Input-->
                   </div>
                   <!--end::Col-->
                   
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
   $('#myTag').modal('hide');
   location.reload();
}

$(document).ready(function() {
   "use strict";
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   
   $('.tagS').on('click', function() {
       $('.modal-title').text('Add  New Tag');
       $('.actionBtn').text('Add');
       $('.ajaxForm').removeClass('was-validated');
       $('#myTag').modal('show');
       $("#ajaxForm").attr("action", "{{route('userpanel.add.tag')}}");

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
               },
               error: function() {
               }
           });
       }
   });



});



</script>


