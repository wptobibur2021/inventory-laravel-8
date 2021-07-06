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
                                    <h4 class="page-title float-left">Expense</h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/">Admin</a></li>
                                        <li class="breadcrumb-item active">All Expense</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="card-box table-responsive">
                                <h4>You can easy generate the report from here</h4>
                                <form method="GET" action="{{ route('index.sales') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input type="date" name="start_date" class="form-control" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="date" name="end_date" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Generate Report</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box table-responsive">
                                    @if($sales->count() > 0)
                                        <p class="m-t-0 header-title"><b>Report Generate {{ $start }} Form {{ $end }}</b></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="card-box table-responsive">

                                    @if($sales->count() > 0)
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Title</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($sales as $view)
                                            <?php $i++ ?>
                                                <tr>
                                                    <td>{{ $i  }}</td>
                                                    <td>{{ !empty($view->product) ? $view->product->product_name:'' }}</td>
                                                    <td>{{ $view->subtotal }} Tk</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <td colspan="2" class="table-active">Total Expense Amount</td>
                                              <td>{{ $sales_sum }} Tk</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @else
                                        <h2>No Sales Avilable</h2>
                                    @endif
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="card-box table-responsive">
                                    @if($costs->count() > 0)
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Title</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($costs as $view)
                                            <?php $i++ ?>
                                                <tr>
                                                    <td>{{ $i  }}</td>
                                                    <td>{{ $view->expense_title }}</td>
                                                    <td>{{ $view->amount }} Tk</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <td colspan="2" class="table-active">Expense Amount</td>
                                              <td>{{ $cost_sum }} Tk</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @else
                                        <h2>No Sales Avilable</h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @php
                            $total_amount =  $sales_sum - $cost_sum;
                        @endphp
                        @if($total_amount)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box table-responsive">
                                        <p class="m-t-0 header-title"><b>Your Benefit: {{ $total_amount }} Tk</b></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
