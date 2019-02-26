<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiCapQuanLy extends Model
{
    protected $table = "tbl_LoaiCapQuanLy";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->hasMany('App\ThongTinDeTai','ID_LoaiCapQuanLy','ID');
    }
    public function hoidongthamdinh() {
        return $this->hasMany('App\HoiDongThamDinh','ID_CapThamDinh','ID');
    }
}