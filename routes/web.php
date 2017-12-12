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

Route::get('/', 'UserController@index')->name('home');

Route::get('/', 'UserController@index')->name('login');

Route::get('/ajax/product_list', 'AjaxController@product_list');

Route::get('/ajax/plan', 'AjaxController@plan');

Route::get('/ajax/driver_product', 'AjaxController@driver_product');

Route::get('/ajax/location_update', 'AjaxController@location_update');

Route::get('/ajax/statistic', 'AjaxController@statistic');

Route::get('/login_android', 'ScriptController@login_android');

Route::get('/update_location_android', 'ScriptController@update_location_android');

Route::get('/change_status_android', 'ScriptController@change_status_android');

Route::get('/getproducts_android', 'ScriptController@getproducts_android');

Route::get('/panel', 'AuthController@panel') ->middleware('checkrole:1');

Route::get('/services', 'UserController@services');

Route::get('/gproduct', 'ProductController@gproduct');

Route::get('/statistic', 'ProductController@statistic');

Route::get('/gallery', 'UserController@gallery');

Route::get('/mail', 'UserController@mail');

Route::post('/signup', 'UserController@signup');

Route::get('/logout', 'UserController@logout');

Route::get('/login', 'UserController@login');

Route::post('/signin', 'UserController@signin');

Route::get('/change_pass', 'AuthController@change_pass');

Route::post('/update_pass', 'AuthController@update_pass');

Route::get('/acc_role', 'AuthController@acc_role') -> middleware('checkrole:1');

Route::get('/plan', 'ProductController@plan') -> middleware('checkrole:1');

Route::get('/change_plan/{id}', 'ProductController@change_plan') -> middleware('checkrole:1');

Route::get('/change_plan/{product_id}/{driver_id}', 'ProductController@update_driver') -> middleware('checkrole:1');

Route::get('/customer', 'AuthController@customer') -> middleware('checkrole:3');

Route::get('/driver', 'AuthController@driver') -> middleware('checkrole:2');

Route::get('/driver_product', 'ProductController@driver_product') -> middleware('checkrole:2');

Route::get('/create_product', 'AuthController@create_product') -> middleware('checkrole:3');

Route::post('/customer_product', 'ProductController@customer_product') -> middleware('checkrole:3');

Route::get('/product_list', 'ProductController@product_list') -> middleware('checkrole:3');

Route::get('/{id}', 'AuthController@account') -> middleware('checkrole:1');

Route::post('/change_role', 'AuthController@change_role') -> middleware('checkrole:1');

Route::post('/open_user', 'AuthController@open_user') -> middleware('checkrole:1');

Route::post('/guest_product', 'ProductController@guest_product');

