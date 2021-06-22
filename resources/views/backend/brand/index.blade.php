@extends('backend.layouts.app')
@isset($editBrand)
    @section('title','Edit Brand')
@else
    @section('title','Brands')
@endisset

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/dropify/dropify.css') }}">
@endpush
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
        <span class="breadcrumb-item active">{{ __('Brands') }}</span>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ isset($editBrand) ? __('Add New Brands') : __('Edit Brand') }}</h4>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($editBrand) ? route('admin.brands.update',$editBrand->id) : route('admin.brands.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($editBrand)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="name">Name (en)</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="Brands Name (English)"
                                   value="{{ $editBrand->name ?? old('name') }}">
                            @error('name')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_bn">Name (bn)</label>
                            <input type="text" name="name_bn" id="name_bn" class="form-control"
                                   placeholder="Brands Name (Bengali)"
                                   value="{{ $editBrand->name->bn ?? old('name_bn') }}">
                            @error('name_bn')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" @isset($editBrand)
                            data-default-file="{{ $editBrand->image ? asset('storage/brand/'.$editBrand->image) : '' }}"
                                @endisset>
                            @error('image')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" name="status" id="status" @isset($editBrand)
                                    {{ $editBrand->status == true ? 'checked' : '' }}@endisset>
                                <label for="status">{{ __('Active') }}</label>
                            </div>
                            @error('status')
                            <p class="m-0 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm rounded">
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

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">All Brands</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                            <th scope="col">Craeted At</th>
                            <th scope="col" style="width: 25%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($brands as $key => $brand)
                            <tr>
                                <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                <td>
                                    <img
                                        src="{{ $brand->image ? asset('storage/brand/'.$brand->image):placeholderImage($brand->name) }}"
                                        alt="{{ $brand->name }}" style="width:70px;">
                                </td>
                                <td>{{ $brand->getTranslation('name',app()->getLocale()) }} </td>
                                <td>{{ $brand->author->name }}</td>
                                <td>
                                    @if($brand->status == true)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $brand->created_at ? $brand->created_at->diffForHumans() : '' }}</td>
                                <td>
                                    <a href="{{ route('admin.brands.edit',$brand->id) }}"
                                       class="btn btn-info btn-sm rounded">{{ __('Edit') }}</a>
                                    <button class="btn btn-danger btn-sm rounded"
                                            onclick="event.preventDefault(); deleteData({{ $brand->id }})">{{ __('Delete') }}</button>
                                    <form id="delete-data-{{ $brand->id }}"
                                          action="{{ route('admin.brands.destroy',$brand->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <h5 class="text-danger">{{ __('No Brand Found!!') }}</h5>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/vendor_components/dropify/dropify.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        $('#image').dropify();

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
