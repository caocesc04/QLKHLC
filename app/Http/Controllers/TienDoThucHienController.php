<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TienDoThucHien;
use App\FileAttack;
use Illuminate\Support\Facades\DB;
use Redirect;


class TienDoThucHienController extends Controller
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
          'NgayXacNhan' => 'required',
          'NguoiThucHien' => 'required',
        ],[
        'NgayXacNhan.required' => 'Chưa nhập Ngày xác nhận tiến độ',
        'NguoiThucHien.required' => 'Chưa nhập tên người thực hiện',
        ]);

        $tiendo = new TienDoThucHien;
        $tiendo->ID_thongtindetai = $request->id_ttdt;
        $tiendo->NgayXacNhan = date('Y-m-d', strtotime($request->NgayXacNhan));
        $tiendo->NguoiThucHien = $request->NguoiThucHien;
        $tiendo->NoiDung = $request->NoiDung;
        $tiendo->GhiChu = $request->GhiChu;
        $tiendo->save();
        if($request->hasfile('filetiendo'))
         {
            foreach($request->file('filetiendo') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $extension = $file->getClientOriginalExtension();
                $fileKH = time().'.'.$extension;
                $fileAttack= new FileAttack();
                $fileAttack->TenKiHieu=$fileKH;
                $fileAttack->TenFile=$name;
                $tiendo->fileattack()->save($fileAttack);
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
        $file = FileAttack::where('ID_TienDo',$id)->pluck('ID')->toArray();
        if($file !== null){
            foreach($file as $f ){
            $filedelete = FileAttack::findOrFail($f);
            $filedelete->delete();
            }
        }
        $ttdt = TienDoThucHien::findOrFail($id);
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
