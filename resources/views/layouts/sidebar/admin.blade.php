<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">

                    <a href="{{url('admin/dashboard')}}">
                        <li class="header">
                            <h3>
                                <span>
                                    <h3><i class="icon-Layout-4-blocks"></h3><span class="path1"></span><span
                                        class="path2"></span></i> Dashboard
                            </h3></span>
                        </li>



                    </a>

                    <li class="header">USER SECTION</li>

                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Owner</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/customers')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add New</a></li>

                            <li><a href="{{url('admin/customers/list')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>List</a></li>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>District Manager</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/district-manager')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add New</a></li>

                            <li><a href="{{url('admin/district-manager/list')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>List</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Managers</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/managers')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add New</a></li>
                            <li><a href="{{url('admin/managers/list')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>List</a></li>


                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Vendors</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/vendors')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add New</a></li>

                            <li><a href="{{url('admin/vendors/list')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>List</a></li>

                        </ul>
                    </li>


                    <li class="header">PRODUCT MANAGEMENT</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
                            <span>Category</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/categories')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add New</a></li>
                            <li><a href="{{url('admin/categories/list')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>List</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Cart"><span class="path1"></span><span class="path2"></span></i>
                            <span>Products</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/products')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add New</a></li>
                            <li><a href="{{url('admin/products/list')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>List</a></li>
                            <!--<li><a href="{{url('admin/products/manage')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Manage</a></li> -->
                        </ul>
                    </li>
                    <li class="header">REPORT & ANALYTICS</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>
                            <span>REPORT</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/reports/earnings')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Earnings Reports</a>
                            </li>
                            <li><a href="{{url('admin/reports/sales')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Sales Reports</a></li>
                            <li><a href="{{url('admin/reports/customer-report')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Customer Reports</a>
                            </li>
                            <li><a href="{{url('admin/reports/vendor-report')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Vendors Reports</a></li>
                        </ul>
                    </li>

                    <li class="header">OTHERS</li>

                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Cart"><span class="path1"></span><span class="path2"></span></i>
                            <span>Stores</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/shops')}}"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Add New</a></li>
                            <li><a href="{{url('admin/shops/list')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>List</a></li>
                            <li><a href="{{url('admin/disctricts/')}}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Districts</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <div class="sidebar-footer">
        <a href="{{url('admin/settings/')}}" class="link" data-bs-toggle="tooltip" title="Settings"><span
                class="icon-Settings-2"></span></a>
        <a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
        <a href="{{ url('admin/logout')}}" class="link" data-bs-toggle="tooltip" title="Logout"><span
                class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
    </div>
</aside>