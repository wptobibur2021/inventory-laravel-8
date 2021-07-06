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
                                    <h4 class="page-title float-left">Datatable</h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Adminox</a></li>
                                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                        <li class="breadcrumb-item active">Datatable</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">


                                <div class="card-box table-responsive">
                                    @if(count($stocks) > 0)
                                    <h4 class="m-t-0 header-title"><b>All Employee Information Here</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                       You can See all employee information here, thank you.
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Product</th>
                                                <th>Receive Qty</th>
                                                <th>Price</th>
                                                <th>Damage</th>
                                                <th>Return</th>
                                                <th>Sales</th>
                                                <th>Invoice QTY</th>
                                                <th>In Stock</th>
                                                <th>Sell Value</th>
                                                <th>Damage Value</th>
                                                <th>Action</th>
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
                                                <td>{{ $report->stock_qty }}</td>
                                                <td>
                                                    {{ $report->subtotal }} Tk
                                                </td>
                                                <td>
                                                    {{ $report->price*$report->damage_pro }} Tk
                                                </td>
                                                <td>
                                                    @php
                                                        $product_id = !empty($report->product) ? $report->product->id:'' ;
                                                    @endphp
                                                    <a  class="edit-confirm" href="{{ route('edit.stock', $product_id) }}" title="Edit product"><i class="mdi mdi-pen"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->



@include('backend.pages.footer')
