<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Website\Article\ArticleController;
use Illuminate\Support\Facades\Route;

if($this->app->environment('production')) {
    \URL::forceScheme('https');
}
Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'store'])->name('auth.login.process');

Route::get('/', [ArticleController::class, 'index'])->name('.index');
Route::get('/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{slug}', [ArticleController::class, 'category'])->name('article.category');
Route::get('/search', [ArticleController::class, 'search'])->name('article.search');

// clear cache di shared hosting
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!"; 
 });