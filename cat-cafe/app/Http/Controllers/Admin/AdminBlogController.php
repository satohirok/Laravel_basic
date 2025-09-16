<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
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

    // ブログ編集画面
    public function edit(int $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    // ブログ更新処理
    public function update(UpdateBlogRequest $request, int $id)
    {
        $blog = Blog::findOrFail($id);
        $validated = $request->validated();

        // 画像がアップロードされた場合のみ保存・更新
        if ($request->has('image')) {
            // 変更前の画像を削除
            Storage::disk('public')->delete($blog->image);
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }
        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'ブログを更新しました。');
    }
}
