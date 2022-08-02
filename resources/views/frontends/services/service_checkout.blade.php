@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Checkout</h1>
    </div>

    @if(!Auth::user())
        <section id="checkout-form" class="mt-5">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Login
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="wrapper">
                                <div class="row  pt-4 pb-4  " data-aos="fade-up">
                                    <div class="col-md-6 col-sm-12">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <h5>Existing User?</h5>
                                            <div class="col-12">
                                                <input type="email" name="email" :value="old('email')" required
                                                       placeholder="Username/Email Address"/>
                                                <input type="password" name="password" placeholder="Password"/>
                                                <input class="btn btn-success border rounded-1 login-button"
                                                       type="submit"
                                                       value="Login">
                                                <p><a href="">Forget Password?</a></p>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <h5>New Customer?</h5>
                                            <div class="col-12">
                                                <input type="text" name="name" :value="old('name')" required
                                                       placeholder="Username"/>
                                                <input type="email" name="email" :value="old('email')" required
                                                       placeholder="Email Address"/>
                                                <input type="password" name="password" required placeholder="Password"/>
                                                <input type="password" name="password_confirmation" required
                                                       placeholder="Confirm Password"/>
                                                <input class="btn btn-success border rounded-1 login-button"
                                                       type="submit"
                                                       value="Register">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    @endif
    <form action="{{ route('service-checkout-payment') }}" method="post">
    @csrf
        <section id="checkout-form" class="mt-5">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Have A Coupon?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <div class="wrapper">
                            <div class="row  pt-4 pb-4  " data-aos="fade-up">
                                <div class="col-md-12">
                                    
                                        <div class="col-12">
                                            <p>If you have a coupon code, please apply it below.</p>
                                            <input type="text" placeholder="Coupon Code" value="" id="couponCode" name="coupon_code"/>
                                            <span id="couponCodeText"></span>
                                            <input class="btn btn-success border rounded-1 login-button" type="button"
                                                value="Apply" id="couponCodeSubmit">
                                        </div>
                                 
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="checkout-form" class="mt-5">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Billing
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="wrapper">
                            <div class="row  pt-4 pb-4  " data-aos="fade-up">
                                <div class="col-md-6 col-sm-12">

                                    <h5>Billing Details</h5>
                                    <div class="col-12">
                                        <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="First Name"/>
                                        <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Last Name"/>
                                        <input type="text" name="street_address" value="{{old('street_address')}}" placeholder="Street Address"/>
                                        <input type="text" name="city" value="{{old('city')}}" placeholder="Town/City"/>
                                        <select name="state" id="billinState">
                                            <option value="">Choose Your State</option>
                                            @foreach($state  as $k=>$v)
                                                <option value="{{$v->id}}">{{$v->state_name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="zipcode" placeholder="Zipcode"/>
                                        <select name="country" id="">
                                            <option value="">Choose Your Country</option>
                                            <option value="US" selected>USA</option>
                                        </select>
                                        
                                    </div>

                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="current-data">
                                        <h5>Order Summary</h5>
                                        <table style="width:100%" class="current-data-table">
                                            <tr>
                                                <th>Service Details</th>
                                                <td>
                                                    <p><strong>{{$checkCart->service_name}}</strong></p>
                                                    <p>
                                                        @foreach(json_decode($checkCart->data_fields) as $k=>$v)
                                                            {{$v->name}}: {{$v->userValue}}<br>
                                                        @endforeach
                                                    </p>
                                                </td>
                                            </tr>
                                            <th>Subscribtion Type</th>
                                            <td>${{json_decode($checkCart->subscription_type)->amount}}
                                                / {{json_decode($checkCart->subscription_type)->duration}} Month
                                            </td>
                                            </tr>
                                            <th>Coupon</th>
                                            <td id="couponAmount">$0</td>
                                            </tr>
                                            <th>Sub Total</th>
                                            <td id="subTotalAmount">${{json_decode($checkCart->subscription_type)->amount}}</td>
                                            </tr>
                                            <th>Tax</th>
                                            <td id="taxAmount">$0</td>
                                            </tr>
                                            <th>Total</th>
                                            <td id="totalAmount">${{json_decode($checkCart->subscription_type)->amount}}</td>
                                            </tr>
                                            <tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="checkout-form" class="mt-5">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Payments
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="wrapper">
                            <div class="row  pt-4 pb-4  " data-aos="fade-up">
                                <div class="col-md-12">

                                    <h5>Make Payment</h5>
                                    <div class="col-12">
                                        <div class="col-12">
                                            <input type="checkbox" name="payment_method" value="paypal"
                                                   class="payment-method" id="methodPaypal" checked>
                                            <span>Paypal</span>
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                        <div class="col-12">
                                            <input type="checkbox" name="payment_method" value="stripe"
                                                   class="payment-method" id="methodStripe">
                                            <span>Credit Card</span>
                                            <p>Pay with your credit card via Stripe.</p>
                                        </div>
                                        <p>Your personal data will only be used to process your order, support your
                                            experience throughout this website, and for other purposes described in our
                                            <a href="" target="_blank">privacy policy</a> .
                                        </p>
                                        @if(Auth::user())
                                            <input class="btn btn-success border rounded-1 login-button" type="submit"
                                                   value="Checkout">
                                        @else

                                            <p class="btn btn-success border rounded-1 login-button">Please Login to
                                                Checkout </p>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@push('scripts')
    <script>
        var originalPrice="<?php echo json_decode($checkCart->subscription_type)->amount ?>";
        var couponInfo={};
        var taxInfo={};

        function calculatePrice(){
            console.log("I am here")
            console.log(couponInfo)
            console.log(taxInfo)
            
            var total = 0;
            var subTotal = parseFloat(originalPrice);
            var tax = 0;
            var couponAmount = 0;
            if(couponInfo && couponInfo.coupon_type){
                console.log(couponInfo)
                if(couponInfo.coupon_type=="fixed"){
                    couponAmount = parseFloat(couponInfo.coupon_value);
                    subTotal = parseFloat(parseFloat(originalPrice) - couponAmount)
                }else{
                    couponAmount = parseFloat((couponInfo.coupon_value/100)*originalPrice);
                    subTotal = parseFloat(parseFloat(originalPrice) - couponAmount)
                }
            }

            if(taxInfo && taxInfo.tax_rate){
                tax = parseFloat(taxInfo.tax_rate);
            }
            total = parseFloat(parseFloat(subTotal) - parseFloat(tax));

            $("#couponAmount").html(couponAmount)
            $("#subTotalAmount").html(subTotal)
            $("#taxAmount").html(tax)
            $("#totalAmount").html(total)
        }

        $(".payment-method").change(function () {
            $(".payment-method").prop('checked', false);
            $(this).prop('checked', true);
        });

        $('#couponCodeSubmit').on("click",function () {
                    var code = $("#couponCode").val();
                    couponInfo={};
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/check-coupon-code',
                        data: {'code': code},
                        success: function (data) {
                            // console.log(data.success)
                            if (data.status == true) {
                                $("#couponCodeText").html(data.message)
                                couponInfo = data.data;
                                calculatePrice();
                                // toastr.success(data.message);
                            } else {
                                $("#couponCodeText").html(data.message)
                                calculatePrice();
                                // toastr.error(data.message);
                            }
                        },
                        error: function (err) {
                            toastr.error(data.message);
                        }
                    });
                });
                $('#billinState').change(function () {
                    var state = $("#billinState").val();
                    taxInfo={};
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/check-state-tax',
                        data: {'state': state},
                        success: function (data) {
                            // console.log(data.success)
                            if (data.status == true) {
                                taxInfo = data.data;
                                calculatePrice();
                                // toastr.success(data.message);
                            } else {
                                taxInfo ={}
                                calculatePrice();
                                // toastr.error(data.message);
                            }
                        },
                        error: function (err) {
                            toastr.error(data.message);
                        }
                    });
                });
    </script>
@endpush

