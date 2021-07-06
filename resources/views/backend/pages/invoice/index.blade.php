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
                                        <li class="breadcrumb-item"><a href="{{ route('all.invoice') }}">All Invoice</a></li>
                                        <li class="breadcrumb-item">Add Invoice</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <form method="get" action="{{ route('index.invoice') }}" >
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="cat_id">{{ __('Category Name') }}</label>
                                                <select class="form-control" name="cat_id" id="cat_id" >
                                                    <option >No Select</option>
                                                    @foreach($cats as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="employees_id">{{ __('Brand Name') }}</label>
                                                <select class="form-control" name="brand_id" id="brand_id" >
                                                    <option >No Select</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                    @endforeach
                                                </select>
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
                                    <h4 class="m-t-0 header-title"><b>All Employee Information Here</b></h4>
                                    @if(count($carts) > 0)
                                        <div class="float-right">
                                            <!-- Full width modal -->
                                            <a href="{{ route('cart.page') }}" class="btn btn-primary waves-effect waves-light">All Cart</a>
                                        </div>
                                    @endif

                                    <p class="text-muted font-13 m-b-30">
                                       You can See all employee information here, thank you.
                                    </p>

                                    @if($reports)
                                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Photo</th>
                                                    <th>Category</th>
                                                    <th>Brand</th>
                                                    <th>Supplier</th>
                                                    <th>Buying Price</th>
                                                    <th>Selling Price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0 ?>
                                                    @foreach($reports as $product)
                                                <?php $i++ ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td><img width="50px" highte="50px" src="{{ asset('backend/assets/images/products/'.$product->image) }}"/></td>
                                                    <td>{{ !empty($product->category) ? $product->category->cat_name:'' }}</td>
                                                    <td>{{ !empty($product->brand) ? $product->brand->brand_name:'' }}</td>
                                                    <td>{{ !empty($product->supplier) ? $product->supplier->name:'' }}</td>
                                                    <td>{{ $product->buying_price }} Tk</td>
                                                    <td>{{ $product->selling_price }} Tk</td>
                                                    <td>
                                                        <form action="{{ route('cart.product', $product->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="price" value="{{ $product->selling_price }}"/>
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <button type="submit" class="btn btn-primary waves-effect w-md waves-light"><i class="fa fa-shopping-cart"> Add Ta Cart</i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Photo</th>
                                                    <th>Category</th>
                                                    <th>Brand</th>
                                                    <th>Supplier</th>
                                                    <th>Buying Price</th>
                                                    <th>Selling Price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0 ?>
                                                    @foreach($products as $product)
                                                <?php $i++ ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td><img width="50px" highte="50px" src="{{ asset('backend/assets/images/products/'.$product->image) }}"/></td>
                                                    <td>{{ !empty($product->category) ? $product->category->cat_name:'' }}</td>
                                                    <td>{{ !empty($product->brand) ? $product->brand->brand_name:'' }}</td>
                                                    <td>{{ !empty($product->supplier) ? $product->supplier->name:'' }}</td>
                                                    <td>{{ $product->buying_price }} Tk</td>
                                                    <td>{{ $product->selling_price }} Tk</td>
                                                    <td>
                                                        <form action="{{ route('cart.product', $product->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="price" value="{{ $product->selling_price }}"/>
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <button type="submit" class="btn btn-primary waves-effect w-md waves-light"><i class="fa fa-shopping-cart"> Add Ta Cart</i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif


                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
