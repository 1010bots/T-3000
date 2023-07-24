<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* Privacy Consent */
Route::get('/you/consent', function () {
    return view('privacy-consent');
});

/* Post Content */
/* (>_ ): Cache for 15 mins */
Route::middleware(
    'cache.headers:public;max_age=900;etag'
)->group(function () {
    /* Home */
    Route::get('/', function () {
        if (Request::query('p') != null) return (new BlogPostController())->show(Request::query('p'));
        return view('welcome');
    })->name('home');

    /* oEmbed */
    Route::get('/oembed', 'App\Http\Controllers\BlogPostController@oEmbed');
    Route::get('/wp-json/oembed/1.0/embed', 'App\Http\Controllers\BlogPostController@oEmbed');
    
    /* WordPress Post Compatibility */
    Route::get('/blog/{year}/{month}/{date}/{slug}', function (string $year, string $month, string $date, string $slug) {
        return (new BlogPostController())->showBySlug($slug, $year, $month, $date);
    });
    
    /* WordPress Post Compatibility */
    Route::get('/{year}/{month}/{date}/{slug}', function (string $year, string $month, string $date, string $slug) {
        return (new BlogPostController())->showBySlug($slug, $year, $month, $date);
    });
    
    /* WordPress Page Compatibility */
    Route::get('/{slug}', function (string $slug) {
        return (new BlogPostController())->showBySlug($slug);
    });
});
    
/* (>_ ): Cache the redirect response for 30 days */
Route::middleware(
    'cache.headers:public;max_age=1800;etag'
)->group(function () {
    /* WordPress Content Compatibility */
    Route::get('/wp-content/{path}', function (string $path) {
        return response()->redirectTo("https://blogarchive.reinhart1010.id/wp-content/$path");
    })->where('wp-content', '.*');
    Route::get('/wp-content/uploads/{year}/{month}/{slug}', function (string $year, string $month, string $slug) {
        return response()->redirectTo("https://blogarchive.reinhart1010.id/wp-content/uploads/$year/$month/$slug");
    })->where('wp-content', '.*');
});
