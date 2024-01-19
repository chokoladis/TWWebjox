<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function post(){
        
        $post = Post::all();

        return view('admin.post.index', compact('post'))->name('admin.post.index');
    }
}
