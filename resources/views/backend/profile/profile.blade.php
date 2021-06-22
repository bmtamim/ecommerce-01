@extends('backend.layouts.app')

@section('title','Profile')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/dropify/dropify.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ __('Profile Info') }}</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.profile.update',auth()->user()) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="{{ auth()->user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ __('Photo') }}</label>
                            <input type="file" name="photo" id="photo" data-default-file="{{ auth()->user()->profile_photo_url }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('backend/assets/vendor_components/dropify/dropify.js') }}"></script>
    <script>
        $('#photo').dropify();
    </script>
@endpush
