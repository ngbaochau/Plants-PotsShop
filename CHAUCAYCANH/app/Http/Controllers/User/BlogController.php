<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $blogs = DB::table('blog')->select('BlogID','Name', 'Description', 'Image', 'Create_at')->limit(3)->get();
        return view('User.Blog.showblog',compact('blogs'));
    }
    public function blogdetails($BlogID){
        $detailsblog = DB::table('blog')
                        ->select('BlogID','Name', 'Description', 'Image','Detail', 'Create_at')
                        ->where('BlogID', $BlogID)
                        ->first();
        return view('User.Blog.blogdetails', compact('detailsblog'));
    }
    
    public function saveblog(){
       
    }
}
