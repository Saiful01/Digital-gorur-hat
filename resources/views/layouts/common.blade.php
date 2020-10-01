<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.common.head')

    <style>
        [my\:cloak], [my-cloak], [data-my-cloak], [x-my-cloak], .my-cloak, .x-my-cloak {
            display: none !important;
        }

        .checkout-page .checkout-form input[type="text"], input[type="date"], .checkout-page .checkout-form input[type="email"], .checkout-page .checkout-form input[type="password"], .checkout-page .checkout-form input[type="tel"], .checkout-page .checkout-form input[type="number"], .checkout-page .checkout-form input[type="url"] {
            width: 100%;
            padding: 0 22px;
            height: 45px;
            border: 1px solid #dddddd;
        }

        .dark-light {

            display: none !important;
        }

        .product-box .product-detail, .product-box .product-info, .product-wrap .product-detail, .product-wrap .product-info {
            padding-left: 5px;
            padding-top: 10px;
        }

        svg:not(:root) {
            overflow: hidden;
            margin-bottom: -17px;
            padding-left: 10px;
        }

        .main-menu .brand-logo {
            display: inline-block;
            padding-top: 0px;
            padding-bottom: 0px;
        }

        @media (min-width: 480px) {

            #mobile {

                display: none;
            }

            #desktop {

                display: block;
            }

        }

        @media (max-width: 480px) {

            #mobile {

                display: block;
            }

            #desktop {

                display: none;
            }

            #search-form {
                display: none;
            }

            .logo-img {
                height: 76px;

            }

            .browse {
                margin-right: -265px;
                margin-top: -51px;
                margin-top: -9px;
                padding-bottom: 10px;
                margin-top: -19px !IMPORTANT;
            }
        }

        .form-inline .form-control {
            display: inline-block;
            width: auto;
            vertical-align: middle;
            padding: 14px;
            color: #ff8b33;
        }

        select.form-control:not([size]):not([multiple]) {
            height: 54px;
            padding: 14px;
        }

        .browse {
            margin-right: -265px;
            margin-top: -51px;
        }

        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            color: #fff;
            -moz-osx-font-smoothing: grayscale;
        }

        select.form-control:not([size]):not([multiple]) {
            height: 54px;
            padding: 14px;
            color: #7e7171;
        }
        .no-click {
            pointer-events: none;
        }

        a {
            color: #E72025;
        }
        a:hover{
            color: #e7050b;
        }

    </style>


</head>

<body ng-app="myApp" ng-controller="myCtrl">

{{--
<!-- loader start -->
<div class="loader_skeleton">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Welcome to Our store Multikart</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </li>
                        <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                            My Account
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="index.html"><img src="/ecommerce/assets/images/icon/logo.png"
                                                          class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav>
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i
                                                        class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                        </li>
                                        <li>
                                            <a href="#">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">shop</a>
                                        </li>
                                        <li>
                                            <a href="#">product</a>
                                        </li>
                                        <li class="mega"><a href="#">features
                                                <div class="lable-nav">new</div>
                                            </a>
                                        </li>
                                        <li><a href="#">pages</a>
                                        </li>
                                        <li>
                                            <a href="#">blog</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <div class="icon-nav d-none d-sm-block">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div><img src="/ecommerce/assets/images/icon/search.png"
                                                      onclick="openSearch()"
                                                      class="img-fluid blur-up lazyload" alt=""> <i class="ti-search"
                                                                                                    onclick="openSearch()"></i>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-setting">
                                            <div><img src="/ecommerce/assets/images/icon/setting.png"
                                                      class="img-fluid blur-up lazyload" alt=""> <i
                                                        class="ti-settings"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div><img src="/ecommerce/assets/images/icon/cart.png"
                                                      class="img-fluid blur-up lazyload" alt=""> <i
                                                        class="ti-shopping-cart"></i></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="home-slider">
        <div class="home"></div>
    </div>
    <section class="collection-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ldr-bg">
                        <div class="contain-banner">
                            <div>
                                <h4></h4>
                                <h2></h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ldr-bg">
                        <div class="contain-banner">
                            <div>
                                <h4></h4>
                                <h2></h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container section-b-space">
        <div class="row section-t-space">
            <div class="col-lg-6 offset-lg-3">
                <div class="product-para">
                    <p class="first"></p>
                    <p class="second"></p>
                </div>
            </div>
            <div class="col-12">
                <div class="no-slider row">
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- loader end -->--}}
@include('includes.common.header')


@yield('content')
@include('common.home.logo')






@include('includes.common.footer')

</body>


</html>
