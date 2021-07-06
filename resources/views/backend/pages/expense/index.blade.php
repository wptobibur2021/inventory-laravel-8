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
                                <form method="GET" action="{{ route('index.expense') }}">
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
                            <div class="col-12">
                                <div class="card-box table-responsive">

                                    @if($report->count() > 0)
                                        <h4 class="m-t-0 header-title"><b>Report Generate {{ $start }} Form {{ $end }}</b></h4>
                                        <div class="float-right">
                                            <!-- Full width modal -->
                                            <a class="btn btn-primary waves-effect waves-light" href="{{ route('index.expense') }}" >All Expense</a>
                                        </div>
                                        <p class="text-muted font-13 m-b-30">
                                            You can See all expense information here, thank you.
                                         </p>
                                    @else
                                        <h4 class="m-t-0 header-title"><b>All Expense Information Here</b></h4>
                                        <div class="float-right">
                                            <!-- Full width modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#expense">Add Expense</button>
                                        </div>
                                        <p class="text-muted font-13 m-b-30">
                                            You can See all expense information here, thank you.
                                         </p>
                                    @endif

                                    @if($report->count() > 0)
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($report as $view)
                                            <?php $i++ ?>
                                                <tr>
                                                    <td>{{ $i  }}</td>
                                                    <td>{{ $view->expense_title }}</td>
                                                    <td>{{ $view->details }}</td>
                                                    <td>{{ $view->amount }} Tk</td>
                                                    <td>{{ $view->date }}</td>
                                                    <td>
                                                        <a class="edit-confirm" href="{{ route('edit.expense', $view->id) }}" title="Edit Expense"><i class="mdi mdi-pen"></i></a>
                                                        <a class="delete-confirm" href="{{ route('delete.expense', $view->id) }}" title="Delete Expense"><i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <td colspan="3" class="table-active">Total Expense Amount</td>
                                              <td colspan="3">{{ $report_sum }} Tk</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @else
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($expenses as $view)
                                            <?php $i++ ?>
                                                <tr>
                                                    <td>{{ $i  }}</td>
                                                    <td>{{ $view->expense_title }}</td>
                                                    <td>{{ $view->details }}</td>
                                                    <td>{{ $view->amount }} Tk</td>
                                                    <td>{{ $view->date }}</td>
                                                    <td>
                                                        <a href="{{ route('edit.expense', $view->id) }}" title="Edit Employee"><i class="mdi mdi-pen"></i></a>
                                                        <a href="{{ route('delete.expense', $view->id) }}" title="Delete Employee"><i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <td colspan="3" class="table-active">Total Expense Amount</td>
                                              <td colspan="3">{{ $expenses_amount }} Tk</td>
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

<div id="expense" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add New Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
                <form method="POST" action="{{ route('store.expense') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Expense Title</label>
                            <input type="text" name="title" class="form-control" required="" placeholder="Expense Title">
                        </div>
                        <div class="form-group">
                            <label>Expense Details</label>
                            <input type="text" name="details" class="form-control" required="" placeholder="Expense Details">
                        </div>
                        <div class="form-group">
                            <label>Expense Amount</label>
                            <input type="number" name="amount" class="form-control" required="" placeholder="Expense Amount">
                        </div>

                        <div class="form-group">
                            <label>Expense Date</label>
                            <input type="date" name="date" class="form-control" required="" placeholder="Expense Date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Expense</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('backend.pages.footer')
