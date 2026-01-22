<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('portofolio');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/project', [ProjectController::class, 'index']);

Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');

Route::get('/api/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['id', 'en'])) {
        abort(404);
    }

    app()->setLocale($locale);

    return response()->json(
        trans()->get('*')
    )->withCookie(
        cookie('locale', $locale, 60 * 24 * 365)
    );
});
