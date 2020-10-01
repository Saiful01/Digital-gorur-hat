@extends('layouts.common')
@section('title', 'Cart')

@section('content')

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>cart</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                        </thead>

                        <tbody ng-repeat="item in cartItemPList">
                        <tr>
                            <td>
                                <a href="#"><img src="@{{ item.image}}" alt=""></a>
                            </td>
                            <td><a href="#">@{{ item.name}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col-xs-3">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number" value="@{{ item.qnt}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color" ng-cloak >@{{ item.price}} </h2>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color"><a href="#" class="icon"  ng-click="removeItem(item)"><i class="ti-close"></i></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2 ng-cloak> ৳ @{{ item.price }} </h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control input-number" value="@{{ item.qnt}}" readonly>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="icon"ng-click="removeItem(item)" ><i class="ti-close"></i></a></td>
                            <td>
                                <h2 class="td-color" ng-cloak> ৳ @{{ item.qnt* item.price}} </h2>
                            </td>
                        </tr>
                        </tbody>


                    </table>
                    <table class="table cart-table table-responsive-md">
                        <tfoot>
                        <tr>
                            <td>total price :</td>
                            <td>
                                <h2 style="font-size: 20px" ng-cloak> ৳ @{{totalPriceCountAll }}</h2>
                            </td>
                        </tr>
                       {{-- <tr>
                            <td>Booking Money :</td>
                            <td>
                                <h2 style="font-size: 20px" ng-cloak> ৳ @{{totalPriceCountAll*0.1 }}</h2>
                            </td>
                        </tr>--}}
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="/" class="btn btn-solid">continue shopping</a></div>
                <div class="col-6"><a href="/checkout" class="btn btn-solid">check out</a></div>
            </div>
        </div>
    </section>


@stop