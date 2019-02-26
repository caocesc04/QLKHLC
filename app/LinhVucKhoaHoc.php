<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinhVucKhoaHoc extends Model
{
    protected $table = "tbl_LinhVucKhoaHoc";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->hasMany('App\ThongTinDeTai','ID_LinhVuc','ID');
    }
}