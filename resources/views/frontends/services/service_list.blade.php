@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Services</h1>
    </div>

    <section id="checkout-form" class="mt-5">

        <div class="row col-12">
            @foreach ($haukings as $hauking)
                <div class="col-4">
                    <img src="{{asset('assets/frontend/img/img-2.png')}}" alt="" class="col-12">
                    <div class="d-grid justify-content-center mt-3 mb-4">
                        <h3>{{$hauking->service_name}}</h3>
                        <a href="{{route('service-show',$hauking->id)}}" class="btn btn-success border rounded-0" type="button">Subscribe</a>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
