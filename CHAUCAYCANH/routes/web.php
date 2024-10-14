<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\CatController;
use App\Http\Controllers\User\ProController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\BlogController;





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
/////////////////////////----------USER-----///////////////////////
Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);
//SHOP
Route::get('/shop', [HomeController::class, 'shop']);
//CONTACT
Route::get('/contact', [HomeController::class, 'contact']);
//BLOG
Route::get('/blog', [BlogController::class, 'blog']);
Route::get('/blogdetails/{BlogID}', [BlogController::class, 'blogdetails']);
// Route::post('/saveblog', [BlogController::class, 'saveblog']);
//SEARCH
Route::post('/search', [HomeController::class, 'search']);
///DANH MUC SP-HOME
Route::get('/danhmucsanpham/{CatID}', [CatController::class, 'showcategoryhome']);
Route::get('/chitietsanpham/{ProID}', [ProController::class, 'detailsproduct']);
//CART
Route::post('/savecart', [CartController::class, 'savecart']);
Route::get('/showcart', [CartController::class, 'showcart'])->name('showcart');
Route::get('/delete_cart/{rowId}', [CartController::class, 'delete_cart'])->name('delete_cart');
Route::post('/update_sluongcart', [CartController::class, 'update_sluongcart'])->name('update_sluongcart');
//CHECKOUT
Route::get('/login_checkout', [CheckoutController::class, 'login_checkout'])->name('login_checkout');
Route::get('/logout_checkout', [CheckoutController::class, 'logout_checkout'])->name('logout_checkout');
Route::post('/add_customer', [CheckoutController::class, 'add_customer'])->name('add_customer');
Route::post('/login_customer', [CheckoutController::class, 'login_customer'])->name('login_customer');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::post('/save_checkout_customer', [CheckoutController::class, 'save_checkout_customer'])->name('save_checkout_customer');
Route::post('/order_place', [CheckoutController::class, 'order_place'])->name('order_place');
Route::post('/select_delivery_checkout', [CheckoutController::class, 'select_delivery_checkout'])->name('select_delivery_checkout');
Route::post('/calculate_fee', [CheckoutController::class, 'calculate_fee'])->name('calculate_fee');
Route::get('/delete_fee', [CheckoutController::class, 'delete_fee'])->name('delete_fee');
Route::post('/confirm_order', [CheckoutController::class, 'confirm_order'])->name('confirm_order');
Route::get('/cash', [CheckoutController::class, 'cash'])->name('cash');







////////////////////////////-------ADMIN---------////////////////
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/admin-dashboard',[AdminController::class,'dashboard'])->name('admin-dashboard');
Route::get('/dashboard',[AdminController::class,'showdashboard'])->name('dashboard');
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
//ADMIN ORDER
Route::get('/manage_order', [OrderController::class, 'manage_order'])->name('manage_order');
Route::get('/view_order/{OrderID}', [OrderController::class, 'view_order'])->name('view_order');
//DELIVERY
Route::get('/delivery', [DeliveryController::class, 'delivery'])->name('delivery');
Route::post('/select_delivery', [DeliveryController::class, 'select_delivery'])->name('select_delivery');
Route::post('/insert_delivery', [DeliveryController::class, 'insert_delivery'])->name('insert_delivery');
Route::post('/select_feeship', [DeliveryController::class, 'select_feeship'])->name('select_feeship');
Route::post('/update_delivery', [DeliveryController::class, 'update_delivery'])->name('update_delivery');

