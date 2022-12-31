    
    <div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-xl">

            <form action="{{route('admin.deals.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
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
                                <label for="deal_name" class="col-form-label fw-bold justify-content-start d-flex">Deal Name <i class="text-danger">*</i></label>
                                <input type="text"  name="deal_name" id="deal_name" class="form-control" placeholder="Deal Name"  required>
                            </div>

                            <div class="col-md-6">
                                <label for="deal_amount" class="col-form-label fw-bold justify-content-start d-flex">Deal Amount<i class="text-danger">*</i></label>
                                <input type="number"  name="deal_amount" id="deal_amount" class="form-control" autocomplete="off" placeholder="Deal Amount" required>
                            </div>

                            <div class="col-md-6">
                                <label for="startup_user_id" class="col-form-label fw-bold justify-content-start d-flex">Startup <i class="text-danger">*</i></label>
                                <select name="startup_user_id" class="search_test form-select" id="startup_user_id">
                                    {{-- <option value="">Select {{__('Startup')}}</option> --}}
                                    @foreach($startups as $key => $item)
                                    <option value="{{ $item->user_id }}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="investor_user_id" class="col-form-label fw-bold justify-content-start d-flex">Investor<i class="text-danger">*</i></label>
                                <select name="investor_user_id" class="search_test form-select" id="investor_user_id">
                                    {{-- <option value="">Select {{__('investor')}}</option> --}}
                                    @foreach($investors as $key => $item)
                                    <option value="{{ $item->user_id }}">{{$item->company_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                           

                            <div class="col-md-12">
                                <label for="comment" class="col-form-label fw-bold justify-content-start d-flex">Comment<i class="text-danger">*</i></label>
                                <textarea name="comment" id="comment" class="form-control" id="" cols="30" rows="2" required></textarea>
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
