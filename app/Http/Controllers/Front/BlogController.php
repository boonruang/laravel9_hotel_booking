<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $post_all = Post::orderBy('id','desc')->paginate(6);
        return view('front.blog',compact('post_all'));
    }
}
