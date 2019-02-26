<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TienDoThucHien extends Model
{
    protected $table = "tbl_TienDoThucHien";
    protected $primaryKey = 'ID';

    public function thongtindetai() {
        return $this->belongsTo('App\ThongTinDeTai','ID_thongtindetai','ID');
    }
	public function fileattack() {
        return $this->hasMany('App\FileAttack','ID_TienDo','ID');
    }
}