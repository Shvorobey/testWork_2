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

Route::get('/', function () { return view('index'); })->name('main');
Route::post('/', '\\' . \App\Http\Controllers\saveFormController::class)->name('save_form');

Route::get('/login', function () { return view('login'); })->name('login');
Route::post('/login', '\\' . \App\Http\Controllers\loginController::class)->name('check_login');

Route::get('/admin', function () { return view('admin'); })->name('admin');
Route::post('/admin', '\\' . \App\Http\Controllers\adminController::class)->name('user_save');

Route::get('/updated', function () { return view('updated'); })->name('updated');
