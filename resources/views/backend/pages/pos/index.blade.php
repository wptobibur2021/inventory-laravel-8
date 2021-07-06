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

                            <div class="col-md-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>All Employee Information Here</b></h4>
                                    <div class="float-right">
                                        <!-- Full width modal -->
                                        <a href="{{ route('create.product') }}" class="btn btn-primary waves-effect waves-light">Add Product</a>
                                    </div>
                                    <p class="text-muted font-13 m-b-30">
                                       You can See all employee information here, thank you.
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
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
                                                    <td>{{ !empty($product->category) ? $product->category->cat_name:'' }}</td>
                                                    <td>{{ $product->selling_price }} Tk</td>
                                                    <form class="form-horizontal"  action="{{ route('store.pos') }}"  method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->product_name }}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <input type="hidden" name="price" value="{{ $product->selling_price }}">
                                                        <td>
                                                            <button class="btn btn-primary waves-effect w-md waves-light" type="submit">Add To Cart</button>
                                                        </td>
                                                    </form>
                                                </tr>


                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @php
                            $carts = Cart::content()
                            @endphp
                            @if(!empty($carts))
                            <div class="col-md-12">
                                <div class="card-box table-responsive">

                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qnt</th>
                                            <th>Price</th>
                                            <th>Sub Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($carts as $cart)
                                            <tr>
                                                <td>{{ $cart->name }}</td>
                                                <td>
                                                    <form class="form-horizontal"  action="{{ route('update.pos', $cart->rowId) }}"  method="POST" enctype="multipart/form-data">
                                                       @csrf
                                                        <input type="number" name="qty" value="{{ $cart->qty }}" />
                                                        <button class="btn btn-primary waves-effect w-md waves-light" type="submit">Cart Update</button>
                                                    </form>
                                                </td>
                                                <td>{{ $cart->price }} Tk</td>
                                                <td>{{ $cart->price*$cart->qty }} Tk</td>
                                                <td>
                                                    <a href="{{ route('delete.pos', $cart->rowId) }}" title="View product"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            @endif

                                <div class="card-box table-responsive">
                                    <form method="POST" action="{{ route('create.pos') }}" >
                                        @csrf
                                    <div class="col-md-6 float-left">
                                        <p>Select Customer</p>
                                        <select class="form-control" aria-label="Default select example" name="customer_id">
                                            <option selected>Select Customer</option>
                                            @foreach($customer as $key => $custom)
                                                <option value="{{ $custom->id }}">{{ $custom->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 float-right">
                                        <div class="shoping__checkout">
                                            <h5>Invoice Summary</h5>
                                            <ul>
                                                <li>Product Quantity <span>{{ Cart::count() }}</span></li>
                                                <li>Sub Toal <span>{{ Cart::subtotal() }}</span></li>
                                                <li>Total <span>{{ Cart::total() }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>

                                    <button type="submit" style="margin-top: 20px" class="btn btn-primary waves-effect waves-light">Create Invoice</button>

                                </form>
                                </div>

                        </div>
                        <!-- end row -->
                    </div> <!-- container -->

                </div> <!-- content -->
@include('backend.pages.footer')
