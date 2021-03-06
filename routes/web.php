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
    Route::get('template/test', 'Wp\TemplateController@test')->name('test');
    
    Route::get('dashboard', 'Wp\WpController@dashboard')->name('dashboard');
    Route::get('list-permit', 'Wp\WpController@list')->name('list');
    Route::get('vendor-permit', 'Wp\WpController@vendor')->name('vendor');
    Route::get('edit_wp/{id}', 'Wp\WpController@edit_wp')->name('edit_wp');
    Route::get('create', 'Wp\WpController@create')->name('create');
    Route::get('template', 'Wp\TemplateController@template')->name('template');
    Route::get('add_template', 'Wp\TemplateController@add_template')->name('add_template');
    Route::get('edit_template/{id}', 'Wp\TemplateController@edit_template')->name('edit_template');
    Route::post('template_store', 'Wp\TemplateController@template_store')->name('template_store');
    Route::get('detail/{id}', 'Wp\WpController@detail')->name('detail');
    Route::get('getTemplateByUnit/{id}', 'Wp\WpController@getTemplateByUnit')->name('getTemplateByUnit');;
    Route::get('getTemplateByVendor/{id}', 'Wp\WpController@getTemplateByVendor')->name('getTemplateByVendor');;
    Route::post('submit_form', 'Wp\WpController@submit_form')->name('submit_form');
    Route::post('edit_form', 'Wp\WpController@edit_form')->name('edit_form');
    Route::post('wp_store', 'Wp\WpController@wp_store')->name('wp_store');
    Route::post('wp_update', 'Wp\WpController@wp_update')->name('wp_update');
    Route::get('list_permohonan', 'Wp\WpController@list_permohonan')->name('list_permohonan');
    Route::get('list_pengerjaan', 'Wp\WpController@list_pengerjaan')->name('list_pengerjaan');
    Route::get('list_selesai', 'Wp\WpController@list_selesai')->name('list_selesai');
    Route::get('list_permohonan_vendor', 'Wp\WpController@list_permohonan_vendor')->name('list_permohonan_vendor');
    Route::get('list_dashboard', 'Wp\WpController@list_dashboard')->name('list_dashboard');
    Route::get('list_template', 'Wp\TemplateController@list_template')->name('list_template');
    Route::get('get_detail_wp', 'Wp\WpController@get_detail_wp')->name('get_detail_wp');;
    Route::get('get_detail_template', 'Wp\TemplateController@get_detail_template')->name('get_detail_template');
    Route::post('approve_form', 'Wp\WpController@approve_form')->name('approve_form');
    Route::post('delete_form', 'Wp\WpController@delete_form')->name('delete_form');
    Route::post('closing_form', 'Wp\WpController@closing_form')->name('closing_form');
    Route::get('print_jsa/{id}', 'Wp\WpController@print_jsa')->name('print_jsa');
    Route::get('print_hirarc/{id}', 'Wp\WpController@print_hirarc')->name('print_hirarc');
    Route::get('print_wp/{id}', 'Wp\WpController@print_wp')->name('print_wp');
    Route::post('template_delete', 'Wp\TemplateController@template_delete')->name('template_delete');
    Route::post('template_update', 'Wp\TemplateController@template_update')->name('template_update');

    Route::get('mailbody', 'Wp\WpController@mailbody')->name('mailbody');


});

//SOSIALISASI
Route::prefix('sosialisasi')->group(function() {
    Route::get('test', 'Sosialisasi\SosialisasiController@test')->name('test');
    
    Route::get('', 'Sosialisasi\SosialisasiController@index')->name('index');
    Route::get('add', 'Sosialisasi\SosialisasiController@add')->name('add');
    Route::post('sosialisasi_store', 'Sosialisasi\SosialisasiController@sosialisasi_store')->name('sosialisasi_store');
    Route::get('list_index', 'Sosialisasi\SosialisasiController@list_index')->name('list_index');
    Route::get('get_detail_sosialisasi', 'Sosialisasi\SosialisasiController@get_detail_sosialisasi')->name('get_detail_sosialisasi');
    Route::get('edit_sosialisasi/{id}', 'Sosialisasi\SosialisasiController@edit_sosialisasi')->name('edit_sosialisasi');
    Route::get('view/{id}', 'Sosialisasi\SosialisasiController@view')->name('view');
    Route::post('sosialisasi_delete', 'Sosialisasi\SosialisasiController@sosialisasi_delete')->name('sosialisasi_delete');
    Route::post('update_sosialisasi', 'Sosialisasi\SosialisasiController@update_sosialisasi')->name('update_sosialisasi');
    Route::get('get_markers_sosialisasi', 'Sosialisasi\SosialisasiController@get_markers_sosialisasi')->name('get_markers_sosialisasi');
    Route::get('markers', 'Sosialisasi\SosialisasiController@markers')->name('markers');
    Route::get('export_excel', 'Sosialisasi\SosialisasiController@export')->name('export_excel');

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
    Route::post('apar_upd_gedung', 'Apar\AparController@apar_upd_gedung')->name('apar_upd_gedung');
    Route::post('apar_upd_lantai', 'Apar\AparController@apar_upd_lantai')->name('apar_upd_lantai');
    Route::post('apar_del_gedung', 'Apar\AparController@apar_del_gedung')->name('apar_del_gedung');
    Route::post('apar_del_lantai', 'Apar\AparController@apar_del_lantai')->name('apar_del_lantai');
    Route::get('list_master_gedung', 'Apar\AparController@list_master_gedung')->name('list_master_gedung');
    Route::get('list_master_lantai', 'Apar\AparController@list_master_lantai')->name('list_master_lantai');
    Route::get('getLantaiByGedung/{id}', 'Apar\AparController@getLantaiByGedung')->name('getLantaiByGedung');;
    Route::get('input_har/{id}', 'Apar\AparController@input_har')->name('input_har');
    Route::post('add_history', 'Apar\AparController@add_history')->name('add_history');
    Route::get('list_history_apar/{id}', 'Apar\AparController@list_history_apar')->name('list_history_apar');
    Route::get('get_detail_history', 'Apar\AparController@get_detail_history')->name('get_detail_history');
    Route::get('get_detail', 'Apar\AparController@get_detail')->name('get_detail');
    Route::get('get_detail_gedung', 'Apar\AparController@get_detail_gedung')->name('get_detail_gedung');
    Route::get('get_detail_lantai', 'Apar\AparController@get_detail_lantai')->name('get_detail_lantai');
    Route::post('delete_history', 'Apar\AparController@delete_history')->name('delete_history');
    Route::get('update/{id}', 'Apar\AparController@update')->name('update');
    Route::post('update_apar', 'Apar\AparController@update_apar')->name('update_apar');
    Route::post('delete_apar', 'Apar\AparController@delete_apar')->name('delete_apar');
    Route::get('export_excel', 'Apar\AparController@export')->name('export_excel');

    Route::get('view/{id}', 'Apar\AparviewController@view')->name('view');
    Route::get('view_history_apar/{id}', 'Apar\AparviewController@view_history_apar')->name('view_history_apar');
    Route::get('view_detail_history', 'Apar\AparviewController@view_detail_history')->name('view_detail_history');


});

