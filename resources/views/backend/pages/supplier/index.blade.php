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
                                    <h4 class="m-t-0 header-title"><b>All Employee Information Here</b></h4>
                                    <div class="float-right">
                                        <!-- Full width modal -->
                                        <a href="{{ route('create.supplier') }}" class="btn btn-primary waves-effect waves-light">Add Supplier</a>
                                    </div>
                                    <p class="text-muted font-13 m-b-30">
                                       You can See all employee information here, thank you.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($suppliers as $supplier)
                                            <?php $i++ ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $supplier->name }}</td>
                                                <td><img width="50px" highte="50px" src="{{ asset('backend/assets/images/supplier/'.$supplier->photo) }}"/></td>
                                                <td>{{ $supplier->email }}</td>
                                                <td>{{ $supplier->phone }}</td>
                                                <td>{{ $supplier->address }}</td>
                                                <td>
                                                    <a href="{{ route('view.supplier', $supplier->slug) }}" title="View supplier"><i class="mdi mdi-eye"></i></a>
                                                    <a class="edit-confirm" href="{{ route('edit.supplier', $supplier->id) }}" title="Edit supplier"><i class="mdi mdi-pen"></i></a>
                                                    <a class="delete-confirm" href="{{ route('delete.supplier', $supplier->id) }}" title="Delete supplier"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
