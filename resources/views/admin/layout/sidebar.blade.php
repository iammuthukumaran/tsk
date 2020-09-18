<nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="bg-header-dark">
                    <div class="content-header bg-white-10">
                        <!-- Logo -->
                        <a class="link-fx font-w600 font-size-lg text-white" href="{{ url('admin/dashboard') }}">
                            <span class="smini-visible">
                                <span class="text-white-75">P</span><span class="text-white">D</span>
                            </span>
                            <span class="smini-hidden">
                                <span class="text-white-75">TSK</span>
                            </span>
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div>
                            <!-- Toggle Sidebar Style -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                            <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle" href="javascript:void(0)">
                                <i class="fa fa-toggle-on" id="sidebar-style-toggler"></i>
                            </a>
                            <!-- END Toggle Sidebar Style -->

                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                  <ul class="nav-main">


                        <li class="nav-main-item">
                            <a class="nav-main-link {{ (Request::is('admin/dashboard') ? 'active' : '') }}" href="{{ route('dashboard') }}">
                                <i class="nav-main-link-icon far fa-paper-plane"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ (Request::is('admin/user*') ? 'active' : '') }} {{ (Request::is('admin/buyer*') ? 'active' : '') }} {{ (Request::is('admin/seller*') ? 'active' : '') }}" href="{{ url('admin/user') }}">
                                <i class="nav-main-link-icon far fa-user"></i>
                                <span class="nav-main-link-name">Buyers & Sellers</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Products</li>
                         <li class="nav-main-item">
                            <a class="nav-main-link {{ (Request::is('products/create') ? 'active' : '') }} {{ (Request::is('admin/products*') ? 'active' : '') }}" href="{{ url('admin/products') }}">
                                <i class="nav-main-link-icon far fa-square"></i>
                                <span class="nav-main-link-name">Manage Products</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Stocks</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ (Request::is('admin/stock*') ? 'active' : '') }}" href="{{ route('stock.list') }}">
                                <i class="nav-main-link-icon far fa-circle"></i>
                                <span class="nav-main-link-name">Stock Inwards</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ (Request::is('admin/sales*') ? 'active' : '') }}" href="{{ route('sale.list') }}">
                                <i class="nav-main-link-icon far fa-circle"></i>
                                <span class="nav-main-link-name">Sales Outwards</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Bills</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ (Request::is('admin/bill/make/*/sale') ? 'active' : '') }}" href="{{ route('bill.create', [ 'bill_type' => 'sale' ]) }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">New Bill</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ (Request::is('admin/bill/make/*/quotation') ? 'active' : '') }}" href="{{ route('bill.create', [ 'bill_type' => 'quotation' ]) }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">New Quotation</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ (Request::is('admin/bill/list') ? 'active' : '') }}" href="{{ route('bill.list') }}">
                                <i class="nav-main-link-icon far fa-file"></i>
                                <span class="nav-main-link-name">Bills & Quotations</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Reports</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('report.sales') }}">
                                <i class="nav-main-link-icon far fa-file"></i>
                                <span class="nav-main-link-name">Sales Report</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('setting.view') }}">
                                <i class="nav-main-link-icon far fa-edit"></i>
                                <span class="nav-main-link-name">Settings</span>
                            </a>
                        </li>


                    </ul> 
</div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->