//REPORT
Route::prefix('report')->group(function() {
    Route::get('apar', 'Report\ReportController@apar')->name('apar');
    Route::get('list_apar', 'Report\ReportController@list_apar')->name('list_apar');
});

//MANUALBOOK
Route::prefix('manualbook')->group(function() {
    Route::get('', 'Manualbook\ManualbookController@index')->name('index');
});

//PROFILE
Route::prefix('profile')->group(function() {
    Route::get('', 'Profile\ProfileController@index')->name('index');
    Route::post('update_company', 'Profile\ProfileController@update_company')->name('update_company');
    Route::post('generate_token', 'Profile\ProfileController@generate_token')->name('generate_token');
    Route::post('change_password', 'Profile\ProfileController@change_password')->name('change_password');
});

//MASTER DATA
Route::prefix('master')->group(function() {
    Route::get('user', 'Master\UserController@user')->name('user');
    Route::get('user_datatables', 'Master\UserController@user_datatables')->name('user_datatables');
    Route::get('get_userdata', 'Master\UserController@get_userdata')->name('get_userdata');;
    Route::get('get_vendordata', 'Master\VendorController@get_vendor_detail_2')->name('get_vendordata');;
    Route::get('unit', 'Master\UnitController@unit')->name('unit');
    Route::get('unit_datatables', 'Master\UnitController@unit_datatables')->name('unit_datatables');
    Route::get('vendor', 'Master\VendorController@vendor')->name('vendor');
    Route::get('vendor/test', 'Master\VendorController@test')->name('test');
    Route::get('api_vendor_detail/{id}', 'Master\VendorController@api_vendor_detail')->name('api_vendor_detail');
    Route::get('get_vendor_detail/{id}', 'Master\VendorController@get_vendor_detail')->name('get_vendor_detail');
    Route::post('vendor_store', 'Master\VendorController@vendor_store')->name('vendor_store');
    Route::post('vendor_update', 'Master\VendorController@vendor_update')->name('vendor_update');
    Route::get('vendor_datatables', 'Master\VendorController@vendor_datatables')->name('vendor_datatables');
    Route::get('email', 'Master\MasterController@email')->name('email');
    Route::post('testemail', 'Master\MasterController@testemail')->name('testemail');
    Route::post('sendmanual', 'Master\MasterController@sendmanual')->name('sendmanual');

    Route::get('c_menu_datatables', 'Master\UserController@c_menu_datatables')->name('c_menu_datatables');
    Route::post('user_store', 'Master\UserController@user_store')->name('user_store');
    Route::post('user_update', 'Master\UserController@user_update')->name('user_update');
    Route::post('c_menu_store', 'Master\UserController@c_menu_store')->name('c_menu_store');
    Route::post('menu_update', 'Master\UserController@menu_update')->name('menu_update');
    Route::post('c_menu_update', 'Master\UserController@c_menu_update')->name('c_menu_update');
    Route::get('menu_edit/{id}', 'Master\UserController@menu_edit')->name('menu_edit');
    Route::get('menu_edit2', 'Master\UserController@menu_edit2')->name('menu_edit2');
    Route::get('menu_edit_c', 'Master\UserController@menu_edit_c')->name('menu_edit_c');
    Route::post('menu_destroy', 'Master\UserController@menu_destroy')->name('menu_destroy');
    Route::post('c_menu_destroy', 'Master\UserController@c_menu_destroy')->name('c_menu_destroy');
    Route::get('test', 'Master\UserController@test')->name('test');
    Route::get('get_group/{id}', 'Master\UserController@getGroupUser')->name('get_group');
    Route::get('get_user_ap/{id}', 'Master\MasterController@get_user_by_group')->name('get_user_ap');
    Route::get('get_unit_lv3/{id}', 'Master\MasterController@get_unit_lv3')->name('get_unit_lv3');
});

//CONFIG
Route::prefix('config')->group(function() {
    Route::get('getLv3List/{id}', 'Config\ConfigController@getLv3List')->name('getLv3List');
});

Route::get('qrcode', function () {
    return QrCode::size(250)
        ->backgroundColor(255, 255, 204)
        ->generate('MyNotePaper');
});