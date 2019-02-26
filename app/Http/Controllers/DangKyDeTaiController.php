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
use App\FileAttack;
use App\User;
use Illuminate\Support\Facades\DB;
use Redirect;


class DangKyDeTaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct () {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $thongtindetai = ThongTinDeTai::where('ID_TrangThai', '1')->orderBy('id', 'asc')->get();
        $lvkh = LinhVucKhoaHoc::all();
        $cqct = CoQuanChuTri::all();
        $lcql = LoaiCapQuanLy::all();
        $ctkh = ChuongTrinhKhoaHoc::where('status','Đang Diễn Ra')->get();
        $canbo = CanBo::all();
        return view('dangkydetai', compact('lvkh','cqct','lcql','ctkh','canbo','thongtindetai'));
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
        $this->validate(request(), [
          'TenCN' => 'required',
          'EmailCN' => 'required',
          'SDTCN' => 'required',
          'TenDT' => 'required',
          'ThoiGianDangKy' => 'required',
          'ThoiGianDuKien' => 'required',
          'KinhPhiDuKien' => 'integer',
          'VonNhaNuoc' => 'integer',
          'VonTuCo' => 'integer',

        ],[
        'TenCN.required' => 'Chưa nhập Tên chủ nhiệm đề tài',
        'EmailCN.required' => 'Chưa nhập Email chủ nhiệm đề tài',
        'SDTCN.required' => 'Chưa nhập Số điện thoại chủ nhiệm đề tài',
        'TenDT.required' => 'Chưa nhập Tên đề tài',
        'ThoiGianDangKy.required' => 'Chưa nhập Thời gian đăng ký đề tài',
        'ThoiGianDuKien.required' => 'Chưa nhập Thời gian dự kiến làm đề tài',
        'KinhPhiDuKien.integer' => 'Kinh phí dự kiến phải là kiểu số',
        'VonNhaNuoc.integer' => 'Vốn nhà nước phải là kiểu số',
        'VonTuCo.integer' => 'Vốn cá nhân phải là kiểu số',
        ]);
        $cndt = new ChuNhiemDeTai;
        $cndt->Ten = $request->TenCN;
        $cndt->Email = $request->EmailCN;
        $cndt->SoDienThoai = $request->SDTCN;
        $cndt->DiaChi = $request->DiaChiCN;
        $cqct = new CoQuanChuTri;
        $cqct->Ten = $request->TenCQTC;
        $cqct->DiaChi = $request->DiaChiCQTC;
        $cqct->Email = $request->EmailCQTC;
        $cqct->SoDienThoai = $request->SDTCQTC;
        $ttdt = new ThongTinDeTai;
        $ttdt->TenDeTai = $request->TenDT;
        $ttdt->ThoiGianDuKien = $request->ThoiGianDuKien;
        $ttdt->ThoiGianDangKy = date('Y-m-d', strtotime($request->ThoiGianDangKy));
        $ttdt->KinhPhiDuKien = $request->KinhPhiDuKien;
        $ttdt->VonNhaNuoc = $request->VonNhaNuoc;
        $ttdt->VonTuCo = $request->VonTuCo;
        $ttdt->ID_LinhVuc = $request->LinhVucKhoaHoc;
        $ttdt->ID_CoQuanChuTri = $request->CoQuanToChuc;
        $ttdt->ID_LoaiCapQuanLy = $request->LoaiCapQuanLy;
        $ttdt->ID_CanBo = $request->CanBoQuanLy;
        $ttdt->ID_ChuongTrinhKhoaHoc = $request->ChuongTrinhKhoaHoc;
        $ttdt->ID_TrangThai = '1';
        $cqct->save();
        $cndt->save();
        $cqct->thongtindetai()->save($ttdt);
        $cndt->thongtindetai()->save($ttdt);
        if($request->hasfile('filename'))
         {
            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $extension = $file->getClientOriginalExtension();
                $fileKH = time().'.'.$extension;
                $fileAttack= new FileAttack();
                $fileAttack->TenKiHieu=$fileKH;
                $fileAttack->TenFile=$name;
                $ttdt->fileattack()->save($fileAttack);
            }
         }
        return Redirect::back()->with('success','Thêm đề tài thành công!');
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

        $hdtd = HoiDongThamDinh::with('thongtindetai','loaicapquanly')->where('ID_thongtindetai', $dangkydetai_id)->get();
        $idhdtd = HoiDongThamDinh::where('ID_thongtindetai', $dangkydetai_id)->pluck('ID')->toArray();
        $filethamdinh = FileAttack::with('hoidongthamdinh')->whereIn('ID_HoiDongThamDinh',$idhdtd)->get();

        $ttdts = ThongTinDeTai::with('coquanchutri','linhvuckhoahoc','chunhiemdetai','loaicapquanly','canbo','chuongtrinhkhoahoc')->where('ID',$dangkydetai_id)->first();
        $fileAttacks = FileAttack::select('ID','TenFile')->where('ID_thongtindetai',$ttdts->ID)->get();
        return response()->json(array('lcqls'=>$lcqls,'ttdts'=>$ttdts,'lvkhs'=>$lvkhs,'ctkhs'=>$ctkhs,'cbqls'=>$cbqls,'fileAttacks'=>$fileAttacks,'hdtd'=>$hdtd,'filethamdinh'=>$filethamdinh));
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

        $hdtd = HoiDongThamDinh::with('thongtindetai','loaicapquanly')->where('ID_thongtindetai', $id)->get();
        $idhdtd = HoiDongThamDinh::where('ID_thongtindetai', $id)->pluck('ID')->toArray();
        $filethamdinh = FileAttack::with('hoidongthamdinh')->whereIn('ID_HoiDongThamDinh',$idhdtd)->get();

        return view('dangkydetaiedit', compact('ttdt','lvkhs','lcqls','ctkhs','cbqls','fileattacks','id','hdtd',
'filethamdinh'));
    }
    public function sua(Request $request)
    {
        $ttdt = ThongTinDeTai::findOrFail($request->id);

        return compact('ttdt');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dangkydetai_id)
    {
        $this->validate(request(), [
          'TenCN' => 'required',
          'EmailCN' => 'required',
          'SDTCN' => 'required',
          'TenDT' => 'required',
          'ThoiGianDangKy' => 'required',
          'ThoiGianDuKien' => 'required',
          'KinhPhiDuKien' => 'integer',
          'VonNhaNuoc' => 'integer',
          'VonTuCo' => 'integer',
        ],[
        'TenCN.required' => 'Chưa nhập Tên chủ nhiệm đề tài',
        'EmailCN.required' => 'Chưa nhập Email chủ nhiệm đề tài',
        'SDTCN.required' => 'Chưa nhập Số điện thoại chủ nhiệm đề tài',
        'TenDT.required' => 'Chưa nhập Tên đề tài',
        'ThoiGianDangKy.required' => 'Chưa nhập Thời gian đăng ký đề tài',
        'ThoiGianDuKien.required' => 'Chưa nhập Thời gian dự kiến làm đề tài',
        'KinhPhiDuKien.integer' => 'Kinh phí dự kiến phải là kiểu số',
        'VonNhaNuoc.integer' => 'Vốn nhà nước phải là kiểu số',
        'VonTuCo.integer' => 'Vốn cá nhân phải là kiểu số',
        ]);
        $thongtindetai = ThongTinDeTai::where('ID_TrangThai', '1')->orderBy('id', 'asc')->get();
        $lvkh = LinhVucKhoaHoc::all();
        $cqct = CoQuanChuTri::all();
        $lcql = LoaiCapQuanLy::all();
        $ctkh = ChuongTrinhKhoaHoc::where('status','Đang Diễn Ra')->get();
        $canbo = CanBo::all();

        $ttdts = ThongTinDeTai::with('coquanchutri','linhvuckhoahoc','chunhiemdetai','loaicapquanly','canbo','chuongtrinhkhoahoc')->where('ID',$dangkydetai_id)->first();
        $canbos = CanBo::where('ID', $ttdts->ID_CanBo)->first();
        $lvkhs = LinhVucKhoaHoc::where('ID', $ttdts->ID_LinhVuc)->first();
        $ctkhs = ChuongTrinhKhoaHoc::where('ID', $ttdts->ID_ChuongTrinhKhoaHoc)->first();
        $lcqls = LoaiCapQuanLy::where('ID', $ttdts->ID_LoaiCapQuanLy)->first();
        $ttdts->TenDeTai = $request->get('TenDT');
        $ttdts->ThoiGianDuKien = $request->get('ThoiGianDuKien');
        $ttdts->ThoiGianDangKy = date('Y-m-d', strtotime($request->get('ThoiGianDangKy')));
        $ttdts->KinhPhiDuKien = $request->get('KinhPhiDuKien');
        $ttdts->VonNhaNuoc = $request->get('VonNhaNuoc');
        $ttdts->VonTuCo = $request->get('VonTuCo');
        $ttdts->ID_LinhVuc = $request->get('LinhVucKhoaHoc');
        $ttdts->ID_LoaiCapQuanLy = $request->get('LoaiCapQuanLy');
        $ttdts->ID_ChuongTrinhKhoaHoc = $request->get('ChuongTrinhKhoaHoc');
        $ttdts->ID_CanBo = $request->get('CanBoQuanLy');
        $testcndt = ChuNhiemDeTai::where('Ten', $request->get('TenCN'))->where('SoDienThoai', $request->get('SDTCN'))->where('DiaChi', $request->get('DiaChiCN'))->where('Email',$request->get('EmailCN'))->value("ID");
        if($testcndt===null){
            ChuNhiemDeTai::where('ID', $ttdts->ID_ChuNhiemDeTai)->update(['Ten' => $request->get('TenCN'),'SoDienThoai'=>$request->get('SDTCN'),'DiaChi'=>$request->get('DiaChiCN'),'Email'=>$request->get('EmailCN')]);
        }else{
            $ttdts->ID_ChuNhiemDeTai = $testcndt;
        }
        $testcqct = CoQuanChuTri::where('Ten', $request->get('TenCQTC'))->where('SoDienThoai', $request->get('SDTCQTC'))->where('DiaChi', $request->get('DiaChiCQTC'))->where('Email',$request->get('EmailCQTC'))->value("ID");
        if($testcqct===null){
            CoQuanChuTri::where('ID', $ttdts->ID_CoQuanChuTri)->update(['Ten' => $request->get('TenCQTC'),'SoDienThoai'=>$request->get('SDTCQTC'),'DiaChi'=>$request->get('DiaChiCQTC'),'Email'=>$request->get('EmailCQTC')]);
        }else{
            $ttdts->ID_CoQuanChuTri = $testcqct;
        }
        if($request->get('save') == 0){
          $this->validate(request(), [
          'SoQuyetDinh' => 'required',
          'NgayQuyetDinh' => 'required',
          'GiaTriDeTai' => 'required|integer',
          'VonNhaNuoc2' => 'required|integer',
          'ThoiGianBatDau' => 'required',
          'ThoiGianKetThuc' => 'required',
        ],[
        'SoQuyetDinh.required' => 'Chưa nhập Số Quyết Định',
        'NgayQuyetDinh.required' => 'Chưa nhập Ngày Quyết Định chủ nhiệm đề tài',
        'GiaTriDeTai.required' => 'Chưa nhập Giá trị đề tài chủ nhiệm đề tài',
        'GiaTriDeTai.integer' => 'Giá trị đề tài phải là số',
        'VonNhaNuoc2.required' => 'Chưa nhập Vốn nhà nước đề tài',
        'ThoiGianBatDau.required' => 'Chưa nhập Thời gian bắt đầu thực hiện',
        'ThoiGianKetThuc.required' => 'Chưa nhập Thời gian kết thúc làm đề tài',
        ]);
        $ttdts->SoQuyetDinh = $request->get('SoQuyetDinh');
        $ttdts->NgayQuyetDinh = date('Y-m-d', strtotime($request->get('NgayQuyetDinh')));
        $ttdts->KinhPhiDuKien = $request->get('GiaTriDeTai');
        $ttdts->VonNhaNuoc = $request->get('VonNhaNuoc2');
        $ttdts->ThoiGianBatDau = date('Y-m-d', strtotime($request->get('ThoiGianBatDau')));
        $ttdts->ThoiGianKetThuc = date('Y-m-d', strtotime($request->get('ThoiGianKetThuc')));
        $ttdts->ID_TrangThai = 2;
        $ttdts->save();
        if($request->hasfile('fileedit2'))
         {
            foreach($request->file('fileedit2') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $extension = $file->getClientOriginalExtension();
                $fileKH = time().'.'.$extension;
                $fileAttack= new FileAttack();
                $fileAttack->TenKiHieu=$fileKH;
                $fileAttack->TenFile=$name;
                $ttdts->fileattack()->save($fileAttack);
            }
         }
        }else{
            $ttdts->save();
        }
        if($request->hasfile('fileedit'))
         {
            foreach($request->file('fileedit') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $extension = $file->getClientOriginalExtension();
                $fileKH = time().'.'.$extension;
                $fileAttack= new FileAttack();
                $fileAttack->TenKiHieu=$fileKH;
                $fileAttack->TenFile=$name;
                $ttdts->fileattack()->save($fileAttack);
            }
         }
        if($request->get('save') == 0){
            return Redirect('/dangkydetai')->with('success','Update thành công');
        }else{
            return Redirect::back()->with('success','Update thành công');
        }
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
        $ttdt = ThongTinDeTai::findOrFail($id);
        $ttdt->delete();
        return Redirect::back()->with('success','Xóa thành công');
    }
    public function destroy($id)
    {
        $route = FileAttack::findOrFail($id);
        $route->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }

}
