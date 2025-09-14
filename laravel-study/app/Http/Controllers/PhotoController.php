<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * アップロード画面
     */
    public function create()
    {
        return view('photos.photosCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $saveFilePath = $request->file('image')->store('photos', 'public');
        Log::debug($saveFilePath);
        $fileName = pathinfo($saveFilePath, PATHINFO_BASENAME);

        return to_route('photos.show',['photo' => $fileName])->with('success', 'アップロードしました');
    }


    public function show(string $fileName)
    {
        return view('photos.photosShow', ['fileName' => $fileName]);
    }

    public function destroy(string $fileName)
    {
        Storage::disk('public')->delete('photos/' . $fileName);
        return to_route('photos.create')->with('success', '削除しました');
    }

    public function download(string $fileName)
    {
        return Storage::disk('public')->download('photos/'.$fileName,'アップロード画像.jpg');
    }
}
