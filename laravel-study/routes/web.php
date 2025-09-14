<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HiLowController;
use App\Http\Controllers\PhotoController;

Route::get('/hello-world', function () {
    return view('hello_world', [
        'name' => '佐藤',
        'course' => 'Laravel Basics'
    ]);
});

Route::get('/', function () {
    return view('index', [
        'name' => '佐藤',
        'course' => 'Laravel Basics'
    ]);
});

Route::get('/curriculum', function () {
    return view('curriculum');
});

// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldTime']);

// おみくじ
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyHall']);

Route::get('/form', [RequestSampleController::class, 'form']);
Route::get('/query-strings', [RequestSampleController::class, 'queryStrings']);

Route::get('/users/{id}', [RequestSampleController::class, 'profile'])->name('profile');
Route::get('/products/{category}/{year}', [RequestSampleController::class, 'productArchive']);
Route::get('/route-link', [RequestSampleController::class, 'routeLink'])->name('route-link');

Route::get('/login', [RequestSampleController::class, 'loginForm'])->name('login-form');
Route::post('/login', [RequestSampleController::class, 'login'])->name('login');

Route::resource('/events', EventController::class)->only(['create', 'store']);

Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low.index');

// ハイローゲーム
Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HiLowController::class, 'result']);

// ファイル登録機能
Route::resource('/photos', PhotoController::class)->only(['create','store','show','destroy']);
Route::get('/photos/{photo}/download', [PhotoController::class, 'download'])->name('photos.download');
