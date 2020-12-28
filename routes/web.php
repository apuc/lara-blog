<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::post('/search/', [SiteController::class, 'search'])->name('site.search');

Route::get('/post/{id}/', [SiteController::class, 'post'])->name('site.post');

//Route::get('/like/{id}/', [SiteController::class, 'postLike'])->name('site.postLike');

Route::get('/category/{id}/', [SiteController::class, 'category'])->name('site.category');

Route::get('/tag/{id}/', [SiteController::class, 'tag'])->name('site.tag');

Route::get('/post/{id}/', [SiteController::class, 'post'])->name('site.post');

Route::post('/comment/store/{id}', [SiteController::class, 'commentStore'])->name('site.commentStore');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

require __DIR__.'/app.php';
