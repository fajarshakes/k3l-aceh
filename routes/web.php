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
    Route::get('dashboard', 'Wp\WorkingpermitController@dashboard')->name('dashboard');
    Route::get('d_usulan/{id}', 'Planning\PlanningController@d_usulan')->name('d_usulan');
});

//REPORT
Route::prefix('report')->group(function() {
    Route::get('unit', 'Report\ReportController@unit')->name('unit');
    Route::get('other', 'Report\ReportController@other')->name('other');
});

//MASTER DATA
Route::prefix('master')->group(function() {
    Route::get('profile', 'Master\MasterController@profile')->name('profile');
    Route::get('user', 'Master\MasterController@user')->name('user');
    Route::post('user_store', 'Master\MasterController@user_store')->name('user_store');
    Route::post('user_update', 'Master\MasterController@user_update')->name('user_update');
    Route::post('user_delete', 'Master\MasterController@user_delete')->name('user_delete');
    Route::post('update', 'Master\MasterController@update')->name('update');
    Route::get('account', 'Master\MasterController@account')->name('account');
    Route::get('menu', 'Master\MenuController@menu')->name('menu');
    Route::get('menu_datatables', 'Master\MenuController@menu_datatables')->name('menu_datatables');
    Route::get('c_menu_datatables', 'Master\MenuController@c_menu_datatables')->name('c_menu_datatables');
    Route::post('menu_store', 'Master\MenuController@menu_store')->name('menu_store');
    Route::post('c_menu_store', 'Master\MenuController@c_menu_store')->name('c_menu_store');
    Route::post('menu_update', 'Master\MenuController@menu_update')->name('menu_update');
    Route::post('c_menu_update', 'Master\MenuController@c_menu_update')->name('c_menu_update');
    Route::get('menu_edit/{id}', 'Master\MenuController@menu_edit')->name('menu_edit');;
    Route::get('menu_edit2', 'Master\MenuController@menu_edit2')->name('menu_edit2');;
    Route::get('menu_edit_c', 'Master\MenuController@menu_edit_c')->name('menu_edit_c');;
    Route::post('menu_destroy', 'Master\MenuController@menu_destroy')->name('menu_destroy');;
    Route::post('c_menu_destroy', 'Master\MenuController@c_menu_destroy')->name('c_menu_destroy');
    Route::get('test', 'Master\MenuController@test')->name('test');

});