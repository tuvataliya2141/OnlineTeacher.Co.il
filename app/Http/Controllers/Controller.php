<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Cookie; 
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function categoryList()
    {
        $categories = DB::table('category')->where('parent_id', '=', 0)->limit(10)->get();
        return $categories;
    }

    public static function cartProduct()
    {
        if (Auth::user() != '') {
            $user_id = Auth::user()->id;



            $cart_products = DB::table('tbl_cart')->where('user_id', '=', $user_id)->get()->all();

            if (count($cart_products) > 0) {
                foreach ($cart_products as $cart_products_with_img) {
                    $cart_products_with_img->images =
                        DB::table('product_images')
                        ->join('product', 'product.id', 'product_images.product_id')
                        ->join('tbl_cart', 'tbl_cart.product_id', 'product.id')
                        ->select('product_images.*', 'product.name')
                        ->where('tbl_cart.user_id', '=', $cart_products_with_img->user_id)
                        ->where('tbl_cart.product_id', '=', $cart_products_with_img->product_id)
                        ->orderBy('sort_order', 'DESC')
                        ->limit(1)
                        ->get()->all();
                }
            }

            if (count($cart_products) > 0) {
                foreach ($cart_products as $productA) {
                    $productA->slug = DB::table('product')->where('id', $productA->product_id)
                        ->select('slug')
    
                        ->get()->all();
                }
            }

            return $cart_products;
        }
    }

    public static function getState()
    {
        $states = DB::table('tbl_state')->get()->all();
        return $states;
    }
    public static function getwishlist_count()
    {
        if (Auth::user() != '') {
            $user_id = Auth::user()->id;
        $wish_count = DB::table('tbl_wishlist')->where('user_id',$user_id)->count();
        return $wish_count; 
        }
    }

    public static function top_product()
    {
        $top_product= DB::table('product as t1')->select("t1.*",
        DB::raw("(SELECT avg(product_review.rating) FROM product_review
                    WHERE product_review.product_id =t1.id
                    GROUP BY product_review.product_id) as product_rating"))
        ->orderBy('product_rating','desc')->limit(10)->get();

        if (count($top_product) > 0) {
            foreach ($top_product as $productA) {
                $productA->images = DB::table('product_images')->where('product_id', $productA->id)
                    ->orderBy('sort_order', 'ASC')
                    ->limit(2)
                    ->get()->all();

                    $productA->average_rate = DB::table('product_review')
                    ->where('product_id', $productA->id)
                    ->groupBy('product_id')
                    ->select(DB::raw('AVG( product_review.rating) as avg_rating'))
                    ->first();
            }
        }

        return $top_product;
    }
}
