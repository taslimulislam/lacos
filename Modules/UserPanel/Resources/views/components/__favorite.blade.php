<div class="card card-xl-stretch mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Favorite  List</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-5" id="favoriteList">

                <!--begin::Table head-->
                <thead>
                    <tr>
                        <th class="fw-bolder">Company image</th>
                        <th class=" fw-bolder"> Company Type</th>
                        <th class=" fw-bolder"> Company name</th>
                        <th class=" fw-bolder"> Action</th>
                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody>
                    @foreach ($favorites as $favorite )
                        @if(@$favorite->investor)
                            @php
                                if(@$favorite->investor->logo){
                                $dom = explode('//',$favorite->investor->logo);
                                if(count($dom)>1){
                                    $img = $favorite->investor->logo;
                                }else{
                                    $img =  url('/public/storage/'.@$favorite->investor->logo);
                                }
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
                                <td><span class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3"> Investor </span></td>
                                
                                <td>
                                    <a href="{{route('investor.detail',@$favorite->investor->uuid)}}" target="__blank" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{@$favorite->investor->company_name}}</a>
                                </td>
                                
                                <td>
                                    <a href="javascript:void(0)" id="deleteAction" data-delete-route="{{route('userpanel.favorite.delete',$favorite->id)}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>

                        @endif

                        @if(@$favorite->startup)

                            @php
                                if(@$favorite->startup->logo){
                                $dom = explode('//',$favorite->startup->logo);
                                if(count($dom)>1){
                                    $img = $favorite->startup->logo;
                                }else{
                                    $img =  url('/public/storage/startups/'.@$favorite->startup->logo);
                                }
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
                                
                                <td><span class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3"> Startup </span></td>
                                <td>
                                    <a href="{{route('startup.detail',$favorite?->startup->uuid)}}" target="__blank" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$favorite?->startup->name}}</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" id="deleteAction" data-delete-route="{{route('userpanel.favorite.delete',$favorite->id)}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endif

                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
</div>

<script>

    $('#favoriteList').on('click', '#deleteAction', function(e) {

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
</script>