<!--begin::Footer Section-->
<div class="mb-0">
    
    <!--begin::Curve top-->
    <div class="landing-curve landing-dark-color">
        <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                fill="currentColor"></path>
        </svg>
    </div>
    <!--end::Curve top-->

    <!--begin::Wrapper-->
    <div class="landing-dark-bg pt-20">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row py-10 pt-lg-10 pb-lg-20">


                <!--begin::Col-->
                <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                    <a href="#">
                        <img alt="Logo" src="{{ (@$websetup->footerlogo) ? url('/public/storage/'.@$websetup->footerlogo) : $assetsurl.'/assets/media/logos/logo-white.png' }}" class="h-15px h-md-60px mb-5" />
                    </a>
                    <p class="fs-4 text-white">{{@$websetup->footertext}}</p>
                </div>

                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-6 ps-lg-16">
                    <!--begin::Navs-->
                    <div class="d-flex justify-content-center">
                        <!--begin::Links-->
                        <div class="d-flex fw-bold flex-column me-20">
                            <!--begin::Subtitle-->
                            <h4 class="fw-bolder text-gray-400 mb-6">Solutions</h4>
                            <!--end::Subtitle-->
                            <!--begin::Link-->
                            <a href="{{url('blog')}}" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Blog</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{url('startups')}}" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Startups</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{url('investor')}}" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Investors</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{url('hubs')}}" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Hubs</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{url('/contact-us')}}" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Contact</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Links-->


                        <!--begin::Links-->
                        <div class="d-flex fw-bold flex-column ms-lg-20">
                            <!--begin::Subtitle-->
                            <h4 class="fw-bolder text-gray-400 mb-6">Stay Connected</h4>
                            <!--end::Subtitle-->
                            <!--begin::Link-->
                            <a href="{{@$social_link->facebook}}" class="mb-6">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2" alt="" />
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{@$social_link->github}}" class="mb-6">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/github.svg" class="h-20px me-2" alt="" />
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{@$social_link->twitter}}" class="mb-6">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2" alt="" />
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{@$social_link->dribbble}}" class="mb-6">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px me-2" alt="" />
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="{{@$social_link->instagram}}" class="mb-6">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2" alt="" />
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                            </a>
                            <!--end::Link-->

                            <!--begin::Link-->
                            <a href="{{@$social_link->linkedin}}" class="mb-6">
                                <img src="{{$assetsurl}}/assets/media/svg/brand-logos/002-linkedin.png" class="h-20px me-2" alt="" />
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Linkedin</span>
                            </a>
                            <!--end::Link-->


                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Navs-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
        <!--begin::Separator-->
        <div class="landing-dark-separator"></div>
        <!--end::Separator-->
        <!--begin::Container-->
        <div class="container">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-md-row flex-stack py-6">
                <!--begin::Copyright-->
                <span class="fs-6 fw-bold text-gray-600" href="">{{@$websetup->copyright}}</span>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                    <li class="menu-item">
                        <a href="{{url('privacy-policy')}}" target="_blank" class="menu-link px-2">Privacy policy</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Footer Section-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
            viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                <path
                    d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                    fill="#000000" fill-rule="nonzero" />
            </g>
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
