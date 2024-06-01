<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    // 認証されたユーザーの情報を取得
    return $request->user();
});

// http://localhost:8080/api
Route::get('/', function () {
    return [
        'Auth::user()' => Auth::user(),
        'Auth::id()' => Auth::id(),
        'Laravel-Version' => app()->version(),
        'message' => 'Hello, World!',
        'status' => 'OK',
        'timestamp' => now()
    ];
});

require __DIR__ . '/auth.php';
