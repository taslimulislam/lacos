@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')


<!--/.Content Header (Page header)-->
<div class="body-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                <strong>
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card mb-4">


                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Post List') }}</h6>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                            <a href="{{route('posts.index')}}" class="btn btn-success btn-sm" ><i class="fa fa-plus-circle"></i> Back To List</a>
                            {{-- @include('cms::modal.post_modal') --}}
                        </div>
                    </div>
                </div>
                        
                <div class="card-body">

                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
      
                        @csrf
                        
        
                                <div class="row">
        
                                    <div class="col-md-4 cust_border pb-3 mb-3">
                                        <label for="title" class="col-form-label fw-bold justify-content-start d-flex">Title <i class="text-danger">*</i></label>
                                        <input type="title"  name="title" id="title" class="form-control" placeholder="Title"  required>
                                    </div>
        
        
                                   <div class="col-md-4 cust_border pb-3 mb-3">
                                        <label for="category_id" class="col-form-label fw-bold justify-content-start d-flex">Category<i class="text-danger">*</i></label>
                                        
                                        <select class="form-select search_test" id="category_id" name="category_id" required>
                                            <option value="">Select Cetagory</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
        
                                   <div class="col-md-4 cust_border pb-3 mb-3">
                                        <label for="post_image" class="col-form-label fw-bold justify-content-start d-flex">Image <i class="text-danger">*</i></label>
                                        <input type="file"  name="post_image" id="post_image" class="form-control" placeholder="Post image"  >
                                    </div>
        
                                    <div class="col-md-12 border pb-3 mb-3">
                                        <label for="content" class="col-form-label fw-bold justify-content-start d-flex">Content<i class="text-danger">*</i></label>
                                        <textarea name="content" class="form-control" id="editor1" cols="30" rows="10" required></textarea>
                                    </div>

                                    <div class="col-md-6 border pb-3 mb-3">
                                        <label for="meta_title" class="col-form-label fw-bold justify-content-start d-flex">Meta Title</label>
                                        <textarea name="meta_title" id="meta_title" class="form-control" id="" cols="30" rows="1" ></textarea>
                                    </div>
                                    
                                    <div class="col-md-6 border pb-3 mb-3">
                                        <label for="meta_description" class="col-form-label fw-bold justify-content-start d-flex">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control"  ></textarea>
                                    </div>
        
                                </div>
    
        
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-success "> Add New</button>
                            </div>
    
        
                    </form>
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

</script>


<script>
    $(document).ready(function () {
      "use strict"; 
        CKEDITOR.replace('editor1', {});
    });
</script>



@endpush

