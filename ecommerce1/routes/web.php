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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/news', function () {
    return view('admin.news.list');
});
Route::get('/admin/news/item', function () {
    return view('admin.news.item');
});
Route::get('/admin/news/item/{$id}', function ($id) {
    return view('admin.news.item',compact('id'));
});