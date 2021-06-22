@extends('backend.layouts.app')

@section('title', 'Shipping Division')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/select2/dist/css/select2.min.css') }}">
@endpush
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
        <span class="breadcrumb-item active">{{ __('Division') }}</span>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">{{ __('Shipping Division List') }}</h5>
                    @isset($editDivision)
                        <a href="{{ route('admin.shipping.division.index') }}"
                           class="btn btn-info py-1.5">{{ __('Create New') }}</a>
                    @endisset
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="division_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Country') }}</th>
                                <th>{{ __('Division') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($divisions as $key => $division)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $division->country->country_name ?? __('Country')}}</td>
                                    <td>{{ $division->division_name ?? __('Division') }}</td>

                                    <td>{{ $division->created_at ? $division->created_at->format('d-m-Y') : ''}}</td>
                                    <td width="20%">
                                        <a href="{{ route('admin.shipping.division.edit',$division->id) }}"
                                           class="btn btn-info rounded btn-sm"><i data-feather="edit"></i></a>
                                        <button onclick="event.preventDefault(); deleteData({{ $division->id }});"
                                                class="btn btn-danger btn-sm rounded"><i data-feather="trash-2"></i>
                                        </button>
                                        <form action="{{ route('admin.shipping.division.destroy',$division) }}"
                                              id="delete-data-{{ $division->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Country') }}</th>
                                <th>{{ __('Division') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">{{ isset($editDivision) ? __('Edit Division') : __('Add Division') }}</h5>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($editDivision) ? route('admin.shipping.division.update',$editDivision->id) : route('admin.shipping.division.store') }}"
                        method="post">
                        @csrf
                        @isset($editDivision)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="country">{{ __('Country') }}</label>
                            <select name="country" id="country" class="form-control">
                                @foreach($countries as $country)
                                    <option
                                        value="{{ $country->id }}" @isset($editDivision) {{ $editDivision->country_id === $country->id ? 'selected' : ''}} @endisset>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __('Division Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ isset($editDivision) ? $editDivision->division_name : old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                    class="btn btn-primary">{{ isset($editDivision) ? __('Update') : __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        $('#division_table').DataTable();
        $('#country').select2({
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
                confirmButtonText: 'Yes, Remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-data-' + id).submit();
                }
            })
        }
    </script>
@endpush
