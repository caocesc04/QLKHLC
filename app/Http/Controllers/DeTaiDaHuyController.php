<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuNhiemDeTai;
use App\CoQuanChuTri;
use App\ThongTinDeTai;
use App\LoaiCapQuanLy;
use App\LinhVucKhoaHoc;
use App\ChuongTrinhKhoaHoc;
use App\CanBo;
use App\HoiDongThamDinh;
use App\HoiDongNghiemThu;
use App\TienDoThucHien;
use App\TaiChinhDeTai;
use App\FileAttack;
use App\HinhThucThanhToan;
use Illuminate\Support\Facades\DB;
use Redirect;

class DeTaiDaHuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thongtindetai = ThongTinDeTai::where('ID_TrangThai', '5')->orderBy('id', 'asc')->get();
        $lvkh = LinhVucKhoaHoc::all();
        $cqct = CoQuanChuTri::all();
        $lcql = LoaiCapQuanLy::all();
        $ctkh = ChuongTrinhKhoaHoc::where('status','Đang Diễn Ra')->get();
        $canbo = CanBo::all();
        return view('detaidahuy', compact('lvkh','cqct','lcql','ctkh','canbo','thongtindetai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dangkydetai_id)
    {
        $lcqls = LoaiCapQuanLy::all();
        $lvkhs = LinhVucKhoaHoc::all();
        $ctkhs = ChuongTrinhKhoaHoc::where('status','Đang Diễn Ra')->get();
        $cbqls = CanBo::all();

        $ttdts = ThongTinDeTai::with('coquanchutri','linhvuckhoahoc','chunhiemdetai','loaicapquanly','canbo','chuongtrinhkhoahoc')->where('ID',$dangkydetai_id)->first();
        $fileAttacks = FileAttack::select('ID','TenFile')->where('ID_thongtindetai',$dangkydetai_id)->get();

        $hdtd = HoiDongThamDinh::with('thongtindetai','loaicapquanly')->where('ID_thongtindetai', $dangkydetai_id)->get();
        $idhdtd = HoiDongThamDinh::where('ID_thongtindetai', $dangkydetai_id)->pluck('ID')->toArray();
        $filethamdinh = FileAttack::with('hoidongthamdinh')->whereIn('ID_HoiDongThamDinh',$idhdtd)->get();

        $hdnt = HoiDongNghiemThu::with('thongtindetai','loaicapquanly')->where('ID_thongtindetai', $dangkydetai_id)->get();
        $idhdnt = HoiDongNghiemThu::where('ID_thongtindetai', $dangkydetai_id)->pluck('ID')->toArray();
        $filenghiemthu = FileAttack::with('hoidongnghiemthu')->whereIn('ID_HoiDongNghiemThu',$idhdnt)->get();

        $tiendo = TienDoThucHien::with('thongtindetai')->where('ID_thongtindetai', $dangkydetai_id)->get();
        $idtiendo = TienDoThucHien::where('ID_thongtindetai', $dangkydetai_id)->pluck('ID')->toArray();
        $filetiendo = FileAttack::with('tiendothuchien')->whereIn('ID_TienDo',$idtiendo)->get();

        $taichinh = TaiChinhDeTai::with('thongtindetai','hinhthucthanhtoan')->where('ID_thongtindetai', $dangkydetai_id)->get();
        $idtaichinh = TaiChinhDeTai::where('ID_thongtindetai', $dangkydetai_id)->pluck('ID')->toArray();
        $filetaichinh = FileAttack::with('taichinhdetai')->whereIn('ID_TaiChinhDeTai',$idtaichinh)->get();

        return response()->json(array('lcqls'=>$lcqls,'ttdts'=>$ttdts,'lvkhs'=>$lvkhs,'ctkhs'=>$ctkhs,'cbqls'=>$cbqls,'fileAttacks'=>$fileAttacks,'hdtd'=>$hdtd,'filethamdinh'=>$filethamdinh,'hdnt'=>$hdnt,'filenghiemthu'=>$filenghiemthu,'tiendo'=>$tiendo,'filetiendo'=>$filetiendo,'taichinh'=>$taichinh,'filetaichinh'=>$filetaichinh));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lcqls = LoaiCapQuanLy::all();
        $lvkhs = LinhVucKhoaHoc::all();
        $ctkhs = ChuongTrinhKhoaHoc::where('status','Đang Diễn Ra')->get();
        $cbqls = CanBo::all();

        $ttdt = ThongTinDeTai::with('coquanchutri','linhvuckhoahoc','chunhiemdetai','loaicapquanly','canbo','chuongtrinhkhoahoc')->where('ID', $id)->first();
        $fileattacks = FileAttack::select('ID','TenFile')->where('ID_thongtindetai',$id)->get();

        return view('detaidahuyedit', compact('ttdt','lvkhs','lcqls','ctkhs','cbqls','fileattacks','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $file = FileAttack::where('ID_thongtindetai',$id)->pluck('ID')->toArray();
        if($file !== null){
            foreach($file as $f ){
            $filedelete = FileAttack::findOrFail($f);
            $filedelete->delete();
            }
        }
        $hdtd = HoiDongThamDinh::where('ID_thongtindetai',$id)->pluck('ID')->toArray();
        if($hdtd !== null){
            foreach($hdtd as $hdtds){
            $hdtddelete = HoiDongThamDinh::findOrFail($hdtds);
            $hdtddelete->delete();
            }
        }
        $hdnt = HoiDongNghiemThu::where('ID_thongtindetai',$id)->pluck('ID')->toArray();
        if($hdnt !== null){
            foreach($hdnt as $hdnts){
            $hdntdelete = HoiDongNghiemThu::findOrFail($hdnts);
            $hdntdelete->delete();
            }
        }
        $tiendo = TienDoThucHien::where('ID_thongtindetai',$id)->pluck('ID')->toArray();
        if($tiendo !== null){
            foreach($tiendo as $tiendos){
            $tiendodelete = TienDoThucHien::findOrFail($tiendos);
            $tiendodelete->delete();
            }
        }
        $taichinh = TaiChinhDeTai::where('ID_thongtindetai',$id)->pluck('ID')->toArray();
        if($taichinh !== null){
            foreach($taichinh as $taichinhs){
            $taichinhdelete = TaiChinhDeTai::findOrFail($taichinhs);
            $taichinhdelete->delete();
            }
        }
        $ttdt = ThongTinDeTai::findOrFail($id);
        $ttdt->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }
    public function destroy($id)
    {
        //
    }
}
