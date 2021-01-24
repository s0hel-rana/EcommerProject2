<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

session_start();

class BrandController extends Controller
{
    public function addbrands(Type $var = null)
    {
        return view('admin.addbrand');
    }
    public function savebrands(Request $request)
    {
        $data = array();
        // $data['brand_id'] = $request->brand_id;
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;
        $data['brand_status'] = $request->brand_status;

        DB::table('brands')->insert($data);
        Session::put('message', 'brand added successfully');
        return redirect('/addbrand');
    }
    public function allbrands(Type $var = null)
    {
        $posts = DB::table('brands')->get();
        return view('admin.allbrand', compact('posts'));
    }
    public function activebrand($brand_id)
    {
        DB::table('brands')
        ->where('brand_id', $brand_id)
            ->update(['brand_status' => 1]);
        Session::put('message', 'brand active successfully');
        return redirect('/allbrand');
    }
    public function inactivebrand($brand_id)
    {
        DB::table('brands')
        ->where('brand_id', $brand_id)
        ->update(['brand_status' => 0]);
        Session::put('message', 'brand inactive successfully');
        return redirect('/allbrand');
    }
    public function editbrand($brand_id)
    {
        $post = DB::table('brands')
        ->where('brand_id', $brand_id)
        ->first();
        $manage = view('admin.brandedit')->with('posts', $post);

        return view('admin_layout')->with('admin.brandedit', $manage);
    }
    public function updatebrand(Request $request, $brand_id)
    {
        $data = array();
        $data['brand_id'] = $request->brand_id;
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;

        DB::table('brands')->where('brand_id', $brand_id)->update($data);
        Session::put('message', 'brand update successfully');
        return redirect('/allbrand');
    }
    public function deletebrand($brand_id)
    {
        DB::table('brands')->where('brand_id', $brand_id)->delete();
        Session::put('message', 'brand delete successfully');
        return redirect('/allbrand');
    }
}
