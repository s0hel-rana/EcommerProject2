<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });
 //show product_category
Route::get('/category_with_product/{category_id}',[HomeController::class,'categoryproduct'])->name('categorywith.product');
//show product_brand
Route::get('/brand_with_product/{category_id}',[HomeController::class,'brandproduct'])->name('brandwith.product');

Route::get('/view_with_product/{category_id}',[HomeController::class,'viewproduct'])->name('view.product');


 Route::get('/',[HomeController::class,'index'])->name('home.index');

 Route::get('/adminlogin',[AdminController::class,'index'])->name('admin.index');

 Route::get('/dashboard',[AdminController::class,'showdashBoard'])->name('show.dashboard');

 Route::post('/admin_dashboard',[AdminController::class,'admindashBoard'])->name('admin.dashboard'); 

 Route::get('/Logout',[SuperAdminController::class,'Logout'])->name('admin.logout'); 

 //Category

 Route::get('/Add_category',[CategoryController::class,'index'])->name('add.category'); 

 Route::post('/save_category',[CategoryController::class,'savecategory'])->name('save.category'); 

 Route::get('/all_category',[CategoryController::class,'allcategory'])->name('all.category'); 

 Route::get('/active_category/{category_id}',[CategoryController::class, 'activecategory'])->name('active.category'); 

 Route::get('/inactive_category/{category_id}',[CategoryController::class, 'inactivecategory'])->name('inactive.category'); 

 Route::get('/edit_category/{category_id}',[CategoryController::class, 'editcategory'])->name('edit.category'); 

 Route::post('/update_category/{category_id}',[CategoryController::class, 'updatecategory'])->name('update.category'); 

 Route::get('/delete_category/{category_id}',[CategoryController::class, 'deletecategory'])->name('delete.category'); 

 Route::get('/view_category/{category_id}',[CategoryController::class, 'viewcategory'])->name('view.category'); 

 //Brand

 Route::get('/addbrand',[BrandController::class, 'addbrands'])->name('add.brand'); 

 Route::post('/savebrand',[BrandController::class, 'savebrands'])->name('save.brand'); 

 Route::get('/allbrand',[BrandController::class, 'allbrands'])->name('all.brand'); 

 Route::get('/activebrand/{brand_id}',[BrandController::class, 'activebrand'])->name('active.brand'); 

 Route::get('/inactivebrand/{brand_id}',[BrandController::class, 'inactivebrand'])->name('inactive.brand');

 Route::get('/editbrand/{brand_id}',[BrandController::class, 'editbrand'])->name('edit.brand');

 Route::post('/updatebrand/{brand_id}',[BrandController::class, 'updatebrand'])->name('update.brand');

 Route::get('/deletebrand/{brand_id}',[BrandController::class, 'deletebrand'])->name('delete.brand');

//Product

Route::get('/addproduct', [ProductController::class, 'addproducts'])->name('add.product');

Route::post('/saveproduct', [ProductController::class, 'saveproducts'])->name('save.product');

Route::get('/allproduct', [ProductController::class, 'allproducts'])->name('all.product');

Route::get('/activeproduct/{product_id}', [ProductController::class, 'activeproduct'])->name('active.product');

Route::get('/inactiveproduct/{product_id}', [ProductController::class, 'inactiveproduct'])->name('inactive.product');

Route::get('/editproduct/{product_id}', [ProductController::class, 'editproduct'])->name('edit.product');

Route::post('/updateproduct/{product_id}', [ProductController::class, 'updateproduct'])->name('update.product');

Route::get('/deleteproduct/{product_id}', [ProductController::class, 'deleteproduct'])->name('delete.product');

//Slider

Route::get('/addslider', [SliderController::class, 'addsliders'])->name('add.slider');

Route::post('/saveslider', [SliderController::class, 'savesliders'])->name('save.slider');

Route::get('/allslider', [SliderController::class, 'allsliders'])->name('all.slider');

Route::get('/activeslider/{slider_id}', [SliderController::class, 'activeslider'])->name('active.slider');

Route::get('/inactiveslider/{slider_id}', [SliderController::class, 'inactiveslider'])->name('inactive.slider');

Route::get('/editslider/{slider_id}', [SliderController::class, 'editslider'])->name('edit.slider');

Route::post('/updateslider/{slider_id}', [SliderController::class, 'updateslider'])->name('update.slider');

Route::get('/deleteslider/{slider_id}', [SliderController::class, 'deleteslider'])->name('delete.slider'); 

