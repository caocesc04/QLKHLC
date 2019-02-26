<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanBo extends Model
{
    protected $table = "tbl_CanBo";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->hasMany('App\ThongTinDeTai','ID_CanBo','ID');
    }
}
