<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
session_start();

class ProductController extends Controller
{
    public function addproducts(Type $var = null)
    {
        return view('admin.addproduct');
    }
    public function saveproducts(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_description'] = $request->product_description;
        $data['product_price'] = $request->product_price;
        $data['product_image'] = $request->product_image;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['product_status'] = $request->product_status;
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        // exit();
            $image = $request->file('product_image');
        if ($image) {
            // $image_name=str_random(20);
            $ext = strtolower($image->getClientOriginalName());
            $image_full_name = $ext; //$image_full_name=$image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

        if ($success) {
            $data['product_image'] = $image_url;
            DB::table('products')->insert($data);
            Session::put('message','products added succesfully');
            return Redirect('/addproduct');
                }
            }
            $data['product_image']='';
            DB::table('products')->insert($data);
            Session::put('message','product added successfully without image');
            return Redirect('/addproduct');

    }
    public function allproducts(Type $var = null)
    {
        $posts=DB::table('products')
         ->join('tbl_caregory','products.category_id','=','tbl_caregory.category_id')
         ->join('brands','products.brand_id','=', 'brands.brand_id')
         ->select('products.*','tbl_caregory.category_name', 'brands.brand_name')       
        ->get();
        return view('admin.allproduct',compact('posts'));

    }
    public function activeproduct($product_id)
    {
        DB::table('products')
        ->where('product_id', $product_id)
        ->update(['product_status' => 1]);
        Session::put('message', 'product active successfully');
        return redirect('/allproduct');
    }
    public function inactiveproduct($product_id)
    {
        DB::table('products')
        ->where('product_id', $product_id)
        ->update(['product_status' => 0]);
        Session::put('message', 'product inactive successfully');
        return redirect('/allproduct');
    }
    public function editproduct($product_id)
    {
        $post = DB::table('products')
        ->where('product_id', $product_id)
        ->first();
        $manage = view('admin.editproduct')->with('post', $post);

        return view('admin_layout')->with('admin.editproduct', $manage);

    }
    public function updateproduct(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_description'] = $request->product_description;
        $data['product_price'] = $request->product_price;
        $data['product_image'] = $request->product_image;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['product_status'] = $request->product_status;
        $image = $request->file('product_image');
        if ($image) {
            // $image_name=str_random(20);
            $ext = strtolower($image->getClientOriginalName());
            $image_full_name = $ext; //$image_full_name=$image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

        if ($success) {
            $data['product_image'] = $image_url;
            DB::table('products')->where('product_id',$product_id)->update($data);
            Session::put('message', 'products update succesfully');
            return Redirect('/allproduct');
            }
        }
            $data['product_image'] = '';
            DB::table('products')->where('product_id',$product_id)->update($data);
            Session::put('message', 'product added successfully without image');
            return Redirect('/allproduct');
    }
    public function deleteproduct($product_id)
    {
        DB::table('products')->where('product_id', $product_id)->delete();
        Session::put('message', 'product delete successfully');
        return redirect('/allproduct');
    }

}
