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

// BackEnd
Route::get('login', 'backend\LoginController@GetLogin')->middleware('CheckLogout');
Route::post('login', 'backend\LoginController@PostLogin');

Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function () {
    Route::get('', 'backend\LoginController@GetIndex');
    Route::get('logout', 'backend\LoginController@Logout');


    Route::group(['prefix' => 'category'], function () {
        Route::get('','backend\CategoryController@GetCategory');
        Route::post('','backend\CategoryController@PostCategory');

        Route::get('edit/{id_category}','backend\CategoryController@EditCategory');
        Route::post('edit/{id_category}','backend\CategoryController@PostEditCategory');
        Route::get('del/{id_category}','backend\CategoryController@DelCategory');

    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('','backend\ProductController@ListProduct');
        Route::get('edit/{id_pro}','backend\ProductController@EditProduct');
        Route::post('edit/{id_pro}','backend\ProductController@PostEditProduct');
        Route::get('add','backend\ProductController@AddProduct');
        Route::post('add','backend\ProductController@PostProduct');
        Route::get('del/{id_pro}','backend\ProductController@DelProduct');


        Route::get('detail-attr','backend\ProductController@DetailAttr');
        Route::get('edit-attr','backend\ProductController@EditAttr');

        Route::get('edit-value','backend\ProductController@EditValue');

        Route::get('add-variant','backend\ProductController@AddVariant');
        Route::get('edit-variant','backend\ProductController@EditVariant');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('','backend\OrderController@ListOrder');
        Route::get('detail/{id_od}','backend\OrderController@DetailOrder');
        Route::get('paid/{id_od}','backend\OrderController@PaidOrder');
        Route::get('processed','backend\OrderController@ProcessedOrder');

    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('','backend\UserController@ListUser');
        Route::get('edit/{id_user}','backend\UserController@EditUser');
        Route::post('edit/{id_user}','backend\UserController@PostEditUser');
        Route::get('add','backend\UserController@AddUser');
        Route::post('add','backend\UserController@PostAddUser');
        Route::get('del/{id_user}','backend\UserController@DelUser');

    });
});


//FontEnd

Route::get('', 'frontend\IndexController@GetIndex');
Route::get('about', 'frontend\IndexController@GetAbout');
Route::get('contact', 'frontend\IndexController@GetContact');
Route::get('{pro_cate}.html', 'frontend\IndexController@GetProCate');
Route::get('filter', 'frontend\IndexController@GetFilter');



Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'frontend\CartController@GetCart');
    Route::get('add', 'frontend\CartController@AddCart');
    Route::get('update/{rowId}/{qty}', 'frontend\CartController@UpdateCart');
    Route::get('del/{rowId}', 'frontend\CartController@DelCart');

});

Route::group(['prefix' => 'checkout'], function () {
    Route::get('', 'frontend\CheckoutController@GetCheckout');
    Route::post('', 'frontend\CheckoutController@PostCheckout');
    Route::get('complete/{order_id}', 'frontend\CheckoutController@GetComplete');
});
Route::group(['prefix' => 'product'], function () {
    Route::get('shop', 'frontend\ProductController@GetShop');
    Route::get('{slug_pro}.html', 'frontend\ProductController@GetDetail');
});
