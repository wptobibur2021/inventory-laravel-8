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
                                        <li class="breadcrumb-item"><a href="{{ route('index.product') }}">All product</a></li>
                                        <li class="breadcrumb-item active">All Cart Product</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <img src="{{ asset('backend/assets/images/logo_dark.png') }}" alt="" height="30">
                                        </div>
                                        <div class="pull-right">
                                            <h3 class="m-0">Invoice</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-30">
                                                    <thead>
                                                    <tr><th>#</th>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Receive Qty</th>
                                                        <th>Unit Cost</th>
                                                        <th class="text-right">Total</th>
                                                    </tr></thead>
                                                    <tbody>
                                                        <?php $i = 0 ?>
                                                        @foreach($carts as $cart)
                                                        <?php $i++ ?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>
                                                                {{ !empty($cart->product) ? $cart->product->product_name:'' }}
                                                            </td>

                                                            <td>
                                                                <form action="{{ route('update.cart', $cart->id) }}" method="POST">
                                                                    @csrf
                                                                        <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1">
                                                                        <input type="hidden" name="price" value="{{ $cart->price }}">
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                {{ !empty($cart->product) ? $cart->product->product_quantity:'' }}
                                                            </td>
                                                            <td>{{ $cart->price }} Tk</td>
                                                            <td class="text-right">{{ $cart->price*$cart->quantity }} Tk</td>
                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('create.invoice') }}" class="btn btn-primary btn-block">Add Invoice</a>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <p><b>Sub-total:</b> {{ $total }} Tk</p>
                                                <h3>Total: {{ $total }} TK</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
