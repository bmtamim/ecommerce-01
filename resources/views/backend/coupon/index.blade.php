@extends('backend.layouts.app')
@section('title', 'Coupon')

@push('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
        <span class="breadcrumb-item active">{{ __('Coupons') }}</span>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">{{ __('All Coupons') }}</h5>
                    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary btn-sm">{{ __('Add New') }}</a>
                </div>
                <div class="card-body">
                    @if(session()->has('msg'))
                        <div class="alert alert-success">{{ session()->get('msg') }}</div>
                    @endif
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('#') }}</th>
                            <th scope="col">{{ __('Title') }}</th>
                            <th scope="col">{{ __('Code') }}</th>
                            <th scope="col">{{ __('Coupon type') }}</th>
                            <th scope="col">{{ __('Coupon amount') }}</th>
                            <th scope="col">{{ __('Description') }}</th>
                            <th scope="col">{{ __('Usage / Limit') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Expiry date') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($coupons as $key=>$coupon)
                            <tr>
                                <th scope="row">{{ $coupons->firstItem() + $loop->index }}</th>
                                <td><a href="{{ route('admin.coupons.edit',$coupon) }}">{{ $coupon->name ?? __('Default') }}</a></td>
                                <td>{{ $coupon->code ?? __('DEFAULT') }}</td>
                                <td>{{ ucfirst($coupon->discount_type) ?? __('Default') }}</td>
                                <td>{{ $coupon->discount_amount ?? 0 }}</td>
                                <td>{{ $coupon->description ?? __('Default') }}</td>
                                <td>{{ $coupon->usage_limit ?? __('NA') }}</td>
                                <td>
                                    @if(\Carbon\Carbon::parse($coupon->coupon_expiry)->format('Y-m-d h:i:s') < \Carbon\Carbon::now()->format('Y-m-d h:i:s'))
                                        <span class="badge badge-danger">{{ __('Expired') }}</span>
                                    @else
                                        <span class="badge badge-success">{{ __('Active') }}</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($coupon->coupon_expiry)->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.coupons.edit',$coupon) }}" class="btn btn-info btn-sm">{{ __('Edit') }}</a>
                                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-data-'+{{ $coupon->id }}).submit();">{{ __('Delete') }}</button>
                                    <form id="delete-data-{{ $coupon->id }}" action="{{ route('admin.coupons.destroy',$coupon) }}" class="d-none" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <p class="m-0">{{ __('No Data Found!!') }}</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $coupons->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection


