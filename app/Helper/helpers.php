<?php

use Illuminate\Support\Facades\DB;

function statusFormat($status)
{

    return ucfirst(str_replace('_', ' ', $status));;
}

function getMerchantActiveMessage()
{
    return " your account have been successfully verified. Start your delivery today ";
}


function getWeightClass()
{
    return $status_array = array(

        '1' => 'Kilogram',
        '2' => 'Gram',
        '3' => 'Pound',
        '4' => 'Ounce'

    );
}

function getLengthClass()
{
    return $status_array = array(

        '1' => 'Centimeter',
        '2' => 'Meter',
        '3' => 'Inch'
    );
}

function getStockStatus()
{
    return $status_array = array(

        '1' => 'In Stock',
        /*  '2' => 'Out of Stock',*/
        '3' => 'Sold Out',
    );
}


function getGender()
{
    return $status_array = array(

        '1' => 'ষাঁড়',
        '2' => 'বলদ',
        '3' => 'গাভী',

    );
}

function getGenderFromId($id)
{
    $status_array = array(
        '1' => 'ষাঁড়',
        '2' => 'বলদ',
        '3' => 'গাভী',
    );
    return $status_array[$id];
}


function getColor()
{
    return $status_array = array(

        '1' => 'সাদা',
        '2' => 'কালো',
        '3' => 'লাল',
        '4' => 'ছাই',
        '5' => 'কালো-সাদা',
        '6' => 'ছাই-সাদা',
        '7' => 'লাল-সাদা',
    );
}

function gettingColorIdtoValue($id)
{
    if ($id == null || !is_numeric($id)) {
        return "-";
    }


    $status_array = array(
        '1' => 'সাদা',
        '2' => 'কালো',
        '3' => 'লাল',
        '4' => 'ছাই',
        '5' => 'কালো-সাদা',
        '6' => 'ছাই-সাদা',
        '7' => 'লাল-সাদা',
    );
    return $status_array[$id] . " Color";
}

function gettingProductType()
{
    return $status_array = array(
        '1' => 'Recent',
        '2' => 'Popular',
        '3' => 'Best Deals',
    );
}

function gettingProductTypeById($id)
{
    $status_array = array(
        '1' => 'Recent',
        '2' => 'Popular',
        '3' => 'Best Deals',
    );
    return $status_array[$id];
}

function typeOfGoru()
{
    return $status_array = array(
        '1' => 'দেশী (কালো)',
        '2' => 'দেশী (লাল)',
        '3' => 'দেশী (সাদা)',
        '4' => 'দেশী (অন্যান্য)',
        '5' => 'মিরকাদিম',
        '6' => 'ভারতীয়',
        '7' => 'হাইব্রিড',
    );
}

function typeOfGoruNameById($id)
{
    $status_array = array(
        '1' => 'দেশী (কালো)',
        '2' => 'দেশী (লাল)',
        '3' => 'দেশী (সাদা)',
        '4' => 'দেশী (অন্যান্য)',
        '5' => 'মিরকাদিম',
        '6' => 'ভারতীয়',
        '7' => 'হাইব্রিড',
    );
    return $status_array[$id];
}

function expectedDeliveryDate()
{
    return $status_array = array(
        '1' => 'ঈদের ৩ দিন আগে',
        '2' => 'যত আগে সম্ভব',
        '3' => 'ঈদের ২ দিন আগে',
        '4' => 'প্রযোজ্য নয়',
    );
}

function expectedDeliveryDateNameById($id)
{
    $status_array = array(
        '1' => 'ঈদের ৩ দিন আগে',
        '2' => 'যত আগে সম্ভব',
        '3' => 'ঈদের ২ দিন আগে',
        '4' => 'প্রযোজ্য নয়',
    );
    return $status_array[$id];
}


function getEntity()
{
    return $status_array = array(
        '1' => 'গরুর প্রকার (উৎস)',
        '2' => 'একটি বাড়ি একটি খামারের গরু',
        '3' => 'খামার',
        '4' => 'মার্কেটপ্লেইস',
        '5' => 'মার্কেটপ্লেইস',
        '6' => 'এজেন্ট',
        '7' => 'গরুর হাট ',
        '8' => 'গরু ব্যবসায়ী ',
    );
}

function getEntityFromId($id)
{
    $status_array = array(
        '1' => 'গরুর প্রকার (উৎস)',
        '2' => 'একটি বাড়ি একটি খামারের গরু',
        '3' => 'খামার',
        '4' => 'মার্কেটপ্লেইস',
        '5' => 'মার্কেটপ্লেইস',
        '6' => 'এজেন্ট',
        '7' => 'গরুর হাট ',
        '8' => 'গরু ব্যবসায়ী ',
    );
    return $status_array[$id];
}


function getCustomerFromId($id)
{
    $customer = \App\Customer::where('customer_id', $id)->first();
    if (is_null($customer)) {
        return "-";
    } else {
        return $customer->customer_name;
    }

}


function getTitleToUrl($blog_title)
{
    if ($blog_title == null) {
        return "-";
    }


    return str_replace(" ", "-", $blog_title);
}

function getShops()
{
    return \App\Shop::get();
}

function getShopNameFromId($id)
{
    return \App\Shop::where('shop_id', $id)->first()->shop_name;
}

function getOrderCount()
{
    if(\Illuminate\Support\Facades\Auth::user()->user_type!=1){
        return "";
    }


    return \App\Order::count();
}

function getCustomer()
{
    if(\Illuminate\Support\Facades\Auth::user()->user_type!=1){
        return "";
    }
    return \App\User::count();
}


function formatMydata($number)
{
    if (substr($number, 0, 2) == "88") {
        $number = substr($number, 2);
    }

    if (substr($number, 0, 1) != "0") {
        $number = "0" . $number;
    }

    if (substr($number, 0, 2) == "00") {
        $number = substr($number, 1);
    }
    return $number;

}

function sendSms($mobile, $sms)
{
    $mobile = formatMydata($mobile);
    $url = "http://bulksms.teletalk.com.bd/link_sms_send.php?op=SMS&user=ekShop-core&pass=Jd\P3<ASPt&mobile=" . $mobile . "&charset=UTF-8&sms=" . urlencode($sms);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
}


function getDivisionNameFromId($id)
{
    $is_exist = DB::table('divisions')->where('division_id', $id)->first();
    if (is_null($is_exist)) {
        return "-";
    } else {

        return $is_exist->en_name;
    }
}

function getDistrictNameFromId($id)
{
    $is_exist = DB::table('districts')->where('district_id', $id)->first();
    if (is_null($is_exist)) {
        return "-";
    } else {

        return $is_exist->en_name;
    }
}

function getUpazilaNameFromId($id)
{
    $is_exist = DB::table('upazilas')->where('upazila_id', $id)->first();
    if (is_null($is_exist)) {
        return "-";
    } else {

        return $is_exist->en_name;
    }
}

function getUnionNameFromId($id)
{
    $is_exist = DB::table('unions')->where('id', $id)->first();
    if (is_null($is_exist)) {
        return "-";
    } else {

        return $is_exist->en_name;
    }
}


function getBookingMOney()
{
    return 0.1;
}

function getQrCode()
{

    $length = 2;

    $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);
    return $qr_code = strtoupper($randomletter) . date('is');
}

function getOtp()
{

    return rand(1000, 9999);
}


//https://stackoverflow.com/questions/28290332/best-practices-for-custom-helpers-in-laravel-5
?>
