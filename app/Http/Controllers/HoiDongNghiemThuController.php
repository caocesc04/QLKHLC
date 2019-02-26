<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoiDongNghiemThu;
use App\FileAttack;
use Illuminate\Support\Facades\DB;
use Redirect;

class HoiDongNghiemThuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          'SoQuyetDinh' => 'required',
          'NgayNghiemThu' => 'required',
          'ChuTichHD' => 'required',
          'ThanhVienHD' => 'required',
        ],[
        'SoQuyetDinh.required' => 'Chưa nhập Số Quyết Định',
        'NgayNghiemThu.required' => 'Chưa nhập Ngày nghiệm thu đề tài',
        'ChuTichHD.required' => 'Chưa nhập Chủ tịch hội đồng',
        'ThanhVienHD.required' => 'Chưa nhập Thành viên hội đồng',
        ]);
        $hdnts = new HoiDongNghiemThu;
        $hdnts->ID_thongtindetai = $request->id_ttdt;
        $hdnts->ID_CapNghiemThu = $request->CapNghiemThu;
        $hdnts->ChuTichHD = $request->ChuTichHD;
        $hdnts->ThanhVienHD = $request->ThanhVienHD;
        $hdnts->Ngay = date('Y-m-d', strtotime($request->NgayNghiemThu));
        $hdnts->SoQuyetDinh = $request->SoQuyetDinh;
        $hdnts->NoiDung = $request->NoiDung;
        $hdnts->GhiChu = $request->GhiChu;
        $hdnts->save();
        if($request->hasfile('filenghiemthu'))
         {
            foreach($request->file('filenghiemthu') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $extension = $file->getClientOriginalExtension();
                $fileKH = time().'.'.$extension;
                $fileAttack= new FileAttack();
                $fileAttack->TenKiHieu=$fileKH;
                $fileAttack->TenFile=$name;
                $hdnts->fileattack()->save($fileAttack);
            }
         }
        return Redirect::back()->with('success','Thêm hội đồng nghiệm thu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        $route = FileAttack::findOrFail($id);
        $route->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }
    public function delete($id)
    {
        $file = FileAttack::where('ID_HoiDongNghiemThu',$id)->pluck('ID')->toArray();
        if($file !== null){
            foreach($file as $f ){
            $filedelete = FileAttack::findOrFail($f);
            $filedelete->delete();
            }
        }
        $ttdt = HoiDongNghiemThu::findOrFail($id);
        $ttdt->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }

}
