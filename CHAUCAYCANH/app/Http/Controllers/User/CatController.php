<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function showcategoryhome($CatID){
        $category = DB::table('category')->select('CatID','CatName')->get(); 
        $featured = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Hàng mới về')->get(); 
        $bestsell = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Bán chạy')->get(); 
        $catID = DB::table('product1')
        ->join('category', 'product1.CatID', '=', 'category.CatID')
        ->where('product1.CatID', $CatID)->get(); 
        $catName = DB::table('category')->where('category.CatID',$CatID)->limit(1)->get();
        return view('User.Category.showcategory', compact('category','featured','bestsell','catID','catName'));
    }
}
