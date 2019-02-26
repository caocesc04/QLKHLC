<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileAttack extends Model
{
    protected $table = "tbl_FileAttack";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->belongsTo('App\ThongTinDeTai','ID_thongtindetai','ID');
    }
    public function hoidongthamdinh() {
        return $this->belongsTo('App\HoiDongThamDinh','ID_HoiDongThamDinh','ID');
    }
    public function hoidongnghiemthu() {
        return $this->belongsTo('App\HoiDongNghiemThu','ID_HoiDongNghiemThu','ID');
    }
	public function tiendothuchien() {
	        return $this->belongsTo('App\TienDoThucHien','ID_TienDo','ID');
	    }
	public function taichinhdetai() {
	        return $this->belongsTo('App\TaiChinhDeTai','ID_TaiChinhDeTai','ID');
	    }

}