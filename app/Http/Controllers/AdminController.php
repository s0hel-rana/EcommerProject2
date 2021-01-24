<?php

namespace App\Http\Controllers;
use DB;
use\App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
 session_start();
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Type $var = null)
    {
        return view('admin_login');
    }

    public function showdashBoard(Type $var = null)
    {
        return view('admin.dashboard');
    }

    public function admindashBoard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('tbl_admin')
        ->where('admin_email',$admin_email)
        ->where('admin_password',$admin_password)
        ->first();

        // echo "<pre>";
        // print_r($result);
        // exit();
        if ($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return redirect('/dashboard');
        }
        else
        {
            Session::put('message','Email or Password id Invalid');
            return redirect('/adminlogin');
        }

    }
}
