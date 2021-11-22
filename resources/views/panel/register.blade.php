@extends('layouts.master-auth')
@section('title' , 'Register')
@section('content')
<div class="login-bg">
    <!-- Register Area Start -->
    <div class="register-form-area">
        <div class="register-form text-center">
            <!-- Login Heading -->
            <div class="register-heading">
                <span>Sign Up</span>
                <p>Create your account to get full access</p>
            </div>
            <!-- Single Input Fields -->
            <form action="{{ route('register-post') }}" method="post">
                @csrf
                <div class="input-box">
                    <div class="single-input-fields">
                        <label>Full name</label>
                        <input name="name" type="text" placeholder="Enter full name">
                    </div>
                    <div class="single-input-fields">
                        <label>Email Address</label>
                        <input name="email" type="email" placeholder="Enter email address">
                    </div>
                    <div class="single-input-fields">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="Enter Password">
                    </div>
                </div>
                <!-- form Footer -->
                <div class="register-footer">
                    <p> Already have an account? <a href="{{ route('login-page') }}"> Login</a> here</p>
                    <button type="submit" class="submit-btn3">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Register Area End -->
</div>
    @endsection

