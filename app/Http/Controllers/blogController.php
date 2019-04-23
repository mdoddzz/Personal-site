<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blogPost;

class blogController extends Controller
{
    

    public function blog() 
    {
        return view('blog');
    }

    public function getBlogPost($id) 
    {

        $blogPost = blogPost::findOrFail($id);

        return view('blogPost', [
            'blogPost' => $blogPost
        ]);
    }

}
