<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandController extends Controller
{
    public function kiemtralogin(){
        $id =  Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function addbrand(){
        $this->kiemtralogin();
        return view('Admin.Brand.addbrand');
    }
    public function allbrand(){
        $this->kiemtralogin();
        $allbrand =  DB::table('brand')->get();
        $managerbrand = view('Admin.Brand.allbrand')->with('allbrand', $allbrand);
        return view('Admin.home')->with('Admin.Brand.allbrand', $managerbrand);
    }
    public function savebrand(Request $request){
        $this->kiemtralogin();
        $data = array();
        $data['BrName'] = $request->input('name_brand');
        $data['BrDescription'] = $request->input('desc_brand');
        $data['Status'] = $request->input('status_brand');
        DB::table('brand')->insert($data);
        Session::put('message', 'Thêm nhà cung cấp thành công');
        return Redirect::to('addbrand');
    }
    public function unactive_brand($BrID){
        $this->kiemtralogin();
        DB::table('brand')->where('BrID', $BrID)->update(['Status' => "1"]);
        Session::put('message', 'Hiển thị danh mục thành công');
        return Redirect::to('allbrand');


    }
    public function active_brand($BrID){
        $this->kiemtralogin();
        DB::table('brand')->where('BrID', $BrID)->update(['Status' => "0"]);
        Session::put('message', 'Ẩn nhà cung cấp thành công');
        return Redirect::to('allbrand');

    }
    public function editbrand($BrID){
        $this->kiemtralogin();
        $editbrand =  DB::table('brand')->where('BrID',$BrID)->get();
        $managerbrand = view('Admin.Brand.editbrand')->with('editbrand', $editbrand);
        return view('Admin.home')->with('Admin.Brand.editbrand', $managerbrand);
        

    }
    public function deletebrand($BrID){
        $this->kiemtralogin();
        DB::table('brand')->where('BrID',$BrID)->delete();
        Session::put('message', 'Xóa nhà cung cấp thành công');
        return Redirect::to('allbrand');
    }
    public function updatebrand(Request $request, $BrID){
        $this->kiemtralogin();
        $data = array();
        $data['BrName'] = $request->input('name_brand');
        $data['BrDescription'] = $request->input('desc_brand');
        DB::table('brand')->where('BrID',$BrID)->update($data);
        Session::put('message', 'Sửa nhà cung cấp thành công');
        return Redirect::to('allbrand');
    }
    
}
