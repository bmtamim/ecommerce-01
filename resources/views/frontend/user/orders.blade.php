@extends('frontend.layouts.app')

@section('title') {{ __('My Orders') }} @endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/dataTables.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="col-lg-12">
        <div class="product-tabs inner-bottom-xs  wow fadeInUp">
            <div class="row">
                <div class="col-sm-2">
                @include('frontend.user.common.sidebar')
                <!-- /.nav-tabs #product-tabs -->
                </div>
                <div class="col-sm-10">
                    <div class="orders-wrapper">
                        <table id="order-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td>#{{ $order->id ?? '#' }}</td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->num_items_sold ?? 0}}</td>
                                    <td>{{ '$'.numFormat($order->net_total) ?? 0 }}</td>
                                    <td>
                                        <a href="{{ route('frontend.dashboard.orders.view',$order->id) }}" class="btn btn-info">{{ __('View') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#order-table').DataTable({
            "ordering": false,
        });
    </script>
@endpush
