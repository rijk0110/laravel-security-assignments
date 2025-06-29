<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DeliveryController;
use App\Models\Article;

// Publieke homepagina met 3 nieuwste artikelen
Route::get('/', function () {
    $latestArticles = Article::orderBy('published_at', 'desc')->take(3)->get();
    return view('welcome', compact('latestArticles'));
})->name('home');

// Publiek toegankelijke routes
Route::resource('/articles', ArticleController::class);
Route::resource('/deliveries', DeliveryController::class);

// Beveiligde routes – alleen bereikbaar voor ingelogde gebruikers
Route::middleware(['auth'])->group(function () {
    Route::resource('/products', ProductController::class);
    Route::resource('/orders', ProductOrderController::class);
});

// Auth routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Fallback voor niet-bestaande routes
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
