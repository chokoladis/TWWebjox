<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ADmin\FileController;
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

    Route::middleware('right.adminPanel')->group(function () { // for editors

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        Route::prefix('admin')->group(function () {

            Route::get('/post/', [AdminPostController::class, 'index'])->name('admin.post.index');
            Route::get('/post/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
            Route::post('/post/{post}/update', [AdminPostController::class, 'update'])->name('admin.post.update');


            Route::middleware('right.root')->group(function () { // for admins-root
                
                Route::get('/post/create', [AdminPostController::class, 'create'])->name('admin.post.create');
                Route::post('/post/store', [AdminPostController::class, 'store'])->name('admin.post.store');
                
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
});

require __DIR__.'/auth.php';
