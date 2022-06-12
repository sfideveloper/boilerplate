<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/forgot-password', function () {
    return view('auth.password.forgot');
});

Route::get('/reset-password', function () {
    return view('auth.password.reset');
});

Route::get('/verify', function () {
    return view('auth.verify');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/dashboard/profile', function () {
    return view('dashboard.profile.index');
});

Route::get('/dashboard/profile/password', function () {
    return view('dashboard.profile.password');
});

Route::get('/dashboard/user', function () {
    return view('dashboard.user.index');
});

Route::get('/dashboard/role', function () {
    return view('dashboard.user.role');
});

Route::get('/dashboard/permission', function () {
    return view('dashboard.user.permission');
});
