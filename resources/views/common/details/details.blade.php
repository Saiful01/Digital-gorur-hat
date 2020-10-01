@extends('layouts.common')
@section('title', getTitleToUrl($item->product_name))

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>product</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">

                {{--<div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick slick-initialized slick-slider"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 2160px;"><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 540px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/1.jpg" alt="" class="img-fluid blur-up image_zoom_cls-0 lazyloaded"></div></div></div><div class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 540px; position: relative; left: -540px; top: 0px; z-index: 998; opacity: 0;"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/2.jpg" alt="" class="img-fluid blur-up image_zoom_cls-1 lazyloaded"></div></div></div><div class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 540px; position: relative; left: -1080px; top: 0px; z-index: 998; opacity: 0;"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/27.jpg" alt="" class="img-fluid blur-up image_zoom_cls-2 lazyloaded"></div></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 540px; position: relative; left: -1620px; top: 0px; z-index: 998; opacity: 0;"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/27.jpg" alt="" class="img-fluid blur-up image_zoom_cls-3 lazyloaded"></div></div></div></div></div><button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button></div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav slick-initialized slick-slider"><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 2090px; transform: translate3d(-570px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 190px;" tabindex="-1"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/2.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 190px;" tabindex="-1"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/27.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 190px;" tabindex="-1"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/27.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 190px;"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/1.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 190px;"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/2.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 190px;"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/27.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 190px;" tabindex="-1"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/27.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true" style="width: 190px;" tabindex="-1"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/1.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 190px;" tabindex="-1"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/2.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 190px;" tabindex="-1"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/27.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 190px;" tabindex="-1"><div><div style="width: 100%; display: inline-block;"><img src="../assets/images/pro3/27.jpg" alt="" class="img-fluid blur-up lazyloaded"></div></div></div></div></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 class="mb-0">Women Pink Shirt</h2>
                            <h5 class="mb-2">by <a href="#">zara</a></h5>
                            <h4><del>$459.00</del><span>55% off</span></h4>
                            <h3>$32.96</h3>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                            <div class="product-description border-product">
                                <h6 class="product-title size-text">select size <span><a href="" data-toggle="modal" data-target="#sizemodal">size chart</a></span></h6>
                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body"><img src="../assets/images/size-chart.jpg" alt="" class="img-fluid blur-up lazyload"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="size-box">
                                    <ul>
                                        <li class="active"><a href="#">s</a></li>
                                        <li><a href="#">m</a></li>
                                        <li><a href="#">l</a></li>
                                        <li><a href="#">xl</a></li>
                                    </ul>
                                </div>
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                </div>
                            </div>
                            <div class="product-buttons"><a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-solid">add to cart</a> <a href="#" class="btn btn-solid">buy now</a>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore
                                    veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam
                                    voluptatem,</p>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                    <form class="d-inline-block">
                                        <button class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                                    </form>
                                </div>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">Time Reminder</h6>
                                <div class="timer">
                                    <p id="demo"><span>25 <span class="padding-l">:</span> <span class="timer-cal">Days</span> </span><span>22 <span class="padding-l">:</span> <span class="timer-cal">Hrs</span>
                                        </span><span>13 <span class="padding-l">:</span> <span class="timer-cal">Min</span> </span><span>57 <span class="timer-cal">Sec</span></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

--}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">

                            <div><img src="{{$item->featured_image}}" alt=""
                                      class="img-fluid blur-up lazyload image_zoom_cls-0"
                                      style="width: 80%; height: auto;" width="80%"></div>

                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    @foreach($images as $image)
                                        <div><img src="{{$image->image}}" alt=""
                                                  class="img-fluid blur-up lazyload image_zoom_cls-0"
                                                  style="height: 100px;"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 class="mb-0">{{$item->product_name}}</h2>
                            <h5 class="mb-2">by <a
                                        href="/shop/{{$item->shop_id}}/{{getTitleToUrl($item->shop_name)}}">{{$item->shop_name}}</a>
                            </h5>


                            @if($item->selling_price==null)
                                <h4>
                                    {{$item->regular_price}} BDT
                                </h4>
                            @else
                                <h4>
                                    <del>{{$item->regular_price}}</del>
                                </h4>
                                <h3>{{$item->selling_price}} BDT</h3>

                            @endif

                            <p>{{$item->weight}} KG</p>
                            <p> @if($item->stock_status==3)

                                    <span class="badge badge-danger">Sold</span>
                                @endif

                            </p>

                            <p><b>{{typeOfGoruNameById($item->cow_type)}}</b></p>

                            <p><b>Location</b> {{--{{getDivisionNameFromId($item->division_id)}}--}}
                                 {{getDistrictNameFromId($item->district_id)}},
                                , {{getUpazilaNameFromId($item->upazila_id)}},
                       {{--         , {{getUnionNameFromId($item->union_id)}},--}}
                            </p>
                            <div class="product-description border-product">
                                {{--<h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                                                                       class="btn quantity-left-minus"
                                                                                                       data-type="minus"
                                                                                                       data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button"
                                                                                  class="btn quantity-right-plus"
                                                                                  data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span></div>
                                </div>--}}
                            </div>

                            <div class="product-buttons">
                                {{-- <a href="/cart"
                                    class="btn btn-solid"  ng-click="addToCart('{{$item->product_id}}','{{$item->product_name}}','{{$item->featured_image}}','{{$item->selling_price}}')">add to cart</a>
                                 --}}
                                <a href="/cart" class="btn btn-solid @if($item->stock_status==3) no-click @endif"
                                   ng-click="addToCart('{{$item->product_id}}','{{$item->product_name}}','{{$item->featured_image}}','{{$item->selling_price}}')">buy
                                    now</a>

                                <span>  {!! QrCode::size(75)->generate($item->qr_code) !!}</span>


                            </div>


                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>{!! $item->product_details !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
    <!-- product section start -->
    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>related products</h2>
                </div>
            </div>
            <div class="row search-product">
                @foreach($new_products as $new_product)
                    <div class="col-xl-2 col-md-4 col-sm-6">

                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="/details/{{$new_product->product_id}}/{{$new_product->product_name}}"><img
                                                src="{{$new_product->featured_image}}"
                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>

                                <div class="cart-info cart-wrap">
                                    <button title="Add to cart"
                                            ng-click="addToCart('{{$new_product->product_id}}','{{$new_product->product_name}}','{{$new_product->featured_image}}','{{$new_product->selling_price}}')">
                                        <i class="ti-shopping-cart"></i></button>
                                    <a
                                            href="javascript:void(0)" title="Add to Wishlist"><i
                                                class="ti-heart" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                {{--<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i></div>--}}
                                <a href="/details/{{$new_product->product_id}}/{{getTitleToUrl($new_product->product_name)}}">
                                    <h6>{{$new_product->product_name}}</h6>
                                </a>
                                <p>   {{$new_product->selling_price}}
                                    <del>   {{$new_product->regular_price}}</del>
                                </p>

                                <li class="">{{$new_product->shop_name}}</li>

                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
@stop
