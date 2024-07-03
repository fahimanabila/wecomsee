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
//     return view('wecomesee/index');
// });

Route::get('/', 'App\Http\Controllers\WecomeseeController@index')->name('wecomesee.index');
Route::get('filter', 'App\Http\Controllers\WecomeseeController@filter')->name('wecomesee.filter');
Route::get('detail/{id}', 'App\Http\Controllers\WecomeseeController@detail')->name('wecomesee.detail');
Route::get('service', 'App\Http\Controllers\WecomeseeController@service')->name('wecomesee.service');
Route::get('register_user', 'App\Http\Controllers\WecomeseeController@register')->name('wecomesee.register');
Route::post('penawaran', 'App\Http\Controllers\WecomeseeController@penawaran')->name('wecomesee.penawaran');
Route::post('penawaran2', 'App\Http\Controllers\WecomeseeController@penawaran2')->name('wecomesee.penawaran2');
Route::post('submit_service', 'App\Http\Controllers\WecomeseeController@submit_service')->name('submit_service');

Route::get('api/v1/destinasi', 'App\Http\Controllers\WecomeseeAPIController@destinasi')->name('api.destinasi');
Route::get('api/v1/destinasi/{param}', 'App\Http\Controllers\WecomeseeAPIController@search')->name('api.search');
Route::get('api/v1/kategori/{param}', 'App\Http\Controllers\WecomeseeAPIController@search_kategori')->name('api.search_kategori');
Route::get('api/v1/kecamatan/{param}', 'App\Http\Controllers\WecomeseeAPIController@search_kecamatan')->name('api.search_kecamatan');
Route::get('api/v1/detail/{id}', 'App\Http\Controllers\WecomeseeAPIController@detail')->name('api.detail');
Route::get('api/v1/rekomendasi/{id}', 'App\Http\Controllers\WecomeseeAPIController@rekomendasi')->name('api.rekomendasi');
Route::post('api/v1/destinasi_store', 'App\Http\Controllers\WecomeseeAPIController@destinasi_store')->name('api.destinasi_store');
Route::put('api/v1/destinasi_update', 'App\Http\Controllers\WecomeseeAPIController@destinasi_update')->name('api.destinasi_update');
Route::delete('api/v1/destinasi_delete/{id}', 'App\Http\Controllers\WecomeseeAPIController@destinasi_delete')->name('api.destinasi_delete');

Route::get('api/v1/kategori', 'App\Http\Controllers\WecomeseeAPIController@kategori')->name('api.kategori');
Route::get('api/v1/penawaran', 'App\Http\Controllers\WecomeseeAPIController@penawaran')->name('api.penawaran');
Route::get('api/v1/service', 'App\Http\Controllers\WecomeseeAPIController@service')->name('api.service');
Route::get('api/v1/filter/kecamatan/{kecamatan}/kategori/{kategori}', 'App\Http\Controllers\WecomeseeAPIController@filter')->name('api.filter');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('data_destinasi', 'App\Http\Controllers\WecomeseeAdminController@index')->name('data_destinasi');
Route::get('data_destinasi/create', 'App\Http\Controllers\WecomeseeAdminController@create')->name('data_destinasi.create');
Route::post('data_destinasi/store', 'App\Http\Controllers\WecomeseeAdminController@store')->name('data_destinasi.store');
Route::get('data_destinasi/edit/{id}', 'App\Http\Controllers\WecomeseeAdminController@edit')->name('data_destinasi.edit');
Route::post('data_destinasi/update/{id}', 'App\Http\Controllers\WecomeseeAdminController@update')->name('data_destinasi.update');
Route::post('data_destinasi/delete/{id}', 'App\Http\Controllers\WecomeseeAdminController@destroy')->name('data_destinasi.destroy');
Route::get('data_destinasi/search', 'App\Http\Controllers\WecomeseeAdminController@search')->name('data_destinasi.search');

Route::get('data_kategori', 'App\Http\Controllers\WecomeseeAdminController@index_kategori')->name('data_kategori');
Route::get('data_kategori/create', 'App\Http\Controllers\WecomeseeAdminController@create_kategori')->name('data_kategori.create');
Route::post('data_kategori/store', 'App\Http\Controllers\WecomeseeAdminController@store_kategori')->name('data_kategori.store');
Route::get('data_kategori/edit/{id}', 'App\Http\Controllers\WecomeseeAdminController@edit_kategori')->name('data_kategori.edit');
Route::post('data_kategori/update/{id}', 'App\Http\Controllers\WecomeseeAdminController@update_kategori')->name('data_kategori.update');
Route::post('data_kategori/delete/{id}', 'App\Http\Controllers\WecomeseeAdminController@destroy_kategori')->name('data_kategori.destroy');
Route::get('data_kategori/search', 'App\Http\Controllers\WecomeseeAdminController@search_kategori')->name('data_kategori.search');

Route::get('data_request', 'App\Http\Controllers\WecomeseeAdminController@index_request')->name('data_request');
Route::get('data_request/create', 'App\Http\Controllers\WecomeseeAdminController@create_request')->name('data_request.create');
Route::post('data_request/store', 'App\Http\Controllers\WecomeseeAdminController@store_request')->name('data_request.store');
Route::get('data_request/terima/{id}', 'App\Http\Controllers\WecomeseeAdminController@terima_request')->name('data_request.terima');
Route::get('data_request/tolak/{id}', 'App\Http\Controllers\WecomeseeAdminController@tolak_request')->name('data_request.tolak');
Route::get('data_request/search', 'App\Http\Controllers\WecomeseeAdminController@search_request')->name('data_request.search');

Route::get('data_penawaran', 'App\Http\Controllers\WecomeseeAdminController@index_penawaran')->name('data_penawaran');
Route::get('data_penawaran/konfirmasi/{id}', 'App\Http\Controllers\WecomeseeAdminController@konfirmasi_penawaran')->name('data_penawaran.konfirmasi');
Route::get('data_penawaran/search', 'App\Http\Controllers\WecomeseeAdminController@search_penawaran')->name('data_penawaran.search');

Route::get('data_pengajuan', 'App\Http\Controllers\WecomeseeAdminController@index_pengajuan')->name('data_pengajuan');
Route::get('data_pengajuan/konfirmasi/{id}', 'App\Http\Controllers\WecomeseeAdminController@konfirmasi_pengajuan')->name('data_pengajuan.konfirmasi');
Route::get('data_pengajuan/search', 'App\Http\Controllers\WecomeseeAdminController@search_pengajuan')->name('data_pengajuan.search');

Route::get('data_user', 'App\Http\Controllers\UserController@index')->name('data_user');
Route::get('data_user/create', 'App\Http\Controllers\UserController@create')->name('data_user.create');
Route::post('data_user/store', 'App\Http\Controllers\UserController@store')->name('data_user.store');
Route::post('data_user/pengajuan', 'App\Http\Controllers\UserController@pengajuan')->name('data_user.pengajuan');
Route::post('data_user/send_register', 'App\Http\Controllers\UserController@send_register')->name('data_user.send_register');
Route::get('data_user/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('data_user.edit');
Route::post('data_user/update/{id}', 'App\Http\Controllers\UserController@update')->name('data_user.update');
Route::post('data_user/delete/{id}', 'App\Http\Controllers\UserController@destroy')->name('data_user.destroy');
Route::get('data_user/search', 'App\Http\Controllers\UserController@search')->name('data_user.search');


require __DIR__.'/auth.php';
