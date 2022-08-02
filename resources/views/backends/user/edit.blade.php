@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;"> Update Users</h4>
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
                    <form class="row g-3 adduserform" action="{{URL::to('admin/users/update/'.$user->id)}}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <input type="text"
                                   class="form-control shadow-none @error('first_name') is-invalid @enderror"
                                   name="first_name" id="firstName" value="{{$user->first_name}}"
                                   placeholder="First Name">
                            @error('first_name')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-none @error('last_name') is-invalid @enderror"
                                   name="last_name" id="lastName" value="{{$user->last_name}}"
                                   placeholder="Last Name">

                            @error('last_name')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none @error('last_name') is-invalid @enderror"
                                   id="streetaddress"
                                   name="primary_address" value="{{$user->primary_address}}"
                                   placeholder="Street Address">

                            @error('primary_address')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none @error('city') is-invalid @enderror"
                                   id="city"
                                   name="city" placeholder="Town/City" value="{{$user->city}}">

                            @error('city')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none @error('state') is-invalid @enderror" id="state"
                                    name="state">
                                <option value="">Select Your State</option>
                                @foreach($states as $k=>$v)
                                    <option
                                        value="{{$v->id}}" {{ $user->state == $v->id ? "selected" : "" }}>{{$v->state_name}}</option>
                                @endforeach

                            </select>
                            <!-- <input type="text" class="form-control shadow-none @error('state') is-invalid @enderror" id="state" name="state"
                                   placeholder="State" value="{{old('state')}}"> -->
                            @error('state')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none @error('zipcode') is-invalid @enderror"
                                   id="zipcode" name="zipcode"
                                   placeholder="Zipcode" value="{{$user->zipcode}}">
                            @error('zipcode')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none @error('country') is-invalid @enderror" id="country"
                                    name="country" value="{{old('country')}}">
                                <option value="">Select Your Country</option>
                                @foreach($countries as $k=>$v)
                                    <option
                                        value="{{$v->country_code}}" {{ $user->country == $v->country_code ? "selected" : "" }}>{{$v->country_name}}</option>
                                @endforeach

                            </select>
                            @error('country')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control shadow-none @error('phone') is-invalid @enderror"
                                   id="inputAddress2"
                                   name="phone" placeholder="Phone" value="{{$user->phone}}">
                            @error('phone')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror"
                                   name="email" id="inputEmail4"
                                   placeholder="Email" value="{{$user->email}}">
                            @error('email')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="password"
                                   class="form-control shadow-none @error('password') is-invalid @enderror"
                                   name="password" id="inputPassword"
                                   placeholder="Password" value="{{$user->password}}">
                            @error('password')
                            <div class="alert"><p class="text-danger">{{ $message }}</p></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="password"
                                   class="form-control shadow-none @error('password_confirmation') is-invalid @enderror"
                                   name="password_confirmation"
                                   id="confirmPassword" value="{{$user->password_confirmation}}"
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
                                   placeholder="Upload Image" onchange="loadFile(event)">
                            <img id="output" style="width: 150px;"
                                 src="{{URL::to('images/user/'.$user->user_profile)}}"/>
                        </div>
                        @foreach ($user->service_orders as $service)
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           value="{{$service->id}}"
                                           data-url="{{route('user-service-update', $service->id)}}"
                                           data-name="{{$service->service->service_name}}"
                                           data-id="{{$service->id}}">
                                    <label class="form-check-label"
                                           for="service1">{{$service->service->service_name}}</label>
                                </div>
                            </div>
                        @endforeach

                        <div class=" text-center user-data-btn">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4 add-user-card ">
                <div class="subscriptions addUserSub  shadow bg-white mb-3 w-100 rounded pt-4 pb-4">
                    <p>Trail Usages</p>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="col-md-4 add-user-card ">

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        let formCheckInput = document.querySelectorAll(".form-check-input");
        for (let i = 0; i < formCheckInput.length; i++) {
            formCheckInput[i].addEventListener("click", (event) => {
                let service_order_url = event.target.getAttribute('data-url');
                let service_name = event.target.getAttribute('data-name');
                let service_id = event.target.getAttribute('data-id');
                let addUserCard = document.querySelector(".add-user-card");

                let userCard = `<div class="card-${i + 1}  service-bottom-edit shadow" data-aos="fade-up">
                                <h3>${service_name}</h3>
                                <a href="${service_order_url}"><span><i class="bi bi-pencil-fill"></i></span></a>
                                </div>`;

                if (formCheckInput[i].getAttribute("checked") == null) {
                    addUserCard.innerHTML += userCard;
                    formCheckInput[i].setAttribute("checked", "");
                } else {
                    formCheckInput[i].removeAttribute("checked");
                    document.querySelector(`.card-${i + 1}`).remove();
                }
            });
        }
    </script>
@endsection
