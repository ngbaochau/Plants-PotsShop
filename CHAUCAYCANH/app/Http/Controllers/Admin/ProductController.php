<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
// use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function kiemtralogin(){
        $id =  Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function addproduct(){
        $this->kiemtralogin();
        $catproduct = DB::table('category')->orderBy('CatID','desc')->get();  //lấy dữ liệu từ bảng category 
        $brand = DB::table('brand')->orderBy('BrID','desc')->get();            //lấy dữ liệu từ bảng brand 
        return view('Admin.Product.addproduct')->with('catproduct', $catproduct )->with('brand', $brand);
      
    }
    public function allproduct(){
        $this->kiemtralogin();
        $allproduct = DB::table('product1')
        ->join('category', 'category.CatID', '=', 'product1.CatID')
        ->join('brand', 'brand.BrID', '=', 'product1.BrID')
        ->get();
        $managerproduct = view('Admin.Product.allproduct')->with('allproduct', $allproduct);
        return view('Admin.home')->with('Admin.allproduct', $managerproduct);
    }
    public function saveproduct(Request $request){
        $this->kiemtralogin();
        $data = array();
        $data['ProName'] = $request->input('name_product');
        $data['ProDescription'] = $request->input('desc_product');
        $data['ProContent'] = $request->input('content_product');
        $data['Cost'] = $request->input('cost_product');
        $data['Status'] = $request->input('status_product');
        $data['BrID'] = $request->input('brand_product');
        $data['CatID'] = $request->input('cat_product');
        $data['Quantity'] = $request->input('size_product');
        $data['Displayhome'] = $request->input('display_product');
        $get_image = $request->file('image_product');
            if ($get_image) {
              // Tạo một chuỗi duy nhất bằng cách sử dụng timestamp
                $file_name = time() . '.' . $get_image->getClientOriginalExtension();
                $new_image = $file_name;
                $get_image->move('./Admin/uploads/product',$new_image);
                $data['ProImage'] = $new_image;
                    // Lưu trữ tập tin hoặc thực hiện xử lý khác
                    DB::table('product1')->insert($data);
                    Session::put('message', 'Thêm sản phẩm thành công');
                    return Redirect::to('allproduct');
                }
                $data['ProImage'] = '';  
                  
        //lấy nhiều ảnh
       
        
        // Lưu trữ dữ liệu vào cơ sở dữ liệu
        DB::table('product1')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('allproduct');
    }
    public function unactive_product($ProID){
        $this->kiemtralogin();
        DB::table('product1')->where('ProID', $ProID)->update(['Status' => "1"]);
        Session::put('message', 'Hiển thị sản phẩm thành công');
        return Redirect::to('allproduct');


    }
    public function active_product($ProID){
        $this->kiemtralogin();
        DB::table('product1')->where('ProID', $ProID)->update(['Status' => "0"]);
        Session::put('message', 'Ẩn sản phẩm thành công');
        return Redirect::to('allproduct');

    }
        public function editproduct($ProID){
        $this->kiemtralogin();
        $catproduct = DB::table('category')->orderBy('CatID','desc')->get();  //lấy dữ liệu từ bảng category 
        $brand = DB::table('brand')->orderBy('BrID','desc')->get();            //lấy dữ liệu từ bảng brand 
        $editproduct =  DB::table('product1')->where('ProID',$ProID)->get();
        $managerproduct = view('Admin.Product.editproduct')->with('editproduct', $editproduct)->with('catproduct', $catproduct )->with('brand', $brand);
        return view('Admin.home')->with('Admin.editproduct', $managerproduct);
        

    }
    public function deleteproduct($ProID){
        $this->kiemtralogin();
        DB::table('product1')->where('ProID',$ProID)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('allproduct');
    }
    public function updateproduct(Request $request, $ProID){
        $this->kiemtralogin();
        $data = array();
        $data['ProName'] = $request->input('name_product');
        $data['ProDescription'] = $request->input('desc_product');
        $data['ProContent'] = $request->input('content_product');
        $data['Cost'] = $request->input('cost_product');
        $data['Status'] = $request->input('status_product');
        $data['BrID'] = $request->input('brand_product');
        $data['CatID'] = $request->input('cat_product');
        $data['Quantity'] = $request->input('size_product');
        $data['Displayhome'] = $request->input('display_product');
    
        $get_image = $request->file('image_product');
        if ($get_image) {
            $file_name = time() . '.' . $get_image->getClientOriginalExtension();
            $new_image = $file_name;
            $get_image->move('Admin/uploads/product', $new_image);
            $data['ProImage'] = $new_image;
        }
    
        // Cập nhật dữ liệu vào cơ sở dữ liệu
        DB::table('product1')->where('ProID', $ProID)->update($data);
    
        Session::put('message', 'Sửa sản phẩm thành công');
    
        // Chuyển hướng đến trang sau khi sửa sản phẩm thành công
        return Redirect::to('allproduct');   
            
    }
   
    
}
