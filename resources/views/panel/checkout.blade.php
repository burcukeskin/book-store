@extends('layouts.master')
@section('title' , 'Dashboard')
@section('content')
    <!-- Hero area Start-->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slider-area">
                    <div class="slider-height2 slider-bg5 d-flex align-items-center justify-content-center">
                        <div class="hero-caption hero-caption2">
                            <h2>Check Out</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Hero area End -->

    <!--? Checkout Area Start-->
    <section class="checkout_area section-padding">
{{--        <form class="container">--}}
{{--            <div class="returning_customer">--}}
{{--                <div class="check_title">--}}
{{--                    <h2>--}}
{{--                        Returning Customer?--}}

{{--                        <a href="login.html">Click here to login</a>--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--                <p>--}}
{{--                    If you have shopped with us before, please enter your details in the--}}
{{--                    boxes below. If you are a new customer, please proceed to the--}}
{{--                    Billing & Shipping section.--}}
{{--                </p>--}}
{{--                <form class="row contact_form" action="#" method="post" novalidate="novalidate">--}}
{{--                    <div class="col-md-6 form-group p_star">--}}
{{--                        <input type="text" class="form-control" id="name" name="name" value=" " />--}}
{{--                        <span class="placeholder" data-placeholder="Username or Email"></span>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 form-group p_star">--}}
{{--                        <input type="password" class="form-control" id="password" name="password" value="" />--}}
{{--                        <span class="placeholder" data-placeholder="Password"></span>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12 form-group d-flex flex-wrap">--}}
{{--                        <a href="login.html" value="submit" class="btn" > log in</a>--}}
{{--                        <div class="checkout-cap ml-5">--}}
{{--                            <input type="checkbox" id="fruit01" name="keep-log">--}}
{{--                            <label for="fruit01">Create an account?</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="cupon_area">--}}
{{--                <div class="check_title">--}}
{{--                    <h2> Have a coupon?--}}
{{--                        <a href="#">Click here to enter your code</a>--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--                <input type="text" placeholder="Enter coupon code" />--}}
{{--                <a class="btn" href="#">Apply Coupon</a>--}}
{{--            </div>--}}
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form action="{{ route('place-order') }}" class="row contact_form" type="text" method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">Turkey</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="address" placeholder="Address line" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="city" placeholder="City" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                    <div class="checkout-cap">
                                        <input type="checkbox" id="f-option3" name="selector" />
                                    </div>
                                </div>
                                <textarea class="form-control" name="notes" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Place Order</button>
                        </form>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Product<span>Total</span>
                                    </a>
                                </li>
                                @foreach($orders as $order)
                                <li>
                                    <a href="#">
                                        <span class="middle">{{$order->product_title}}</span>
                                        <span class="last">{{$order->price}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Total<span>{{ $totalPrice }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector" />
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p> Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector" />
                                    <label for="f-option6">Paypal </label>
                                    <img src="assets/img/gallery/card.jpg" alt="" />
                                    <div class="check"></div>
                                </div>
                                <p> Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                            </div>
                            <div class="creat_account checkout-cap">
                                <input type="checkbox" id="f-option8" name="selector" />
                                <label for="f-option8">I’ve read and accept the  <a href="#">terms & conditions*</a> </label>
                            </div>
{{--                            <a class="btn w-100" href="#">Place Order</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Checkout Area -->
@endsection

