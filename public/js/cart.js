var app = angular.module('myApp', []);


app.controller('myCtrl', function ($scope, $http) {


    $scope.cartActive = false;
    $scope.cartCount = 0;
    $scope.totalPriceCountAll = 0;
    $scope.detail_page_quantity = 1;
    $scope.shipping_cost = 0;
    $scope.processing_cost = 0;
    $scope.zone = [1];
    console.log($scope.zone);
    $scope.grand_total = 0;
    $scope.grand_total = 0;
    $scope.booking_money = "৳ " + 0;

    $scope.productCartInfo = {
        "id": '',
        "name": '',
        "price": '',
        "qnt": '',
    };
    $scope.qnt = 1;
    $scope.itemList = [];
    $scope.addToCart = function (product_id, product_name, image, selling_price) {
        $scope.cartActive = true;
        let flag = false;
        let tempProduct = [];
        let cartProductList = localStorage.getItem('cartProductList');
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);

            if (cartProductList.length <= 0) {
                tempProduct = {
                    "id": product_id,
                    "name": product_name,
                    "price": selling_price,
                    "image": image,
                    "qnt": $scope.qnt
                };
            } else {
                for (var cartProduct of cartProductList) {

                    if (cartProduct.id === product_id) {
                        //cartProduct.qnt += 1;
                        console.log(flag + 'if');
                        flag = true;
                        break;
                    } else {

                        tempProduct = {
                            "id": product_id,
                            "name": product_name,
                            "price": selling_price,
                            "image": image,
                            "qnt": $scope.qnt
                        };

                    }
                    /*console.log("lol");*/
                }
            }

        } else {
            console.log(flag + 'else');

            cartProductList = [];
            tempProduct = {
                "id": product_id,
                "name": product_name,
                "price": selling_price,
                "image": image,
                "qnt": $scope.qnt
            };
        }

        if (!flag) {
            cartProductList.push(tempProduct);
            messageSuccess("Successfully product added", "Success")
        } else {
            messageError("Already added", "Failed")
        }
        /*console.log("added");*/
        localStorage.setItem('cartProductList', JSON.stringify(cartProductList));

        $scope.getTotalPrice();
        $scope.getList();
    };

    //Details cart
    $scope.addToCartFromDetailsPage = function (product_id, product_name, image, selling_price) {

        $scope.cartActive = true;
        let flag = false;
        let tempProduct = [];
        let cartProductList = localStorage.getItem('cartProductList');
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);

            if (cartProductList.length <= 0) {
                tempProduct = {
                    "id": product_id,
                    "name": product_name,
                    "price": selling_price,
                    "image": image,
                    "qnt": $scope.detail_page_quantity
                };
            } else {
                for (var cartProduct of cartProductList) {

                    if (cartProduct.id === product_id) {
                        cartProduct.qnt += $scope.detail_page_quantity;
                        flag = true;
                        break;
                    } else {

                        tempProduct = {
                            "id": product_id,
                            "name": product_name,
                            "price": selling_price,
                            "image": image,
                            "qnt": $scope.qnt
                        };

                    }
                    /*console.log("lol");*/
                }
            }

        } else {
            cartProductList = [];
            tempProduct = {
                "id": product_id,
                "name": product_name,
                "price": selling_price,
                "image": image,
                "qnt": $scope.qnt
            };
        }
        if (!flag) {
            /*console.log("Nope");*/
            cartProductList.push(tempProduct);
        }
        /*console.log("added");*/
        localStorage.setItem('cartProductList', JSON.stringify(cartProductList));

        $scope.getTotalPrice();
        $scope.getList();
    };


    $scope.getProductCartInfo = function () {

        let cartProductList = localStorage.getItem('cartProductList');
        let totalCount = 0;
        let totalPrice = 0;
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            totalCount = cartProductList.length;

            for (var cartProduct of cartProductList) {
                totalPrice = totalPrice + parseInt(cartProduct.price);
            }

        }

        return {'totalCount': totalCount, 'totalPrice': totalPrice, 'cartProductList': cartProductList};
    };

    $scope.getTotalPrice = function () {

        let cartProductList = localStorage.getItem('cartProductList');
        let totalPrice = 0;
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            for (var cartProduct of cartProductList) {
                totalPrice = totalPrice + parseInt(cartProduct.price) * parseInt(cartProduct.qnt);
            }
        }
        /*console.log(totalPrice + " llll");*/
        $scope.totalPriceCountAll = totalPrice;
    };

    $scope.cartItemPList = [];
    $scope.getList = function () {

        let cartProductList = localStorage.getItem('cartProductList');
        let totalCount = 0;
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            $scope.cartItemPList = cartProductList;
            $scope.cartActive = true;
        }
    };

    $scope.$watch('cartItemPList', function () {

    });

    $scope.showPopover = function () {
        $scope.popoverIsVisible = true;
    };

    $scope.hidePopover = function () {
        $scope.popoverIsVisible = false;
    };

    $scope.removeItem = function (item) {
        let cartProductList = localStorage.getItem('cartProductList');
        if (cartProductList != null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);

            for (let i = 0; i < cartProductList.length; i++) {
                if (cartProductList[i].id === item.id) {
                    cartProductList.splice(i, 1);
                    break;
                }
            }

            /*console.log("cartProductList", cartProductList);*/
            localStorage.setItem('cartProductList', JSON.stringify(cartProductList));
        }

        $scope.getTotalPrice();
        $scope.getList();
    };

    $scope.itemAdd = function (item) {

        let cartProductList = localStorage.getItem('cartProductList');
        if (cartProductList != null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);

            for (let i = 0; i < cartProductList.length; i++) {
                if (cartProductList[i].id === item.id) {
                    cartProductList[i].qnt += 1;
                    break;
                }
            }
            /*console.log("cartProductList", cartProductList);*/
            localStorage.setItem('cartProductList', JSON.stringify(cartProductList));
        }
        $scope.getTotalPrice();
        $scope.getList();
        /*console.log("lol");*/

    };
    $scope.itemMinus = function (item) {

        let cartProductList = localStorage.getItem('cartProductList');
        if (cartProductList != null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);

            for (let i = 0; i < cartProductList.length; i++) {
                if (cartProductList[i].id === item.id) {

                    if (cartProductList[i].qnt <= 1) {
                        messageError("Cant remove items", 'error');
                        break;
                    } else {
                        cartProductList[i].qnt -= 1;
                    }
                    break;
                }
            }
            /*console.log("cartProductList", cartProductList);*/
            localStorage.setItem('cartProductList', JSON.stringify(cartProductList));
        }
        $scope.getTotalPrice();
        $scope.getList();

    };

    function messageError(cantRemoveItems, error) {
        toastr.info(cantRemoveItems, error);
    }

    function messageSuccess(message, success) {
        toastr.success(message, success);
    }


    //Details page
    $scope.addQuantity = function () {
        if ($scope.detail_page_quantity > 1) {
            $scope.detail_page_quantity = $scope.detail_page_quantity - 1;
        } else {
            messageError("You must select more than 1 Quantity", "Error")
        }

    };
    $scope.removeQuantity = function () {
        $scope.detail_page_quantity = $scope.detail_page_quantity + 1;
    };


    $scope.getList();
    $scope.getTotalPrice();


    //Save Product

    $scope.saveProducts = function (items) {

        var flag = false;
        if ($scope.customer_name == null || $scope.customer_name === "") {
            flag = true;
        }
        if ($scope.customer_phone == null || $scope.customer_phone === "") {
            flag = true;
        }

        if ($scope.shipping_address_name == null) {
            flag = true;
        }
        if ($scope.delivery_type == null) {
            flag = true;
        }
        if ($scope.cow_delivery_type == null) {
            flag = true;
        }
        if ($scope.is_full_payment == null) {
            flag = true;
        }

        if ($scope.cartItemPList.length <= 0) {
            messageError("Add some item first", 'Cart is Empty');
            return;
        }

        if (flag) {
            messageError("You must fill all the input field", 'Error');
            /*console.log("Error");*/
        } else {
            $http.post('/customer/order/store', {
                items: items,
                customer_name: $scope.customer_name,
                customer_phone: $scope.customer_phone,
                customer_email: $scope.customer_email,
                customer_address: $scope.customer_address,
                delivery_type: $scope.delivery_type,
                delivery_date: $scope.delivery_date,
                is_inside_dhaka: $scope.is_inside_dhaka,
                expected_delivery_date: $scope.expected_delivery_date,
                cow_delivery_type: $scope.cow_delivery_type,
                customer_address2: $scope.customer_address2,

                total_price: $scope.totalPriceCountAll,
                shipping_cost: $scope.shipping_cost,
                processing_cost: $scope.processing_cost,
                is_full_payment: $scope.is_full_payment,
                grand_total: $scope.grand_total,

                shipping_address_name: $scope.shipping_address_name,
                shipping_address_phone: $scope.shipping_address_phone,
                shipping_address_address: $scope.shipping_address_address,
                shipping_address_postcode: $scope.shipping_address_postcode,
                shipping_address_notes: $scope.shipping_address_notes,


                union_id: $scope.union_id,
                upazila_id: $scope.upazila_id,
                district_id: $scope.district_id,
                division_id: $scope.division_id,

            }).then(function success(e) {

                /*console.log(e);*/
                if (e.data.status == "success") {
                    /*console.log(e.data.message);*/
                    localStorage.removeItem('cartProductList');
                    $scope.cartItemPList = [];
                    $scope.totalPriceCountAll = 0;
                    $scope.getList();

                    $scope.customer_name = null;
                    $scope.customer_phone = null;
                    $scope.customer_email = null;
                    $scope.customer_address = null;


                    window.location.replace("/pay");


                    // window.location.replace("/success/" + e.data.invoice);
                    //window.location.replace("/success/" + e.data.invoice);
                    toastr.success("আপনার অর্ডারটি গ্রহণ করা হয়েছে ", "ধন্যবাদ");
                } else {
                    console.log(e.data.message);
                    toastr.info("There was problem. Try Later", "Success");
                }

            }, function error(error) {

                messageError(error.statusText, 'Error');
            });
        }

    };


    $scope.getCustomerProfile = function (customer_id) {
        $http.post('/customer/profile', {
            customer_id: customer_id
        }).then(function success(e) {

            if (e.data.status == "success") {

                $scope.customer_name = e.data.customer.customer_name;
                $scope.customer_phone = e.data.customer.customer_phone;
                $scope.customer_city = e.data.customer.customer_city;
                $scope.customer_email = e.data.customer.customer_email;
                $scope.customer_address1 = e.data.customer.customer_address1;
                //console.log(e.data.customer);
            } else {
                //console.log(e.data.message);
            }

        });
    };


    $scope.isFullpayment = function (is_full_payment) {

        console.log(is_full_payment);
        if (is_full_payment == 1) {

        }

    };

    $scope.isFullpayment = function (is_full_payment) {

        console.log($scope.is_full_payment);
        if (is_full_payment == 1) {

            $scope.grand_total = $scope.shipping_cost + $scope.processing_cost + $scope.totalPriceCountAll;
            console.log(" Full payment");
            $scope.booking_money = " ৳ " + 0;
        } else {
            $scope.booking_money = " ৳ " + $scope.totalPriceCountAll * 0.1;
            console.log("Booking");

            $scope.grand_total = $scope.shipping_cost + $scope.processing_cost + ($scope.totalPriceCountAll * 0.1)
            console.log("Not Full payment");
        }

    };

    $scope.cowDeliveryType = function (cow_delivery_type) {

        console.log(cow_delivery_type);
        if (cow_delivery_type != 1) {
            $scope.processing_cost = 0;
        } else {
            $scope.processing_cost = 10000;
        }
        $scope.grand_total = $scope.shipping_cost + $scope.processing_cost + ($scope.totalPriceCountAll);
    };

    $scope.deliveryType = function (delivery_type) {

        console.log(delivery_type);
        if (delivery_type != 1) {
            $scope.shipping_cost = 0;
        } else {
            $scope.shipping_cost = 1500;

        }

        $scope.grand_total = $scope.shipping_cost + $scope.processing_cost + ($scope.totalPriceCountAll);

    };
    $scope.grandTotal = function () {
        if (is_full_payment) {
            $scope.grand_total = $scope.shipping_cost + $scope.processing_cost + ($scope.totalPriceCountAll)
        } else {
            $scope.grand_total = $scope.shipping_cost + $scope.processing_cost + ($scope.totalPriceCountAll * 0.1)
        }
    };

    // $scope.grandTotal();


    //Serach Divison district
    $scope.division = "";
    $scope.union_id = "";

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


    $scope.mySearch = function (query, shop_id) {

        $http.post('/my/search', {
            query: query,
            shop_id: shop_id,

        }).then(function (response) {

            if (response.data.status_code == 200) {

                $scope.products = response.data.results;
                console.log(response.data.results);
            } else {
                console.log(e.data.message);
            }

        });
    };


    $scope.cow_type = null;
    $scope.shop_id = null;
    $scope.color = null;
    $scope.entity = null;
    $scope.division_id = null;
    $scope.district_id = null;
    $scope.upazila_id = null;
    $scope.union_id = null;
    $scope.min = null;
    $scope.max = null;

    $scope.changeDivisionFromSearch = function (division_id) {
        $http.get("/district/" + division_id)

            .then(function (response) {


                $scope.districts = response.data.results;

                console.log($scope.districts);

            });
        $scope.searchProduct();
    };

    $scope.changeDistrictFromSearch = function (district) {
        $http.get("/upazila/" + district)

            .then(function (response) {


                $scope.upazilas = response.data.results;

                console.log($scope.upazilas);

            });
        $scope.searchProduct();
    };

    $scope.changeUpazilaFromSearch = function (upazila_id) {
        $http.get("/union/" + upazila_id)

            .then(function (response) {


                $scope.unions = response.data.results;

                console.log($scope.unions);

            });
        $scope.searchProduct();
    };


    $scope.searchProduct = function () {
        console.log("hallo");


        $http.post('/pro/search', {
            cow_type: $scope.cow_type,
            shop_id: $scope.shop_id,
            color: $scope.color,
            entity: $scope.entity,
            min: $scope.min,
            max: $scope.max,
            division_id: $scope.division_id,
            district_id: $scope.district_id,
            upazila_id: $scope.upazila_id,
            union_id: $scope.union_id,

        }).then(function (response) {

            if (response.data.status_code == 200) {

                $scope.products = response.data.results;
                console.log(response.data.results);
            } else {
                console.log(e.data.message);
            }

        });

    };

});
