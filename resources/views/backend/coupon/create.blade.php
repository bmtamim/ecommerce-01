@extends('backend.layouts.app')
@section('title', 'Create Coupons')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/datetimepicker/jquery.datetimepicker.min.css') }}">
@endpush
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
        <a class="breadcrumb-item link" href="{{ route('admin.coupons.index') }}">{{ __('All Coupons') }}</a>
        <span class="breadcrumb-item active">{{ __('Create Coupons') }}</span>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.coupons.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        @if ($errors->any())
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                        @endif
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0">{{ __('Title ,Coupon Code & Description ') }}
                                    {{ Carbon\Carbon::now() }}</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Coupon Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="code" id="code" class="form-control"
                                           placeholder="Coupon Code">
                                    <button type="button" id="generate-coupon-code"
                                            class="btn btn-sm mt-1 btn-outline-info">Generate
                                        coupon
                                        code
                                    </button>
                                </div>
                                <div class="form-group">
                                <textarea name="description" id="description" rows="4" class="form-control"
                                          placeholder="Coupon Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h6 class="m-0">Coupon Data</h6>
                            </div>
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="general-tab" data-toggle="tab"
                                           href="#general" role="tab" aria-controls="general"
                                           aria-selected="true">{{ __('General') }}</a>
                                        <a class="nav-item nav-link" id="usage-restriction-tab" data-toggle="tab"
                                           href="#usage-restriction" role="tab" aria-controls="usage-restriction"
                                           aria-selected="false">{{ __('Usage Restriction') }}</a>
                                        <a class="nav-item nav-link" id="usage-limits-tab" data-toggle="tab"
                                           href="#usage-limits" role="tab" aria-controls="usage-limits"
                                           aria-selected="false">{{ __('Usage Limits') }}</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        <div class="row py-3 align-items-center">
                                            <div class="col-sm-3">
                                                <label for="discount-type">{{ __('Discount Type') }}</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select name="discount_type" id="discount-type" class="form-control">
                                                    <option value="percentage">{{ __('Parcentage Discount') }}</option>
                                                    <option value="fixed_cart">{{ __('Fixed Cart Discount') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row py-3 align-items-center">
                                            <div class="col-sm-3">
                                                <label for="discount_amount">{{ __('Discount Amount') }}</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" name="discount_amount" id="discount_amount"
                                                       class="form-control" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="row py-3 align-items-center">
                                            <div class="col-sm-3">
                                                <label for="coupon_enable">{{ __('Coupon Start') }}</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="coupon_enable" id="coupon_enable"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="row py-3 align-items-center">
                                            <div class="col-sm-3">
                                                <label for="coupon_expiry">{{ __('Coupon Expiry') }}</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="coupon_expiry" id="coupon_expiry"
                                                       class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="usage-restriction" role="tabpanel"
                                         aria-labelledby="usage-restriction">
                                        <div class="row py-3 align-items-center">
                                            <div class="col-sm-3">
                                                <label for="minimum_spend">{{ __('Minimum spend') }}</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" name="minimum_spend" id="minimum_spend"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="row py-3 align-items-center">
                                            <div class="col-sm-3">
                                                <label for="maximum_spend">{{ __('Maximum spend') }}</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" name="maximum_spend" id="maximum_spend"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="row py-3 align-items-center">
                                            <div class="col-sm-3">
                                                <label for="individual_use">{{ __('Individual use only') }}</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <label class="ckbox">
                                                    <input type="checkbox" name="individual_use" id="individual_use">
                                                    <span>Check this box if the coupon cannot be used in conjunction with
                                                    other coupons.</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row py-3 align-items-center">
                                            <div class="col-sm-3">
                                                <label for="exclude_sale">{{ __('Exclude sale items') }}</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <label class="ckbox">
                                                    <input type="checkbox" name="exclude_sale" id="exclude_sale">
                                                    <span>Check this box if the coupon should not apply to items on sale.
                                                    Per-item coupons will only work if the item is not on
                                                    sale. Per-cart coupons will only work if there are items in the cart
                                                    that are not on sale.</span>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>

                                    </div>
                                    <div class="tab-pane fade" id="usage-limits" role="tabpanel"
                                         aria-labelledby="usage-limits">Usage Limits
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/vendor_components/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script>

        $('#generate-coupon-code').on('click', function () {
            let length = 8;
            let result = [];
            let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let charactersLength = characters.length;
            for (let i = 0; i < length; i++) {
                result.push(characters.charAt(Math.floor(Math.random() * charactersLength)));
            }
            $('#code').val(result.join(''));
        });

        //Date Time picker
        let minDateSet = [];
        jQuery('#coupon_enable').datetimepicker({
            format:'d-m-Y h:i a',
            formatDate: 'd-m-Y',
            formatTime: 'h:i a',
            yearStart: 2020,
            step: 30,
            onChangeDateTime:function(dp,$input){
                minDateSet = $input.val().split(' ',2);
                console.log(minDateSet[1]);
            }
        });
        jQuery('#coupon_expiry').datetimepicker({
            format:'d-m-Y h:i a',
            formatDate: 'd-m-Y',
            formatTime: 'h:i a',
            yearStart: 2020,
            onShow : function(current_time,$input){
                this.setOptions({
                    minDate : minDateSet[0],
                    minTime : minDateSet[1],
                })
            },
        });
        // setInterval(function (){
        //     console.log(typeof minDateSet[0]);
        // },3000);
    </script>

@endpush
