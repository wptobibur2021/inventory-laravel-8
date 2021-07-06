
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">CotechIT SoftWare</li>
                            <li>
                                <a href="/admin">
                                    <i class="fi-air-play"></i><span> Dashboard </span>
                                </a>
                            </li>
                              {{--  POS Menu  --}}
                            {{--  <li>
                                <a href="javascript: void(0);"><i class="fi-target"></i> <span> POS </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.pos') }}">All</a></li>
                                </ul>
                            </li>  --}}


                             {{--   Invocie Menu   --}}
                             <li>
                                <a href="javascript: void(0);"><i class="fi-target"></i> <span> Invoice </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.invoice') }}">All</a></li>
                                    <li><a href="{{ route('all.invoice') }}">All Invoice</a></li>
                                    <li><a href="{{ route('final.invoice') }}">Final Invoice</a></li>
                                </ul>
                            </li>

                             {{--   Stock Menu   --}}
                             <li>
                                <a href="javascript: void(0);"><i class="fi-target"></i> <span> Stock </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('allproduct.stock') }}">All Product Stock</a></li>
                                    <li><a href="{{ route('stock') }}">After Invoice Stock</a></li>
                                </ul>
                            </li>

                            {{-- Category Menu --}}

                              <li>
                                <a href="javascript: void(0);"><i class="fi-mail"></i><span> Category </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.category') }}">All</a></li>
                                </ul>
                            </li>

                            {{-- Brand Menu   --}}

                            <li>
                                <a href="javascript: void(0);"><i class="fi-mail"></i><span> Brand </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.brand') }}">All</a></li>
                                </ul>
                            </li>


                            {{--  Customer Menu  --}}

                            <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> customer </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.customer') }}">All</a></li>
                                    <li><a href="{{ route('create.customer') }}">Add</a></li>
                                </ul>
                            </li>


                             {{--  Employee Menu  --}}

                            <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Employee </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.employee') }}">All</a></li>
                                    <li><a href="{{ route('create.employee') }}">Add</a></li>
                                </ul>
                            </li>

                             {{--  Product Menu     --}}

                            <li>
                                <a href="javascript: void(0);"><i class="fi-target"></i> <span> Product </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.product') }}">All</a></li>
                                    <li><a href="{{ route('create.product') }}">Add</a></li>
                                </ul>
                            </li>

                            {{--  Exponse Menu  --}}

                            <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Expense </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.expense') }}">All</a></li>
                                </ul>
                            </li>




                            {{--  Sales Menu  --}}

                            <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Salse Info </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.sales') }}">All</a></li>
                                </ul>
                            </li>

                            {{--  Supplier Menu   --}}

                            {{--  <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Supplier </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('index.supplier') }}">All</a></li>
                                    <li><a href="{{ route('create.supplier') }}">Add</a></li>
                                </ul>
                            </li>  --}}


                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
