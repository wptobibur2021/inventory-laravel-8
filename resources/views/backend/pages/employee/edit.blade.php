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
                                    <h4 class="m-t-0 header-title"><b>{{ $edit->name }} Inforamtion Below</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        You can change any employee information from here
                                    </p>
                                    <form class="form-horizontal"  action="{{ route('update.employee', $edit->id) }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->name }}" class="form-control" type="text" name="name" id="name" required="" placeholder="Enter Name">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="email">{{ __('email') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->email }}"  class="form-control" name="email" type="email" required="" id="password1" placeholder="Enter email">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="phone">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->phone }}"  class="form-control" name="phone" type="numner" id="phone" required="" placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="village">{{ __('Village') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->village }}"  class="form-control" name="village" type="text" required="" id="village" placeholder="Enter Village">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="post_office">{{ __('Post Office') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->post_office }}"  class="form-control" name="post_office" type="text" id="post_office" required="" placeholder="Enter Post Office">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="upzila">{{ __('Upzila') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->upzila }}"  class="form-control" name="upzila" type="text" required="" id="upzila" placeholder="Enter Upzila">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="zila">{{ __('Zila') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->zila }}"  class="form-control" name="zila" type="text" required="" id="zila" placeholder="Enter Zila">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="nid_no">{{ __('NID NO') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->nid_no }}"  class="form-control" name="nid_no" type="text" required="" id="nid_no" placeholder="Enter NID Number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="joining_date">{{ __('Joining Date') }} <span class="text-danger">*</span></label>
                                                        <input value="{{ $edit->joining_date }}"  class="form-control" name="joining_date" type="date" required="" id="joining_date" placeholder="Joining Date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">

                                        <div class="form-group m-b-25">
                                            <div class="col-xs-12">
                                                <label for="photo">{{ __('Photo') }} <span class="text-danger">*</span></label>
                                                <input  class="form-control" name="photo" type="file" required="" id="photo">
                                            </div>
                                        </div>
                                            </div>

                                        <div class="col-md-6 col-sm-4">

                                            <div class="form-group m-b-25">
                                                <div class="col-xs-12">
                                                    <label for="nid_photo">{{ __('NID Photo') }} <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="nid_photo" type="file" required="" id="nid_photo">
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Update Employee</button>
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
