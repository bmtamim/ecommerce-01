@extends('backend.layouts.app')

@section('title','Add New Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/dropify/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('backend/assets/vendor_components/datetimepicker/jquery.datetimepicker.min.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Product Card One-->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">{{ __('Product Title and Description') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                    @error('title')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" rows="5"
                                              class="form-control"></textarea>
                                    @error('description')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Product Card One-->
                        <!-- Product Card Two-->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">{{ __('Product Data') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="vtabs" style="width: 100%">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                                href="#general"
                                                                role="tab" aria-selected="true"><span><i
                                                        class="ion-construct mr-15"></i>{{ __('General') }}</span></a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#inventory"
                                                                role="tab" aria-selected="false"><span><i
                                                        class="ion-person mr-15"></i>{{ __('Inventory') }}</span></a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages9"
                                                                role="tab" aria-selected="false"><span><i
                                                        class="ion-email mr-15"></i>Email</span></a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="general" role="tabpanel">
                                            <div class="p-10">
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-3">
                                                            <label for="regular_price">{{ __('Sale Price') }}</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="number" name="sale_price" id="sale_price"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    @error('regular_price')
                                                    <p class="m-0 text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-3">
                                                            <label for="regular_price">{{ __('Regular Price') }}</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="number" name="regular_price" id="regular_price"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="col-2">
                                                            <a href="" id="schedule-toggle">{{ __('Schedule') }}</a>
                                                        </div>
                                                    </div>
                                                    @error('regular_price')
                                                    <p class="m-0 text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div class="sale-schedule">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p> {{ __('Schedule') }} </p>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="sale_start" id="sale_start"
                                                                       class="form-control"
                                                                       placeholder="From d-m-Y h:i a">
                                                                <input type="text" name="sale_end" id="sale_end"
                                                                       class="form-control"
                                                                       placeholder="To d-m-Y h:i a">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="inventory" role="tabpanel">
                                            <div class="p-10">
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-3">
                                                            <label for="sku">{{ __('SKU') }}</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="text" name="sku" id="sku"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    @error('sku')
                                                    <p class="m-0 text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-3">
                                                            <p>{{ __('Manage Stock?') }}</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="checkbox">
                                                                <input type="checkbox" name="manage_stock"
                                                                       id="manage_stock">
                                                                <label
                                                                    for="manage_stock">{{ __('Enable stock management at product level') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('manage_stock')
                                                    <p class="m-0 text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group" id="stock_status_group">
                                                    <div class="row align-items-center">
                                                        <div class="col-3">
                                                            <label for="stock_status">{{ __('Stock Status') }}</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <select name="stock_status" id="stock_status"
                                                                    class="form-control">
                                                                <option value="instock">{{ __('In stock') }}</option>
                                                                <option
                                                                    value="outofstock">{{ __('Out Of stock') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('stock_status')
                                                    <p class="m-0 text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group" id="stock_qty_group">
                                                    <div class="row align-items-center">
                                                        <div class="col-3">
                                                            <label for="stock_qty">{{ __('Stock Quantity') }}</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="number" name="stock_quantity" id="stock_quantity"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    @error('stock_quantity')
                                                    <p class="m-0 text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="messages9" role="tabpanel">
                                            <div class="p-15">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Card Two-->
                        <!-- Product Card Three-->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">{{ __('Product Short Description') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea name="short_description" id="short_description" rows="5"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Product Card Three-->
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">{{ __('Product Category & Brands') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">{{ __('Category') }}</label>
                                    <select class="form-control select2" id="category" name="category"
                                            data-placeholder="Choose Category">
                                        <option>{{ __('Nothing Selected!') }}</option>
                                        @foreach($categories as $key => $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand">{{ __('Brand') }}</label>
                                    <select class="form-control select2" id="brand" name="brand"
                                            data-placeholder="Choose Category">
                                        <option>{{ __('Nothing Selected!') }}</option>
                                        @foreach($brands as $key => $brand)
                                            <option value="{{ $brand->id }}">
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                    <p class="m-0 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">{{ __('Action') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <input type="checkbox" name="is_featured"
                                                       id="is_featured">
                                                <label
                                                    for="is_featured">{{ __('Featured') }}</label>
                                            </div>
                                            @error('is_featured')
                                            <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <input type="checkbox" name="hot_deals"
                                                       id="hot_deals">
                                                <label
                                                    for="hot_deals">{{ __('Hot Deals') }}</label>
                                            </div>
                                            @error('hot_deals')
                                            <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <input type="checkbox" name="special_deals"
                                                       id="special_deals">
                                                <label
                                                    for="special_deals">{{ __('Special Deals') }}</label>
                                            </div>
                                            @error('special_deals')
                                            <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <input type="checkbox" name="special_offers"
                                                       id="special_offers">
                                                <label
                                                    for="special_offers">{{ __('Special Offers') }}</label>
                                            </div>
                                            @error('special_offers')
                                            <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input type="checkbox" name="status"
                                               id="status">
                                        <label
                                            for="status">{{ __('Active') }}</label>
                                    </div>
                                    @error('status')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary rounded">{{ __('Publish') }}</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">{{ __('Featured Image') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">{{ __('Product Image Gallery') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="file" name="image_gallery[]" id="image_gallery" multiple>
                                </div>
                                <div id="preview-gallery"></div>
                                @error('image_gallery.*')
                                <p class="m-0 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/vendor_components/dropify/dropify.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/select2/dist/js/select2.min.js') }}"></script>
    <script
        src="{{ asset('backend/assets/vendor_components/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $('#image').dropify();

        $('#category').select2({
            minimumResultsForSearch: ''
        });
        $('#brand').select2({
            minimumResultsForSearch: ''
        });
        $('#stock_status').select2({});

        //Stock Manage
        $('#stock_qty_group').hide();
        $('#manage_stock').on('change', function () {
            if ($(this).is(':checked')) {
                $('#stock_status_group').hide();
                $('#stock_qty_group').slideDown();
            } else {
                $('#stock_qty_group').hide();
                $('#stock_status_group').slideDown();
            }
        });

        $('.sale-schedule').hide();
        $('#schedule-toggle').on('click', function (e) {
            e.preventDefault();
            $('.sale-schedule').slideToggle();
        });
        //Date Time picker
        let minDateSet = [];
        jQuery('#sale_start').datetimepicker({
            format: 'd-m-Y h:i a',
            formatDate: 'd-m-Y',
            formatTime: 'h:i a',
            yearStart: 2020,
            step: 30,
            onChangeDateTime: function (dp, $input) {
                minDateSet = $input.val().split(' ', 2);
                console.log(minDateSet[1]);
            }
        });
        jQuery('#sale_end').datetimepicker({
            format: 'd-m-Y h:i a',
            formatDate: 'd-m-Y',
            formatTime: 'h:i a',
            yearStart: 2020,
            onShow: function (current_time, $input) {
                this.setOptions({
                    minDate: minDateSet[0],
                    minTime: minDateSet[1],
                })
            },
        });
        //Multi Image Show On Uplaod
        $('#image_gallery').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                let data = $(this)[0].files; //this file data
                $('#preview-gallery img').remove();
                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                    .height(80); //create image element
                                $('#preview-gallery').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });

    </script>
@endpush
