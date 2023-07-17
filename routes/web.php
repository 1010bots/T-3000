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

Route::get('/', function () {
    if (Request::query('p') != null) return (new BlogPostController())->show(Request::query('p'));
    return view('welcome');
});

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

/* WordPress Post Compatibility */
Route::get('/blog/{year}/{month}/{date}/{slug}', function (string $year, string $month, string $date, string $slug) {
    return (new BlogPostController())->showBySlug($slug, $year, $month, $date);
});

/* WordPress Content Compatibility */
Route::get('/wp-content/{path}', function (string $path) {
    return response()->redirectTo("https://blogarchive.reinhart1010.id/wp-content/$path");
});

/* WordPress Post Compatibility */
Route::get('/{year}/{month}/{date}/{slug}', function (string $year, string $month, string $date, string $slug) {
    return (new BlogPostController())->showBySlug($slug, $year, $month, $date);
});

/* WordPress Page Compatibility */
Route::get('/{slug}', function (string $slug) {
    return (new BlogPostController())->showBySlug($slug);
});
