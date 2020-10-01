<!-- Paragraph-->
<div class="title1 section-t-space" id="shop">
    <h4>special offer</h4>
    <h2 class="title-inner1">Qurbani</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="product-para">
                <p class="text-center">Recent added Qurbani Cow's area here,</p>

                <a href="/product/search?product=&shop=0" class="pull-right browse">Browse All</a>
            </div>
        </div>
    </div>
</div>
<!-- Paragraph end -->

<!-- Product slider -->
<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-4 product-m no-arrow">
                    @foreach($featured_item as $product)
                        <div class="product-box">
                            <div class="img-wrapper">
                                @if($product->stock_status==3)

                                    <div class="lable-block"><span class="lable3">Sold</span> <span
                                                class="lable4">Sold</span>
                                    </div>
                                @endif
                                <div class="front">


                                    <a href="/details/{{$product->product_id}}/{{getTitleToUrl($product->product_name)}}"><img
                                                src="{{$product->featured_image}}"
                                                class="img-fluid blur-up lazyload bg-img"
                                                alt=""></a>
                                </div>
                                <div class="back">
                                    <a href="/details/{{$product->product_id}}/{{getTitleToUrl($product->product_name)}}"><img
                                                src="{{$product->featured_image}}"
                                                class="img-fluid blur-up lazyload bg-img"
                                                alt=""></a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-toggle="modal" data-target="#addtocart" title="Add to cart"
                                            class=" @if($product->stock_status==3) no-click @endif"
                                            ng-click="addToCart('{{$product->product_id}}','{{$product->product_name}}','{{$product->featured_image}}','{{$product->selling_price}}')">
                                        <i class="ti-shopping-cart"></i>
                                    </button>
                                    {{--  <a href="javascript:void(0)" title="Add to Wishlist">
                                          <i class="ti-heart" aria-hidden="true"></i>
                                      </a>--}}
                                    {{--  <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                          <i class="ti-search" aria-hidden="true"></i>
                                      </a>--}}
                                    {{-- <a href="compare.html" title="Compare">
                                         <i class="ti-reload" aria-hidden="true"></i>
                                     </a>--}}
                                </div>
                            </div>
                            <div class="product-detail" style="padding-top: 10px !important;">
                                {{-- <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                             class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                             class="fa fa-star"></i>
                                 </div>--}}
                                <a href="/details/{{$product->product_id}}/{{getTitleToUrl($product->product_name)}}">
                                    <h6>{{$product->product_name}}</h6>
                                </a>
                                @if($product->selling_price==null)
                                    <h4>
                                        {{$product->regular_price}} BDT
                                    </h4>
                                @else

                                    <h4> {{$product->selling_price}} BDT
                                        @if($product->selling_price!=$product->regular_price)
                                        <del> {{$product->regular_price}} BDT</del>
                                        @endif
                                        </h4>
                                @endif


                                <a href="/shop/{{$product->shop_id}}/{{getTitleToUrl($product->shop_name)}}">{{$product->shop_name}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product slider end -->

