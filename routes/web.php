<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\PostController;

Route::view('/', 'welcome')->name('landing');
Route::view('/welcome', 'welcome')->name('welcome');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// เส้นทางเดิมยังคงไว้เพื่อให้ผลงานสะสมจากสัปดาห์ก่อนหน้าเปิดได้
Route::get('/about', [AdminController::class, 'about'])->name('about');
Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
Route::post('/blog', [AdminController::class, 'store'])->name('blog.store');
Route::get('/create', [AdminController::class, 'create'])->name('create');
Route::delete('/delete/{id}', [AdminController::class, 'delete'])->whereNumber('id')->name('blog.delete');

// Week 13: จัดกลุ่มงานผู้เขียนภายใต้คำนำหน้า /author
Route::middleware('auth')->prefix('author')->name('author.')->group(function () {
    Route::get('/about', [AdminController::class, 'about'])->name('about');
    Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/insert', [AdminController::class, 'store'])->name('insert');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->whereNumber('id')->name('edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->whereNumber('id')->name('update');
    Route::patch('/change/{id}', [AdminController::class, 'change'])->whereNumber('id')->name('change');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->whereNumber('id')->name('delete');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/change', [ProductController::class, 'change'])->whereNumber('id')->name('products.change');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->whereNumber('id')->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->whereNumber('id')->name('products.update');

Route::view('/claims/create', 'claims.create')->name('claims.create');
Route::post('/claims', [ClaimController::class, 'store'])->name('claims.store');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/cart', 'cart')->name('cart');
    Route::view('/checkout', 'checkout')->name('checkout');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class)->except(['show', 'create']);
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/student/{id}', function (string $id) {
    return view('student', ['id' => $id]);
})->name('student.profile');

Route::fallback(fn () => response('ไม่พบหน้าเว็บ', 404));