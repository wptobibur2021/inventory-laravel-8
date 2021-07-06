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
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>All product Information Here</b></h4>
                        <div class="float-right">
                            <!-- Full width modal -->
                            <a href="{{ route('index.product') }}" target="_blank" class="btn btn-primary waves-effect waves-light">All Product</a>
                        </div>
                        <p class="text-muted font-13 m-b-30">
                           You can See all product information here, thank you.
                        </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Buying Price</th>
                                    <th>Selling Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach($products as $product)
                                <?php $i++ ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td><img width="50px" highte="50px" src="{{ asset('backend/assets/images/products/'.$product->image) }}"/></td>
                                    <td>{{ !empty($product->category) ? $product->category->cat_name:'' }}</td>
                                    <td>{{ !empty($product->brand) ? $product->brand->brand_name:'' }}</td>
                                    <td>{{ $product->buying_price }} Tk</td>
                                    <td>{{ $product->selling_price }} Tk</td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        @if(count($stocks) > 0)
                        <h4 class="m-t-0 header-title"><b>All stocks product Information Here</b></h4>
                        <div class="float-right">
                            <!-- Full width modal -->
                            <a href="{{ route('stock') }}" target="_blank" class="btn btn-primary waves-effect waves-light">All Stocks Product</a>
                        </div>
                        <p class="text-muted font-13 m-b-30">
                           You can See all stocks product information here, thank you.
                        </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Product</th>
                                    <th>Total Qty</th>
                                    <th>Price</th>
                                    <th>Damage</th>
                                    <th>Return</th>
                                    <th>Sales</th>
                                    <th>Invoice QTY</th>
                                    <th>In Stock</th>
                                    <th>Sell Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach($stocks as $report)
                                <?php
                                    $i++;
                                ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ !empty($report->product) ? $report->product->product_name:'' }}</td>
                                    <td>{{ !empty($report->product) ? $report->product->product_quantity:'' }}</td>
                                    <td>{{ $report->price }}</td>
                                    <td>{{ $report->damage_pro }}</td>
                                    <td>{{ $report->return_pro }}</td>
                                    @php
                                        $product_qty = !empty($report->product) ? $report->product->product_quantity:'';
                                       // $total_stock = $product_qty+$report->return_pro;
                                        $sales_damage = $report->sales_pro+$report->damage_pro;
                                    @endphp
                                    <td>{{ $report->sales_pro }}</td>
                                    <td>{{ $report->qty }}</td>
                                    <td>{{  $product_qty-$sales_damage }}</td>
                                    <td>
                                        {{ $report->price*$report->sales_pro }} Tk
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>

            @if(count($invoices) > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">

                            <h4 class="m-t-0 header-title"><b>All Complete Invoice Information Here</b></h4>
                            <div class="float-right">
                                <!-- Full width modal -->
                                <a href="{{ route('final.invoice') }}" target="_blank" class="btn btn-primary waves-effect waves-light">All Complete Invoice</a>
                            </div>
                            <p class="text-muted font-13 m-b-30">
                                You can See all Complete Invoice Information here, thank you.
                             </p>
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product</th>
                                        <th>Customer</th>
                                        <th>Employee</th>
                                        <th>Total Qty</th>
                                        <th>Damage</th>
                                        <th>Return</th>
                                        <th>Sales</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0 ?>
                                    @foreach($invoices as $report)
                                    <?php $i++ ?>
                                    <tr>
                                        <td>{{ $report->invoice_no }}</td>
                                        <td>{{ !empty($report->product) ? $report->product->product_name:'' }}</td>
                                        <td>{{ !empty($report->customer) ? $report->customer->name:'' }}</td>
                                        <td>{{ !empty($report->employee) ? $report->employee->name:'' }}{{ $report->root }}</td>
                                        <td>{{ $report->qty }}</td>
                                        <td>{{ $report->damage_pro }}</td>
                                        <td>{{ $report->return_pro }}</td>
                                        <td>{{ $report->sales_pro }}</td>
                                        <td>
                                            {{ $report->price*$report->sales_pro }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif



        </div> <!-- container -->

    </div> <!-- content -->
@include('backend.pages.footer')
