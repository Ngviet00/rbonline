<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapperController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;

Auth::routes();

Route::get('/admin/login', [LoginController::class, 'showLoginForm']);

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('rules', [HomeController::class, 'rules'])->name('rules');

    Route::get('listChappers', [ChapperController::class, 'listChappers'])->name('listChappers');

    Route::resource('/category', CategoryController::class);

    Route::delete('deleteManyCategory', [CategoryController::class,'deleteManyCategory'])->name('deleteManyCategory');

    Route::delete('/deleteManyChappers', [ChapperController::class,'deleteManyChappers'])->name('deleteManyChappers');

    Route::resource('/book', BookController::class);

    Route::resource('book.chappers', ChapperController::class);

});

Route::get('/',[IndexController::class,'index']);

Route::get('search',[IndexController::class,'search'])->name('search');

Route::get('category/{slug}',[IndexController::class,'category'])->name('categoryBySlug');

Route::get('detail/{slug_book}',[IndexController::class,'show'])->name('detail');

Route::get('detail/{slug_book}/{slug_chapper}',[IndexController::class,'chapper'])->name('chapper');

Route::get('filter',[IndexController::class,'filter'])->name('filter');
