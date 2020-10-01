<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>


                <li>
                    <a href="/admin/dashboard" class=" waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-check"></i>
                        <span>Manage Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin/product/create">New Product</a></li>
                        <li><a href="/admin/product/show">View Product</a></li>
                        @if(\Illuminate\Support\Facades\Auth::user()->user_type==1)
                            <li><a href="/admin/category/create">New Category</a></li>
                            <li><a href="/admin/category/show">View Category</a></li>
                        @endif
                    </ul>
                </li>


                {{--        <li>
                            <a href="/company/order/show" class=" waves-effect">
                                <i class="bx bx-cart"></i>
                                <span>Manage Order</span>
                            </a>
                        </li>--}}


                <li>
                    <a href="/admin/order/show" class=" waves-effect">
                        <i class="bx bx-cart"></i>
                        <span>Manage Order</span>
                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->user_type==1)
                    <li>
                        <a href="/admin/shop/show" class=" waves-effect">
                            <i class="bx bx-store"></i>
                            <span>Manage Company</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/slider/show" class=" waves-effect">
                            <i class="bx bx-store"></i>
                            <span>Manage Slider</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/promotional-slider/show" class=" waves-effect">
                            <i class="bx bx-store"></i>
                            <span>Manage Promotional Slider</span>
                        </a>
                    </li>

                    <li class="menu-title">User</li>

                    <li>
                        <a href="/admin/customer/show" class=" waves-effect">
                            <i class="bx bx-user"></i>
                            <span>Manage Customers</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/user/show" class=" waves-effect">
                            <i class="bx bx-store"></i>
                            <span>Manage User</span>
                        </a>
                    </li>
                    {{--     <li>
                             <a href="/admin/hat/show" class=" waves-effect">
                                 <i class="bx bx-user"></i>
                                 <span>Payment Info</span>
                             </a>
                         </li>--}}

                    <li class="menu-title">Settings</li>
                    <li>
                        <a href="/admin/coupon/show" class=" waves-effect">
                            <i class="bx bxs-offer"></i>
                            <span>Manage Coupon</span>
                        </a>
                    </li>



                @endif

                <li>
                    <a href="/shop/create" class=" waves-effect">
                        <i class="bx bx-wrench"></i>
                        <span>Manage Shop</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/profile" class=" waves-effect">
                        <i class="bx bx-wrench"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/logout" class=" waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
