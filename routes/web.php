<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ProjectController;


Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('projects', ProjectController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/about', [HomeController::class, 'Showabout'])->name('About');
Route::get('/project', [HomeController::class, 'Showproject'])->name('Project');
Route::get('/contact', [HomeController::class, 'Showcontact'])->name('Contact');

// Route::get('/login', [AuthController::class, 'Showlogin']);
// Route::post('/login', [AuthController::class, 'Storelogin']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pages.project', [ProjectController::class, 'index']);

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
