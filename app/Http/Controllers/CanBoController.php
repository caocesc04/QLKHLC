<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CanBo;
use Illuminate\Support\Facades\DB;
use Redirect;

class CanBoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canbo = CanBo::all();
        return view('canbo', compact('canbo'));
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
        $canbo = new CanBo;
        $canbo->Ten = $request->TenCB;
        $canbo->DiaChi = $request->DiaChiCB;
        $canbo->SoDienThoai = $request->SoDienThoaiCB;
        $canbo->ChucVu = $request->ChucVuCB;

        $canbo->save();
        return Redirect::back()->with('success','Đã Thêm 01 Cán Bộ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dangkydetai_id)
    {
        $canbos = CanBo::where('ID',$dangkydetai_id)->first();
        return response()->json($canbos);

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
        $canbo = CanBo::where('ID', $id)->first();
        $canbo->Ten = $request->TenCB;
        $canbo->DiaChi = $request->DiaChiCB;
        $canbo->SoDienThoai = $request->SDTCB;
        $canbo->ChucVu = $request->ChucVuCB;
        $canbo->save();
        return response()->json($canbo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
    {
        $canbo = CanBo::findOrFail($id);
        $canbo->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }
    public function destroy($id)
    {
        //
    }
}