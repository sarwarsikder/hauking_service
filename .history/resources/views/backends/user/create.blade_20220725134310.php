@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;"> Add Users</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-md-8 ">
                @if (session('redirect-message'))
                    <div class="alert alert-danger">
                        {{ session('redirect-message') }}
                    </div>
                @endif
                <div class="user-data-setting shadow ">
                    <form class="row g-3 adduserform" action="{{route('users-submit')}}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <input type="text"
                                   class="form-control shadow-none @error('first_name') is-invalid @enderror"
                                   name="first_name" id="firstName" value="{{old('first_name')}}"
                                   placeholder="First Name">
                            @error('first_name')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-none @error('last_name') is-invalid @enderror"
                                   name="last_name" id="lastName" value="{{old('last_name')}}"
                                   placeholder="Last Name">

                            @error('last_name')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none @error('last_name') is-invalid @enderror"
                                   id="streetaddress"
                                   name="primary_address" value="{{old('primary_address')}}"
                                   placeholder="Street Address">

                            @error('primary_address')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none @error('city') is-invalid @enderror" id="city"
                                   name="city" placeholder="Town/City" value="{{old('city')}}">

                            @error('city')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none @error('state') is-invalid @enderror" id="state" name="state">
                                <option value="">Select Your State</option>
                                @foreach($states as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->state_name}}</option>
                                @endforeach
                                
                            </select>
                            <!-- <input type="text" class="form-control shadow-none @error('state') is-invalid @enderror" id="state" name="state"
                                   placeholder="State" value="{{old('state')}}"> -->
                            @error('state')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none @error('zipcode') is-invalid @enderror" id="zipcode" name="zipcode"
                                   placeholder="Zipcode" value="{{old('zipcode')}}">
                            @error('zipcode')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none @error('country') is-invalid @enderror" id="country" name="country" value="{{old('country')}}">
                                <option value="">Select Your Country</option>
                                @foreach($countries as $k=>$v)
                                    <option value="{{$v->country_code}}">{{$v->country_name}}</option>
                                @endforeach
                                
                            </select>
                            @error('country')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control shadow-none @error('phone') is-invalid @enderror" id="inputAddress2"
                                   name="phone" placeholder="Phone" value="{{old('phone')}}">
                            @error('phone')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" id="inputEmail4"
                                   placeholder="Email" value="{{old('email')}}">
                            @error('email')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" name="password" id="inputPassword"
                                   placeholder="Password" value="{{old('password')}}">
                            @error('password')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control shadow-none @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                   id="confirmPassword" value="{{old('password_confirmation')}}"
                                   placeholder="Confirm Password">
                            @error('password_confirmation')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>



                        <div class="col-md-6">
                            <input type="datetime-local" id="time" name="meeting-time" value="2022-07-12T19:30"
                                   class="timezone w-100">
                        </div>

                        <div class="col-md-6">
                            <input type="file" class="form-control shadow-none" name="user_profile" id="files"
                                   placeholder="Upload Image">
                        </div>

                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service1">
                                <label class="form-check-label" for="service1">Service 1 </label>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service2">
                                <label class="form-check-label" for="service2">Service 2 </label>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service3">
                                <label class="form-check-label" for="service3">Service 3 </label>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service4">
                                <label class="form-check-label" for="service4">Service 4</label>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service5">
                                <label class="form-check-label" for="service5">Service 5 </label>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service6">
                                <label class="form-check-label" for="service6">Service 6 </label>
                            </div>
                        </div>

                        <div class=" text-center user-data-btn">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-4 add-user-card ">

            </div>
        </div>
    </div>
@endsection
