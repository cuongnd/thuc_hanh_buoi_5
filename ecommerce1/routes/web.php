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
//show form insert data
Route::get('/admin/news/item', function () {
    return view('admin.news.item');
});
//send data new
Route::post('/admin/news/item',['as'=>'post-data-new','uses'=>'Controller@insert_new']);

Route::get('/admin/news/item/{$id}', function ($id) {
    return view('admin.news.item',compact('id'));
});