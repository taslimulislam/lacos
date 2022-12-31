<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
            data-kt-sticky-offset="{default: '200px', lg: '300px'}">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex align-items-center justify-content-between">
                    <!--begin::Logo-->
                    <div class="d-flex align-items-center flex-equal">
                        <!--begin::Mobile menu toggle-->
                        <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                            <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                            <span class="svg-icon svg-icon-2hx">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                                        <path
                                            d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Mobile menu toggle-->
                        <!--begin::Logo image-->
                        <a href="{{url('/')}}">
                            <img alt="Logo" src="{{ (@$websetup->weblogo) ? url('/public/storage/'.@$websetup->weblogo) : $assetsurl.'/assets/media/logos/logo-white.png' }}" class="logo-default h-25px h-lg-50px" />
                            <img alt="Logo" src="{{ (@$websetup->stikyweblogo) ? url('/public/storage/'.@$websetup->stikyweblogo) : $assetsurl.'/assets/media/logos/logo-white.png' }}" class="logo-sticky h-20px h-lg-50px" />
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::Menu wrapper-->
                    <div class="d-lg-block" id="kt_header_nav_wrapper">
                        <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                            data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                            data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                            data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                            <!--begin::Menu-->
                            <div
                                class="flex-nowrap fs-5 fw-bold menu menu-column menu-lg-row menu-rounded menu-state-title-primary menu-title-white nav nav-flush"
                                id="kt_landing_menu">

                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link  py-3 px-4 px-xxl-6 {{hasActive('startups')}}" href="{{url('startups')}}">Startups</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                {{-- <div class="menu-item"> --}}
                                    <!--begin::Menu link-->
                                    {{-- <a class="menu-link nav-link py-3 px-4 px-xxl-4" href="{{url('companie')}}">Companies</a> --}}
                                    <!--end::Menu link-->
                                {{-- </div> --}}
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-4 {{hasActive('investor')}}" href="{{url('investor')}}">Investors</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-4 {{hasActive('hubs')}}" href="{{url('hubs')}}">Hubs</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-4 {{hasActive('events')}}" href="{{url('events')}}">Events</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-4 {{hasActive('blog')}}" href="{{url('blog')}}">Blog</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-4 {{hasActive('reports')}}" href="{{url('reports')}}">Academic Research</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                {{-- <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-4" href="{{url('pricing')}}">Pricing</a>
                                    <!--end::Menu link-->
                                </div> --}}
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Menu wrapper-->
                    
                    <!--begin::Toolbar-->
                    <div class="flex-equal text-end ms-1">
                        
                    </div>

                    <div class="text-end ms-2">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{url('sign-up')}}" class="btn btn-success">Sign Up</a>
                                <a href="{{url('sign-in')}}" target="__blank" class="btn btn-primary">Log In</a>
                            @endif

                            @else
                            
                                <a href="{{url('userpanel/overview')}}" target="__blank" class="btn btn-primary">Dashboard</a>

                                <a class="btn btn-primary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                      
                        @endguest
                    </div>

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>