<!-- Tab product -->
<div class="title1 section-t-space">
    <h4>exclusive products</h4>
    <h2 class="title-inner1">special products</h2>

</div>
<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
                    <ul class="tabs tab-title">
                        <li class="current"><a href="tab-4">New Products</a></li>
                        <li class=""><a href="tab-5">Featured Products</a></li>
                        <li class=""><a href="tab-6">Best Sellers</a></li>
                    </ul>
                    <div class="tab-content-cls">
                        <div id="tab-4" class="tab-content active default">
                            <div class="no-slider row">
                                @foreach($new_products as $new_product)
                                    <div class="product-box">
                                        <div class="img-wrapper">
                                            @if($new_product->stock_status==3)

                                                <div class="lable-block"><span class="lable3">Sold</span> <span
                                                            class="lable4">Sold</span>
                                                </div>
                                            @endif

                                            <div class="front">
                                                <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}"><img
                                                            src="{{$new_product->featured_image}}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                            </div>
                                            <div class="back">
                                                <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}"><img
                                                            src="{{$new_product->featured_image}}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                            </div>
                                            <div class="cart-info cart-wrap">
                                                <button data-toggle="modal" data-target="#addtocart"
                                                        class="@if($new_product->stock_status==3) no-click @endif"
                                                        title="Add to cart"
                                                        ng-click="addToCart('{{$new_product->product_id}}','{{$new_product->product_name}}','{{$new_product->featured_image}}','{{$new_product->selling_price}}')">
                                                    <i class="ti-shopping-cart"></i>
                                                </button>
                                                {{-- <a
                                                         href="javascript:void(0)" title="Add to Wishlist"><i
                                                             class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                             data-toggle="modal"
                                                                                                             data-target="#quick-view"
                                                                                                             title="Quick View"><i
                                                             class="ti-search" aria-hidden="true"></i></a>--}}
                                            </div>
                                        </div>

                                        <div class="product-detail">
                                            <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}">
                                                <h6>{{$new_product->product_name}}</h6>
                                            </a>
                                            @if($new_product->selling_price==null)
                                                <h4>
                                                    {{$new_product->regular_price}} BDT
                                                </h4>
                                            @else

                                                <h4> {{$new_product->selling_price}} BDT

                                                    @if($new_product->selling_price!=$new_product->regular_price)
                                                        <del> {{$new_product->regular_price}} BDT</del>
                                                    @endif
                                                </h4>
                                            @endif


                                            <a href="/shop/{{$new_product->shop_id}}/{{getTitleToUrl($new_product->shop_name)}}">{{$new_product->shop_name}}</a>

                                        </div>


                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div id="tab-5" class="tab-content">
                            <div class="no-slider row">
                                @foreach($featured_item as $new_product)
                                    <div class="product-box">
                                        <div class="img-wrapper">
                                            <div class="front">
                                                <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}"><img
                                                            src="{{$new_product->featured_image}}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                            </div>
                                            <div class="back">
                                                <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}"><img
                                                            src="{{$new_product->featured_image}}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                            </div>
                                            <div class="cart-info cart-wrap">
                                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart"
                                                        ng-click="addToCart('{{$new_product->product_id}}','{{$new_product->product_name}}','{{$new_product->featured_image}}','{{$new_product->selling_price}}')">
                                                    <i class="ti-shopping-cart"></i>
                                                </button>
                                                {{-- <a
                                                         href="javascript:void(0)" title="Add to Wishlist"><i
                                                             class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                             data-toggle="modal"
                                                                                                             data-target="#quick-view"
                                                                                                             title="Quick View"><i
                                                             class="ti-search" aria-hidden="true"></i></a> <a
                                                         href="compare.html" title="Compare"><i class="ti-reload"
                                                                                                aria-hidden="true"></i></a>--}}
                                            </div>
                                        </div>
                                        <div class="product-detail">
                                            {{--<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>--}}
                                            <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}">
                                                <h6>{{$new_product->product_name}}</h6>
                                            </a>
                                            {{$new_product->selling_price}} BDT
                                            <ul class="color-variant">
                                                <li class="">{{$new_product->shop_name}}</li>

                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div id="tab-6" class="tab-content">
                            <div class="no-slider row">
                                @foreach($best_seller as $new_product)
                                    <div class="product-box">
                                        <div class="img-wrapper">
                                            <div class="front">
                                                <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}"><img
                                                            src="{{$new_product->featured_image}}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                            </div>
                                            <div class="back">
                                                <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}"><img
                                                            src="{{$new_product->featured_image}}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                            </div>
                                            <div class="cart-info cart-wrap">
                                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart"
                                                        ng-click="addToCart('{{$new_product->product_id}}','{{$new_product->product_name}}','{{$new_product->featured_image}}','{{$new_product->selling_price}}')">
                                                    <i class="ti-shopping-cart"></i>
                                                </button>
                                                {{--  <a
                                                          href="javascript:void(0)" title="Add to Wishlist"><i
                                                              class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                              data-toggle="modal"
                                                                                                              data-target="#quick-view"
                                                                                                              title="Quick View"><i
                                                              class="ti-search" aria-hidden="true"></i></a> <a
                                                          href="compare.html" title="Compare"><i class="ti-reload"
                                                                                                 aria-hidden="true"></i></a>--}}
                                            </div>
                                        </div>
                                        <div class="product-detail">
                                            {{--<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>--}}
                                            <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}">
                                                <h6>{{$new_product->product_name}}</h6>
                                            </a>
                                            {{$new_product->selling_price}} BDT
                                            <ul class="color-variant">
                                                <li class="">{{$new_product->shop_name}}</li>

                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tab product end -->
