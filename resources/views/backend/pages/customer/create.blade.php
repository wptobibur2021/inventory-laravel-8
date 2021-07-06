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
                                    <h4 class="page-title float-left">Customer</h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('index.customer') }}">All Customer</a></li>
                                        <li class="breadcrumb-item active">Add Customer</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Add Information</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                      You can Add All Information From Here
                                    </p>

                                    <form class="form-horizontal"  action="{{ route('store.customer') }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="name" id="name" required="" placeholder="Enter Name">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="email" type="email" required="" id="password1" placeholder="Enter email">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="phone">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="phone" type="numner" id="phone" required="" placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="shop_name">{{ __('Shop Name') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="shop_name" type="text" required="" id="shop_name" placeholder="Enter Shop Name">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="shop_address">{{ __('Shop Address') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="shop_address" type="text" id="shop_address" required="" placeholder="Enter Shop Address">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">
                                                <div class="form-group m-b-25">
                                                    <div class="col-xs-12">
                                                        <label for="nid_no">{{ __('NID NO') }} <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="nid_no" type="text" required="" id="nid_no" placeholder="Enter NID Number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4">

                                        <div class="form-group m-b-25">
                                            <div class="col-xs-12">
                                                <label for="photo">{{ __('Photo') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" name="photo" type="file" required="" id="photo">
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
                                                <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Add Customer</button>
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
