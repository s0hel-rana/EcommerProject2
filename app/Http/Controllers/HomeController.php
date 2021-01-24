<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(Type $var = null)
    {
        $show_item = DB::table('products')
        ->join('tbl_caregory', 'products.category_id', '=', 'tbl_caregory.category_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->select('products.*', 'tbl_caregory.category_name', 'brands.brand_name')
        ->where('products.product_status',1)
        ->limit(8)
        ->get();

        $manage_products=view('pages.home_content')
        ->with('product_info', $show_item);
        return view('layout')
        ->with('pages.home_content',$manage_products);
       //return view('pages.home_content');
    }
    public function categoryproduct($category_id)
    {
        $show_item = DB::table('products')
        ->join('tbl_caregory', 'products.category_id', '=', 'tbl_caregory.category_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->select('products.*', 'tbl_caregory.category_name', 'brands.brand_name')
        ->where('products.product_status', 1)
        ->where('tbl_caregory.category_id',$category_id)
        ->limit(15)
        ->get();

        $manage_products = view('pages.categoryproduct')
        ->with('product_category_info', $show_item);
        return view('layout')
        ->with('pages.categoryproduct', $manage_products);
    }
    public function brandproduct($brand_id)
    {
        $show_item = DB::table('products')
        ->join('tbl_caregory', 'products.category_id', '=', 'tbl_caregory.category_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->select('products.*', 'tbl_caregory.category_name', 'brands.brand_name')
        ->where('products.product_status', 1)
        ->where('brands.brand_id', $brand_id)
        ->limit(15)
        ->get();

        $manage_products = view('pages.brandproduct')
        ->with('product_brand_info', $show_item);
        return view('layout')
        ->with('pages.brandproduct', $manage_products);
    }
    public function viewproduct($product_id)
    {
        $show_item = DB::table('products')
        ->join('tbl_caregory', 'products.category_id', '=', 'tbl_caregory.category_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->select('products.*', 'tbl_caregory.category_name', 'brands.brand_name')
        ->where('products.product_status', 1)
        ->where('products.product_id', $product_id)
        ->get();

        $manage_products = view('pages.product_details')
        ->with('product_details_info', $show_item);
        return view('layout')
        ->with('pages.product_details', $manage_products);
    }
}
