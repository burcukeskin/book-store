@extends('layouts.master')
@section('title' , 'Cart')
@section('content')
    <!--  Hero area End -->
    <!--================Cart Area =================-->
    <section class="cart_area section-padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
{{--                            <th scope="col">Quantity</th>--}}
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @php $total = 0; @endphp--}}
                        @foreach($cartDetails as $cartDetail)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="{{ route('book-detail', $cartDetail->product_id) }}"><img
                                                    src="{{$cartDetail->image}}" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('book-detail', $cartDetail->product_id) }}">{{ $cartDetail->title }}</a>
                                            <p>{{ $cartDetail->title }} - <br> {{ $cartDetail->author }} </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $cartDetail->price}} </h5>
                                </td>
                                <td>
                                    <h5>{{ $cartDetail->price }}</h5>
                                </td>
                            </tr>


{{--                            @php $total += $cartDetail->price * $cartDetail->quantity; @endphp--}}
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Total: {{ $totalPrice }}</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn checkout_btn" href="{{ route('checkout') }}">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
@endsection
