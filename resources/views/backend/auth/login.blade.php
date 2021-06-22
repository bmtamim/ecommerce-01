@extends('backend.auth.layouts.app')
@section('title', 'Login')
@section('content')
    <div class="row justify-content-center no-gutters">
        <div class="col-lg-4 col-md-5 col-12">
            <div class="content-top-agile p-10">
                <h2 class="text-white">Ecommerce admin</h2>
                <p class="text-white-50">Developed by Tamim Ikbal</p>
            </div>
            <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if (session('status'))
                    <div class="alert alert-success mb-3 rounded-0" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('admin.login.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="bg-transparent text-white" for="email">Email</label>
                        <input type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="your@mail.com" name="email" id="email">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div><!-- form-group -->
                    <div class="form-group mb-2">
                        <label class="bg-transparent text-white" for="password">Password</label>
                        <input type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Enter your password" name="password"
                               id="password">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div><!-- form-group -->
                    <div class="d-flex justify-content-between align-itens-center mb-2">
                        <label class="ckbox">
                            <input type="checkbox" name="remember" id="remember" checked>
                            <span class="text-white">Remember Me</span>
                        </label>
                        <a href="" class="tx-info tx-12 d-block text-white">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-info btn-rounded mt-10 btn-block">Sign In</button>
                </form>
            </div>
        </div>
    </div>
@endsection
