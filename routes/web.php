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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/detaidathuchien', function () {
    return view('detaidathuchien');
});
Route::get('/detaichamtiendo', function () {
    return view('detaichamtiendo');
});
Route::get('/detaidahuy', function () {
    return view('detaidahuy');
});
Route::get('/linhvuckhoahoc', function () {
    return view('linhvuckhoahoc');
});
Route::get('/chuongtrinhkhoahoc', function () {
    return view('chuongtrinhkhoahoc');
});
Route::get('/coquanchutri', function () {
    return view('coquanchutri');
});
Route::get('/canbo', function () {
    return view('canbo');
});
Route::get('/thongke', function () {
    return view('thongke');
});
Route::put('dangkydetai/{dangkydetai_id}', 'DangKyDeTaiController@update');
Route::delete('dangkydetai/{dangkydetai_id}', 'DangKyDeTaiController@destroy');
Route::delete('dangkydetai/{id}/delete', 'DangKyDeTaiController@delete');

Route::put('detaidangthuchien/{dangkydetai_id}', 'DeTaiDangThucHienController@update');
Route::delete('detaidangthuchien/{dangkydetai_id}', 'DeTaiDangThucHienController@destroy');
Route::delete('detaidangthuchien/{id}/delete', 'DeTaiDangThucHienController@delete');
Route::delete('detaidangthuchien/edit/{id}/delete', 'HoiDongThamDinhController@delete');
Route::delete('detaidangthuchien/edit/delete/{id}', 'HoiDongNghiemThuController@delete');
Route::delete('detaidangthuchien/edit/delete1/{id}', 'TienDoThucHienController@delete');
Route::delete('detaidangthuchien/edit/delete2/{id}', 'TaiChinhController@delete');


Route::put('detaidathuchien/{dangkydetai_id}', 'DeTaiDaHoanThanhController@update');
Route::delete('detaidathuchien/{dangkydetai_id}', 'DeTaiDaHoanThanhController@destroy');
Route::delete('detaidathuchien/{id}/delete', 'DeTaiDaHoanThanhController@delete');

Route::put('detaidahuy/{dangkydetai_id}', 'DeTaiDaHuyController@update');
Route::delete('detaidahuy/{dangkydetai_id}', 'DeTaiDaHuyController@destroy');
Route::delete('detaidahuy/{id}/delete', 'DeTaiDaHuyController@delete');

Route::put('detaichamtiendo/{dangkydetai_id}', 'DeTaiChamTienDoController@update');
Route::delete('detaichamtiendo/{dangkydetai_id}', 'DeTaiChamTienDoController@destroy');
Route::delete('detaichamtiendo/{id}/delete', 'DeTaiChamTienDoController@delete');

Route::put('capquanly/{dangkydetai_id}', 'LoaiCapQuanLyController@update');
Route::get('capquanly/{dangkydetai_id}', 'LoaiCapQuanLyController@show');
Route::delete('capquanly/{id}/delete', 'LoaiCapQuanLyController@delete');

Route::put('linhvuckhoahoc/{dangkydetai_id}', 'LinhVucKhoaHocController@update');
Route::get('linhvuckhoahoc/{dangkydetai_id}', 'LinhVucKhoaHocController@show');
Route::delete('linhvuckhoahoc/{id}/delete', 'LinhVucKhoaHocController@delete');

Route::put('chuongtrinhkhoahoc/{dangkydetai_id}', 'ChuongTrinhKhoaHocController@update');
Route::get('chuongtrinhkhoahoc/{dangkydetai_id}', 'ChuongTrinhKhoaHocController@show');
Route::delete('chuongtrinhkhoahoc/{id}/delete', 'ChuongTrinhKhoaHocController@delete');

Route::put('canbo/{dangkydetai_id}', 'CanBoController@update');
Route::get('canbo/{dangkydetai_id}', 'CanBoController@show');
Route::delete('canbo/{id}/delete', 'CanBoController@delete');



Route::resource('dangkydetai','DangKyDeTaiController');
Route::resource('detaidangthuchien','DeTaiDangThucHienController');
Route::resource('detaidathuchien','DeTaiDaHoanThanhController');
Route::resource('detaidahuy','DeTaiDaHuyController');
Route::resource('detaichamtiendo','DeTaiChamTienDoController');
Route::resource('loaicapquanly','LoaiCapQuanLyController');
Route::resource('linhvuckhoahoc','LinhVucKhoaHocController');
Route::resource('chuongtrinhkhoahoc','ChuongTrinhKhoaHocController');
Route::resource('canbo','CanBoController');
Route::resource('hoidongthamdinh','HoiDongThamDinhController');
Route::resource('tiendothuchien','TienDoThucHienController');
Route::resource('taichinh','TaiChinhController');
Route::resource('hoidongnghiemthu','HoiDongNghiemThuController');


Auth::routes();
// Route::get('/', 'DangKyDeTaiController@index');
Route::get('/dangkydetai', 'DangKyDeTaiController@index')->name('dangkydetai');
Route::get('/detaidangthuchien', 'DeTaiDangThucHienController@index');
Route::get('/detaidathuchien', 'DeTaiDaHoanThanhController@index');
Route::get('/detaidahuy', 'DeTaiDaHuyController@index');
Route::get('/detaichamtiendo', 'DeTaiChamTienDoController@index');
Route::get('/capquanly', 'LoaiCapQuanLyController@index');
Route::get('/linhvuckhoahoc', 'LinhVucKhoaHocController@index');
Route::get('/chuongtrinhkhoahoc', 'ChuongTrinhKhoaHocController@index');
Route::get('/canbo', 'CanBoController@index');
