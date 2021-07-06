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
                                    <h4 class="page-title float-left">Invoice</h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Adminox</a></li>
                                        <li class="breadcrumb-item"><a href="#">Extras</a></li>
                                        <li class="breadcrumb-item active">Invoice</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <img src="assets/images/logo_dark.png" alt="" height="30">
                                        </div>
                                        <div class="pull-right">
                                            <h3 class="m-0 hidden-print">Invoice</h3>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="pull-left m-t-30">
                                                <p><b>Hello, Stanley Jones</b></p>
                                                <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                                    promises to provide high quality products for you as well as outstanding
                                                    customer service for every transaction. </p>
                                            </div>

                                        </div><!-- end col -->
                                        <div class="col-4 offset-2">
                                            <div class="m-t-30 pull-right">
                                                <p class="m-b-10"><small><strong>Order Date: </strong></small> {{ date('M d, Y') }} </p>
                                                <p class="m-b-10"><small><strong>Order Status: </strong></small> <span class="label label-success">Paid</span></p>
                                                <p class="m-b-10"><small><strong>Order ID: </strong></small> #123456</p>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row m-t-30">
                                        @if($customer)
                                        <div class="col-6">
                                            <h5>Customer Information</h5>
                                            <address class="line-h-24">
                                                <p class="m-b-10"><small><strong>Name: </strong></small> {{ $customer->name }}</p>
                                                <p class="m-b-10"><small><strong>Name: </strong></small> {{ $customer->phone }}</p>
                                                <p class="m-b-10"><small><strong>Shop Name: </strong></small> {{ $customer->shop_name }}</p>
                                                <p class="m-b-10"><small><strong>Shop Address: </strong></small> {{ $customer->shop_address }}</p>
                                            </address>
                                        </div>
                                        @endif
                                        <div class="col-6">
                                            <div class="pull-right">
                                                <h5>Delevery Person Information</h5>
                                                <address class="line-h-24">
                                                    <p class="m-b-10"><small><strong>Name: </strong></small> {{ $customer->name }}</p>
                                                    <p class="m-b-10"><small><strong>Name: </strong></small> {{ $customer->phone }}</p>
                                                    <p class="m-b-10"><small><strong>Shop Name: </strong></small> {{ $customer->shop_name }}</p>
                                                    <p class="m-b-10"><small><strong>Shop Address: </strong></small> {{ $customer->shop_address }}</p>
                                                </address>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-30">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th class="text-right">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $carts = Cart::content();
                                                        $i = 0;
                                                        $subtotal = Cart::subtotal();
                                                        $tax = Cart::tax();
                                                        $total = Cart::total();
                                                    @endphp
                                                    @foreach($carts as $cart)
                                                    <?php $i++ ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            {{ $cart->name }}
                                                        </td>
                                                        <td>{{ $cart->qty }}</td>
                                                        <td>{{ $cart->price }} Tk</td>
                                                        <td class="text-right">{{ $cart->price*$cart->qty }} Tk</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="clearfix p-t-50">
                                                <h5 class="text-muted">Notes:</h5>

                                                <small>
                                                    All accounts are to be paid within 7 days from receipt of
                                                    invoice. To be paid by cheque or credit card or direct payment
                                                    online. If account is not paid within 7 days the credits details
                                                    supplied as confirmation of work undertaken will be charged the
                                                    agreed quoted fee noted above.
                                                </small>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <p><b>Sub-total:</b> {{ $subtotal }} Tk</p>
                                                <p><b>VAT (12.5):</b> {{ $tax }} Tk</p>
                                                <h3>{{ $total }} TK</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="hidden-print m-t-30 m-b-30">
                                        <div class="text-right">
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                                            <button  data-toggle="modal" data-target="#login-modal" class="btn btn-info waves-effect waves-light">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div class="modal-header">
                                <h4 class="modal-title">Invoice of {{ $customer->name }}</h4>
                                <p class="float-right">Total Amount: {{ $total }} Tk</p>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{ route('invoice.pos') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group m-b-25">
                                                <label for="handcash">Handcash <span class="text-danger">*</span></label>
                                                <select class="form-control" name="payment_status">
                                                    <option value="Handcash">Handcash</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Card">Card</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group m-b-25">
                                                <label for="pay">Pay Amount <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" value="{{ $total }}" name="pay" id="pay" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group m-b-25">
                                                <label for="due">Due Amount <span class="text-danger">*</span></label>
                                                <input class="form-control" name="due" type="number" required="" placeholder="Due Amount">
                                            </div>
                                        </div>
                                        <input type="hidden" name="customer_id" value="{{ $customer->id }}" />
                                        <input type="hidden" name="order_date" value="{{ date('M d, Y') }}" />
                                        <input type="hidden" name="total_products" value="{{ Cart::count() }}" />
                                        <input type="hidden" name="sub_total" value="{{ $subtotal }}" />
                                        <input type="hidden" name="order_status" value="Pending" />
                                        <input type="hidden" name="vat" value="{{ $tax }}" />
                                        <input type="hidden" name="total" value="{{ $total }}" />
                                    </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Sign In</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                @include('backend.pages.footer')
