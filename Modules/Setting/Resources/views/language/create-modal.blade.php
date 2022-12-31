<!-- Add Language Modal -->
<div class="modal fade" id="addLangModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{route('lang.store')}}" id="add-lang" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">{{__('Add Language')}}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">						
                    @input(['input_name' => 'title', 'additional_id' => 'lang_title'])
                    @radio(['input_name'=>'status','data_set' => [1 => 'Active' ,0 => 'Inactive']])						
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" id="lang-submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>