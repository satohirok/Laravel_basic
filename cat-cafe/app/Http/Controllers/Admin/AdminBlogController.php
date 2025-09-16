<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    // ブログ一覧表示
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index',['blogs' => $blogs]);
    }

    // ブログ投稿画面
    public function create()
    {
        return view('admin.blogs.create');
    }

    // ブログ投稿処理
    public function store(StoreBlogRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('blogs', 'public');
        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'ブログを登録しました。');
    }

    public function edit(int $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', ['blog' => $blog]);
    }
}
