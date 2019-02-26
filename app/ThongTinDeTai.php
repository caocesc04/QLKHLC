<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinDeTai extends Model
{
    protected $table = "tbl_ThongTinDeTai";
    protected $primaryKey = 'ID';

    public function linhvuckhoahoc() {
        return $this->belongsTo('App\LinhVucKhoaHoc','ID_LinhVuc','ID');
    }
    public function coquanchutri() {
        return $this->belongsTo('App\CoQuanChuTri','ID_CoQuanChuTri','ID');
    }
	public function chunhiemdetai() {
        return $this->belongsTo('App\ChuNhiemDeTai','ID_ChuNhiemDeTai','ID');
    }
	public function loaicapquanly() {
        return $this->belongsTo('App\LoaiCapQuanLy','ID_LoaiCapQuanLy','ID');
    }
	public function canbo() {
        return $this->belongsTo('App\CanBo','ID_CanBo','ID');
    }
	public function fileattack() {
        return $this->hasMany('App\FileAttack','ID_thongtindetai','ID');
    }
    public function hoidongthamdinh() {
        return $this->hasMany('App\HoiDongThamDinh','ID_thongtindetai','ID');
    }
	public function chuongtrinhkhoahoc() {
        return $this->belongsTo('App\ChuongTrinhKhoaHoc','ID_ChuongTrinhKhoaHoc','ID');
    }
    public function trangthai() {
        return $this->belongsTo('App\TrangThai','ID_TrangThai','ID');
    }
}