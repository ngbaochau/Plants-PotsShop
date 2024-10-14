<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();
class CartController extends Controller
{
    public function savecart(Request $request){
        // Lấy giá trị của 'proID_hidden' và 'soluong' từ request
        $proID = $request->input('proID_hidden');
        $soluong = $request->input('soluong');
        // Truy vấn dữ liệu từ bảng 'product1' với điều kiện là 'ProID' = $proID
        $pro_info = DB::table('product1')->where('ProID', $proID)->first();
        // Cart::destroy();
        $data['id'] = $pro_info->ProID;
        $data['qty'] = $soluong;
        $data['name'] = $pro_info->ProName;
        $data['price'] = $pro_info->Cost;
        $data['weight'] = $pro_info->Status;
        $data['options']['image'] = $pro_info->ProImage;
        Cart::add($data);
        return Redirect::to('/showcart');
    }
    public function showcart(){
        $category = DB::table('category')->select('CatID','CatName')->get(); 
        $featured = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Hàng mới về')->get(); 
        $bestsell = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Bán chạy')->get(); 
        return view('User.Cart.showcart', compact('category','featured','bestsell'));
    }
    public function delete_cart($rowId){
       Cart::update($rowId,0);
       return Redirect::to('/showcart');
    }
    public function update_sluongcart(Request $request){
        $rowId = $request->rowId_cart;
        $sluong = $request->quantity;
        Cart::update($rowId,$sluong);
        return Redirect::to('/showcart');
    }
}
