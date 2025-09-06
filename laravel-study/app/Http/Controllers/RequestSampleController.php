<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function queryStrings(Request $request)
    {
        $keyword = $request->get('keyword');
        return 'キーワードは' . $keyword . 'です';
    }

    public function profile($id)
    {
        return 'ユーザーIDは' . $id . 'です';
    }

    public function productArchive(Request $request, string $category, int $year)
    {
        // $category = $request->get('category');
        // $year = $request->get('year');
        return 'カテゴリは' . $category . '、年は' . $year . 'です';
    }

    public function routeLink()
    {
        $url = route('profile', ['id' => 1, 'photos' => 'yes']);
        return 'ルートリンクは' . $url . 'です';
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->get('email') === 'user@example.com' && $request->get('password') === '12345678') {
            return 'ログイン成功';
        }
        return 'ログイン失敗';
    }
}
