<?php

namespace App\Http\Controllers;

use DB;
use \App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function Logout(Type $var = null)
    {
        // Session::put('admin_name',null);
        // Session::put('admin_id',null);

        Session::flush();
        return redirect('/adminlogin');
    }
}
