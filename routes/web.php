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
    Route::get('template', 'Wp\TemplateController@template')->name('template');
    Route::get('add_template', 'Wp\WpController@add_template')->name('add_template');
    Route::post('template_store', 'Wp\TemplateController@template_store')->name('template_store');
    Route::get('detail/{id}', 'Wp\WpController@detail')->name('detail');
    Route::post('submit_form', 'Wp\WpController@submit_form')->name('submit_form');
    Route::post('wp_store', 'Wp\WpController@wp_store')->name('wp_store');
    Route::get('list_permohonan', 'Wp\WpController@list_permohonan')->name('list_permohonan');
    Route::get('get_detail_wp', 'Wp\WpController@get_detail_wp')->name('get_detail_wp');;
    Route::post('approve_form', 'Wp\WpController@approve_form')->name('approve_form');;
    Route::post('delete_form', 'Wp\WpController@delete_form')->name('delete_form');;
    Route::get('print_jsa', 'Wp\WpController@print_jsa')->name('print_jsa');;
});

//SOSIALISASI
Route::prefix('sosialisasi')->group(function() {
    Route::get('test', 'Sosialisasi\SosialisasiController@test')->name('test');
    
    Route::get('', 'Sosialisasi\SosialisasiController@index')->name('index');
    Route::get('add', 'Sosialisasi\SosialisasiController@add')->name('add');
    Route::post('sosialisasi_store', 'Sosialisasi\SosialisasiController@sosialisasi_store')->name('sosialisasi_store');
    Route::get('list_index', 'Sosialisasi\SosialisasiController@list_index')->name('list_index');

});

//APAR
Route::prefix('apar')->group(function() {
    Route::get('test', 'Apar\AparController@test')->name('test');
    
    Route::get('', 'Apar\AparController@index')->name('index');
    Route::get('add', 'Apar\AparController@add')->name('add');
    Route::post('add_store', 'Apar\AparController@add_store')->name('add_store');
    Route::get('master', 'Apar\AparController@master')->name('master');
    Route::get('list_index_apar', 'Apar\AparController@list_index_apar')->name('list_index_apar');
    Route::post('apar_add_gedung', 'Apar\AparController@apar_add_gedung')->name('apar_add_gedung');
    Route::post('apar_add_lantai', 'Apar\AparController@apar_add_lantai')->name('apar_add_lantai');
    Route::get('list_master_gedung', 'Apar\AparController@list_master_gedung')->name('list_master_gedung');
    Route::get('list_master_lantai', 'Apar\AparController@list_master_lantai')->name('list_master_lantai');
    Route::get('getLantaiByGedung/{id}', 'Apar\AparController@getLantaiByGedung')->name('getLantaiByGedung');;
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
    Route::get('unit', 'Master\UnitController@unit')->name('unit');
    Route::get('unit_datatables', 'Master\UnitController@unit_datatables')->name('unit_datatables');

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

Route::get('qrcode', function () {
    return QrCode::size(250)
        ->backgroundColor(255, 255, 204)
        ->generate('MyNotePaper');
});