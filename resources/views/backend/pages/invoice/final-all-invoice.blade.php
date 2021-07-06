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
                                    <form method="get" action="{{ route('final.invoice') }}" >
                                        <div class="row">

                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="employees_id">{{ __('Employee Name') }}</label>
                                                <select class="form-control" name="employees_id" id="employees_id" >
                                                    <option >No Select</option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="customer_id">{{ __('Customer Name') }}</label>
                                                <select class="form-control" name="customer_id" id="customer_id" >
                                                    <option >No Select</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id}}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="root">{{ __('Root Name') }}</label>
                                                <select class="form-control" name="root" id="root" >
                                                    <option >No Select</option>
                                                    @foreach($invoices as $invoice)
                                                        <option value="{{ $invoice->root}}">{{ $invoice->root }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label>Start Date</label>
                                                <input type="date" name="start_date" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label>End Date</label>
                                                <input type="date" name="end_date" class="form-control">
                                            </div>

                                            <div class="form-group col-md-4 col-sm-4">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Generate Report</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-box table-responsive">
                                    @if(count($reports) > 0)
                                    <h4 class="m-t-0 header-title"><b>Report All Employee Information Here</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                       You can See all employee information here, thank you.
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Product</th>
                                                <th>Customer</th>
                                                <th>Employee</th>
                                                <th>Total Qty</th>
                                                <th>Price</th>
                                                <th>Damage</th>
                                                <th>Return</th>
                                                <th>Sales</th>
                                                <th>Sub Total</th>
                                                <th>Print</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($reports as $report)
                                            <?php $i++ ?>
                                            <tr>
                                                <td>{{ $report->invoice_no }}</td>
                                                <td>{{ !empty($report->product) ? $report->product->product_name:'' }}</td>
                                                <td>{{ !empty($report->customer) ? $report->customer->name:'' }}</td>
                                                <td>{{ !empty($report->employee) ? $report->employee->name:'' }}{{ $report->root }}</td>
                                                <td>{{ $report->qty }}</td>
                                                <td>{{ $report->price }}</td>
                                                <td>{{ $report->damage_pro }}</td>
                                                <td>{{ $report->return_pro }}</td>
                                                <td>{{ $report->sales_pro }}</td>
                                                <td>
                                                    {{ $report->price*$report->sales_pro }}
                                                </td>
                                                <td><a class="btn btn-primary" target="_blank" href="{{ route('print.invoice', $report->invoice_no) }}" ><i class="mdi mdi-printer"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <h4 class="m-t-0 header-title"><b>No Report Final All Invoice Herex</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                       You can See all final invoces here, thank you.
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
                                                <th>Print</th>
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
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" class="table-active">Total Amount & Quantity</td>
                                                <td>{{ $qty_sum }}</td>
                                                <td>{{ $price_sum }} Tk</td>
                                                <td><a class="btn btn-primary" target="_blank" href="{{ route('print.invoice', $report->invoice_no) }}" >Print</a></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->



@include('backend.pages.footer')
