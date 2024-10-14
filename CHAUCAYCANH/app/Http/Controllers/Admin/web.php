<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;



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
//ADMIN
Route::post('/admin-dashboard',[AdminController::class,'dashboard'])->name('admin-dashboard');
Route::get('/dashboard',[AdminController::class,'showdashboard'])->name('dashboard');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
//ADMIN-CATEGORY
Route::get('/addcategory', [CategoryController::class, 'addcategory'])->name('addcategory');
Route::get('/editcategory/{CatID}', [CategoryController::class, 'editcategory'])->name('editcategory');
Route::get('/deletecategory/{CatID}', [CategoryController::class, 'deletecategory'])->name('deletecategory');
Route::get('/allcategory', [CategoryController::class, 'allcategory'])->name('allcategory');
Route::post('/savecategory', [CategoryController::class, 'savecategory'])->name('savecategory');
Route::post('/updatecategory/{CatID}', [CategoryController::class, 'updatecategory'])->name('updatecategory');
Route::get('/unactive_category/{CatID}', [CategoryController::class, 'unactive_category'])->name('unactive_category');
Route::get('/active_category/{CatID}', [CategoryController::class, 'active_category'])->name('active_category');
//ADMIN BRAND
Route::get('/addbrand', [BrandController::class, 'addbrand'])->name('addbrand');
Route::get('/editbrand/{BrID}', [BrandController::class, 'editbrand'])->name('editbrand');
Route::get('/deletebrand/{BrID}', [BrandController::class, 'deletebrand'])->name('deletebrand');
Route::get('/allbrand', [BrandController::class, 'allbrand'])->name('allbrand');
Route::post('/savebrand', [BrandController::class, 'savebrand'])->name('savebrand');
Route::post('/updatebrand/{BrID}', [BrandController::class, 'updatebrand'])->name('updatebrand');
Route::get('/unactive_brand/{BrID}', [BrandController::class, 'unactive_brand'])->name('unactive_brand');
Route::get('/active_brand/{BrID}', [BrandController::class, 'active_brand'])->name('active_brand');
//ADMIN PRODUCT
Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
Route::get('/editproduct/{ProID}', [ProductController::class, 'editproduct'])->name('editproduct');
Route::get('/deleteproduct/{ProID}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
Route::get('/allproduct', [ProductController::class, 'allproduct'])->name('allproduct');
Route::post('/saveproduct', [ProductController::class, 'saveproduct'])->name('saveproduct');
Route::post('/updateproduct/{ProID}', [ProductController::class, 'updateproduct'])->name('updateproduct');
Route::get('/unactive_product/{ProID}', [ProductController::class, 'unactive_product'])->name('unactive_product');
Route::get('/active_product/{ProID}', [ProductController::class, 'active_product'])->name('active_product');





//USER
Route::get('/index', [HomeController::class, 'index'])->name('index');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/blogdetails', [HomeController::class, 'blogdetails'])->name('blog-details');
Route::get('/shopdetails', [HomeController::class, 'shopdetails'])->name('shopdetails');
Route::get('/detail', [HomeController::class, 'detail'])->name('detail');
Route::get('/shopgrid', [HomeController::class, 'shopgrid'])->name('shopgrid');
Route::get('/shopingcart', [HomeController::class, 'shopingcart'])->name('shopingcart');



