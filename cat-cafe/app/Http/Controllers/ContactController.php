<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function complete()
    {
        return view('contact.complete');
    }

    public function sendMail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'name_kana' => 'required|max:255',
            'email' => 'required|email|max:255',
            'body' => 'required',
        ]);

        // メール送信処理（省略）

        Log::debug("{$validated['name']}様からお問い合わせがありました。");
        return redirect()->route('contact.complete');
    }
}
