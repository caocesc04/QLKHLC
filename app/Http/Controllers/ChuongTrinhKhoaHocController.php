<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuongTrinhKhoaHoc;
use Illuminate\Support\Facades\DB;
use Redirect;

class ChuongTrinhKhoaHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctkh = ChuongTrinhKhoaHoc::all();
        return view('chuongtrinhkhoahoc', compact('ctkh'));
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
        $ctkhs = new ChuongTrinhKhoaHoc;
        $ctkhs->TenCTKH = $request->ChuongTrinhKhoaHoc;
        $ctkhs->status = 'Đang Diễn Ra';
        $ctkhs->save();
        return Redirect::back()->with('success','Đã Thêm Chương Trình Khoa Học');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dangkydetai_id)
    {
        $ctkhs = ChuongTrinhKhoaHoc::where('ID',$dangkydetai_id)->first();
        return response()->json($ctkhs);

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
        $ctkh = ChuongTrinhKhoaHoc::where('ID', $id)->first();
        $ctkh->TenCTKH = $request->ChuongTrinhKhoaHoc;
        $ctkh->status = $request->status;
        $ctkh->save();
        return response()->json($ctkh);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
    {
        $ctkh = ChuongTrinhKhoaHoc::findOrFail($id);
        $ctkh->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }
    public function destroy($id)
    {
        //
    }
}