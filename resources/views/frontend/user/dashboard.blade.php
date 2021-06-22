@extends('frontend.layouts.app')

@section('title') {{ __('My Account') }} @endsection

@section('content')
    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
        <div class="row">
            <div class="col-sm-3">
                @include('frontend.user.common.sidebar')
                <!-- /.nav-tabs #product-tabs -->
            </div>
            <div class="col-sm-9">

                <div class="tab-content">

                    <div class="tab-pane in active">
                        <div class="product-tab">

                        </div>
                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
