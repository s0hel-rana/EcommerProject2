<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\compact;

session_start();

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.addcategory');
    }
    public function savecategory(Request $request)
    {
        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['category_status']=$request->category_status; 

        DB::table('tbl_caregory')->insert($data);
        Session::put('message','Category added successfully');
        return redirect('/Add_category');
    }
     public function allcategory(Type $var = null)
     { 
         $posts=DB::table('tbl_caregory')->get();
         return view('admin.allcategory',compact('posts'));
     }
     public function activecategory($category_id)
     {
         DB::table('tbl_caregory')
            ->where('category_id',$category_id)
            ->update(['category_status'=>1]);
        Session::put('message', 'Category active successfully');
        return redirect('/all_category');
     }
     public function inactivecategory($category_id)
     {
        DB::table('tbl_caregory')
            ->where('category_id', $category_id)
            ->update(['category_status' => 0]);
        Session::put('message', 'Category inactive successfully');
        return redirect('/all_category');
     }
     public function editcategory($category_id)
     {
         $post=DB::table('tbl_caregory')
            ->where('category_id', $category_id)
            ->first();
            $manage=view('admin.edit')->with('posts', $post);

            return view('admin_layout')->with('admin.edit', $manage);
            
     }
     public function updatecategory(Request $request, $category_id)
     {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;

        DB::table('tbl_caregory')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Category update successfully');
        return redirect('/all_category');
     }
     public function deletecategory($category_id)
     {
         DB::table('tbl_caregory')->where('category_id', $category_id)->delete();
        Session::put('message', 'Category delete successfully');
        return redirect('/all_category');
     }
     
}
