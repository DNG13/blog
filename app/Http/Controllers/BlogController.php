<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Post,
    Carbon\Carbon;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $posts = Post::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->paginate(config('blog.posts_per_page'));
        } else {
            $posts = Post::where('created_at', '<=', Carbon::now())
                ->orderBy('created_at', 'desc')
                ->paginate(config('blog.posts_per_page'));
        }

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.post')->withPost($post);
    }
}
