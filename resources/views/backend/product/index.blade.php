@extends('backend.layouts.app')

@section('title','Products')

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
        <span class="breadcrumb-item active">{{ __('Subscribers') }}</span>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">{{ __('All Products') }}</h5>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">{{ __('Create New') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('On-Sale') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td><img width="50px" height="50px"
                                             src="{{ $product->image ? asset('storage/products/'.$product->image) : placeholderImage($product->title) }}"
                                             alt="{{ $product->title }}"></td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->meta->sale_price ?? $product->meta->regular_price ?? 'NA' }} $</td>
                                    <td>
                                        @if($product->onsale == true)
                                            <span class="badge badge-info">{{ __('Yes') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('No') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ ucfirst($product->type) }}</td>
                                    <td>
                                        @if($product->status == true)
                                            <span class="badge badge-info">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-info rounded btn-sm">{{ __('Edit') }}</a>
                                        <button onclick="event.preventDefault(); deleteData({{ $product->id }});" class="btn btn-danger btn-sm rounded">{{ __('Delete') }}</button>
                                        <form action="{{ route('admin.products.destroy',$product) }}" id="delete-data-{{ $product->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('On-Sale') }}</th>
                                <th>{{ __('Type') }}</th>
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
