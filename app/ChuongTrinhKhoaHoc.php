<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuongTrinhKhoaHoc extends Model
{
    protected $table = "tbl_ChuongTrinhKhoaHoc";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->hasMany('App\ThongTinDeTai','ID_ChuongTrinhKhoaHoc','ID');
    }
}
