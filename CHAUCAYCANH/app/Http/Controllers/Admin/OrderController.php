<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class OrderController extends Controller
{
    public function kiemtralogin(){
        $id =  Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function manage_order(){
        $this->kiemtralogin();
        $allorder = DB::table('order')
        ->join('customers', 'order.CusID', '=', 'customers.CusID')
        ->select('order.*', 'customers.CusName')   ///chọn tất cả từ table order
        ->orderby('order.OrderID','desc')->get();
        $manager_order = view('Admin.Order.manage_order')->with('allorder', $allorder);
        return view('Admin.home')->with('Admin.Order.manage_order',$manager_order);
    }
    public function view_order($OrderID){
        $this->kiemtralogin();
        $order_by_id = DB::table('order')
        ->join('customers', 'order.CusID', '=', 'customers.CusID')
        ->join('shipping', 'order.ShipID', '=', 'shipping.ShipID')
        ->join('order_details', 'order.OrderID', '=', 'order_details.OrderID')
        ->select('order.*', 'customers.*','shipping.*','order_details.*')   ///chọn tất cả từ table order-customers
        ->first();
        $manager_order_by_id = view('Admin.Order.view_order')->with('order_by_id', $order_by_id);
        return view('Admin.home')->with('Admin.Order.view_order',$manager_order_by_id);
    }
}
