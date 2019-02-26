<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiChinhDeTai;
use App\FileAttack;
use Illuminate\Support\Facades\DB;
use Redirect;


class TaiChinhController extends Controller
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
          'NgayThanhToan' => 'required',
          'SoTien' => 'required|integer',
          'NguoiGiao' => 'required',
          'NguoiNhan' => 'required',

        ],[
        'NgayThanhToan.required' => 'Chưa nhập ngày thanh toán',
        'SoTien.required' => 'Chưa nhập Số tiền',
        'SoTien.integer' => 'Số tiền phải là số',
        'NguoiGiao.required' => 'Chưa nhập tên người giao tiền',
        'NguoiNhan.required' => 'Chưa nhập tên người nhận tiền',
        ]);

        $taichinh = new TaiChinhDeTai;
        $taichinh->ID_thongtindetai = $request->id_ttdt;
        $taichinh->Ngay = date('Y-m-d', strtotime($request->NgayThanhToan));
        $taichinh->SoTien = $request->SoTien;
        $taichinh->ID_HinhThucThanhToan = $request->HinhThucThanhToan;
        $taichinh->NguoiGiao = $request->NguoiGiao;
        $taichinh->NguoiNhan = $request->NguoiNhan;
        $taichinh->NoiDung = $request->NoiDung;
        $taichinh->GhiChu = $request->GhiChu;
        $taichinh->save();
        if($request->hasfile('filetaichinh'))
         {
            foreach($request->file('filetaichinh') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $extension = $file->getClientOriginalExtension();
                $fileKH = time().'.'.$extension;
                $fileAttack= new FileAttack();
                $fileAttack->TenKiHieu=$fileKH;
                $fileAttack->TenFile=$name;
                $taichinh->fileattack()->save($fileAttack);
            }
         }
        return Redirect::back()->with('success','Thêm tiến độ thành công!');
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
        $file = FileAttack::where('ID_TaiChinhDeTai',$id)->pluck('ID')->toArray();
        if($file !== null){
            foreach($file as $f ){
            $filedelete = FileAttack::findOrFail($f);
            $filedelete->delete();
            }
        }
        $ttdt = TaiChinhDeTai::findOrFail($id);
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
