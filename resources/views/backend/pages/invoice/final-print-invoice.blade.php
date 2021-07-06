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
                                        <li class="breadcrumb-item"><a href="/admin">Dashbroad</a></li>
                                        <li class="breadcrumb-item active">Final Invoice Print for {{ $customer->name }}</li>
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
                                            <img src="{{ asset('backend/assets/images/logo_dark.png') }}" alt="" height="30">
                                        </div>
                                        <div class="pull-right">
                                            <h3 class="m-0">Invoice</h3>
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
                                                <p class="m-b-10"><small><strong>Order Date: </strong></small> {{ date('M d, Y') }}</p>
                                                @if($print->due)
                                                    <p class="m-b-10"><small><strong>Order Status: </strong></small> <span class="label label-success">Due</span></p>
                                                @else
                                                    <p class="m-b-10"><small><strong>Order Status: </strong></small> <span class="label label-success">Paid</span></p>
                                                @endif
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        @if($customer)
                                        <div class="col-6">
                                            <h5>Customer Information</h5>
                                            <address class="line-h-24">
                                                <p class="m-b-10"><small><strong>Name: </strong></small> {{ $customer->name }}</p>
                                                <p class="m-b-10"><small><strong>Phone: </strong></small> {{ $customer->phone }}</p>
                                                <p class="m-b-10"><small><strong>Shop Name: </strong></small> {{ $customer->shop_name }}</p>
                                                <p class="m-b-10"><small><strong>Shop Address: </strong></small> {{ $customer->shop_address }}</p>
                                            </address>
                                        </div>
                                        @endif
                                        <div class="col-6">
                                            <div class="pull-right">
                                                <h5>Delevery Person Information</h5>
                                                <address class="line-h-24">
                                                    <p class="m-b-10"><small><strong>Name: </strong></small> {{ $employee->name }}</p>
                                                    <p class="m-b-10"><small><strong>Phone: </strong></small> {{ $employee->phone }}</p>
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
                                                            <th>S/N</th>
                                                            <th>Product Name</th>
                                                            <th>Total Qty</th>
                                                            <th>Damage</th>
                                                            <th>Return</th>
                                                            <th>Sales</th>
                                                            <th>Unit Price</th>
                                                            <th class="text-right">Sub Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0 ?>
                                                        @foreach($prints as $print)
                                                        <?php $i++ ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            {{ !empty($print->product) ? $print->product->product_name:'' }}
                                                        </td>
                                                        <td>{{ $print->qty }}</td>
                                                        <td>{{ $print->damage_pro }}</td>
                                                        <td>{{ $print->return_pro }}</td>
                                                        <td>{{ $print->sales_pro }}</td>
                                                        <td>{{ $print->price }}</td>
                                                        <td class="text-right">{{ $print->price*$print->sales_pro }}</td>
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
                                                <h6 class="text-muted">Payment Sumary:</h6>
                                                <small>
                                                    @if($print->due)
                                                        <h5 class="m-b-10"><small><strong>Total Amount : {{ $price_sum  }}</strong></small> </h5>
                                                        <h5 class="m-b-10"><small><strong>Advance Payment : {{ $print->advance }}</strong></small> </h5>
                                                        <h5 class="m-b-10"><small><strong>Due Payment: {{ $price_sum-$print->advance }}</strong></small></h5>
                                                    @else
                                                        <h5 class="m-b-10"><small><strong>Total Paid Amount : {{ $price_sum  }}</strong></small> </h5>
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <h6>Total Taka: {{ $price_sum }}/=</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="pull-left top-sing">
                                                <p>Authorized Singnature</p>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-6">
                                            <div class="top-sing pull-right">
                                                <p>Authorized Singnature</p>
                                            </div>
                                        </div><!-- end col -->
                                    </div>

                                    <div class="hidden-print m-t-30 m-b-30">
                                        <div class="text-right">
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                @include('backend.pages.footer')
