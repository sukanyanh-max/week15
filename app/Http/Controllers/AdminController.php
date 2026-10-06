<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function about(): View
    {
        return view('about', ['name' => config('student.full_name_th'), 'data' => now()->format('d/m/Y')]);
    }

    public function create(): View
    {
        return view('form');
    }

    public function blog(): View
    {
        return view('blog', ['blogs' => Blog::query()->latest()->paginate(3)]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'status' => ['nullable', 'boolean'],
        ]);
        $data['status'] = $request->boolean('status');
        Blog::create($data);

        return redirect()->route('author.blog')->with('status', 'เพิ่มบทความแล้ว');
    }

    public function edit(int $id): View
    {
        return view('edit', ['blog' => Blog::findOrFail($id)]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'status' => ['nullable', 'boolean'],
        ]);
        $data['status'] = $request->boolean('status');
        Blog::findOrFail($id)->update($data);

        return redirect()->route('author.blog')->with('status', 'แก้ไขบทความแล้ว');
    }

    public function change(int $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['status' => ! $blog->status]);

        return redirect()->route('author.blog')->with('status', 'เปลี่ยนสถานะบทความแล้ว');
    }

    public function delete(int $id): RedirectResponse
    {
        Blog::findOrFail($id)->delete();

        return redirect()->route('author.blog')->with('status', 'ลบบทความแล้ว');
    }
}