@extends('backend.layouts.app')

@section('title', 'Change Password')

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">Dashboard</a>
    <span class="breadcrumb-item active">Change Password</span>
</nav>
@endsection
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 col-md-12">
        <div class="card p-3 rounded">
            <div class="card-body">
                <form action="{{ route('admin.update.password') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="currentPass">{{ __('Current Password') }}</label>
                        <input type="password" name="currentPass" id="currentPass" class="form-control">
                        @error('currentPass')
                        <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('New Password') }}</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                        <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control">
                        @error('password_confirmation')
                        <p class="m-0 text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary rounded">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
