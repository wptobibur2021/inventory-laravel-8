@include('backend.pages.header')
<!-- Top Bar End -->
@include('backend.pages.left-ment')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">

                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Add product</h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('index.product') }}">All product</a></li>
                                        <li class="breadcrumb-item active">Add product Information</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Add Information</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                      You can Add All Information From Here
                                    </p>

                                    <form class="form-horizontal"  action="{{ route('store.product') }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="name">{{ __('Product Name') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="product_name" id="name" required="" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="root">{{ __('Root/Road') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="root" type="text" required="" id="root" placeholder="Enter root">
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="phone">{{ __('Buying Price') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="buying_price" type="numner" id="buying_price" required="" placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="village">{{ __('Category Name') }} <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="category_id"  required="" id="supplier_id" >
                                                            @foreach($cats as $cat)
                                                                <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="village">{{ __('Brand Name') }} <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="brand_id"  required="" id="supplier_id" >
                                                            @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="village">{{ __('Product Code') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="product_code" type="text" id="product_code" required="" placeholder="Product Code">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="selling_price">{{ __('Selling Price') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="selling_price" type="text" id="selling_price" required="" placeholder="Selling Price">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="product_quantity">{{ __('Product Quantity') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="product_quantity" type="number" required="" id="product_quantity" placeholder="Enter Quantity">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="buying_date">{{ __('Buying Date') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="buying_date" type="date" required="" id="joining_date" placeholder="Joining Date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="image" type="file" required="" id="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Add product</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
