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
//     return view('index');
// });

Route::get('coba_collection', 'App\Http\Controllers\DataPeminjamController@CobaCollection');

Route::get('collection_first', 'App\Http\Controllers\DataPeminjamController@CollectionFirst');

Route::get('collection_last', 'App\Http\Controllers\DataPeminjamController@CollectionLast');

Route::get('collection_count', 'App\Http\Controllers\DataPeminjamController@CollectionCount');

Route::get('collection_take', 'App\Http\Controllers\DataPeminjamController@CollectionTake');

Route::get('collection_pluck', 'App\Http\Controllers\DataPeminjamController@CollectionPluck');

Route::get('collection_where', 'App\Http\Controllers\DataPeminjamController@CollectionWhere');

Route::get('collection_wherein', 'App\Http\Controllers\DataPeminjamController@CollectionWhereIn');

Route::get('collection_toarray', 'App\Http\Controllers\DataPeminjamController@CollectionToArray');

Route::get('collection_tojson', 'App\Http\Controllers\DataPeminjamController@CollectionToJSON');

Route::get('collection_sortdesc', 'App\Http\Controllers\DataPeminjamController@CollectionSortDesc');

Route::get('collection_slice', 'App\Http\Controllers\DataPeminjamController@CollectionSlice');

Route::get('collection_find', 'App\Http\Controllers\DataPeminjamController@CollectionFind');


Route::get('/', 'App\Http\Controllers\IndexController@index');

Route::get('data_peminjam', 'App\Http\Controllers\DataPeminjamController@index');

Route::get('data_peminjam/create', 'App\Http\Controllers\DataPeminjamController@create')->name('data_peminjam.create');

Route::post('data_peminjam/store', 'App\Http\Controllers\DataPeminjamController@store')->name('data_peminjam.store');

Route::get('data_peminjam/edit/{id}', 'App\Http\Controllers\DataPeminjamController@edit')->name('data_peminjam.edit');

Route::post('data_peminjam/update/{id}', 'App\Http\Controllers\DataPeminjamController@update')->name('data_peminjam.update');

Route::post('data_peminjam/delete/{id}', 'App\Http\Controllers\DataPeminjamController@destroy')->name('data_peminjam.destroy');

Route::get('data_peminjam/search', 'App\Http\Controllers\DataPeminjamController@search')->name('data_peminjam.search');

Route::get('data_buku', 'App\Http\Controllers\DataBukuController@index');

Route::get('data_buku/create', 'App\Http\Controllers\DataBukuController@create')->name('data_buku.create');

Route::post('data_buku/store', 'App\Http\Controllers\DataBukuController@store')->name('data_buku.store');

Route::get('data_buku/edit/{id}', 'App\Http\Controllers\DataBukuController@edit')->name('data_buku.edit');

Route::post('data_buku/update/{id}', 'App\Http\Controllers\DataBukuController@update')->name('data_buku.update');

Route::post('data_buku/delete/{id}', 'App\Http\Controllers\DataBukuController@destroy')->name('data_buku.destroy');

Route::get('data_buku/search', 'App\Http\Controllers\DataBukuController@search')->name('data_buku.search');

Route::get('peminjaman', 'App\Http\Controllers\PeminjamanController@index');

Route::get('peminjaman/create', 'App\Http\Controllers\PeminjamanController@create')->name('peminjaman.create');

Route::post('peminjaman/store', 'App\Http\Controllers\PeminjamanController@store')->name('peminjaman.store');

Route::get('peminjaman/detail_peminjam/{id}', 'App\Http\Controllers\PeminjamanController@detail_peminjam')->name('peminjaman.detail_peminjam');

Route::get('peminjaman/detail_buku/{id}', 'App\Http\Controllers\PeminjamanController@detail_buku')->name('peminjaman.detail_buku');

Route::get('peminjaman/search', 'App\Http\Controllers\PeminjamanController@search')->name('peminjaman.search');




Route::get('home', function () {
    return view('home');
});

// Route::get('data_peminjam', function () { return view('data_peminjam/index');
// });

// Route::get('lihat_data_peminjam', function () {
//     $peminjam = ['Jessica', 'Maryam', 'Dina', 'Fahima'];
//     return view('peminjam/lihat_data_peminjam', compact('peminjam'));
// });

Route::get('lihat_data_peminjam', 
'App\Http\Controllers\PeminjamController@lihat_data_peminjam');

Route::get('biodata', function () {
    return 'Nama : Fahima Choirun Nabila 
    <br/>Kelas : TI-2C
    <br/>NIM : 4.33.21.2.07
    <br/>Alamat : Semarang
    <br/>Hobi : Nonton film';
});

Route::get('mahasiswa/{prodi}', function ($prodi) {
    return 'Mahasiswa Program Studi : '.$prodi;
});

Route::get('mahasiswa2/{prodi?}', function ($prodi=null) {
    if ($prodi == null)
        return 'Data program studi kosong!';
    return 'Mahasiswa Program Studi : '.$prodi;
});

Route::get('mahasiswa3/{prodi?}', function ($prodi="Teknologi Rekayasa Komputer") {
    return 'Mahasiswa Program Studi : '.$prodi;
});

Route::get('biodata2', function () {
    return view('biodata2');
});

Route::group([], function(){
    Route::get('/pertama', function () {
        return "route pertama";
    });

    Route::get('/kedua', function () {
        return "route kedua";
    });

    Route::get('/ketiga', function () {
        return "route ketiga";
    });
});

Route::group(['prefix' => 'latihan'], function(){
    Route::get('/satu', function () {
        echo "latihan pertama";
    });

    Route::get('/dua', function () {
        echo "latihan kedua";
    });

    Route::get('/tiga', function () {
        echo "latihan ketiga";
    });
});

Route::group(array('prefix' => 'admin'), function(){
    Route::get('/', function () {
        echo "Halaman home admin";
    });

    Route::get('posts', function () {
        echo "Halaman input data buku";
    });

    Route::get('posts/simpan', function () {
        echo "Data berhasil disimpan";
    });
});

Route::name('kuliah')->group(function(){
    Route::get('Teknologi Rekayasa Komputer', function () {
        return "Kuliah di Program Studi Teknologi Rekayasa Komputer";
    });
});
