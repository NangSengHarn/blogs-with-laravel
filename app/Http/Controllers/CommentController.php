<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class CommentController extends Controller
{
    public function store(Blog $blog){
        request()->validate([
            'body'=>'required|min:3'
        ]);
        //comment store
        $blog->comments()->create([
            'user_id'=>auth()->id(),
            'body'=>request('body')
        ]);
        return redirect('/blogs/'.$blog->slug);
    }
}
