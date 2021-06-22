@extends('backend.layouts.app')

@section('title','Edit Slider')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/dropify/dropify.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ __('Edit Slider') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.home-sliders.update',$homeSlider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   placeholder="{{ __('Slider Title') }}" value="{{ $homeSlider->title ?? old('title') }}">
                            @error('title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sub_title">{{ __('Sub Title') }}</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control"
                                   placeholder="{{ __('Slider Sub Title') }}" value="{{ $homeSlider->sub_title ?? old('sub_title') }}">
                            @error('sub_title')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" rows="3" placeholder="{{ __('Slider Description') }}" class="form-control">{{ $homeSlider->description ?? old('description') }}"</textarea>
                            @error('description')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="btn_text">{{ __('Button Text') }}</label>
                            <input type="text" name="btn_text" id="btn_text" class="form-control"
                                   placeholder="{{ __('Slider Button Text') }}" value="{{ $homeSlider->btn_text ?? old('btn_text') }}">
                            @error('btn_text')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="btn_link">{{ __('Button Link') }}</label>
                            <input type="text" name="btn_link" id="btn_link" class="form-control"
                                   placeholder="{{ __('Slider Button Link') }}" value="{{ $homeSlider->btn_link ?? old('btn_link') }}">
                            @error('btn_link')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" @isset($homeSlider) data-default-file="{{ asset('storage/sliders/home/'.$homeSlider->image) }}" @endisset>
                            @error('image')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" name="status" id="status" {{ $homeSlider->status == true ? 'checked' : '' }}>
                                <label for="status">{{ __('Active') }}</label>
                            </div>
                            @error('status')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded">
                                {{ __('Update') }}
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
