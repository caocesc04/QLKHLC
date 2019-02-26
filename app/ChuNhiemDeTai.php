<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuNhiemDeTai extends Model
{
    protected $table = "tbl_ChuNhiemDeTai";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->hasMany('App\ThongTinDeTai','ID_ChuNhiemDeTai','ID');
    }
}