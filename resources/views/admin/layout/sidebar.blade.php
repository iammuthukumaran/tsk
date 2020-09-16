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
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">Manage Products</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Stocks</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ (Request::is('admin/stock*') ? 'active' : '') }}" href="{{ route('stock.list') }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">Stock Inwards</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ (Request::is('admin/sales*') ? 'active' : '') }}" href="{{ route('sale.list') }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
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
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">Bills & Quotations</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Reports</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('report.sales') }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">Sales Report</span>
                            </a>
                        </li>

                        <?php /*<li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/agent_balance*') ? 'active' : '') }}}" href="{{ url('admin/agent_balance') }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">Agent Balance</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/customer_balance*') ? 'active' : '') }}}" href="{{ url('admin/customer_balance') }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">Customer Balance</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Expense Entries</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/daily_expense_entry*') ? 'active' : '') }}}" href="{{ url('admin/daily_expense_entry') }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">Daily Expenses</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Customer Entries</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/daily_entry*') ? 'active' : '') }}}" href="{{ route('daily-entry')}}">
                                <i class="nav-main-link-icon far fa-chart-bar"></i>
                                <span class="nav-main-link-name">Customer Daily Entry</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/customer-payment*') ? 'active' : '') }}}" href="{{ route('customerpayment.index')}}">
                                <i class="nav-main-link-icon far fa-hdd"></i>
                                <span class="nav-main-link-name">Customer Payment</span>
                            </a>
                        </li>



                        <li class="nav-main-heading">Agent Entries</li>
                        <li class="nav-main-item">
                          <a class="nav-main-link {{{ (Request::is('admin/daily-entry-agent*') ? 'active' : '') }}}" href="{{ route('daily-entry-agent')}}">
                              <i class="nav-main-link-icon far fa-chart-bar"></i>
                                <span class="nav-main-link-name">Agent Daily Entry</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                          <a class="nav-main-link {{{ (Request::is('admin/daily-agent-payment*') ? 'active' : '') }}}" href="{{ route('agentpayment.index')}}">
                            <i class="nav-main-link-icon far fa-hdd"></i>
                                <span class="nav-main-link-name">Agent Payment</span>
                            </a>
                        </li>


                        <li class="nav-main-heading">Marketing</li>
                        <li class="nav-main-item">
                          <a class="nav-main-link {{{ (Request::is('admin/marketing*') ? 'active' : '') }}}" href="{{ route('marketing.index')}}">
                              <i class="nav-main-link-icon far fa-chart-bar"></i>
                                <span class="nav-main-link-name">Marketing Data Entry</span>
                            </a>
                        </li>


                        <li class="nav-main-heading">Reports</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('admin/overall_report') }}">
                                <i class="nav-main-link-icon far fa-credit-card"></i>
                                <span class="nav-main-link-name">Overall Report</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                          <a class="nav-main-link {{{ (Request::is('admin/reports*') ? 'active' : '') }}}" href="{{ route('report-management.index')}}">
                            <i class="nav-main-link-icon far fa-hdd"></i>
                                <span class="nav-main-link-name">Customers Reports</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Master</li>
                        @if(\Auth::user()->role == SUPER_ADMIN || in_array(USERS_LIST,\Auth::user()->permission))
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/users*') ? 'active' : '') }}}" href="{{ route('users.index')}}">
                                <i class="nav-main-link-icon far fa-address-card"></i>
                                <span class="nav-main-link-name">Users</span>
                            </a>
                        </li>
                        @endif

                        @if(\Auth::user()->role == SUPER_ADMIN || in_array(PRODUCTS_LIST,\Auth::user()->permission))
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/products*') ? 'active' : '') }}}" href="{{ url('admin/products') }}">
                                <i class="nav-main-link-icon far fa-window-restore"></i>
                                <span class="nav-main-link-name">Products</span>
                            </a>
                        </li>
                        @endif

                        @if(\Auth::user()->role == SUPER_ADMIN || in_array(AGENT_LIST,\Auth::user()->permission))
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/agent*') ? 'active' : '') }}}" href="{{ url('admin/agent') }}">
                                <i class="nav-main-link-icon far fa-user"></i>
                                <span class="nav-main-link-name">Agent</span>
                            </a>
                        </li>
                        @endif

                        @if(\Auth::user()->role == SUPER_ADMIN || in_array(CUSTOMER_LIST,\Auth::user()->permission))
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/customers*') ? 'active' : '') }}}" href="{{ url('admin/customers') }}">
                                <i class="nav-main-link-icon far fa-user-circle"></i>
                                <span class="nav-main-link-name">Customer</span>
                            </a>
                        </li>
                        @endif

                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/expense*') ? 'active' : '') }}}" href="{{ url('admin/expense') }}">
                                <i class="nav-main-link-icon far fa-money-bill-alt"></i>
                                <span class="nav-main-link-name">Expenses</span>
                            </a>
                        </li>


                        <!-- <li class="nav-main-heading">Roles & Permissions</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/assigncapabilities*') ? 'active' : '') }}}" href="{{ route('assigncapabilities.index')}}">
                                <i class="nav-main-link-icon far fa-address-book"></i>
                                <span class="nav-main-link-name">User Capabilities</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/capabilitytype*') ? 'active' : '') }}}" href="{{ route('capabilitytype.index')}}">
                                <i class="nav-main-link-icon far fa-life-ring"></i>
                                <span class="nav-main-link-name">Capability Type</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{{ (Request::is('admin/capabilities*') ? 'active' : '') }}}" href="{{ route('capabilities.index')}}">
                                <i class="nav-main-link-icon far fa-newspaper"></i>
                                <span class="nav-main-link-name">Capabilities</span>
                            </a>
                        </li> -->*/ ?>

                    </ul> 
</div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->
