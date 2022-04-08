<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;

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
        //mail
        $subscribers=$blog->subscribers->filter(fn ($subscriber) => $subscriber->id!=auth()->id());
        $subscribers->each(function ($subscriber) use ($blog)
        {
            Mail::to($subscriber->email)->send(new SubscriberMail($blog));
        });

        return redirect('/blogs/'.$blog->slug);
    }
}
