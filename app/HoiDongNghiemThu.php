<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoiDongNghiemThu extends Model
{
    protected $table = "tbl_HoiDongNghiemThu";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->belongsTo('App\ThongTinDeTai','ID_thongtindetai','ID');
    }
    public function loaicapquanly() {
        return $this->belongsTo('App\LoaiCapQuanLy','ID_CapNghiemThu','ID');
    }
	public function fileattack() {
        return $this->hasMany('App\FileAttack','ID_HoiDongNghiemThu','ID');
    }
}