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
// Route::get('/', function () {
//         return view('home');
// });

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['middleware'=>['auth']],function(){      

//============================FOR ADMIN CONTROLLER===========================================
        Route::get('/admin/panel','AdminController@create');
        Route::post('/admin/add','AdminController@store');
// =========================== FOR PRODUCT CONTROLLER ========================================

        Route::get('/product','ProductController@index');
        Route::get('/product/create','ProductController@create');
        Route::post('/product/store','ProductController@store');
        Route::get('/product/show/{id}','ProductController@show');
        Route::get('/product/edit/{id}','ProductController@edit');
        Route::post('/product/update/{id}','ProductController@update');
        Route::post('/product/destroy/{id}','ProductController@destroy');

// ==============================    FOR BRAND CONTROLLER ===================================

        Route::get('/brand','BrandController@index');
        Route::get('/brand/create','BrandController@create');
        Route::post('/brand/store','BrandController@store');
        Route::get('/brand/show/{id}','BrandController@show');
        Route::get('/brand/edit/{id}','BrandController@edit');
        Route::post('/brand/update/{id}','BrandController@update');
        Route::post('/brand/destroy/{id}','BrandController@destroy');

// ==============================    FOR CATEGORY CONTROLLER ===================================

        Route::get('/category','CategoryController@index');
        Route::get('/cat/create','CategoryController@create');
        Route::post('/cat/store','CategoryController@store');
        Route::get('/cat/show/{id}','CategoryController@show');
        Route::get('/cat/edit/{id}','CategoryController@edit');
        Route::post('/cat/update/{id}','CategoryController@update');
        Route::post('/cat/destroy/{id}','CategoryController@destroy');



});


