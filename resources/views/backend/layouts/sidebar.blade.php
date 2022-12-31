 <!-- Begin page content -->
      <nav class="sidebar sidebar-bunker">
        <div class="sidebar-header">
            <a href="/home" class="sidebar-brand">
                <img src="{{url('public/backend/assets/dist/img/logo.png')}}">
            </a>
        </div>
        
        <div class="sidebar-body">
            <nav class="sidebar-nav">
                <ul class="metismenu">

                    <li class="mm-active">
                        <a class="has-arrow material-ripple" href="{{ url('/home') }}">
                            <i class="typcn typcn-home-outline"></i> Dashboard
                        </a>
                    </li>
                    
                    <li>
                        <a class="has-arrow material-ripple" href="#">
                            <i class="typcn typcn-group"></i> Human Resource
                        </a>
                        <ul class="nav-second-level">
                            <li><a href="">Attendance</a></li>
                            <li>
                                <a class="has-arrow material-ripple" href="#" aria-expanded="false">Department</a>
                                <ul class="nav-third-level mm-collapse" style="height: 0px;">
                                    <li>
                                        <a href="{{ route('departments.index') }}" aria-expanded="false">Department</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('divisions.index') }}" aria-expanded="false">Division</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">Employee</a>
                                <ul class="nav-third-level mm-collapse" style="height: 0px;">
                                    <li><a href="{{ route('positions.index') }}" aria-expanded="false">Position</a></li>
                                    <li><a href="{{ route('employees.index') }}" aria-expanded="false">Employee</a></li>
                                    <li><a href="" aria-expanded="false">Employee Performance</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('setup-rules.index')}}">Setup Rules</a></li>
                            <li><a href="">Leave</a></li>
                            <li><a href="">Loan</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        
    </nav>

<!-- <nav class="sidebar sidebar-bunker">
    <div class="sidebar-header">
        <a href="/home" class="sidebar-brand">
            <img src="{{url('public/backend/assets/dist/img/logo.png')}}">
        </a>
    </div>
    
    <div class="sidebar-body">
        <nav class="sidebar-nav">
            <ul class="metismenu">
                <li class="mm-active">
                    <a class="has-arrow material-ripple" href="{{ url('/home') }}">
                        <i class="typcn typcn-home-outline"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a class="has-arrow material-ripple" href="#">
                        <i class="typcn typcn-group"></i> Human Resource
                    </a>
                    <ul class="nav-second-level">
                        <li><a href="">Attendance</a></li>
                        <li>
                            <a class="has-arrow material-ripple" href="#" aria-expanded="false">Department</a>
                            <ul class="nav-third-level mm-collapse" style="height: 0px;">
                                <li>
                                    <a href="{{ route('departments.index') }}" aria-expanded="false">Department</a>
                                </li>
                                <li>
                                    <a href="{{ route('divisions.index') }}" aria-expanded="false">Division</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">Employee</a>
                            <ul class="nav-third-level mm-collapse" style="height: 0px;">
                                <li><a href="{{ route('positions.index') }}" aria-expanded="false">Position</a></li>
                                <li><a href="{{ route('employees.index') }}" aria-expanded="false">Employee</a></li>
                                <li><a href="" aria-expanded="false">Employee Performance</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('setup-rules.index')}}">Setup Rules</a></li>
                        <li><a href="">Leave</a></li>
                        <li><a href="">Loan</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    
</nav> -->