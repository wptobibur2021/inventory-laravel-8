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
                                        <li class="breadcrumb-item active">All Category</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>All Category Information Here</b></h4>
                                    <div class="float-right">
                                        <!-- Full width modal -->
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Add Category</button>
                                    </div>
                                    <p class="text-muted font-13 m-b-30">
                                       You can See all category information here, thank you.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($views as $view)
                                            <?php $i++ ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $view->cat_name }}</td>
                                                    <td>
                                                        <a class="edit-confirm" href="{{ route('edit.category', $view->id) }}" title="Edit Employee"><i class="mdi mdi-pen"></i></a>
                                                        <a class="delete-confirm" href="{{ route('delete.category', $view->id) }}" title="Delete Employee"><i class="mdi mdi-delete"></i></a>
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

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
                <form method="POST" action="{{ route('store.category') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Cayegory Name</label>
                            <input type="text" name="cat_name" class="form-control" required="" placeholder="Category Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('backend.pages.footer')
