<div class="card card-xl-stretch mb-5 mb-xl-10">

    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
       <!--begin::Card title-->
       <div class="card-title m-0">
           <h3 class="fw-bolder m-0">My Reports</h3>
       </div>
       <!--end::Card title-->
       <!--end::Action-->
   </div>
   <!--begin::Card header-->

   
   <!--begin::Body-->
   <div class="card-body py-3">
       <!--begin::Table container-->
       <div class="table-responsive">
           <!--begin::Table-->
           <table class="table align-middle gs-0 gy-5" id="reportList">

               <!--begin::Table head-->
               <thead>
                   <tr>
                       <th class="fw-bolder">image</th>
                       <th class=" fw-bolder"> Report Title</th>
                       <th class=" fw-bolder"> Doc</th>
                       <th class=" fw-bolder"> Buy Price</th>
                       <th class=" fw-bolder"> Buy Date</th>
                   </tr>
               </thead>
               <!--end::Table head-->

               <!--begin::Table body-->
               <tbody>
                @foreach ($buyreports as $item )
                    @php
                        if($item->report->report_image){
                            $img =  url('/public/storage/'.@$item->report->report_image);
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
                        {{$item->report->name}}
                    </td>

                    <td>
                        <a href="{{url('/public/storage/').'/'.$item->report->report_doc}}" target="_blank" class="btn btn-success"><i class="fa fa-download"></i></a>
                    </td>
                    
                    <td>{{$item->buy_price}}</td>
                    <td>{{$item->created_at}}</td>
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

