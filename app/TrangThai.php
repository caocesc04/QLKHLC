<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    protected $table = "tbl_TrangThai";

    public function thongtindetai() {
        return $this->hasMany('App\ThongTinDeTai','ID_TrangThai','ID');
    }

}