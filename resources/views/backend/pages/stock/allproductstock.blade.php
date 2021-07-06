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
                                        <li class="breadcrumb-item"><a href="/admin">Datatable</a></li>
                                        <li class="breadcrumb-item"><a href="">All Product Stock</a></li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>All Product Stock Here</b></h4>
                                    <div class="float-right">
                                        <!-- Full width modal -->
                                        <a href="{{ route('create.product') }}" class="btn btn-primary waves-effect waves-light">Add Product</a>
                                    </div>
                                    <p class="text-muted font-13 m-b-30">
                                       You can See all stock product information here, thank you.
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Quantity</th>
                                                <th>Buying Price</th>
                                                <th>Selling Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($products as $product)
                                            <?php $i++ ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ !empty($product->category) ? $product->category->cat_name:'' }}</td>
                                                <td>{{ !empty($product->brand) ? $product->brand->brand_name:'' }}</td>
                                                <td>{{ $product->product_quantity }}</td>
                                                <td>{{ $product->buying_price }} Tk</td>
                                                <td>{{ $product->selling_price }} Tk</td>
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
