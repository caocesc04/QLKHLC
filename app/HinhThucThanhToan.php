<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucThanhToan extends Model
{
    protected $table = "tbl_HinhThucThanhToan";
    protected $primaryKey = 'ID';

	public function taichinhdetai() {
        return $this->hasMany('App\TaiChinhDeTai','ID_HinhThucThanhToan','ID');
    }
}