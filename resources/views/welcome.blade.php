@extends('frontend.layouts.master')
@section('content')
    <h1>home page</h1>
    <a href="{{ route('login') }}">LogIn</a><br>
    <a href="{{ route('register') }}">Register</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
    <a href="{{route('dashboard')}}">dashboard</a>
@endsection
