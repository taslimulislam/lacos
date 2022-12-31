    
    <div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-xl">

            <form action="{{route('teams.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
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
                                <label for="position" class="col-form-label fw-bold justify-content-start d-flex">Position<i class="text-danger">*</i></label>
                                <input type="text"  name="position" id="position" class="form-control" placeholder="position" required>
                            </div>

                            <div class="col-md-6">
                                <label for="team_image" class="col-form-label fw-bold justify-content-start d-flex">Image <i class="text-danger">*</i></label>
                                <input type="file"  name="team_image" id="team_image" class="form-control"  >
                            </div>

                            <div class="col-md-12">
                                <label for="about" class="col-form-label fw-bold justify-content-start d-flex">About<i class="text-danger">*</i></label>
                                <textarea name="about" id="about" class="form-control" id="" cols="30" rows="10" required></textarea>
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
