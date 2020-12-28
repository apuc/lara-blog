<?php

use App\Http\Controllers\{PostController, CategoryController, CommentController};
use Illuminate\Support\Facades\Route;

Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.list')->middleware('auth');

Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');

Route::post('/admin/posts/store', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/admin/posts/update', [PostController::class, 'update'])->name('posts.update')->middleware('auth');

Route::post('/admin/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');

Route::get('/admin/posts/publish', [PostController::class, 'publish'])->name('posts.publish')->middleware('auth');

Route::get('/admin/posts/show', [PostController::class, 'show'])->name('posts.show')->middleware('auth');

Route::get('/admin/posts/delete', [PostController::class, 'delete'])->name('posts.delete')->middleware('auth');


Route::get('/admin/comments', [CommentController::class, 'index'])->name('comments.list')->middleware('auth');

Route::get('/admin/comments/create', [CommentController::class, 'create'])->name('comments.create')->middleware('auth');

Route::post('/admin/comments/store', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');

Route::get('/admin/comments/publish', [CommentController::class, 'publish'])->name('comments.publish')->middleware('auth');

Route::get('/admin/comments/delete', [CommentController::class, 'delete'])->name('comments.delete')->middleware('auth');


Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.list')->middleware('auth');

Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth');

Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth');

Route::get('/admin/categories/delete', [CategoryController::class, 'delete'])->name('categories.name')->middleware('auth');

