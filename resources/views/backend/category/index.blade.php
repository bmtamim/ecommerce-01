@extends('backend.layouts.app')
@section('title', 'Catgeory')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/dropify/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/select2/dist/css/select2-dark.min.css') }}">
@endpush
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
        <span class="breadcrumb-item active">{{ __('Catgeory') }}</span>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    @isset($editcat)
                        <h4 class="m-0">{{ __('Edit Catgeory') }}</h4>
                    @else
                        <h4 class="m-0">{{ __('Add New') }}</h4>
                    @endisset
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($editcat) ? route('admin.category.update',$editcat->id) : route('admin.category.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @isset($editcat)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="name">{{ __('Name (en)') }}</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="{{ __('Enter category name') }}"
                                   value="{{ $editcat->name ?? old('name') }}">
                            @error('name')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_bn">{{ __('Name (bn)') }}</label>
                            <input type="text" name="name_bn" id="name_bn" class="form-control"
                                   placeholder="{{ __('Enter category name') }}"
                                   value="{{ isset($editcat) ? $editcat->getTranslation('name','bn') ?? old('name_bn') : '' }}">
                            @error('name_bn')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @if($parents->count() != null)
                            <div class="form-group">
                                <label for="parent_cat">{{ __('Parent category') }}</label>
                                <select class="form-control select2" id="parent_cat" name="parent_id"
                                        data-placeholder="Choose Browser">
                                    <option selected value="0">{{ __('Nothing Selected!') }}</option>
                                    @foreach($parents as $key => $parent)
                                        <option
                                            value="{{ $parent->id }}" @isset($editcat) @if($editcat->parent_id != null)
                                            {{ $editcat->parent->id == $parent->id ? 'selected' : '' }} @endif @endisset>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <p class="m-0 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input type="file" name="image" id="image" @isset($editcat)
                            data-default-file="{{ $editcat->image ? asset('storage/category/'.$editcat->image) : '' }}"
                                @endisset>
                            @error('image')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" name="status" id="status" @isset($editcat)
                                {{ $editcat->status == true ? 'checked' : '' }} @endisset>
                                <label for="status">{{ __('Active') }}</label>
                            </div>
                            @error('status')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm rounded">
                                @isset($editcat)
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ _('All Categories') }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Status</th>
                            <th scope="col">Craeted At</th>
                            <th scope="col" style="width: 25%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                <td>
                                    <img src="{{ $category->image ? asset('storage/category/'.$category->image):'' }}"
                                         alt="{{ $category->name }}" style="width:70px;">
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>@if($category->parent_id == null)
                                        <span class="badge badge-primary">Primary Category</span>
                                    @else
                                        <span class="badge badge-info">{{ $category->parent->name }}</span>
                                    @endif</td>
                                <td>
                                    @if($category->status == true)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $category->created_at ? $category->created_at->diffForHumans() : '' }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit',$category->id) }}"
                                       class="btn btn-info btn-sm rounded">{{ __('Edit') }}</a>
                                    <button class="btn btn-danger btn-sm rounded"
                                            onclick="event.preventDefault(); deleteData({{ $category->id }})">{{ __('Delete') }}</button>
                                    <form id="delete-data-{{ $category->id }}"
                                          action="{{ route('admin.category.destroy',$category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">
                                    <h5>{{ _('No data Found!') }}}</h5>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('backend/assets/vendor_components/dropify/dropify.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        $('#image').dropify();

        $('#parent_cat').select2({
            theme: "dark",
            minimumResultsForSearch: ''
        });

        function deleteData(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-data-' + id).submit();
                }
            })
        }
    </script>
@endpush
