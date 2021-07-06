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
                                    <h4 class="page-title float-left">CotechIT Stack Management Software</h4>

                                        <ol class="breadcrumb float-right">
                                            <li class="breadcrumb-item"><a href="/">Dashbroad</a></li>
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
                                <form class="form-horizontal"  action="{{ route('update.invoice', $print->invoice_no) }}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="card-box table-responsive">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="name">{{ __('Employee Name') }}</label>
                                                            <input  value="{{ $employee->name }}"  class="form-control" type="text" name="employee_name" id="employee_name" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="buying_price">{{ __('Customer Name') }}</label>
                                                            <input  value="{{ $customer->name }}"  class="form-control" name="customer_id" type="numner" id="customer_name" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="root">{{ __('Root/Road') }}</label>
                                                            <input  value="{{ $print->root }}"  class="form-control" name="root" type="text" id="root" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="root">{{ __('Total Amount') }}</label>
                                                            <input  value="{{ $print->total }}"  class="form-control" name="total" type="text" id="root">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="price">{{ __('Advance') }}</label>
                                                            <input value="{{ $print->advance }}" class="form-control" name="advance" type="number" id="advance">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="price">{{ __('Due') }}</label>
                                                            <input value="{{ $print->due }}" class="form-control" name="due" type="number" id="due">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="price">{{ __('Paid') }}</label>
                                                            <input value="{{ $print->advance }}" class="form-control" name="paid" type="number" id="paid">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="root">{{ __('Date') }}</label>
                                                            <input  value="{{ $print->date }}"  class="form-control" name="date" type="text" id="date" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="root">{{ __('Invoice Total QTY') }}</label>
                                                            <input  value="{{ $qty_sum }}"  class="form-control" name="root" type="text" id="root" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @foreach($prints as $print)
                                        <div class="card-box table-responsive">
                                            <input type="hidden" value="{{ !empty($print->product) ? $print->product->id:'' }}"  class="form-control" name="product_id[]" id="product_id">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="selling_price">{{ __('Product Name') }}</label>
                                                            <input  value="{{ !empty($print->product) ? $print->product->product_name:'' }}"  class="form-control" name="product_name" type="text" id="product_name" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="product_quantity">{{ __('Receive Quantity') }}</label>
                                                            <input  value="{{ !empty($print->product) ? $print->product->product_quantity:'' }}"  class="form-control" name="qty" type="number" id="qty" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="product_quantity">{{ __('Invoice Quantity') }}</label>
                                                            <input  value="{{ $print->qty }}"  class="form-control" name="qty" type="number" id="qty" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="sales">{{ __('Sales Product Quantity') }}</label>
                                                            <input class="form-control" value="{{ $print->sales_pro }}"  name="sales_pro[]" type="number" id="sales_pro" placeholder="Sales Product Quantity">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="damage">{{ __('Damage Product Quantity') }}</label>
                                                            <input class="form-control" value="{{ $print->damage_pro }}"  name="damage_pro[]" type="number" id="damage_pro" placeholder="Damage Product Quantity" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="return">{{ __('Return Product Quantity') }}</label>
                                                            <input class="form-control" value="{{ $print->return_pro }}"  name="return_pro[]" type="number" id="return_pro" placeholder="Return Product Quantity" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="return">{{ __('In Stock Quantity') }}</label>
                                                            <input class="form-control" value="{{ $print->stock_qty }}"  name="stock_qty[]" type="number" id="stock_qty" placeholder="Stock Product Quantity" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="price">{{ __('Unit Product Price') }}</label>
                                                            <input value="{{ $print->price }}" class="form-control" name="price[]" type="number" id="price" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group m-b-25">
                                                        <div class="col-xs-12">
                                                            <label for="price">{{ __('Sub Total Price') }}</label>
                                                            <input value="{{ $print->subtotal }}" class="form-control" name="subtotal[]" type="number" id="subtotal" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
