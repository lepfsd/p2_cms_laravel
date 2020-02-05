<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class WelcomeController extends Controller
{
    
    public function index()
    {

        $search = request()->query('search');
        if($search) {
            $posts = Post::where('name', 'LIKE', "%{$search}%")->simplePaginate(3);
        } else {
            $posts = Post::simplePaginate(2);
        }

        return view('welcome')
            ->with('categories', Category::all())
            ->with('tags', tag::all())
            ->with('posts', $posts);
    }
}
