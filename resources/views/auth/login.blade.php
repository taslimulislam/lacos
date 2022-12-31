@extends('login.app')

@section('content')

<div class="d-flex h-100vh">
    <div class="form-wrapper m-auto">
        <div class="form-container my-4">
            <div class="register-logo text-center mb-4">
                <img src="/public/newAdmin/assets/dist/img/logo.png" alt="">
            </div>
            <div class="panel">
                <div class="panel-header text-center mb-3">
                    <h3 class="fs-24">Login</h3>
                </div>
               <hr/>
                <form class="register-form" action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3 mt-4">
                        <input type="email" name="email" class="form-control" id="emial" placeholder="Enter email">
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="pass" placeholder="Password">
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if (Route::has('password.request'))
                        <div class="mb-1 text-end text-muted">
                            <a href="{{ route('password.request') }}"><small>Forgot Password ?</small></a>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success w-100 login-button">Sign in</button>
                </form>
                <div class="panel-footer mt-5 bg-light">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>admin@admin.com</td>
                                <td>12345678</td>
                                <td>Admin</td>
                            </tr>                    
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
            $(document).ready(function() {
                    setTimeout(function () {
                    $('.page-loader-wrapper').fadeOut();
                    }, 50);
                var info = $('table tbody tr');
                info.click(function() {
                    var email    = $(this).children().first().text();
                    var password = $(this).children().first().next().text();

                    $("input[type=email]").val(email);
                    $("input[type=password]").val(password);
                });
            });

    </script>
@endpush
