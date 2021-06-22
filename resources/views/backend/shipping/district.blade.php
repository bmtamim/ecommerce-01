@extends('backend.layouts.app')

@section('title', 'Shipping District')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/select2/dist/css/select2.min.css') }}">
@endpush
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
        <span class="breadcrumb-item active">{{ __('District') }}</span>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">{{ __('Shipping District List') }}</h5>
                    @isset($editDistrict)
                        <a href="{{ route('admin.shipping.district.index') }}"
                           class="btn btn-info py-1.5">{{ __('Create New') }}</a>
                    @endisset
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="district_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Country') }}</th>
                                <th>{{ __('Division') }}</th>
                                <th>{{ __('District') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($districts as $key => $district)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $district->country->country_name ?? __('Country')}}</td>
                                    <td>{{ $district->division->division_name ?? __('Division') }}</td>
                                    <td>{{ $district->district_name ?? __('Division') }}</td>

                                    <td>{{ $district->created_at ? $district->created_at->format('d-m-Y') : ''}}</td>
                                    <td width="20%">
                                        <a href="{{ route('admin.shipping.district.edit',$district->id) }}"
                                           class="btn btn-info rounded btn-sm"><i data-feather="edit"></i></a>
                                        <button onclick="event.preventDefault(); deleteData({{ $district->id }});"
                                                class="btn btn-danger btn-sm rounded"><i data-feather="trash-2"></i>
                                        </button>
                                        <form action="{{ route('admin.shipping.district.destroy',$district) }}"
                                              id="delete-data-{{ $district->id }}" method="POST">
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
                                <th>{{ __('District') }}</th>
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
                    <h5 class="m-0">{{ isset($editDistrict) ? __('Edit District') : __('Add District') }}</h5>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($editDistrict) ? route('admin.shipping.district.update',$editDistrict->id) : route('admin.shipping.district.store') }}"
                        method="post">
                        @csrf
                        @isset($editDistrict)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="country">{{ __('Country') }}</label>
                            <select name="country" id="country" class="form-control">
                                @foreach($countries as $country)
                                    <option
                                        value="{{ $country->id }}" @isset($editDistrict) {{ $editDistrict->country_id === $country->id ? 'selected' : ''}} @endisset>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="division">{{ __('Division') }}</label>
                            <select name="division" id="division" class="form-control">
                                @foreach($divisions as $division)
                                    <option
                                        value="{{ $division->id }}" @isset($editDistrict) {{ $editDistrict->division_id === $division->id ? 'selected' : ''}} @endisset >{{ $division->division_name }}</option>
                                @endforeach
                            </select>
                            @error('division')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __('District Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ isset($editDistrict) ? $editDistrict->district_name : old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                    class="btn btn-primary">{{ isset($editDistrict) ? __('Update') : __('Submit') }}</button>
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
        $('#district_table').DataTable();
        $('#country').select2({
            minimumResultsForSearch: ''
        });
        $('#division').select2({
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
