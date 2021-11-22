@extends('layouts.master-auth')
@section('title' , 'Register')
@section('content')
    <div class="login-bg">
        <!-- login Area Start -->
        <div class="login-form-area">
            <form action="{{ route('login-post') }}" method="post" class="login-form">
            @csrf
            <!-- Login Heading -->
                <div class="login-heading">
                    <span>Login</span>
                    <p>Enter Login details to get access</p>
                </div>
                <!-- Single Input Fields -->
                <div class="input-box">
                    <div class="single-input-fields">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="single-input-fields">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="single-input-fields login-check">
                        <input type="checkbox" id="fruit1" name="keep-log">
                        <label for="fruit1">Keep me logged in</label>
                        <a href="#" class="f-right">Forgot Password?</a>
                    </div>
                </div>
                <!-- form Footer -->
                <div class="login-footer">
                    <p>Don’t have an account? <a href="{{ route('register-page') }}">Sign Up</a>  here</p>
                    <button type="submit" class="submit-btn3">Login</button>
                </div>
            </form>
        </div>
        <!-- login Area End -->
    </div>
@endsection
