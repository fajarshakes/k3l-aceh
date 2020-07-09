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
//Auth::routes();
Route::get('/', "HomeController@index")->name("home");

//AUTH
Route::get('login', 'Auth\LoginController@login')->name("login");
Route::post('login', 'Auth\LoginController@authenticate');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('register', 'Auth\RegisterController@register')->name("register");
Route::get('getlogout', 'Auth\LoginController@logout');
Route::get('postLogout', 'Auth\LoginController@postLogout');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

 //WORKING PERMIT
 Route::prefix('wp')->group(function() {
    Route::get('test', 'Wp\WpController@test')->name('test');
    
    Route::get('dashboard', 'Wp\WpController@dashboard')->name('dashboard');
    Route::get('list-permit', 'Wp\WpController@list')->name('list');
    Route::get('create', 'Wp\WpController@create')->name('create');
    Route::get('template', 'Wp\WpController@template')->name('template');
    Route::get('add_template', 'Wp\WpController@add_template')->name('add_template');
    Route::get('d_usulan/{id}', 'Planning\PlanningController@d_usulan')->name('d_usulan');
    Route::post('submit_form', 'Wp\WpController@submit_form')->name('submit_form');
    Route::post('wp_store', 'Wp\WpController@wp_store')->name('wp_store');
    Route::get('list_permohonan', 'Wp\WpController@list_permohonan')->name('list_permohonan');

});

//REPORT
Route::prefix('report')->group(function() {
    Route::get('unit', 'Report\ReportController@unit')->name('unit');
    Route::get('other', 'Report\ReportController@other')->name('other');
});

//MASTER DATA
Route::prefix('master')->group(function() {
    Route::get('user', 'Master\UserController@user')->name('user');
    Route::get('user_datatables', 'Master\UserController@user_datatables')->name('user_datatables');
    Route::get('get_userdata', 'Master\UserController@get_userdata')->name('get_userdata');;


    Route::get('c_menu_datatables', 'Master\UserController@c_menu_datatables')->name('c_menu_datatables');
    Route::post('user_store', 'Master\UserController@user_store')->name('user_store');
    Route::post('c_menu_store', 'Master\UserController@c_menu_store')->name('c_menu_store');
    Route::post('menu_update', 'Master\UserController@menu_update')->name('menu_update');
    Route::post('c_menu_update', 'Master\UserController@c_menu_update')->name('c_menu_update');
    Route::get('menu_edit/{id}', 'Master\UserController@menu_edit')->name('menu_edit');;
    Route::get('menu_edit2', 'Master\UserController@menu_edit2')->name('menu_edit2');;
    Route::get('menu_edit_c', 'Master\UserController@menu_edit_c')->name('menu_edit_c');;
    Route::post('menu_destroy', 'Master\UserController@menu_destroy')->name('menu_destroy');;
    Route::post('c_menu_destroy', 'Master\UserController@c_menu_destroy')->name('c_menu_destroy');
    Route::get('test', 'Master\UserController@test')->name('test');

    Route::get('get_group/{id}', 'Master\UserController@getGroupUser')->name('get_group');;


});