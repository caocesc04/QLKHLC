<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiCapQuanLy;
use Illuminate\Support\Facades\DB;
use Redirect;

class LoaiCapQuanLyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lcql = LoaiCapQuanLy::all();
        return view('capquanly', compact('lcql'));
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
        $lcqls = new LoaiCapQuanLy;
        $lcqls->TenLoaiCap = $request->LoaiCapQuanLy;
        $lcqls->save();
        return Redirect::back()->with('success','Đã Thêm Cấp Quản Lý');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dangkydetai_id)
    {
        $lcqls = LoaiCapQuanLy::where('ID',$dangkydetai_id)->first();
        return response()->json($lcqls);

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
        $lcql = LoaiCapQuanLy::where('ID', $id)->first();
        $lcql->TenLoaiCap = $request->LoaiCapQuanLy;
        $lcql->save();
        return response()->json($lcql);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
    {
        $lcql = LoaiCapQuanLy::findOrFail($id);
        $lcql->delete();
        return Redirect::back()->with('success','Xóa file thành công');
    }
    public function destroy($id)
    {
        //
    }
}
