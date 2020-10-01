@extends('layouts.common')
@section('title', 'Category Post')

@section('content')

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
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                                                                             aria-hidden="true"></i> back</span>
                            </div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">Cow Type</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">

                                        @foreach (typeOfGoru() as $key => $value)
                                            <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{$value}}">
                                                <label class="custom-control-label" for="{{$value}}">{{$value}}</label>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>


                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Comapnies</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach($shops as $shop)
                                            <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="hundred">
                                                <label class="custom-control-label"
                                                       for="hundred">{{$shop->shop_name}}</label>
                                            </div>
                                        @endforeach

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
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i
                                                                    class="fa fa-filter" aria-hidden="true"></i> Filter</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Showing {{count($products)}} Result</h5>
                                                        </div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="../assets/images/icon/2.png" alt=""
                                                                         class="product-2-layout-view"></li>
                                                                <li><img src="../assets/images/icon/3.png" alt=""
                                                                         class="product-3-layout-view"></li>
                                                                <li><img src="../assets/images/icon/4.png" alt=""
                                                                         class="product-4-layout-view"></li>
                                                                <li><img src="../assets/images/icon/6.png" alt=""
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

                                                @foreach($products as $item)
                                                    <div class="col-xl-4 col-6 col-grid-box">
                                                        <div class="product-box">
                                                            <div class="img-wrapper">
                                                                <div class="front">
                                                                    <a href="/details/{{$item->product_id}}/{{getTitleToUrl($item->product_name)}}"
                                                                       class="bg-size blur-up lazyloaded"><img
                                                                                src="{{$item->featured_image}}"
                                                                                class="img-fluid blur-up lazyload bg-img"
                                                                                alt="" style="display: none;"></a>
                                                                </div>

                                                                <div class="cart-info cart-wrap">
                                                                    <button data-toggle="modal"
                                                                            title="Add to cart"  ng-click="addToCart('{{$item->product_id}}','{{$item->product_name}}','{{$item->featured_image}}','{{$item->selling_price}}')"><i
                                                                                class="ti-shopping-cart"></i></button>

                                                                    <a href="#" data-toggle="modal"
                                                                       data-target="#quick-view" title="Quick View"><i
                                                                                class="ti-search"
                                                                                aria-hidden="true"></i></a>

                                                                </div>
                                                            </div>
                                                            <div class="product-detail">
                                                             {{--   <div class="rating"><i class="fa fa-star"></i> <i
                                                                            class="fa fa-star"></i> <i
                                                                            class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i> <i
                                                                            class="fa fa-star"></i>
                                                                </div>--}}
                                                                <a href="/details/{{$item->product_id}}/{{getTitleToUrl($item->product_name)}}">
                                                                    <h6>{{$item->shop_name}}</h6>
                                                                </a>
                                                                <p>{{$item->product_details}}
                                                                </p>
                                                                <h4>{{$item->selling_price}} BDT
                                                                    <del>{{$item->regular_price}} BDT</del>
                                                                </h4>
                                                                <a href="/shop/{{$item->shop_id}}">{{$item->shop_name}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        {{-- <div class="product-pagination">
                                             <div class="theme-paggination-block">
                                                 <div class="row">
                                                     <div class="col-xl-6 col-md-6 col-sm-12">
                                                         <nav aria-label="Page navigation">
                                                             <ul class="pagination">
                                                                 <li class="page-item"><a class="page-link" href="#"
                                                                                          aria-label="Previous"><span
                                                                                 aria-hidden="true"><i
                                                                                     class="fa fa-chevron-left"
                                                                                     aria-hidden="true"></i></span> <span
                                                                                 class="sr-only">Previous</span></a></li>
                                                                 <li class="page-item active"><a class="page-link"
                                                                                                 href="#">1</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                                          href="#">2</a></li>
                                                                 <li class="page-item"><a class="page-link"
                                                                                          href="#">3</a></li>
                                                                 <li class="page-item"><a class="page-link" href="#"
                                                                                          aria-label="Next"><span
                                                                                 aria-hidden="true"><i
                                                                                     class="fa fa-chevron-right"
                                                                                     aria-hidden="true"></i></span> <span
                                                                                 class="sr-only">Next</span></a></li>
                                                             </ul>
                                                         </nav>
                                                     </div>
                                                     <div class="col-xl-6 col-md-6 col-sm-12">
                                                         <div class="product-search-count-bottom">
                                                             <h5>Showing Products 1-24 of 10 Result</h5>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>--}}
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