<!-- header start -->
<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Welcome to  Gorur Hat</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 01306326052</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="header-contact">
                    {{--<ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </li>
                        <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                            My Account
                            <ul class="onhover-show-div">
                                <li><a href="#" data-lng="en">Login</a></li>
                                <li><a href="#" data-lng="es">Logout</a></li>
                            </ul>
                        </li>
                    </ul>--}}
                    <ul>
                        <li><a href="/shop/registration">Registration</a></li>
                    </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">

                        <div class="brand-logo">
                            <a href="/"><img src="/ecommerce/assets/images/icon/logo.png"
                                             class="img-fluid blur-up lazyload logo-img" style="height: 75px;"
                                             alt=""></a>
                            {{-- <h3 class="text-danger">Gorur Hat</h3>--}}

                        </div>
                    </div>
                    <div class="menu-middle">

                        <!-- block search -->


                        <form action="/product/search" class=" form-inline" method="get" id="search-form">


                            <input type="text" class="form-control "
                                   placeholder="Find your Product.. " name="product" style="width: 270px;">

                            <select data-placeholder="All Categories"
                                    class="form-control form-inline" name="shop">
                                <option value="0">All Shops</option>

                                @foreach(getShops() as $shop)
                                    <option value="{{$shop->shop_id}}">{{$shop->shop_name}}
                                    </option>
                                @endforeach


                            </select>


                            <button class="btn btn-search btn-danger form-control" type="submit"
                                    style="    height: 53px;width: 64px;"><span
                                        class="fa fa-search"></span></button>


                        </form>


                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                                                   aria-hidden="true"></i></div>
                                    </li>
                                    <li>
                                        <a href="/">Home</a>

                                    </li>
                                    <li>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#preRegister"
                                                style="    margin-top: 27px;
    padding: 12px;
    border-radius: 4px;">Pre-Register
                                        </button>

                                    </li>


                                </ul>
                            </nav>
                        </div>
                        <div>
                            <div class="icon-nav">
                                <ul>

                                    {{--   <li class="onhover-div mobile-setting">
                                           <div><img src="/ecommerce/assets/images/icon/setting.png"
                                                     class="img-fluid blur-up lazyload" alt=""> <i
                                                       class="ti-settings"></i></div>
                                           <div class="show-div setting">
                                               <h6>language</h6>
                                               <ul>
                                                   <li><a href="#">english</a></li>
                                                   <li><a href="#">french</a></li>
                                               </ul>
                                               <h6>currency</h6>
                                               <ul class="list-inline">
                                                   <li><a href="#">euro</a></li>
                                                   <li><a href="#">rupees</a></li>
                                                   <li><a href="#">pound</a></li>
                                                   <li><a href="#">doller</a></li>
                                               </ul>
                                           </div>
                                       </li>--}}
                                    <li class="onhover-div mobile-cart">
                                        <div><img src="/ecommerce/assets/images/icon/cart.png"
                                                  class="img-fluid blur-up lazyload" alt=""> <i
                                                    class="ti-shopping-cart"></i></div>
                                        <ul class="show-div shopping-cart">

                                            <li ng-repeat="item in cartItemPList">
                                                <div class="media">
                                                    <a href="/details/@{{ item.id }}"><img alt="" class="mr-3"
                                                                                           ng-src="@{{ item.image}}"></a>
                                                    <div class="media-body">
                                                        <a href="/details/@{{ item.id }}/@{{item.name}}">
                                                            <h4>@{{ item.name}}</h4>
                                                        </a>
                                                        <h4><span>@{{ item.qnt}} x @{{ item.price}}BDT</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                                                         aria-hidden="true"
                                                                                         ng-click="removeItem(item)"></i></a>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="total">
                                                    <h5>subtotal : <span>@{{ totalPriceCountAll}}BDT</span></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="buttons"><a href="/cart" class="view-cart">view
                                                        cart</a> <a href="/checkout" class="checkout">checkout</a></div>
                                            </li>
                                        </ul>
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
<!-- header end -->

<style>
    .modal-tall .modal-dialog {
        height: 100%;
        width: 95%;
    }

    .modal-tall .modal-content {
        height: 100%;
        width: 95%;
    }

    .iframee {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .squizimage {
        height: 50px;
        width: 55px !important;
    }

    .squizsection {
        align-content: center;
        vertical-align: center;
        margin-bottom: 20px;
        margin-top: 10px;

    }

    .modal-tall .modal-content {
        height: 100%;
        width: 126%;
        margin-left: -87px !important;
    }

    }
</style>


<div id="preRegister" class="modal modal-tall fade" tabindex="-1" role="dialog" aria-labelledby="basicModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-left:20px;">
            <div class="modal-header">
                <!-- Close button (X).-->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <iframe class="iframee"
                    src="https://forms.gle/bJaRw8qVsG1DynjT8"
                    frameborder="0" height="100%" width="70%"></iframe>
        </div>
    </div>
</div>


{{--


<div class="modal modal-tall" id="preRegister">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Pre Registrar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


                <iframe src="/"
                        height="200" width="100%" title=""></iframe>


            </div>
        </div>
    </div>
</div>

--}}
