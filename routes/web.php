<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\RolePermission\RoleController;
use App\Http\Controllers\User\RolePermission\PermissionController;
use App\Http\Controllers\User\User\UserController;
use App\Http\Controllers\User\Blog\KategoriController as KategoriBlogController;
use App\Http\Controllers\User\Blog\BlogController;
use App\Http\Controllers\User\Gallery\KategoriController as KategoriGalleryController;
use App\Http\Controllers\User\Gallery\GalleryController;
use App\Http\Controllers\User\Crud\CrudController;

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

Auth::routes();

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => 'auth'
], function(){
    Route::get('/', function(){return redirect()->route('dashboard.index');});
    Route::get('/index', [HomeController::class, 'index'])->name('index');
    // Role
    Route::group([
        'prefix' => 'role',
        'as' => 'role.'
    ], function(){
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/data', [RoleController::class, 'data'])->name('data');
        Route::get('/{id}', [RoleController::class, 'show'])->name('show');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('destroy');
    });
    // Permission
    Route::group([
        'prefix' => 'permission',
        'as' => 'permission.'
    ], function(){
        Route::get('/{id}', [PermissionController::class, 'index'])->name('index');
        Route::post('/{id}/store', [PermissionController::class, 'store'])->name('store');
    });
    // User
    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/data', [UserController::class, 'data'])->name('data');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });
    // Blog
    Route::group([
        'prefix' => 'kategori-blog',
        'as' => 'kategori-blog.'
    ], function(){
        Route::get('/', [KategoriBlogController::class, 'index'])->name('index');
        Route::get('/data', [KategoriBlogController::class, 'data'])->name('data');
        Route::get('/{id}', [KategoriBlogController::class, 'show'])->name('show');
        Route::post('/store', [KategoriBlogController::class, 'store'])->name('store');
        Route::delete('/{id}', [KategoriBlogController::class, 'destroy'])->name('destroy');
    });
    Route::group([
        'prefix' => 'blog',
        'as' => 'blog.'
    ], function(){
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/data', [BlogController::class, 'data'])->name('data');
        Route::get('/{id}', [BlogController::class, 'show'])->name('show');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::delete('/{id}', [BlogController::class, 'destroy'])->name('destroy');
    });
    // Crud
    Route::group([
        'prefix' => 'crud',
        'as' => 'crud.'
    ], function(){
        Route::get('/', [CrudController::class, 'index'])->name('index');
        Route::get('/data', [CrudController::class, 'data'])->name('data');
        Route::get('/{id}', [CrudController::class, 'show'])->name('show');
        Route::post('/store', [CrudController::class, 'store'])->name('store');
        Route::delete('/{id}', [CrudController::class, 'destroy'])->name('destroy');
    });
});

// Filemanager
Route::group([
    'prefix' => 'dashboard/filemanager', 'middleware' => [
        'web',
        'permission:filemanager-index|filemanager-store|filemanager-update|filemanager-destroy'
    ]
], function () {
    Lfm::routes();
});
