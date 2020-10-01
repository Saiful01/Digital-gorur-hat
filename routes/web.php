<?php

use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route for All

Route::get('/', 'Controller@home');
Route::get('/about', 'Controller@about');
Route::get('/cart', 'Controller@cart');
/*Route::get('/details/{id}', 'Controller@details2');*/
Route::get('/details/{id}/{name}', 'Controller@details');
Route::get('/checkout', 'Controller@checkout');
Route::any('/success/{invoice}', 'Controller@order');
Route::any('/customer/order/store', 'Controller@placeOrder');

Route::any('/shop/{id}/{name}', 'Controller@shopProducts');
Route::any('/search', 'Controller@search');
Route::any('/product/search', 'Controller@productSearch');

Route::any('/shop/registration', 'Controller@shopRegistration');
Route::any('/shop/registration-do', function (\Illuminate\Http\Request $request) {


    $is_exist = User::where('phone', $request['phone'])->first();
    if (!is_null($is_exist)) {

        return back()->with('failed', 'This phone already used');
    }


    try {

        $otp = getOtp();
        $request['otp'] = $otp;

        $user_array = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'otp' => $request['otp'],
            'password' => \Illuminate\Support\Facades\Hash::make($request['password'])
        ];

        User::insert($user_array);
        sendSms($request['phone'], "Your eHaat verification code is: " . $otp);
        Session::put('phone', $request['phone']);
        return Redirect::to('/otp-verify');


    } catch (\Exception $exception) {
        return back()->with('failed', $request->all());
        return back()->with('failed', 'There is an error');
    }


});
Route::any('/otp-verify', 'Controller@otpVerify');

Route::get('/admin/login', function () {
    return view('admin.login.index');
});


Route::post('/admin/login-check', 'AuthController@loginCheck');
Route::get('/logout', 'AuthController@logout');


Route::post('/payment-callback', 'Controller@callbackResponse');
Route::get('/payment-success', 'Controller@paymentSuccess');


Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin/dashboard', 'DashboardController@dashboard');

    Route::get('/admin/profile', 'DashboardController@profile');

    Route::get('admin/product/create', 'ProductController@create');
    Route::post('/admin/product/store', 'ProductController@store');
    Route::get('/admin/product/show', 'ProductController@show');
    Route::get('/admin/product/edit/{id}', 'ProductController@edit');
    Route::post('/admin/product/update', 'ProductController@update');
    Route::get('/admin/product/delete/{id}', 'ProductController@destroy');
    Route::get('/admin/product/details/{id}', 'ProductController@productDetails');
    Route::get('/admin/product/featured/{id}', 'ProductController@featured');


    //Manage Customer
    Route::get('/admin/customer/create', 'CustomerController@create');
    Route::post('/admin/customer/store', 'CustomerController@store');
    Route::get('/admin/customer/show', 'CustomerController@show');
    Route::get('/admin/customer/edit/{id}', 'CustomerController@edit');
    Route::post('/admin/customer/update', 'CustomerController@update');
    Route::get('/admin/customer/delete/{id}', 'CustomerController@destroy');

    //Manage Customer
    Route::get('/admin/customer/create', 'CustomerController@create');
    Route::post('/admin/customer/store', 'CustomerController@store');
    Route::get('/admin/customer/show', 'CustomerController@show');
    Route::get('/admin/customer/edit/{id}', 'CustomerController@edit');
    Route::post('/admin/customer/update', 'CustomerController@update');

    //Manage Order
    Route::get('/admin/order/show', 'OrderController@show');
    Route::get('/admin/order/details/{invoice}', 'OrderController@orderDetails');
    Route::post('/admin/order/store', 'OrderController@store');
    Route::get('/admin/order/edit/{id}', 'OrderController@edit');
    Route::post('/admin/order/update', 'OrderController@update');


    //Manage Coupon
    Route::get('/admin/coupon/show', 'CouponController@show');
    Route::get('/admin/coupon/create', 'CouponController@create');
    Route::post('/admin/coupon/store', 'CouponController@store');
    Route::get('/admin/coupon/delete/{id}', 'CouponController@destroy');
    Route::get('/admin/coupon/edit/{id}', 'CouponController@edit');
    Route::post('/admin/coupon/update', 'CouponController@update');


    //Manage Order
    Route::get('/admin/shop/show', 'ShopController@show');
    Route::get('/admin/shop/create', 'ShopController@create');
    Route::post('/admin/shop/store', 'ShopController@store');
    Route::get('/admin/shop/delete/{id}', 'ShopController@destroy');
    Route::get('/admin/shop/edit/{id}', 'ShopController@edit');
    Route::post('/admin/shop/update', 'ShopController@update');

    //Manage Order
    Route::get('/admin/category/show', 'ProductCategoryController@show');
    Route::get('/admin/category/create', 'ProductCategoryController@create');
    Route::post('/admin/category/store', 'ProductCategoryController@store');
    Route::get('/admin/category/delete/{id}', 'ProductCategoryController@destroy');
    Route::get('/admin/category/edit/{id}', 'ProductCategoryController@edit');
    Route::post('/admin/category/update', 'ProductCategoryController@update');


    //Manage Slider
    Route::get('/admin/slider/show', 'SliderController@show');
    Route::get('/admin/slider/create', 'SliderController@create');
    Route::post('/admin/slider/store', 'SliderController@store');
    Route::get('/admin/slider/delete/{id}', 'SliderController@destroy');
    Route::get('/admin/slider/edit/{id}', 'SliderController@edit');
    Route::post('/admin/slider/update', 'SliderController@update');


    //Manage promotional slider
    Route::get('/admin/promotional-slider/show', 'PromotionalSliderController@show');
    Route::get('/admin/promotional-slider/create', 'PromotionalSliderController@create');
    Route::post('/admin/promotional-slider/store', 'PromotionalSliderController@store');
    Route::get('/admin/promotional-slider/delete/{id}', 'PromotionalSliderController@destroy');
    Route::get('/admin/promotional-slider/edit/{id}', 'PromotionalSliderController@edit');
    Route::post('/admin/promotional-slider/update', 'PromotionalSliderController@update');


    //Manage Slider
    Route::get('/admin/user/show', 'UserController@show');
    Route::get('/admin/user/create', 'UserController@create');
    Route::post('/admin/user/store', 'UserController@store');
    Route::get('/admin/user/delete/{id}', 'UserController@destroy');
    Route::get('/admin/user/edit/{id}', 'UserController@edit');
    Route::post('/admin/user/update', 'UserController@update');

    //////profile update
    Route::post('/admin/profile/update', 'DashboardController@update');

});


Route::group(['middleware' => 'company'], function () {

    Route::get('/company/order/show', 'CompanyAdminController@orders');
    Route::get('/shop/create', 'CompanyAdminController@createShop');
    Route::post('/company/shop/store', 'CompanyAdminController@storeShop');

});


//District/ Division AOI
Route::any('/pro/search', 'ApiController@pSearch');
Route::any('/my/search', 'ApiController@mySearch');
Route::get('/division', 'ApiController@getDivision');
Route::get('/district/{division_id}', 'ApiController@getDistrict');
Route::get('/upazila/{district_id}', 'ApiController@getUpazila');
Route::get('/union/{upazila_id}', 'ApiController@getUnion');
Route::get('/get-suppliers/{area_type}/{area_id}/{service_type}', 'ApiController@getSuppliers');


// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::any('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::any('/success', 'SslCommerzPaymentController@success');
Route::any('/fail', 'SslCommerzPaymentController@fail');
Route::any('/cancel', 'SslCommerzPaymentController@cancel');

Route::any('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END
