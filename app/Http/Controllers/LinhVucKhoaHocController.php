<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinhVucKhoaHoc;
use Illuminate\Support\Facades\DB;
use Redirect;

class LinhVucKhoaHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lvkh = LinhVucKhoaHoc::all();
        return view('linhvuckhoahoc', compact('lvkh'));
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
        $lcqls = new LinhVucKhoaHoc;
        $lcqls->TenLVKH = $request->LinhVucKhoaHoc;
        $lcqls->save();
        return Redirect::back()->with('success','Đã Thêm Lĩnh Vực Khoa Học');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dangkydetai_id)
    {
        $lvkhs = LinhVucKhoaHoc::where('ID',$dangkydetai_id)->first();
        return response()->json($lvkhs);

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
        $lvkh = LinhVucKhoaHoc::where('ID', $id)->first();
        $lvkh->TenLVKH = $request->LinhVucKhoaHoc;
        $lvkh->save();
        return response()->json($lvkh);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
    {
        $lvkh = LinhVucKhoaHoc::findOrFail($id);
        $lvkh->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }
    public function destroy($id)
    {
        //
    }
}