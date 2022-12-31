<div class="top-header bg-white">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">

            <a href="{{url('/home')}}" class="header-logo">
                <img style="width:97px; height:41px" src="{{ ($settings->logo) ? url('/public/storage/'.$settings->logo) : url('public/demoimage/logo.png') }}" alt="">
            </a>

            <div class="align-items-center d-flex flex-shrink-0 p-0 profile-element dropdown">
                <a class="dropdown-toggle align-items-center d-flex flex-shrink-0 p-0" href="#" id="userDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    
                    <div class="avatar online">
                        <img src="{{ asset('public/newAdmin') }}/avatar.png" class="img-fluid rounded-circle" alt="">
                    </div>

                    <div class="profile-text text-black">
                        <h6 class="m-0">{{auth()->user() ? auth()->user()->user_name : ''}}</h6>
                        <span class="text-black">{{auth()->user() ? auth()->user()->email : ''}}</span>
                    </div>
                </a>

                
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="userDropdown">
                    @if(auth()->user()->student())
                    <a class="dropdown-item" href="">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav id="main-menu" class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!-- Left nav -->
            <ul class="nav navbar-nav me-auto">


                <li class="nav-item">
                    <a class="nav-link" href="{{url('/home')}}">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span>{{__('language.dashboard')}}</span>
                    </a>
                </li>

                {{--start up--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  href="#">
                        <i class="fas fa-user"></i>
                        <span>Startups</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.startups.create') }}">Add</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.startups.index') }}">All Startups</a></li>
                    </ul>
                </li>


                {{--investor--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>{{ __('language.investors') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.investor.create') }}">{{ __('language.add') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.investor.index') }}">{{ __('language.all_investors') }}</a></li>


                    </ul>
                </li>
                {{--hubs--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fa fa-dharmachakra"></i>
                        <span>{{ __('language.hubs') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.hubs.create') }}">{{ __('language.add') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.hubs.index') }}">{{ __('language.allhubs') }}</a></li>


                    </ul>
                </li>
                {{--Academia--}}


                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fa fa-building-columns"></i>
                        <span>Academia</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.academia.create') }}">{{ __('language.add') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.academia.index') }}">All Academia</a></li>
                    </ul>
                </li> --}}
                
                {{--subscription--}}

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fas fa-cubes"></i>
                        <span>Subscription Plan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.plans.index') }}">All Plans</a></li>
                    </ul>
                </li> --}}

                {{--claim--}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fa-solid fa-file-circle-exclamation"></i>
                        <span>Organisation Claims</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.claim.index') }}">All Claims</a></li>
                    </ul>
                </li>

                {{--event--}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Events</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.event.index') }}">All Events</a></li>
                    </ul>
                </li>

                {{--research--}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>Articles</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.research.index') }}">All Articles</a></li>
                    </ul>
                </li> --}}

                {{--research--}}

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.deals.index')}}">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span>{{__('Deals')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('teams.index')}}">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span>{{__('Team Management')}}</span>
                    </a>
                </li>

                
                

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="dropdown">
                            <a class="dropdown-item dropdown-toggle" href="#">App Setup</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('applications.index') }}">Application</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('mails.index') }}">Mail Setup</a></li>
                                <li><a class="dropdown-item" href="{{ route('sms.index') }}">SMS Setup</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fa-solid fa-users-gear"></i>
                        <span>Permission</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('permissionmenu.index') }}">Menu</a></li>
                         <li><a href="{{route('roles.index')}}" class="dropdown-item">Role</a></li>
                       <li><a href="{{route('permissions.index')}}" class="dropdown-item">Permission</a></li>
                       <li><a href="{{route('assignrolepermissions.assingRole')}}" class="dropdown-item">Assign Role Permission</a></li>
                       <li><a href="{{route('assignrolepermissions.assignRoleUserList')}}" class="dropdown-item">Assign Role To User</a></li>

                    </ul>
                </li> --}}

               

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>CMS Settings</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="dropdown">
                            <a class="dropdown-item dropdown-toggle" href="#">News</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('categories.index') }}">Category</a></li>
                                <li><a class="dropdown-item" href="{{ route('posts.index') }}">News List</a></li>
                            </ul>
                        </li>

                        <li><a href="{{route('statistical-report.index')}}" class="dropdown-item">Statistical Report</a></li>
                        <li><a href="{{route('websetup.index')}}" class="dropdown-item">Web Setup</a></li>
                        <li><a href="{{route('social-link')}}" class="dropdown-item">Social Link</a></li>
                        <li><a href="{{route('privacy-policy-setup')}}" class="dropdown-item">Privacy Policy Setup</a></li>

                    </ul>
                </li>


          
                
                
            </ul>

            


            <style>


                .dropdown.notification .dropdown-menu {
                    min-width: 20rem;
                    top: 52px;
                    margin: 0;
                    right: 0;
                    left: auto;
                    border-radius: 2px;
                    padding: 20px 20px 15px;
                    border: 0;
                    box-shadow: 0 0 35px 0 rgb(154 161 171 / 15%);
                    animation-duration: 0.2s;
                    -webkit-animation-duration: 0.2s;
                    animation-fill-mode: both;
                    -webkit-animation-fill-mode: both;
                    -webkit-animation-name: slideIn;
                    animation-name: slideIn;
                    right: -10px;
                    color: #ffff;
                }
                .notification-list .notification:not(:last-child)::before{
                    display: none
                }
                
                .dropdown.notification .badge-dot:before {
                    content: '';
                    position: absolute;
                    top: 8px;
                    right: 12px;
                    width: 7px;
                    height: 7px;
                    background-color: #f13a4b;
                    border-radius: 50%
                }
                
                
                
                
                            </style>
                
                
                            <ul class="nav navbar-nav">
                
                                <li class="nav-item dropdown notification">
                                    <a class="nav-link  {{count($notifications)>0?'badge-dot':''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="typcn typcn-bell"></i>
                                    </a>
                                    @if($notifications)
                                    <div class="dropdown-menu">
                                        <h6 class="notification-title text-white">Notifications</h6>
                                        <p class="notification-text text-white">You have {{count($notifications)}} unread notification</p>
                                        <div class="notification-list">
                                            @foreach ($notifications as $key=>$item)
                                                <a href="{{$item->url?$item->url:'#'}}" target="_blank" class="notification text-reset d-flex new">
                                                   <div class="flex-shrink-0 fs-3">{{$key+1}}</div>
                                                    <div class="notification-body">
                                                        <h6>{{$item->message}}</h6>
                                                        <span class="text-muted"><i class="me-1 fst-normal" role="img" aria-label="Emoji">💬</i> View Details</span>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                        <div class="dropdown-footer">
                                            <a class="text-white" href="javascript:void(0)" id="mark-all">
                                                <span> <i class="fa fa-check"></i> </span>Mark all as Read
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                
                            </ul>


            
        </div>
    </div>
</nav>

<script>
        $(document).ready(function() { 

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('#mark-all').on('click', function(e) {
                e.preventDefault();
                var submit_url = "{{route('make-reat-all')}}";

                $.ajax({
                    type: 'GET',
                    url: submit_url,
                    data: {"_token": "{{ csrf_token() }}"},
                    dataType: 'json',
                    success: function(response) {
                        if(response.success==true) {
                            toastr.success(response.message, response.title);
                        }else{
                            toastr.error(response.message, response.title);
                        }
                        location.reload();
                    },
                    error: function() {
                    }
                });
                
            });
        });
</script>
