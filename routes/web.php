<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\RoleMiddleware;


Route::get('/', [HomeController::class, 'index'])->name('home.page');
Route::post('/place/store', [PlaceController::class,'store'])->name('place.store');
Route::get('bookmark/{place_id}', [BookmarkController::class, 'bookmark'])->name('bookmark');
Route::get('bookmarks', [BookmarkController::class, 'getByUser'])->name('bookmarks');
Route::get('/search', [SearchController::class, 'autoComplete'])->name('auto-complete');
Route::post('search', [SearchController::class, 'show'])->name('search');
Route::resource('report', ContactController::class, ['only' => ['create','store']]);
Route::post('like', [LikeController::class,'store'])->name('like.store');
Route::get('/{place}/{slug}', [PlaceController::class, 'show'])->name('place.show');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

Route::middleware([RoleMiddleware::class.':1'])->prefix('admin')->group(function () {
    Route::get('/place/create', [PlaceController::class, 'create'])->name('place.create');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('category.show');