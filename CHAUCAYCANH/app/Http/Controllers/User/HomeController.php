<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $category = DB::table('category')->select('CatID','CatName')->get(); 
        $featured = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Hàng mới về')->get(); 
        $bestsell = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Bán chạy')->get(); 
        return view('User.home', compact('category','featured','bestsell'));
    }
    public function search(Request $request){
        $category = DB::table('category')->select('CatID','CatName')->get(); 
        $featured = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Hàng mới về')->get(); 
        $bestsell = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Bán chạy')->get(); 
        $key = $request->key_submit;
        $search_product = DB::table('product1')->where('ProName','like','%'.$key.'%')->get();
        return view('User.Product.search', compact('category','featured','bestsell','search_product'));
    }
    public function shop(){
        
            $category = DB::table('category')->select('CatID','CatName')->get(); 
            $featured = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Hàng mới về')->get(); 
            $bestsell = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Bán chạy')->get(); 
           
            return view('User.Shop.showshop',compact('category','featured','bestsell'));
    }
    public function contact(){
       
        return view('User.Contact.showcontact');
    }
    

}
