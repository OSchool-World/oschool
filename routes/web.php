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

Route::get('/ui-kit-overview', function () {
    return view('oschool-ui-kit-overview');
})->name('ui-kit-overview');

Route::get('/', function () {
    return view('main-dashboard.index');
})->name('main-dashboard');