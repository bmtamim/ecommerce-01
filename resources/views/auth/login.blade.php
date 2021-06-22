@extends('frontend.layouts.app')

@section('title') {{ __('Login') }} @endsection

@section('content')
    <div class="sign-in-page">
        <div class="row">
            <!-- Sign-in -->
            <div class="col-md-6 col-sm-6 sign-in">
                <h4 class="">Sign in</h4>
                <p class="">Hello, Welcome to your account.</p>

                @if($errors->any())
                    <div class="alert alert-danger my-2">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login') }}" class="register-form outer-top-xs" role="form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                        <input type="email" name="email" class="form-control unicase-form-control text-input"
                               id="exampleInputEmail1">
                        @error('email')
                        <p class="text-danger m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                        <input type="password" name="password" class="form-control unicase-form-control text-input"
                               id="exampleInputPassword1">
                        @error('password')
                        <p class="text-danger m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="radio outer-xs">
                        <label>
                            <input type="radio" name="remember" id="optionsRadios2" value="option2"> Remember
                            me!
                        </label>
                        <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your
                            Password?</a>
                    </div>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                </form>
                <div class="social-sign-in outer-top-xs">
                    <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                    <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                </div>
            </div>
            <!-- Sign-in -->

            <!-- create a new account -->
            <div class="col-md-6 col-sm-6 create-new-account">
                <h4 class="checkout-subtitle">Create a new account</h4>
                <p class="text title-tag-line">Create your new account.</p>
                @if($errors->userRegister->any())
                    <div class="alert alert-danger my-2">
                        <ul>
                            @foreach($errors->userRegister->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('frontend.register') }}" class="register-form outer-top-xs" role="form"
                      method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input"
                               id="exampleInputEmail2" name="email">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input"
                               id="exampleInputEmail1" name="name">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                        <input type="tel" class="form-control unicase-form-control text-input"
                               id="exampleInputEmail1" name="phone">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input"
                               id="exampleInputEmail1" name="password">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input"
                               id="exampleInputEmail1" name="confirmPassword">
                    </div>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                </form>


            </div>
            <!-- create a new account -->
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->
@endsection
