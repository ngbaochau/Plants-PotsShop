<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
{
    public function kiemtralogin(){
        $id =  Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function addcategory(){
        $this->kiemtralogin();
        return view('Admin.Category.addcategory');
    }
    public function allcategory(){
        $this->kiemtralogin();
        $allcategory =  DB::table('category')->get();
        $managercategory = view('Admin.Category.allcategory')->with('allcategory', $allcategory);
        return view('Admin.home')->with('Admin.Category.allcategory', $managercategory);
    }
    public function savecategory(Request $request){
        $this->kiemtralogin();
        $data = array();
        $data['CatName'] = $request->input('name_category');
        $data['CatDescription'] = $request->input('desc_category');
        $data['Status'] = $request->input('status_category');
        $data['CatImage'] = $request->input('image_category');
        DB::table('category')->insert($data);
        Session::put('message', 'Thêm danh mục thành công');
        return Redirect::to('addcategory');
    }
    public function unactive_category($CatID){
        $this->kiemtralogin();
        DB::table('category')->where('CatID', $CatID)->update(['Status' => "1"]);
        Session::put('message', 'Hiển thị danh mục thành công');
        return Redirect::to('allcategory');


    }
    public function active_category($CatID){
        $this->kiemtralogin();
        DB::table('category')->where('CatID', $CatID)->update(['Status' => "0"]);
        Session::put('message', 'Ẩn danh mục thành công');
        return Redirect::to('allcategory');

    }
    public function editcategory($CatID){
        $this->kiemtralogin();
        $editcategory =  DB::table('category')->where('CatID',$CatID)->get();
        $managercategory = view('Admin.Category.editcategory')->with('editcategory', $editcategory);
        return view('Admin.home')->with('Admin.Category.editcategory', $managercategory);
        

    }
    public function deletecategory($CatID){
        $this->kiemtralogin();
        DB::table('category')->where('CatID',$CatID)->delete();
        Session::put('message', 'Xóa danh mục thành công');
        return Redirect::to('allcategory');
    }
    public function updatecategory(Request $request, $CatID){
        $this->kiemtralogin();
        $data = array();
        $data['CatName'] = $request->input('name_category');
        $data['CatDescription'] = $request->input('desc_category');
        $data['CatImage'] = $request->input('image_category');
        DB::table('category')->where('CatID',$CatID)->update($data);
        Session::put('message', 'Sửa danh mục thành công');
        return Redirect::to('allcategory');
    }
   
}
