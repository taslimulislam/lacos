<div class="text-center py-10 py-lg-20">
    <!--begin::Title-->
    <h1 class="text-white lh-base fw-semibold fs-2x fs-lg-3x mb-15"> Accelerating the  <br />
        <span
            style="background: linear-gradient(to right, #991de7 0%, #009ef7 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
            <span id="kt_landing_hero_text">growth of Africa's tech ecosystem</span>
        </span>
    </h1>
    <!--end::Title-->
    <!--begin::Simple form-->
    <div class="rounded d-flex flex-column flex-lg-row align-items-lg-center bg-white p-5 w-xxl-900px h-lg-60px me-lg-10 my-5">
        <!--begin::Row-->
        <div class="row flex-grow-1 mb-5 mb-lg-0">
            <!--begin::Col-->
            <div class="col-lg-12 d-flex align-items-center mb-3 mb-lg-0">
                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                <span class="svg-icon svg-icon-1 svg-icon-gray-400 me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--begin::Input-->
                {{-- <input type="text" class="form-control form-control-flush flex-grow-1" name="search" value=""
                    placeholder="Find your next business opportunity" /> --}}
                    <div class="ui fluid search dropdown" style="border: none; font-size: 16px; font-weight: 500;">
                        <input type="hidden" name="shipper_state_state">
                        <div class="default text">Select Interest</div>
                        <div class="menu" style="width: 100%;">
                            <div class="item"></div>
                            <a class="item" href="{{url('startups')}}">Startups</a>
                            <a class="item" href="{{url('investor')}}">Investors</a>
                            <a class="item" href="{{url('hubs')}}">Hubs</a>
                            <a class="item" href="{{url('events')}}">Events</a>
                            <a class="item" href="{{url('reports')}}">Academic Research</a>
                        </div>
                    </div>
                <!--end::Input-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Action-->
        {{-- <div class="min-w-150px text-end">
            <button type="submit" class="btn btn-dark" id="kt_advanced_search_button_1">Search</button>
        </div> --}}
        <!--end::Action-->
    </div>
    <!--end::Simple form-->
</div>