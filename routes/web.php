<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\FileController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post/', [PostController::class, 'index'])->name('post.index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('rights')->group(function () { // for editors //todo rights

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        Route::prefix('admin')->group(function () {

            Route::get('/post/', [AdminController::class, 'post'])->name('admin.post.index');
            Route::get('/post/{post}/edit', [AdminController::class, 'postEdit'])->name('admin.post.edit');
            Route::post('/post/{post}/update', [AdminController::class, 'postUpdate'])->name('admin.post.update');

            // for admin
            Route::get('/post/create', [AdminController::class, 'postsCreate'])->name('admin.post.create');
            Route::post('/post/store', [AdminController::class, 'postsStore'])->name('admin.post.store');
            
            
            // Route::get('/file/', [FileController::class, 'index'])->name('file.index');
            Route::get('/file/upload-file', [FileController::class, 'create'])->name('file.create');
            Route::post('/file/upload-file', [FileController::class,'store'])->name('file.store');
            // Route::get('/file/{file}/', [FileController::class, 'detail'])->name('file.detail');

            // Route::get('/category/', [CategoryController::class, 'index'])->name('category.index');
            // Route::get('/category/add', [CategoryController::class, 'create'])->name('category.create');
            // Route::post('/category/add', [CategoryController::class, 'store'])->name('category.store');
            // Route::get('/category/{category}', [CategoryController::class, 'detail'])->name('category.detail');
        });
        
    });
});

require __DIR__.'/auth.php';
