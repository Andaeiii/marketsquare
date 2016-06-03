<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=>'homepage', 'uses'=>'PagesController@home'));
Route::get('client/admin', array('as'=>'home', 'uses'=>'PagesController@admin'));

Route::get('client/login', array('as'=>'login_client','uses'=>'AdminController@login'));
Route::get('client/register', array('as'=>'register_client','uses'=>'AdminController@register'));
Route::get('client/forgotpassword', array('as'=>'forgot_password', 'uses'=>'AdminController@forgotPassword'));


//verify account page...
Route::get('client/verify', array('as'=>'verify_account', 'uses'=>'AdminController@verifyAccount'));


//Register Routes.... 
Route::post('client/login', 'AdminController@process_login');
Route::post('client/register', 'AdminController@process_register');
Route::post('client/verifyaccount', 'AdminController@verifyCode');		//verify account..

//static pages.... 
Route::get('pages/policy', array('as'=>'policy', 'uses'=>'PagesController@showpolicy'));


//admin ajax functions.... 
Route::get('/admin/getlgas/{id}', 'AdminController@getlgas')->where('id', '\d+');


/////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/admin', array('as'=>'admin','uses'=>'PagesController@admin'));

Route::get('logout', array('as'=>'logout', 'uses'=>'AdminController@logout'));


/////////////////////////////////////////////////////////////////////////////////////////////////////

//Administrative links.... 

Route::get('/client/profile/edit', array('as'=>'edit_profile', 'uses'=>'UserController@editprofile'));

Route::get('/client/products/new', array('as'=>'new_product', 'uses'=>'ItemsController@newitem'));
Route::get('/client/products/all', array('as'=>'all_items', 'uses'=>'ItemsController@allitems'));

Route::get('/client/category/new', array('as'=>'new_category', 'uses'=>'ItemsController@newcategory'));
Route::post('/client/category/add', array('as'=>'addcategory', 'uses'=>'ItemsController@addcategory'));
Route::get('/client/category/{id}/del', 'ItemsController@delcategory')->where('id', '\d+');

Route::get('/client/messages', array('as'=>'new_category', 'uses'=>'UserController@messages'));
Route::get('/client/reports', array('as'=>'all_categorys', 'uses'=>'UserController@reports'));

Route::get('/client/stats', array('as'=>'your_stats', 'uses'=>'UserController@stats'));
