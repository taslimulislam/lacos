    
    <div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-xl">

            <form action="{{route('statistical-report.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
                @csrf
                <input type="hidden" name="_method" value="" id="acmethods">

                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        

                        <div class="row">

                            <div class="col-md-6">
                                <label for="name" class="col-form-label fw-bold justify-content-start d-flex">Name <i class="text-danger">*</i></label>
                                <input type="text"  name="name" id="name" class="form-control" placeholder="Name"  required>
                            </div>

                            <div class="col-md-6">
                                <label for="price" class="col-form-label fw-bold justify-content-start d-flex">Price<i class="text-danger">*</i></label>
                                <input type="number"  name="price" id="price" class="form-control" placeholder="Price" required>
                            </div>

                            <div class="col-md-6">
                                <label for="report_image" class="col-form-label fw-bold justify-content-start d-flex">Report image <i class="text-danger">*</i></label>
                                <input type="file"  name="report_image" id="report_image" class="form-control" placeholder="Report image"  >
                            </div>

                            <div class="col-md-6">
                                <label for="report_doc" class="col-form-label fw-bold justify-content-start d-flex">Report document<i class="text-danger">*</i></label>
                                <input type="file"  name="report_doc" id="report_doc" class="form-control" placeholder="Report document" >
                            </div>

                            <div class="col-md-12">
                                <label for="about_report" class="col-form-label fw-bold justify-content-start d-flex">About the report<i class="text-danger">*</i></label>
                                <textarea name="about_report" id="about_report" class="form-control" id="" cols="30" rows="10" required></textarea>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success modal_action actionBtn"></button>
                    </div>

                </div>

            </form>
        </div>
    </div>
