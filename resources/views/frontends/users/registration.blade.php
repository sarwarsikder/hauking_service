@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Register</h1>
    </div>

    <section id="login-form" class="mt-5">
        <div class="wrapper">
            <form>
                <h1>Register Now</h1>
                <div class="row  row-cols-1 row-cols-lg-1 mt-3">
                    <div id="login-form-input">
                        <div class="col align-items-center">
                            <input type="text" placeholder="First Name"/>
                            <input type="text" placeholder="Last Name"/>
                            <input type="email" placeholder="Email Address"/>
                            <input type="password" placeholder="Password"/>
                            <input type="password" placeholder="Confirm Password"/>
                        </div>
                    </div>
                    <div class="col align-items-center1">
                        <input class="btn btn-success border rounded-1 login-button" type="submit" value="Register">
                    </div>

                    <div class="login-forget mt-3">
                        <p><a href="{{route('user-login')}}">Login</a> | <a href="{{route('reset-password')}}">Forget
                                Password</a></p>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
