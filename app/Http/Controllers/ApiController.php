<?php

namespace App\Http\Controllers;


use App\Product;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //

    public function pSearch(Request $request)
    {
        $query = $new_products = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id');
        if (!is_null($request['cow_type'])) {
            $query->where('products.cow_type', $request['cow_type']);
        }

        if (!is_null($request['shop_id'])) {
            $query->where('products.shop_id', $request['shop_id']);
        }

        if (!is_null($request['color'])) {
            $query->where('products.product_color', $request['color']);
        }

        if (!is_null($request['division_id'])) {

            $query->where('products.division_id', $request['division_id']);
        }

        if (!is_null($request['district_id'])) {
            $query->where('products.district_id', $request['district_id']);
        }
        if (!is_null($request['upazila_id'])) {
            $query->where('products.upazila_id', $request['upazila_id']);
        }

        if (!is_null($request['union_id'])) {
            $query->where('products.union_id', $request['union_id']);
        }
        if (!is_null($request['min'])) {
            $query->where('products.selling_price', '<',$request['min']);
        }
        if (!is_null($request['max'])) {
            $query->where('products.selling_price', '>',$request['max']);
        }


        //Min Max

        $result = $query->get();

        return [
            'status_code' => 200,
            'message' => "Successfully Retrived",
            'results' => $result
        ];
    }

    public function mySearch(Request $request)
    {
        $product = $request['query'];
        $shop = $request['shop_id'];
        if ($shop == 0) {
            $results = Product::where('products.product_name', 'LIKE', '%' . $product . '%')
                ->where('products.publish_status', true)
                ->get();
        } else {
            $query = Product::join('shops', 'shops.shop_id', '=', 'products.shop_id');
            $query->where('shops.shop_id', $shop);
            $shop = Shop::where('shop_id', $shop)->first();
            $results = $query->where('products.product_name', 'LIKE', '%' . $product . '%')
                ->where('products.publish_status', true)
                ->get();
        }

        return [
            'status_code' => 200,
            'message' => "Successfully Retrived",
            'results' => $results
        ];
    }


    public function getDivision()
    {
        $results = DB::table('divisions')->get();
        return [
            'status_code' => 200,
            'message' => "Successfully Retrived",
            'results' => $results
        ];

    }

    public function getDistrict($division_id)
    {
        $results = DB::table('districts')->where('division_id', $division_id)->get();
        return [
            'status_code' => 200,
            'message' => "Successfully Retrived",
            'results' => $results
        ];

    }

    public
    function getUpazila($district_id)
    {
        $results = DB::table('upazilas')->where('district_id', $district_id)->get();
        return [
            'status_code' => 200,
            'message' => "Successfully Retrived",
            'results' => $results
        ];
    }

    public function getUnion($id)
    {
        $results = DB::table('unions')->where('upazila_id', $id)->get();
        return [
            'status_code' => 200,
            'message' => "Successfully Retrived",
            'results' => $results
        ];
    }

    public
    function getSuppliers($area_type, $area_id, $service_type)
    {


        if ($area_type == "division") {

            $results = Shop::join('users', 'users.id', '=', 'shops.user_id')
                ->whereRaw("find_in_set($area_id,shops.division_id)")
                ->where('service_type', $service_type)
                ->where('shops.is_active', true)
                ->get();

            $i = 0;
            foreach ($results as $res) {

                if ($res->is_serve_in_depth == true) {

                    if ($res->coverage_depth != ucfirst($area_type)) {

                        unset($results[$i]);
                    }
                }

                $i++;
            }


        } else if ($area_type == "district") {
            $results = Shop:: join('users', 'users.id', '=', 'shops.user_id')
                ->whereRaw("find_in_set($area_id,shops.district_id)")
                ->where('service_type', $service_type)
                ->get();

            $i = 0;
            foreach ($results as $res) {

                if ($res->is_serve_in_depth == true) {

                    if ($res->coverage_depth != ucfirst($area_type)) {

                        unset($results[$i]);
                    }
                }

                $i++;
            }


        } else if ($area_type == "upazila") {


            $results = DB::table('shops')->join('users', 'users.id', '=', 'shops.user_id')
                ->whereRaw("find_in_set($area_id,shops.upazila_id)")
                ->where('service_type', $service_type)
                ->get();

            $i = 0;
            foreach ($results as $res) {

                if ($res->is_serve_in_depth == true) {

                    if ($res->coverage_depth != ucfirst($area_type)) {

                        //echo $res->coverage_depth . "--" . ucfirst($area_type);
                        unset($results[$i]);
                    }

                    //echo $res->coverage_depth . "--" . ucfirst($area_type) . "<br>";
                }

                $i++;
            }

        } else if ($area_type == "union") {

            $results = Shop:: join('users', 'users.id', '=', 'shops.user_id')
                ->whereRaw("find_in_set($area_id,shops.union_id)")
                ->where('service_type', $service_type)
                ->get();

            $i = 0;
            foreach ($results as $res) {

                if ($res->is_serve_in_depth == true) {

                    if ($res->coverage_depth != ucfirst($area_type)) {
                        //echo $res->coverage_depth . "<br>";
                        echo $area_type;

                        //unset( $results[$i]);
                    }
                }

                $i++;
            }


        } else {
            $results = Shop:: join('users', 'users.id', '=', 'shops.user_id')
                ->whereRaw("find_in_set($area_id,shops.district_id)")
                ->where('service_type', $service_type)
                ->get();

            $i = 0;
            foreach ($results as $res) {

                if ($res->is_serve_in_depth == true) {

                    if ($res->coverage_depth != ucfirst($area_type)) {

                        unset($results[$i]);
                    }
                }

                $i++;
            }
        }

        foreach ($results as $result) {

            $result->today_assigned = OrderData::where('shop_id', $result->shop_id)->where('status', getSupplierAssignedId("id"))/*->whereDate('created_at', Carbon::today())*/
            ->count();
            $result->today_delivered = OrderData::where('shop_id', $result->shop_id)->where('status', 7)/*->whereDate('created_at', Carbon::today())*/
            ->count();
            $result->today_cant_deliver = OrderData::where('shop_id', $result->shop_id)->where('status', 8)/*->whereDate('created_at', Carbon::today())*/
            ->count();
            $result->today_cancelled = OrderData::where('shop_id', $result->shop_id)->where('status', 6)/*->whereDate('created_at', Carbon::today())*/
            ->count();
        }


        return [
            'status_code' => 200,
            'message' => "Successfully Retrived",
            'results' => $results
        ];
    }

}
