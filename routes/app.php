<?php

use App\Http\Controllers\{PostController, CategoryController, CommentController};
use Illuminate\Support\Facades\Route;

Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.list');

Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/admin/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/admin/posts/update', [PostController::class, 'update'])->name('posts.update');

Route::get('/admin/posts/publish', [PostController::class, 'publish'])->name('posts.publish');

Route::get('/admin/posts/show', [PostController::class, 'show'])->name('posts.show');

Route::get('/admin/posts/delete', [PostController::class, 'delete'])->name('posts.delete');


Route::get('/admin/comments', [CommentController::class, 'index'])->name('comments.list');

Route::get('/admin/comments/create', [CommentController::class, 'create'])->name('comments.create');

Route::post('/admin/comments/store', [CommentController::class, 'store'])->name('comments.store');

Route::get('/admin/comments/publish', [CommentController::class, 'publish'])->name('comments.publish');

Route::get('/admin/comments/delete', [CommentController::class, 'delete'])->name('comments.delete');


Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.list');

Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/admin/categories/delete', [CategoryController::class, 'delete'])->name('categories.name');
