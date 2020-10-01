@extends('layouts.common')
@section('title', 'Category Post')

@section('content')

    <style>
        .collection-collapse-block {
            padding-bottom: 2px;
        }
    </style>
    <?php


    if (isset($_GET['product'])) {
        $query = $_GET['product'];
        $shop_id = $_GET['shop'];
    } else {
        // Fallback behaviour goes here

    }
    ?>
    <p ng-init="mySearch('<?php echo $query?>','<?php echo $shop_id?>')"></p>

    {{--    <div class="container">
            <div class="row mx-auto">
                <div class="col-md-12 card">
                    <div class="row ">
                        <div class="col-md-2">
                            <img class="img-thumbnail float-left mt-2 mb-2 " src="{{$shop->shop_image}}" width="100%"
                                 height="100%"
                                 alt="Shop">

                        </div>
                        <div class="col-md-4">
                            <h4 class="card-title mt-4">{{$shop->shop_name}}</h4>
                            <h6><i class="fa fa-map-marker mr-2"></i> {{$shop->shop_address}} <i
                                        class="fa fa-mobile-phone ml-2 mr-2 "></i>{{$shop->shop_phone}} </h6>
                        </div>

                    </div>


                </div>


            </div>
        </div>--}}


    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i
                                            class="fa fa-angle-left"
                                            aria-hidden="true"></i> back</span>
                            </div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">Cow Type</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">

                                        <select name="cow_type" class="form-control" ng-model="cow_type"
                                                style="margin-top: 15px" ng-change="searchProduct()">
                                            <option value="">All</option>
                                            @foreach (typeOfGoru() as $key => $value)
                                                <option value="{{ $key}}">{{$value}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                            </div>


                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Comapnies</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">

                                        <select name="shop_id" class="form-control" ng-model="shop_id"
                                                style="margin-top: 15px" ng-change="searchProduct()">
                                            <option value="">All</option>
                                            @foreach($shops as $shop)
                                                <option value="{{ $shop->shop_id}}">{{$shop->shop_name}}</option>
                                            @endforeach

                                        </select>


                                    </div>
                                </div>
                            </div>


                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Color</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">

                                        <select name="color" class="form-control" ng-model="color"
                                                style="margin-top: 15px" ng-change="searchProduct()">
                                            <option value="">All</option>
                                            @foreach (getColor() as $key => $value)
                                                <option value="{{ $key}}">{{$value}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                            </div>


                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Entity</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">

                                        <select name="entity" class="form-control" ng-model="entity"
                                                style="margin-top: 15px" ng-change="searchProduct()">
                                            <option value="">All</option>
                                            @foreach (getEntity() as $key => $value)
                                                <option value="{{ $key}}">{{$value}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Division</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">

                                        <select name="division_id" class="form-control m-b"
                                                ng-model="division_id"
                                                ng-change="changeDivisionFromSearch(division_id)">

                                            <option value="" selected>Select Division</option>
                                            <option ng-repeat="division in divisions"
                                                    value="@{{division.division_id}}">
                                                @{{division.en_name}}
                                            </option>

                                        </select>

                                    </div>
                                </div>
                            </div>


                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">District</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">

                                        <select name="district_id" class="form-control m-b"
                                                ng-model="district_id"
                                                ng-change="changeDistrictFromSearch(district_id)">

                                            <option value="" selected>Select District</option>
                                            <option ng-repeat="district in districts"
                                                    value="@{{district.district_id}}">
                                                @{{district.en_name}}
                                            </option>

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Upazila</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">

                                        <select name="upazila_id" class="form-control m-b" ng-model="upazila_id"
                                                ng-change="changeUpazilaFromSearch(upazila_id)">

                                            <option value="" selected>Select Upazila</option>
                                            <option ng-repeat="upazila in upazilas"
                                                    value="@{{upazila.upazila_id}}">
                                                @{{upazila.en_name}}
                                            </option>

                                        </select>


                                    </div>
                                </div>
                            </div>
                            <!-- size filter start here -->
                            <div class="collection-collapse-block Union-0 open">
                                <h3 class="collapse-block-title">Union</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">


                                        <select name="union_id" class="form-control m-b" ng-model="union_id"
                                                ng-change="searchProduct()">

                                            <option value="" selected>Select Union</option>
                                            <option ng-repeat="union in unions" value="@{{union.id}}">
                                                @{{union.en_name}}
                                            </option>

                                        </select>

                                    </div>
                                </div>
                            </div>


                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">price</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" name="min_price" placeholder="Min"
                                                   ng-change="searchProduct()" ng-model="min">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" name="max_price" placeholder="Max"
                                                   ng-change="searchProduct()" ng-model="max">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span
                                                                class="filter-btn btn btn-theme"><i
                                                                    class="fa fa-filter" aria-hidden="true"></i> Filter</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Showing {{--{{count($products)}} --}}Result</h5>
                                                        </div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="/ecommerce/assets/images/icon/2.png"
                                                                         alt=""
                                                                         class="product-2-layout-view"></li>
                                                                <li><img src="/ecommerce/assets/images/icon/3.png"
                                                                         alt=""
                                                                         class="product-3-layout-view"></li>
                                                                <li><img src="/ecommerce/assets/images/icon/4.png"
                                                                         alt=""
                                                                         class="product-4-layout-view"></li>
                                                                <li><img src="/ecommerce/assets/images/icon/6.png"
                                                                         alt=""
                                                                         class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
                                                        {{-- <div class="product-page-per-view">
                                                             <select>
                                                                 <option value="High to low">24 Products Par Page
                                                                 </option>
                                                                 <option value="Low to High">50 Products Par Page
                                                                 </option>
                                                                 <option value="Low to High">100 Products Par Page
                                                                 </option>
                                                             </select>
                                                         </div>
                                                         <div class="product-page-filter">
                                                             <select>
                                                                 <option value="High to low">Sorting items</option>
                                                                 <option value="Low to High">50 Products</option>
                                                                 <option value="Low to High">100 Products</option>
                                                             </select>
                                                         </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">


                                                <div class="col-xl-4 col-6 col-grid-box"
                                                     ng-repeat="product in products">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="/details/@{{product.product_id}}/{{getTitleToUrl("Product")}}"
                                                                   class="bg-size blur-up lazyloaded"><img
                                                                            src="@{{product.featured_image}}"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt="" style="display: none;"></a>
                                                            </div>

                                                            <div class="cart-info cart-wrap">
                                                                <button data-toggle="modal" data-target="#addtocart"
                                                                        title="Add to cart"
                                                                        ng-click="addToCart('@{{product.product_id}}','@{{product.product_name}}','@{{product.featured_image}}','@{{product.selling_price}}')">
                                                                    <i class="ti-shopping-cart"></i>
                                                                </button>
                                                                <a href="#" data-toggle="modal"
                                                                   data-target="#quick-view" title="Quick View"><i
                                                                            class="ti-search"
                                                                            aria-hidden="true"></i></a>

                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating"><i class="fa fa-star"></i> <i
                                                                        class="fa fa-star"></i> <i
                                                                        class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i> <i
                                                                        class="fa fa-star"></i>
                                                            </div>
                                                            <a href="/details/@{{product.product_id}}/{{getTitleToUrl("product")}}">
                                                                <h6>@{{product.product_name}}</h6>
                                                            </a>
                                                            <p>@{{product.product_details}}
                                                            </p>
                                                            <h4>@{{product.selling_price}} BDT
                                                                <del>@{{product.regular_price}} BDT</del>
                                                            </h4>
                                                            <a href="/shop/@{{product.shop_id}}/@{{product.shop_name}}">@{{product.shop_name}}</a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop