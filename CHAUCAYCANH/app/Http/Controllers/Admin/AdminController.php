<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session as SessionSession;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function kiemtralogin(){
        $id =  Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function login(){
        return  view('Admin.login');
    }
    
    public function showdashboard(){
        $this->kiemtralogin();
        return view('Admin.dashboard');
    }
  

    public function dashboard(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $result = DB::table('tbl_admin')->where('email', $email)->where('password', $password)->first();
        if($result){
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Vui long kiem tra lai thong tin dang nhap');
            return Redirect::to('/login');
        }

    }
    public function logout(){
        $this->kiemtralogin();
        Session::put('name', null);
        Session::put('id', null);
        return  view('Admin.login');
    }
    
}




