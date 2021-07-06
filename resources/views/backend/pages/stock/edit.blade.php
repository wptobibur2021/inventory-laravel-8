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
                                </div>
                                <form class="form-horizontal"  action="{{ route('update.stock', $edits->id) }}"  method="POST" enctype="multipart/form-data">
                                    @csrf

                                        <div class="card-box table-responsive">

                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="selling_price">{{ __('Product Name') }}</label>
                                                            <input  value="{{ !empty($edits->product) ? $edits->product->product_name:'' }}"  class="form-control" name="product_name" type="text" id="product_name" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="product_quantity">{{ __('Total Product Quantity') }}</label>
                                                            @php
                                                                $product_qty = !empty($edits->product) ? $edits->product->product_quantity:'';
                                                            @endphp
                                                            <input  value="{{ $product_qty }}"  class="form-control" type="number" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="product_quantity">{{ __('Total Invoice Product Quantity') }}</label>
                                                            <input  value="{{ $edits->qty }}"  class="form-control" type="number" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="sales">{{ __('Sales Product Quantity') }}</label>
                                                            <input class="form-control" value="{{ $edits->sales_pro }}"  name="sales_pro" type="number" id="sales_pro" placeholder="Sales Product Quantity">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="damage">{{ __('Damage Product Quantity') }}</label>
                                                            <input class="form-control" value="{{ $edits->damage_pro }}"  name="damage_pro" type="number" id="damage_pro" placeholder="Damage Product Quantity">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="return">{{ __('Return Product Quantity') }}</label>
                                                            <input class="form-control" value="{{ $edits->return_pro }}"  name="return_pro" type="number" id="return_pro" placeholder="Return Product Quantity">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="price">{{ __('Unit Product Price') }}</label>
                                                            <input value="{{ $edits->price }}" class="form-control" name="price" type="number" id="price" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="price">{{ __('Sub Total Price') }}</label>
                                                            <input value="{{ $edits->subtotal }}" class="form-control" name="subtotal" type="number" id="subtotal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Update product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
