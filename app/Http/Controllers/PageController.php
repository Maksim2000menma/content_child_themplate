<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $posts = Post::orderBy('created_at', 'desc')->where('status', 'live')->take(15)->get();
        $pages = Page::orderBy('created_at', 'desc')->where('status', 'live')->take(15)->get();

        return view('welcome', compact('posts', 'pages'));
    }

    public function posts()
    {
        $posts = Post::orderBy('created_at', 'desc')->where('status', 'live')->paginate(15);

        return view('posts', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('status', 'live')->where('slug', $slug)->first();

        if($post) {
            return view('post', compact('post'));
        } else {
            abort(404);
        }
    }

    public function page($slug)
    {
        $page = Page::where('status', 'live')->where('slug', $slug)->first();

        if($page) {
            return view('page', compact('page'));
        } else {
            abort(404);
        }
    }

    public function sitemap()
    {
        $posts = Post::orderBy('created_at', 'desc')->where('status', 'live')->get();
        $content = view('sitemap', compact('posts'))->render();

        return response($content)
            ->header('Content-Type', 'text/xml');
    }
}