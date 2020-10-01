@extends('layouts.app')
@section('title', 'Create Product')

@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    @include('includes.message')

    <div class="row" ng-controller="productController">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/admin/product/update" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="productname">Product Name</label>
                                    <input id="productname" name="product_name" type="text" class="form-control"
                                           value="{{$result->product_name}}">
                                    <input name="_token" type="hidden" class="form-control" value="{{csrf_token()}}">
                                    <input name="product_id" type="hidden" class="form-control"
                                           value="{{$result->product_id}}">
                                </div>
                                <div class="form-group">
                                    <label for="productdesc">Product Description</label>
                                    <textarea class="form-control" id="productdesc" name="product_details"
                                              rows="5">{{$result->product_details}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="weight"> Weight</label>
                                    <input id="weight" name="weight" type="text" class="form-control"
                                           value="{{$result->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Weight Class</label>
                                    <select class="form-control" name="weight_class">
                                        <option>Select</option>
                                        @foreach (getWeightClass() as $key => $value)
                                            <option value="{{ $key}}"
                                                    @if($result->weight_class==$key) selected @endif>{{$value}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="price">সন্তান্কতরণ চিহ্ন:</label>

                                            <input class="form-control" name="identity" value="{{$result->identity}}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="product_color">কোনো রোগব্যাধি থাকলে তা উল্লেখ করুন:</label>
                                            <textarea class="form-control" name="disease">{{$result->disease}}</textarea>
                                        </div>
                                    </div>
                                </div>




                            </div>

                            <div class="col-sm-6">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Type</label>
                                            <select class="form-control select2" name="product_category_id">
                                                <option>Select</option>
                                                @foreach($categories as $category)
                                                    <option @if($category->category_id ==  $result->product_category_id) selected
                                                            @endif
                                                            value="{{$category->category_id}}">{{$category->category_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Entity</label>

                                                @if(Auth::user()->user_type!=1)
                                                    <select class="form-control" name="shop_id">
                                                        <option value="{{$shop_id}}">{{getShopNameFromId($shop_id)}}</option>
                                                    </select>
                                                @else
                                                    <select class="form-control select2" name="shop_id">
                                                        @foreach($shops as $shop)
                                                            <option value="{{$shop->shop_id}}">{{$shop->shop_name}}</option>
                                                        @endforeach

                                                    </select>
                                                @endif


                                        </div>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="manufacturerbrand">Stock Status </label>
                                            <select class="form-control " name="stock_status">
                                                <option>Select</option>
                                                @foreach (getStockStatus() as $key => $value)
                                                    <option value="{{ $key}}"
                                                            @if($result->stock_status==$key) selected @endif>{{$value}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="manufacturerbrand">Display Category</label>
                                            <select class="form-control " name="product_type">
                                                <option>Select</option>
                                                @foreach (gettingProductType() as $key => $value)
                                                    <option value="{{ $key}}"
                                                            @if($result->product_type==$key) selected @endif>{{$value}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="price">Regular Price</label>
                                            <input id="price" name="regular_price" type="number" class="form-control"
                                                   value="{{$result->regular_price}}">

                                        </div>
                                        <div class="col-md-6">
                                            <label for="price">Selling Price</label>
                                            <input id="price" name="selling_price" type="number" class="form-control"
                                                   value="{{$result->selling_price}}">

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="qr_code">Qr Code</label>
                                                <input id="qr_code" name="qr_code" type="text" class="form-control"
                                                       value="{{$result->qr_code}}">

                                            </div>
                                            <div class="col-md-6">
                                                <label for="manufacturerbrand">Variation </label>
                                                <select class="form-control " name="cow_type">
                                                    <option>Select</option>
                                                    @foreach (typeOfGoru() as $key => $value)
                                                        <option value="{{ $key}}"
                                                                @if($result->cow_type==$key) selected @endif>{{$value}}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <div class="row">
                                            {{--<div class="col-md-6">
                                                <label for="price">Discount Rate %</label>
                                                <input id="price" name="discount_rate" type="number"
                                                       class="form-control" value="{{$result->discount_rate}}">
                                            </div>--}}

                                            <div class="col-md-6">
                                                <label for="price">Gender</label>

                                                <select class="select2 form-control select2-multiple"
                                                        {{--  multiple="multiple"--}}
                                                        name="gender" data-placeholder="Choose ...">
                                                    @foreach (getGender() as $key => $value)
                                                        <option value="{{ $key}}" @if($key==$result->gender) selected @endif>{{$value}}</option>
                                                    @endforeach

                                                </select>

                                            </div>

                                            <div class="col-md-6">
                                                <label for="product_color">Color</label>
                                                <select class="select2 form-control select2-multiple"
                                                        {{--     multiple="multiple"--}}
                                                        name="product_color" data-placeholder="Choose ...">
                                                    @foreach (getColor() as $key => $value)
                                                        <option value="{{ $key}}"
                                                                @if($key==$result->product_color) selected @endif>{{$value}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="price">Age</label>

                                                <input class="form-control" name="age" type="number" value="{{$result->age}}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product_color">দাঁত সংখ্যা: (পাকা দাঁত)</label>
                                                <input class="form-control" name="teeth"  value="{{$result->teeth}}">
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title mb-3">Product Images</h4>
                                        <div class="fallback">
                                            <input name="image[]" type="file" multiple/>
                                        </div>

                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                            </div>

                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <h4 class="card-title mb-3">Certification</h4>
                                        <input class="form-control" name="certificate" type="file">


                                    </div>

                                  {{--  <div class="col-md-3">
                                        <h4 class="card-title mb-3">Video</h4>
                                        <input class="form-control" name="video_file" type="file">
                                    </div>--}}

                                </div>


                            </div>

                        </div> <!-- end card-->

                        {{--         <div class="card">
                                     <div class="card-body">

                                         <h4 class="card-title">Extra Data</h4>
                                         <p class="card-title-desc">Fill all information below</p>
                                         <div class="row">
                                             <div class="col-sm-6">
                                                 <div class="form-group">
                                                     <label for="metatitle">Dimention(L*W*H)</label>
                                                     <div class="row">
                                                         <div class="col-md-4">
                                                             <input id="" placeholder="Length" name="length" type="number"
                                                                    class="form-control " value="{{$result->length}}">
                                                         </div>
                                                         <div class="col-md-4">
                                                             <input id="" placeholder="Width" name="width" type="number"
                                                                    class="form-control" value="{{$result->width}}">
                                                         </div>
                                                         <div class="col-md-4">
                                                             <input id="" placeholder="Height" name="height" type="number"
                                                                    class="form-control" value="{{$result->height}}">
                                                         </div>

                                                     </div>


                                                 </div>
                                             </div>

                                             <div class="col-sm-6">
                                                 <div class="form-group">
                                                     <label for="metadescription">Minimun Order Quantity</label>
                                                     <input name="minimum_order_quantity" type="number" class="form-control" value="{{$result->minimum_order_quantity}}">

                                                 </div>
                                             </div>
                                         </div>

                                         --}}{{--<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                                         <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>--}}{{--


                                     </div>
                                 </div>
         --}}
                        {{-- <div class="card">
                             <div class="card-body">

                                 <h4 class="card-title">Meta Data</h4>
                                 <p class="card-title-desc">Fill all information below</p>

                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="metatitle">Meta title</label>
                                             <input id="metatitle" name="meta_title" type="text"
                                                    class="form-control" value="{{$result->meta_title}}">
                                         </div>
                                         <div class="form-group">
                                             <label for="metakeywords">Meta Keywords</label>
                                             <input id="metakeywords" name="meta_keywords" type="text"
                                                    class="form-control" value="{{$result->meta_keywords}}">
                                         </div>
                                     </div>

                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="metadescription">Meta Description</label>
                                             <textarea class="form-control" name="meta_description"
                                                       rows="5">{{$result->meta_description}}</textarea>
                                         </div>
                                     </div>
                                 </div>
                                 --}}{{--
                                                                 <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save
                                                                     Changes
                                                                 </button>
                                                                 <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>--}}{{--


                             </div>
                         </div>

 --}}
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Customer Data</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" name="name" type="text" class="form-control" required
                                                   value="{{$result->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input id="phone" name="phone" type="text"
                                                   class="form-control" value="{{$result->phone}}" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" rows="5"
                                                      required>{{$result->address}}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-3" id="division_coverage">
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">Division</label>
                                            <div class="col-lg-9">
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
                                        </div>
                                    </div>

                                    <div class="col-md-3" id="district_coverage">
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">District</label>
                                            <div class="col-lg-9">

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
                                        </div>
                                    </div>

                                    <div class="col-md-3" id="upazila_coverage">
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">Upazila</label>
                                            <div class="col-lg-9">

                                                <select name="upazila_id" class="form-control m-b" ng-model="upazila_id"
                                                        ng-change="changeUpazila(upazila_id)">

                                                    <option value="" selected>Select Upazila</option>
                                                    <option ng-repeat="upazila in upazilas"
                                                            value="@{{upazila.upazila_id}}">
                                                        @{{upazila.en_name}}
                                                    </option>

                                                </select>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="upazila_coverage">
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">Union</label>
                                            <div class="col-lg-9">

                                                <select name="union_id" class="form-control m-b" ng-model="union_id"
                                                        ng-change="changeUnion(union_id)">

                                                    <option value="" selected>Select Union</option>
                                                    <option ng-repeat="union in unions" value="@{{union.id}}">
                                                        @{{union.en_name}}
                                                    </option>

                                                </select>


                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save
                                    Changes
                                </button>

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- end row -->
    <script>


        app.controller('productController', function ($scope, $http) {

            console.log("Okkkfff");
            $scope.coverage_depth = "Division";
            $scope.division = "";
            $scope.union_id = "";
            coverage_depth = "Union";

            $scope.changeDivision = function (division_id) {


                $http.get("/district/" + division_id)

                    .then(function (response) {


                        $scope.districts = response.data.results;

                        console.log($scope.districts);

                    });
            };

            $scope.changeDistrict = function (district) {
                console.log(district);

                $http.get("/upazila/" + district)

                    .then(function (response) {


                        $scope.upazilas = response.data.results;

                        console.log($scope.upazilas);

                    });
            };

            $scope.changeUpazila = function (upazila) {


                $http.get("/union/" + upazila)

                    .then(function (response) {


                        $scope.unions = response.data.results;

                        console.log($scope.unions);

                    });
            };


            //Getting Divisions

            $http.get("/division")

                .then(function (response) {


                    $scope.divisions = response.data.results;

                    console.log($scope.divisions);

                });
        });


    </script>

@stop
