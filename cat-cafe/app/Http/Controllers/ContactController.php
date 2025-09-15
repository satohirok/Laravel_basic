<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ContactRequest;

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

    public function sendMail(ContactRequest $request)
    {
        $validated = $request->validated();

        Log::debug("{$validated['name']}様からお問い合わせがありました。");
        return redirect()->route('contact.complete');
    }
}
