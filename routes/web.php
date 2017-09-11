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
    return view('index');
})->name('index');

//限制UCP必须要用户登录后才能使用
Route::group(['middleware'=>'auth'],function(){

    //添加UCP自动命名前缀
   
    Route::resource('ucp/shop.dish','DishAdminController',[
        'as' => 'ucp'
    ]);
    Route::resource('ucp/contact','ContactAdminController',[
        'as' => 'ucp'
    ]);
    Route::resource('ucp/shop','ShopAdminController',[
        'as' => 'ucp'
    ]);

   
    
    Route::get('ucp/test','UcpController@index');
    Route::get('ucp/index','UcpController@index')->name('ucp.index');
});


//Order
Route::post('order/add/{shopId}/{dishId}','OrderController@addItem')->name('order.add');
Route::get('order/remove/{id}', 'OrderController@removeItem')->name('order.remove');
Route::get('order/cart', 'OrderController@showCart')->name('order.cart');



Route::resource('shop','ShopController');

//Route::post('order/comfirm/{shop}','OrderController@cofirm')->name('order.comfirm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search','SearchController@all')->name('search.all');

