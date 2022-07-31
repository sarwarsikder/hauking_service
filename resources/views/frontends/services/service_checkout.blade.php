@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Checkout</h1>
    </div>

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
                                            <input type="email" name="email" value="old('email')" required placeholder="Username/Email Address"/>
                                            <input type="password" name="password" placeholder="Password"/>
                                            <input class="btn btn-success border rounded-1 login-button" type="submit"
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
                                            <input type="text" placeholder="Username"/>
                                            <input type="email" placeholder="Email Address"/>
                                            <input type="password" placeholder="Password"/>
                                            <input type="password" placeholder="Confirm Password"/>
                                            <input class="btn btn-success border rounded-1 login-button" type="submit"
                                                   value="Register">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


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
                                <form action="#">
                                    <div class="col-12">
                                        <p>If you have a coupon code, please apply it below.</p>
                                        <input type="text" placeholder="Coupon Code"/>
                                        <span>Coupon applied!!!</span>
                                        <input class="btn btn-success border rounded-1 login-button" type="submit"
                                               value="Apply">
                                    </div>
                                </form>
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
                                <form action="#">
                                    <h5>Billing Details</h5>
                                    <div class="col-12">
                                        <input type="text" placeholder="First Name"/>
                                        <input type="text" placeholder="Last Name"/>
                                        <input type="text" placeholder="Street Address"/>
                                        <input type="text" placeholder="Town/City"/>
                                        <input type="text" placeholder="State"/>
                                        <input type="text" placeholder="Zipcode"/>
                                        <select name="" id="">
                                            <option value="">Choose Your Country</option>
                                            <option value="BD">Bangladesh</option>
                                        </select>
                                    </div>
                                </form>
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
                                        <td>${{json_decode($checkCart->subscription_type)->amount}} / {{json_decode($checkCart->subscription_type)->duration}} Month</td>
                                        </tr>
                                        <th>Sub Total</th>
                                        <td>${{json_decode($checkCart->subscription_type)->amount}}</td>
                                        </tr>
                                        <th>Tax</th>
                                        <td>$15.00</td>
                                        </tr>
                                        <th>Total</th>
                                        <td>$115.00</td>
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
                                <form action="#">
                                    <h5>Make Payment</h5>
                                    <div class="col-12">
                                        <div class="col-12">
                                            <input type="checkbox" name="" id="">
                                            <span>Paypal</span>
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                        <div class="col-12">
                                            <input type="checkbox" name="" id="">
                                            <span>Credit Card</span>
                                            <p>Pay with your credit card via Stripe.</p>
                                        </div>
                                        <p>Your personal data will only be used to process your order, support your
                                            experience throughout this website, and for other purposes described in our
                                            <a href="">privacy policy</a> .
                                        </p>
                                        <input class="btn btn-success border rounded-1 login-button" type="submit"
                                               value="Checkout">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
