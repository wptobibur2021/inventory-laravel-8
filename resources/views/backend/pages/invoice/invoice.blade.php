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
                                    <h4 class="page-title float-left">CotechIT Stack Management Software </h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/admin">Datatable</a></li>
                                        <li class="breadcrumb-item"><a href="">All Create Invoice</a></li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box table-responsive">
                                    <form method="get" action="{{ route('all.invoice') }}" >
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
                            </div>
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    @if(count($reports) > 0)
                                    <h4 class="m-t-0 header-title"><b>All Create Invoice Here</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                       You can See all invoice information here, thank you.
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Customer</th>
                                                <th>Employee</th>
                                                <th>Root/Road</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Sub Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($reports as $report)
                                            <?php $i++ ?>
                                            <tr>
                                                <td>{{ $report->invoice_no }}</td>
                                                <td>{{ !empty($report->customer) ? $report->customer->name:'' }}</td>
                                                <td>
                                                    {{ !empty($report->employee) ? $report->employee->name:'' }}
                                                </td>
                                                <td>{{ $report->root }}</td>
                                                <td>{{ !empty($report->product) ? $report->product->product_name:'' }}</td>
                                                <td>{{ $report->qty }}</td>
                                                <td>{{ $report->price }}</td>
                                                <td>
                                                    {{ $report->price*$report->qty }}
                                                </td>
                                                <td>
                                                    <a target="_blank" href="{{ route('view.invoice', $report->invoice_no) }}" ><i class="mdi mdi-printer"></i></a>
                                                    <a class="edit-confirm" target="_blank" href="{{ route('edit.invoice', $report->invoice_no) }}" ><i class="mdi mdi-pen"></i></a>
                                                    <a class="delete-confirm" target="_blank" href="{{ route('delete.invoice', $report->invoice_no) }}" ><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <td colspan="5" class="table-active">Total Amount & Quantity</td>
                                              <td colspan="2">{{ $qty_sum }}</td>
                                              <td colspan="2">{{ $price_sum }} Tk</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @else
                                        <div class="text-center">
                                            <h3>Yow hvae no invoice, Please click below link then create a invoice</h3>
                                            <a class="btn btn-primary" href="{{ route('index.invoice') }}"> Create Invoice </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
