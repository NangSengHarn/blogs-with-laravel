<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    public function index(){
        
        return view('blogs',[
            'blogs'=>Blog::latest()->filter(request(['search','category','username']))->get()
        ]);
    }
    public function show(Blog $blog){
        return view('blog',[
            'blog'=>$blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
        ]);
    }
}
