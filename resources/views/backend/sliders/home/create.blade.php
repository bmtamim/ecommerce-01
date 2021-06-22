@extends('backend.layouts.app')

@section('title','Add New Slider')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/dropify/dropify.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ __('Add New Slider') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.home-sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   placeholder="{{ __('Slider Title') }}">
                            @error('title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sub_title">{{ __('Sub Title') }}</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control"
                                   placeholder="{{ __('Slider Sub Title') }}">
                            @error('sub_title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" rows="3" placeholder="{{ __('Slider Description') }}" class="form-control"></textarea>
                            @error('description')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="btn_text">{{ __('Button Text') }}</label>
                            <input type="text" name="btn_text" id="btn_text" class="form-control"
                                   placeholder="{{ __('Slider Button Text') }}">
                            @error('btn_text')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="btn_link">{{ __('Button Link') }}</label>
                            <input type="text" name="btn_link" id="btn_link" class="form-control"
                                   placeholder="{{ __('Slider Button Link') }}">
                            @error('btn_link')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image">
                            @error('image')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" name="status" id="status">
                                <label for="status">{{ __('Active') }}</label>
                            </div>
                            @error('status')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded">
                                @isset($editBrand)
                                    {{ __('Update') }}
                                @else
                                    {{ __('Submit') }}
                                @endisset
                            </button>
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
        $('#image').dropify();
    </script>
@endpush
