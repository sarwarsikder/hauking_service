@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Login</h1>
    </div>

    <section id="login-form" class="mt-5">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <p><strong>Whoops!</strong> There were some problems with your input.</p><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-danger">
                <strong>{{Session::get('success')}}.</strong>
            </div>
        @endif
        <div class="wrapper">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login To Your Account</h1>
                <div class="row  row-cols-1 row-cols-lg-1 mt-3">
                    <div id="login-form-input">
                        <div class="col align-items-center">
                            <input type="email" name="email" placeholder="Username/Email Address"/>
                        </div>
                        <div class="col align-items-center">
                            <input type="password" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="col align-items-center mt-3 mb-3">
                        <input type="checkbox"/>
                        <span> Remember Me</span>

                    </div>
                    <div class="col align-items-center1">
                        <input class="btn btn-success border rounded-1 login-button" type="submit" value="Login">
                    </div>
                    <div class="login-forget mt-3">
                        <p><a href="{{route('user-register')}}">Register</a> | <a href="{{route('forget-password')}}">Forget Password</a></p>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
