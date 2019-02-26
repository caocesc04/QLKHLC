<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoiDongThamDinh;
use App\FileAttack;
use Illuminate\Support\Facades\DB;
use Redirect;

class HoiDongThamDinhController extends Controller
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
          'NgayQuyetDinh' => 'required',
          'VonNhaNuoc2' => 'required|integer',
          'ChuTichHD' => 'required',
          'ThanhVienHD' => 'required',
          'GiaTriThamDinh' => 'integer'
        ],[
        'SoQuyetDinh.required' => 'Chưa nhập Số Quyết Định',
        'NgayQuyetDinh.required' => 'Chưa nhập Ngày quyết định đề tài',
        'VonNhaNuoc2.required' => 'Chưa nhập Vốn nhà nước đề tài',
        'ChuTichHD.required' => 'Chưa nhập Chủ tịch hội đồng',
        'ThanhVienHD.required' => 'Chưa nhập Thành viên hội đồng',
        'GiaTriThamDinh.integer' => 'Giá trị thẩm định phải là kiểu số',
        ]);

        $hdtds = new HoiDongThamDinh;
        $hdtds->id_thongtindetai = $request->id_ttdt;
        $hdtds->ID_CapThamDinh = $request->CapThamDinh;
        $hdtds->ChuTichHD = $request->ChuTichHD;
        $hdtds->ThanhVienHD = $request->ThanhVienHD;
        $hdtds->NgayThamDinh = date('Y-m-d', strtotime($request->NgayThamDinh));
        $hdtds->SoQuyetDinh = $request->SoQuyetDinh;
        $hdtds->NoiDung = $request->NoiDung;
        $hdtds->GiaTriThamDinh = $request->GiaTriThamDinh;
        $hdtds->ThoiGianThucHien = $request->ThoiGianThucHien;
        $hdtds->save();
        if($request->hasfile('filethamdinh'))
         {
            foreach($request->file('filethamdinh') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $extension = $file->getClientOriginalExtension();
                $fileKH = time().'.'.$extension;
                $fileAttack= new FileAttack();
                $fileAttack->TenKiHieu=$fileKH;
                $fileAttack->TenFile=$name;
                $hdtds->fileattack()->save($fileAttack);
            }
         }
        return Redirect::back()->with('success','Thêm hội đồng thẩm định!');
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
    public function delete($id)
    {
        $file = FileAttack::where('ID_HoiDongThamDinh',$id)->pluck('ID')->toArray();
        if($file !== null){
            foreach($file as $f ){
                $filedelete = FileAttack::findOrFail($f);
                $filedelete->delete();
            }
        }
        $ttdt = HoiDongThamDinh::findOrFail($id);
        $ttdt->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }
    public function destroy($id)
    {
        $route = FileAttack::findOrFail($id);
        $route->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }
}
