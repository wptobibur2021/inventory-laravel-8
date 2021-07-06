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
                                        <li class="breadcrumb-item"><a href="/">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('index.employee') }}">All Employee</a></li>
                                        <li class="breadcrumb-item active">Edit Information of {{ $edit->name }}</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>{{ $edit->expense_title }} Inforamtion Below</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        You can change any employee information from here
                                    </p>
                                    <form class="form-horizontal"  action="{{ route('update.expense', $edit->id) }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="name">{{ __('Expense Name') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->expense_title }}" class="form-control" type="text" name="title" id="name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="name">{{ __('Details') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->details }}" class="form-control" type="text" name="details" id="name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="name">{{ __('Amount') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->amount }}" class="form-control" type="text" name="amount" id="name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="name">{{ __('Date') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->date }}" class="form-control" type="date" name="date" id="date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group account-btn m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Update Expense</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
