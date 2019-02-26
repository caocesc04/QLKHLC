<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiChinhDeTai extends Model
{
    protected $table = "tbl_TaiChinhDeTai";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->belongsTo('App\ThongTinDeTai','ID_thongtindetai','ID');
    }
    public function hinhthucthanhtoan() {
        return $this->belongsTo('App\HinhThucThanhToan','ID_HinhThucThanhToan','ID');
    }
	public function fileattack() {
        return $this->hasMany('App\FileAttack','ID_TaiChinhDeTai','ID');
    }
}