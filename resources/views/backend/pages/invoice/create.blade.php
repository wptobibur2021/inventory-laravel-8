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
                                        <li class="breadcrumb-item"><a href="/admin">Dashbroad</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('cart.page') }}">All Cart</a></li>
                                        <li class="breadcrumb-item active">Create Invoice</li>
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
                                    <form class="repeater form-horizontal" action="{{ route('store.invoice') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="village">{{ __('Employee Name') }} <span class="text-danger">*</span></label>
                                                <select class="form-control" name="employees_id"  required="" id="employees_name" >
                                                    @foreach($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="village">{{ __('Customer Name') }} <span class="text-danger">*</span></label>
                                                <select class="form-control" name="customer_id"  required="" id="customer_id" >
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id}}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="village">{{ __('Road / Name') }} <span class="text-danger">*</span></label>
                                                <input  type="text" name="root" required class="form-control" placeholder="Enter Root Name" />
                                            </div>

                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="total">{{ __('Total Amount') }}</label>
                                                <input  type="text" value="{{ $total }}" name="total" class="form-control" disabled/>
                                            </div>

                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="advance">{{ __('Advance Amount') }} <span class="text-danger">*</span></label>
                                                <input  type="number" name="advance" required class="form-control" placeholder="Enter Advance Amount" />
                                            </div>

                                            <div class="form-group col-md-4 col-sm-4">
                                                <label for="due">{{ __('Due Amount') }} <span class="text-danger">*</span></label>
                                                <input  type="number" name="due" required class="form-control" placeholder="Enter Due Amount" />
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-30">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th class="text-right">Total</th>
                                                        </tr>
                                                    </thead>
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
                                                            {{ $cart->quantity }}
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
                                    <input type="hidden" name="price" value="{{ $cart->price }}" />
                                    <input type="hidden" name="product_id" value="{{ $cart->product_id }}" />
                                    <input type="hidden" name="status" value="0" />
                                    <input type="hidden" name="total" value="{{ $total }}" />
                                    <input type="hidden" name="date" value="{{ date('Y-m-d') }}" />
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="clearfix p-t-50">
                                                <h5 class="text-muted">Notes:</h5>
                                                <small>
                                                    All accounts are to be paid within 7 days from receipt of
                                                    invoice. To be paid by cheque or credit card or direct payment
                                                    online. If account is not paid within 7 days the credits details
                                                    supplied as confirmation of work undertaken will be charged the
                                                    agreed quoted fee noted above.
                                                </small>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <p><b>Sub-total:</b> {{ $total }} Tk</p>
                                                <h3>Total: {{ $total }} TK</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Create Invoice</button>
                                </form>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@include('backend.pages.footer')
