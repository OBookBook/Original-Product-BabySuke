<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    // 認証されたユーザーの情報を取得
    return $request->user();
});

// http://localhost:8080/api
Route::get('/', function () {
    return [
        'Laravel-Version' => app()->version(),
        'message' => 'Hello, World!',
        'status' => 'OK',
        'timestamp' => now()
    ];
});

require __DIR__ . '/auth.php';
