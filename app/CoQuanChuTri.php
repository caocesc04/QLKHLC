<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoQuanChuTri extends Model
{
    protected $table = "tbl_CoQuanChuTri";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->hasMany('App\CoQuanChuTri','ID_CoQuanChuTri','ID');
    }
}