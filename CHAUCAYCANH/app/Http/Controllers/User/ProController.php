<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProController extends Controller
{
    public function detailsproduct($ProID){
        $category = DB::table('category')->select('CatID','CatName')->get(); // lấy danh mục sản phẩm 
        $featured = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Hàng mới về')->get(); // lấy sản phẩm  có trường 'Displayhome', '=', 'Hàng mới về'
        $bestsell = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Bán chạy')->get(); // lấy sản phẩm  có trường 'Displayhome', '=', 'Bán chạy'
        $detailsproduct = DB::table('product1')// lấy chi tiết sản phẩm 
        ->join('category', 'category.CatID', '=', 'product1.CatID')
        ->where('product1.ProID', $ProID)
        ->get();
        foreach ($detailsproduct as $item) {
            $catID = $item->CatID;
        }
        $similarproduct = DB::table('product1')// lấy sản phẩm cùng danh mục
        ->join('category', 'category.CatID', '=', 'product1.CatID')
        ->where('category.CatID', $catID)->whereNotIn('product1.ProID', [$ProID])//[]: mảng // lấy sản phẩm cùng danh mục trừ sản phẩm đang xem
        ->get();
        return view('User.Product.showdetails', compact('category','featured','bestsell','detailsproduct','similarproduct'));
    }
    
}