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
Route::get('/',['as'=>'trang-chu','uses'=>'PageController@getIndexPage']);
Route::get('/admin/news', function () {
    return view('admin.news.list');
});
Route::group(['prefix' => 'ajax'], function () {
    Route::post('add-to-cart', 'AjaxController@postAjaxAddtoCart');
});
Route::get('gio-hang', ['as' => 'giohang', 'uses' => 'PageController@getShowCart']);
Route::get('thanh-toan', ['as' => 'thanhtoan', 'uses' => 'PageController@getShowCheckout']);
//đăng ký
Route::get('dang-ky', ['as' => 'dangky', 'uses' => 'PageController@getDangKy']);

Route::post('dang-ky', ['as' => 'dangky', 'uses' => 'PageController@postDangKy']);

//Đăng nhập
Route::get('dang-nhap', ['as' => 'get.login', 'uses' => 'PageController@getLogin']);

Route::post('dang-nhap', ['as' => 'post.login', 'uses' => 'PageController@postLogin']);
Route::get('thanh-toan', ['as' => 'thanhtoan', 'uses' => 'PageController@getShowCheckout']);
Route::post('thanh-toan', ['as' => 'thanhtoan', 'uses' => 'PageController@postCheckout']);



//show form insert data
Route::get('/admin/news/item', function () {
    return view('admin.news.item');
});
//send data new
Route::post('/admin/news/item',['as'=>'post-data-new','uses'=>'Controller@insert_new']);

Route::get('/admin/news/item/{$id}', function ($id) {
    return view('admin.news.item',compact('id'));
});
Route::get('/admin/login',['as'=>'admin-login','uses'=>'UserController@showFormLogin']);
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    /*
     * root/admin
     */
    Route::get('/',['as'=>'admin-index','uses'=>'CategoryController@getIndexAdmin']);

    Route::group(['prefix'=>'danh-muc'],function(){
        Route::get("sua/{id}",['as'=>'suadanhmuc','uses'=>'CategoryController@getEditCate']);
        Route::get("danh-sach",['as'=>'listdanhmuc','uses'=>'CategoryController@getListCate']);


    });
    Route::group(['prefix'=>'san-pham'],function () {
        Route::get("danh-sach-san-pham",['as'=>'listsanpham','uses'=>'ProductController@getListProduct']);
    });

    /*
     * quản lý đơn hàng
     */
    Route::group(['prefix' => 'don-hang'], function () {
        //root/admin/don-hang/danh-sach
        Route::get('danh-sach',['as'=>'danh-sach-don-hang','uses'=>'BillController@getListBill'] );

        Route::get('xoa/{id}', 'BillController@getDelBill');

        Route::get('chi-tiet/{id}', ['as' => 'admin.detail.bill', 'uses' => 'BillController@getDetailBill']);

        Route::get('chi-tiet/xoa/{id}', 'BillController@getDelDetailBill');
    });

});
Route::get('admin/dang-nhap', 'Admin\UserController@getAdminLogin');
Route::post('admin/dang-nhap', 'Admin\UserController@postAdminLogin');
