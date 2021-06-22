@extends('backend.layouts.app')

@section('title','Home Slider')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">{{ __('All Slider') }}</h5>
                    <a href="{{ route('admin.home-sliders.create') }}"
                       class="btn btn-primary">{{ __('Create New') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $key => $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img width="70px" height="50px"
                                             src="{{ $slider->image ? asset('storage/sliders/home/'.$slider->image) : placeholderImage($slider->title) }}"
                                             alt="{{ $slider->title }}"></td>
                                    <td>{{ $slider->title }}</td>

                                    <td>
                                        @if($slider->status == true)
                                            <span class="badge badge-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $slider->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.home-sliders.edit',$slider->id) }}"
                                           class="btn btn-info rounded btn-sm">{{ __('Edit') }}</a>
                                        <button onclick="event.preventDefault(); deleteData({{ $slider->id }});"
                                                class="btn btn-danger btn-sm rounded">{{ __('Delete') }}</button>
                                        <form action="{{ route('admin.home-sliders.destroy',$slider) }}"
                                              id="delete-data-{{ $slider->id }}" method="POST">
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
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        $('#product_table').DataTable();

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
