<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View { return view('posts.index', ['posts' => Post::query()->where('published', true)->latest()->get()]); }
    public function show(Post $post): View { abort_unless($post->published, 404); return view('posts.show', compact('post')); }
    public function create(): View { return view('posts.create'); }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(['title' => ['required', 'max:255'], 'content' => ['required', 'min:10']]);
        $data['content'] = strip_tags($data['content'], '<p><br><h1><h2><h3><strong><em><u><ul><ol><li><a>');
        $post = Post::create($data + ['published' => true]);
        return redirect()->route('posts.show', $post);
    }
}
