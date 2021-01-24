<?php

namespace App\Http\Controllers;
use Str;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

session_start();

class SliderController extends Controller
{
    public function addsliders(Type $var = null)
    {
        return view('admin.addslider');
    }
    public function savesliders(Request $request)
    {
        $data = array();
        $data['slider_name'] = $request->slider_name;
        $data['slider_title'] = $request->slider_title;
        $data['slider_description'] = $request->slider_description;
        $data['slider_status'] = $request->slider_status;
        $image = $request->file('slider_image');
        if ($image) {
            $image_name=Str::random(32);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path = 'slider_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['slider_image'] = $image_url;
                DB::table('sliders')->insert($data);
                Session::put('message', 'sliders added succesfully');
                return Redirect('/addslider');
            }
        }
        $data['slider_image'] = '';
        DB::table('sliders')->insert($data);
        Session::put('message', 'sliders added successfully without image');
        return Redirect('/addslider');
    }
    public function allsliders(Type $var = null)
    {
        $posts=DB::table('sliders')
        ->get();
        return view('admin.allslider',compact('posts'));
    }
    public function activeslider($slidert_id)
    {
        DB::table('sliders')
            ->where('slidert_id', $slidert_id)
            ->update(['slider_status' => 1]);
        Session::put('message', 'slider active successfully');
        return redirect('/allslider');
    }
    public function inactiveslider($slidert_id)
    {
        DB::table('sliders')
            ->where('slidert_id', $slidert_id)
            ->update(['slider_status' => 0]);
        Session::put('message', 'slider inactive successfully');
        return redirect('/allslider');
    }
    public function editslider($slidert_id)
    {
        $post = DB::table('sliders')
                ->where('slidert_id', $slidert_id)
                ->first();
        $manage = view('admin.editslider')->with('post', $post);

        return view('admin_layout')->with('admin.editslider', $manage);
    }
    public function updateslider(Request $request, $slidert_id)
    {
        $data = array();
        $data['slider_name'] = $request->slider_name;
        $data['slider_title'] = $request->slider_title;
        $data['slider_description'] = $request->slider_description;
        $data['slider_status'] = $request->slider_status;
        $image = $request->file('slider_image');
        if ($image) {
            $image_name = Str::random(32);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'slider_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['slider_image'] = $image_url;
                DB::table('sliders')
                ->where('slidert_id', $slidert_id)
                ->update($data);
                Session::put('message', 'sliders added succesfully');
                return Redirect('/addslider');
            }
        }
                $data['slider_image'] = '';
                DB::table('sliders')
                ->where('slidert_id', $slidert_id)
                ->update($data);
                Session::put('message', 'sliders added successfully without image');
                return Redirect('/addslider');
    }
    public function deleteslider($slidert_id)
    {
        DB::table('sliders')->where('slidert_id', $slidert_id)->delete();
        Session::put('message', 'slider delete successfully');
        return redirect('/allslider');
    }
    

}
