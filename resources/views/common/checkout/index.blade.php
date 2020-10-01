@extends('layouts.common')
@section('title', 'Checkout')

@section('content')

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Check-out</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form {{--action="/order" method="post"--}}>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" id="myCheck" onclick="myFunction()"
                                                   class="form-check-input" value=""><h5>Ship to a
                                                diffrent address?</h5>
                                        </label>
                                    </div>
                                </div>


                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>

                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Name</div>
                                        <input type="text" name="customer_name" ng-model="customer_name" value=""
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Phone</div>
                                        <input type="text" name="customer_phone" ng-model="customer_phone" value=""
                                               placeholder="" required>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" placeholder=""
                                               required>
                                    </div>
                                    {{--  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                          <div class="field-label">Email Address</div>
                                          <input type="text" name="field-name" value="" placeholder="">
                                      </div>--}}

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="display:none">
                                        <div class="field-label">শহর</div>
                                        <select name="expected_delivery_date" ng-model="is_inside_dhaka">

                                            <option id="0" selected>Not Applicable</option>
                                            <option id="1">ঢাকা</option>
                                            <option id="2">ঢাকার বাইরে</option>

                                        </select>
                                    </div>


                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">কিভাবে নিতে চান ? *</div>
                                        <select name="delivery_type" ng-model="delivery_type"
                                                ng-change="deliveryType(delivery_type)">
                                            <option value="0">এসে নিয়ে যাবেন</option>
                                            <option value="1">বাসায় ডেলিভারী নিবেন</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">কিভাবে চান ?</div>
                                        <select name="delivery_type" ng-model="cow_delivery_type"
                                                ng-change="cowDeliveryType(cow_delivery_type)">
                                            <option value="0">সম্পূর্ণ গরু</option>
                                            <option value="1">প্রসেস মাংস</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">কবে চান ?</div>
                                        <select name="expected_delivery_date" ng-model="expected_delivery_date">
                                            @foreach(expectedDeliveryDate() as $key=>$value)
                                                <option id="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">কত টাকা পরিশোধ করতে চান ?</div>
                                        <select name="delivery_type" ng-model="is_full_payment"
                                                ng-change="isFullpayment(is_full_payment)">
                                            <option value="1">পূর্ণ টাকা পরিশোধ</option>
                                            {{--   <option value="0">বুকিং (১০%)</option>--}}
                                        </select>
                                    </div>


                                    {{-- <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                         <div class="field-label">Delivery date</div>
                                         <input type="date" name="delivery_date" ng-model="delivery_date" required>
                                     </div>--}}


                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="display: none">
                                        <div class="field-label">ঠিকানা -২</div>
                                        <input type="text" name="customer_address" value="" ng-model="customer_address2"
                                               placeholder="Street address" required>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" id="motiur">
                                        <div class="field-label">Division</div>
                                        <select name="division_id" class="form-control m-b"
                                                ng-model="division_id"
                                                ng-change="changeDivision(division_id)">

                                            <option value="" selected>Select Division</option>
                                            <option ng-repeat="division in divisions"
                                                    value="@{{division.division_id}}">
                                                @{{division.en_name}}
                                            </option>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" id="motiur1">
                                        <div class="field-label">District</div>
                                        <select name="district_id" class="form-control m-b"
                                                ng-model="district_id"
                                                ng-change="changeDistrict(district_id)">

                                            <option value="" selected>Select District</option>
                                            <option ng-repeat="district in districts"
                                                    value="@{{district.district_id}}">
                                                @{{district.en_name}}
                                            </option>

                                        </select>
                                    </div>


                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" id="motiur2">
                                        <div class="field-label">Upazila</div>
                                        <select name="upazila_id" class="form-control m-b" ng-model="upazila_id"
                                                ng-change="changeUpazila(upazila_id)">

                                            <option value="" selected>Select Upazila</option>
                                            <option ng-repeat="upazila in upazilas"
                                                    value="@{{upazila.upazila_id}}">
                                                @{{upazila.en_name}}
                                            </option>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" id="motiur3">
                                        <div class="field-label">Union</div>
                                        <select name="union_id" class="form-control m-b" ng-model="union_id"
                                                ng-change="changeUnion(union_id)">

                                            <option value="" selected>Select Union</option>
                                            <option ng-repeat="union in unions" value="@{{union.id}}">
                                                @{{union.en_name}}
                                            </option>

                                        </select>

                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">ঠিকানা</div>
                                        <input type="text" name="shipping_address_name" value="" ng-model="shipping_address_name"
                                               placeholder="Street address" required>
                                    </div>






                                    <div id="text" style="display:none">
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <div class="checkout-title">
                                                <h3>Shipping To</h3>
                                            </div>
                                            <div class="row form-group ">
                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <div class="field-label">Name</div>
                                                    <input type="text" name="shipping_address_name"
                                                           ng-model="shipping_address_name"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                                    <div class="field-label">Phone</div>
                                                    <input type="text" name="shipping_address_phone"
                                                           ng-model="shipping_address_phone" placeholder="">
                                                </div>


                                                <div class="form-group col-md-6 col-sm-6 col-xs-12" style="display:none;">
                                                    <div class="field-label">Postcode/ZIP</div>
                                                    <input type="text" name="shipping_address_postcode"
                                                           ng-model="shipping_address_postcode" value="" placeholder="">
                                                </div>

                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-label">Note</div>
                                                    <textarea type="text" class="form-group"
                                                              name="shipping_address_notes" rows="10"
                                                              ng-model="shipping_address_notes"
                                                              placeholder="Notes here.."></textarea>
                                                </div>

                                                <div class="form-group col-md-12 col-sm-12 col-xs-12" id="">
                                                    <div class="field-label">Division</div>
                                                    <select name="division_id" class="form-control m-b"
                                                            ng-model="division_id"
                                                            ng-change="changeDivision(division_id)">

                                                        <option value="" selected>Select Division</option>
                                                        <option ng-repeat="division in divisions"
                                                                value="@{{division.division_id}}">
                                                            @{{division.en_name}}
                                                        </option>

                                                    </select>
                                                </div>


                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-label">District</div>
                                                    <select name="district_id" class="form-control m-b"
                                                            ng-model="district_id"
                                                            ng-change="changeDistrict(district_id)">

                                                        <option value="" selected>Select District</option>
                                                        <option ng-repeat="district in districts"
                                                                value="@{{district.district_id}}">
                                                            @{{district.en_name}}
                                                        </option>

                                                    </select>
                                                </div>


                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-label">Upazila</div>
                                                    <select name="upazila_id" class="form-control m-b" ng-model="upazila_id"
                                                            ng-change="changeUpazila(upazila_id)">

                                                        <option value="" selected>Select Upazila</option>
                                                        <option ng-repeat="upazila in upazilas"
                                                                value="@{{upazila.upazila_id}}">
                                                            @{{upazila.en_name}}
                                                        </option>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-label">Union</div>
                                                    <select name="union_id" class="form-control m-b" ng-model="union_id"
                                                            ng-change="changeUnion(union_id)">

                                                        <option value="" selected>Select Union</option>
                                                        <option ng-repeat="union in unions" value="@{{union.id}}">
                                                            @{{union.en_name}}
                                                        </option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <div class="field-label">Address</div>
                                                    <textarea type="text" name="shipping_address_address"
                                                              ng-model="shipping_address_address" placeholder=""></textarea>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>


                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty">
                                            <li ng-repeat="item in cartItemPList" ng-cloak>@{{ item.name}} × @{{
                                                item.qnt}} <span> ৳ @{{ item.qnt* item.price}}</span></li>

                                        </ul>

                                        {{--  <ul class="total">
                                              <li>Booking Money <span class="count" ng-bind="booking_money" ng-cloak></span>
                                              </li>
                                          </ul>--}}
                                        <ul class="total">
                                            <li>Shipping Cost <span class="count"
                                                                    ng-cloak> ৳ @{{ shipping_cost}}</span>
                                            </li>
                                        </ul>
                                        <ul class="total">
                                            <li>Processing Cost <span class="count"
                                                                      ng-cloak> ৳ @{{ processing_cost}}</span>
                                            </li>
                                        </ul>
                                        <ul class="total">
                                            <li>Subtotal <span class="count" ng-cloak ng-bind="grand_total"> ৳ @{{ grand_total}}</span>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment-group" id="payment-1"
                                                                   checked="checked">
                                                            <label for="payment-1">Online Payment<span
                                                                        class="small-text">Please send a check to Store
                                                                    Name, Store Street, Store Town, Store State /
                                                                    County, Store Postcode.</span></label>
                                                        </div>
                                                    </li>
                                                    {{-- <li>
                                                         <div class="radio-option">
                                                             <input type="radio" name="payment-group" id="payment-2">
                                                             <label for="payment-2">Cash On Delivery<span
                                                                         class="small-text">Please send a check to Store
                                                                     Name, Store Street, Store Town, Store State /
                                                                     County, Store Postcode.</span></label>
                                                         </div>
                                                     </li>--}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button {{--type="submit" --}}class="btn-solid btn"
                                                    ng-click="saveProducts(cartItemPList)">Paynow
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            var motiur = document.getElementById("motiur");
            var motiur1 = document.getElementById("motiur1");
            var motiur2 = document.getElementById("motiur2");
            var motiur3 = document.getElementById("motiur3");
            if (checkBox.checked == true) {
                text.style.display = "block";
                motiur.style.display = "none";
                motiur1.style.display = "none";
                motiur2.style.display = "none";
                motiur3.style.display = "none";
            } else {

                /* shipping_address_name: $scope.shipping_address_name,
                     shipping_address_town: $scope.shipping_address_town,
                     shipping_address_address: $scope.shipping_address_address,
                     shipping_address_postcode: $scope.shipping_address_postcode,
                     shipping_address_notes: $scope.shipping_address_notes,*/
                text.style.display = "none";
            }
        }
    </script>
@stop
