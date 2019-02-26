<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>QLDTKH Sở Khoa Học Công Nghê Tỉnh Lai Châu</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="/css/plugins/codemirror/codemirror.css" rel="stylesheet"></head>
<body>
    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" style="height: 50%; width: 100%" src="/img/logo_skhcn.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                        </a>
                    </div>
                    <div class="logo-element">
                        Sở Tài Nguyên
                    </div>
                </li>
                <li class="active">
                    <a href="/dangkydetai"><i class="fa fa-diamond"></i> <span class="nav-label">Đăng Ký Đề Tài</span></a>
                </li>
                <li>
                    <a href="/detaidangthuchien"><i class="fa fa-address-card-o"></i> <span class="nav-label">Đề Tài Đang Thực Hiện</span></a>
                </li>
                <li>
                    <a href="/detaidathuchien"><i class="fa fa-file-excel-o"></i> <span class="nav-label">Đề Tài Đã Thực Hiện </span></a>
                </li>
                <li>
                    <a href="/detaidahuy"><i class="fa fa-chain-broken"></i> <span class="nav-label">Đề Tài Đã Hủy</span></a>
                </li>
                <li>
                    <a href="/detaichamtiendo"><i class="fa fa-bullseye"></i> <span class="nav-label">Đề Tài Chậm Tiến Độ </span></a>
                </li>
                 <li  >
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Danh Mục</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li ><a href="/capquanly">Cấp Quản Lý</a></li>
                        <li ><a href="/linhvuckhoahoc">Lĩnh Vực Khoa Học</a></li>
                        <li ><a href="/chuongtrinhkhoahoc">Chương Trình Khoa Học</a></li> 
                         
                        <li ><a href="/canbo">Cán Bộ</a></li>  
                    </ul>
                </li>
                <li >
                    <a href="/thongke"><i class="fa fa-line-chart"></i> <span class="nav-label">Thống Kê</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input style="border-radius: 10px;" type="text" placeholder="Tìm Kiếm ..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Đăng Xuất
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div><br />
                  @endif
                  @if (Session::has('success'))
                  <div class="alert alert-success">
                      <p>{{ Session::get('success') }}</p>
                  </div><br />
                  @endif
                <div class="col-lg-12">
                    <h2>Đăng Ký Đề Tài</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="/dangkydetai">Trang Chủ</a>
                        </li>
                        <li class="active">
                            <strong>Đăng Ký Đề Tài</strong>
                        </li>
                        <li class="active">
                            <strong>Sửa Đề Tài</strong>
                        </li>
                    </ol>
                </div>
                
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Thông Tin Chung </a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Hội Đồng Thẩm Định</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<div class="tab-content">
    <div id="tab-1" class="tab-pane active">
        <div class="ibox-content">
        <form method="post" action="{{route('dangkydetai.update', $id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            
            <div class="row show-grid" >
                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                    <b><p>Tên Cơ Quan Tổ Chức </p></b>  
                    <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->coquanchutri->Ten}}" name="TenCQTC" name="TenCQTC" class="form-control">
                </div>
                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                    <b><p>Email </p></b>
                    <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->coquanchutri->Email}}" name="EmailCQTC" class="form-control">
                </div>
                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                    <b> <p>Số ĐT </p> </b>
                    <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->coquanchutri->SoDienThoai}}" name="SDTCQTC" class="form-control">
                </div>
                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                    <b><p>Địa Chỉ </p> </b>
                     <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->coquanchutri->DiaChi}}" name="DiaChiCQTC" class="form-control">
                </div>                                                     
            </div>
            <div class="row show-grid" style="margin: -15px 0;">
                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                    <b><p>Tên Chủ Nhiệm Đề Tài <a style="color: red">(*)</a></p></b>  
                    <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->chunhiemdetai->Ten}}" name="TenCN" class="form-control">
                </div>
                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                    <b><p>Email <a style="color: red">(*)</a></p></b>
                    <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->chunhiemdetai->Email}}" name="EmailCN" class="form-control">
                </div>
                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                    <b> <p>Số ĐT <a style="color: red">(*)</a></p> </b>
                    <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->chunhiemdetai->SoDienThoai}}" name="SDTCN" class="form-control">
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                    <b><p>Địa Chỉ <a style="color: red">(*)</a></p> </b>
                     <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->chunhiemdetai->DiaChi}}" name="DiaChiCN" class="form-control">
                </div>               
            </div>
            <div class="row show-grid" style="margin: -15px 0;">
                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                    <b><p>Tên Đề Tài <a style="color: red">(*)</a></p> </b>
                     <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->TenDeTai}}" name="TenDT" class="form-control">
                </div> 
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                    <b> <p>Thời Gian Dự Kiến <a style="color: red">(*)</a></p> </b>
                    <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->ThoiGianDuKien}}" name="ThoiGianDuKien" class="form-control">
                </div>
                <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                    <b><p>Thời Gian Đăng Ký <a style="color: red">(*)</a></p></b>
                <div class="input-group date"style="width: 100%;">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="ThoiGianDangKy" id="ThoiGianDangKy" style="border-radius: 10px;"  type="text" class="form-control" value="{{date('d-m-Y', strtotime($ttdt->ThoiGianDangKy))}}">
                </div>
                </div>
            </div>
            <div class="row show-grid" style="margin: -15px 0;">
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                <b><p>Kinh Phí Dự Kiến </p></b>  
                <input style="border-radius: 10px; width:100%;" type="text" class="form-control" value="{{$ttdt->KinhPhiDuKien}}" name="KinhPhiDuKien">
            </div>
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                <b><p>Vốn Nhà Nước</p></b>
                <input style="border-radius: 10px;width:100%;" type="text" class="form-control" value="{{$ttdt->VonNhaNuoc}}" name="VonNhaNuoc">
            </div>
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                <b> <p>Vốn Tự Có</p> </b>
                <input style="border-radius: 10px;width:100%;" type="text" class="form-control" value="{{$ttdt->VonTuCo}}" name="VonTuCo">
            </div>
            </div>                             
            <div class="row show-grid" style="margin: -15px 0;">
                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                    <b><p>Loại Cấp Quản Lý </p> </b>
                    <select class="form-control m-b" style="border-radius: 10px;width: 100%;" name="LoaiCapQuanLy" id="LoaiCapQuanLy">
                        @foreach($lcqls as $lcql)
                            <option value="{{ $lcql->ID }}"  @if($lcql->TenLoaiCap==$ttdt->loaicapquanly->TenLoaiCap) selected='selected' @endif >{{ $lcql->TenLoaiCap }}</option>
                        @endforeach  
                    </select>
                </div>
                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                    <b><p>Lĩnh Vực Khoa Học </p> </b>
                    <select class="form-control m-b" style="border-radius: 10px;width: 100%;" name="LinhVucKhoaHoc" id="LinhVucKhoaHoc">
                        @foreach($lvkhs as $lvkh)
                            <option value="{{ $lvkh->ID }}"  @if($lvkh->TenLVKH==$ttdt->linhvuckhoahoc->TenLVKH) selected='selected' @endif >{{ $lvkh->TenLVKH }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                    <b><p>Chương Trình Khoa Học</p> </b>
                    <select class="form-control m-b" style="border-radius: 10px;width: 100%;" name="ChuongTrinhKhoaHoc" id="ChuongTrinhKhoaHoc">
                        @foreach($ctkhs as $ctkh)
                            <option value="{{ $ctkh->ID }}"  @if($ctkh->TenCTKH==$ttdt->chuongtrinhkhoahoc->TenCTKH) selected='selected' @endif >{{ $ctkh->TenCTKH }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                    <b><p>Cán Bộ Quản Lý</p> </b>
                    <select class="form-control m-b" style="border-radius: 10px;width: 100%;" name="CanBoQuanLy" id="CanBoQuanLy">
                        @foreach($cbqls as $cbql)
                            <option value="{{ $cbql->ID }}"  @if($cbql->Ten==$ttdt->canbo->Ten) selected='selected' @endif >{{ $cbql->Ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-xs-12"style="padding-top: 0px;padding-bottom: 0px;border: 1px solid #ececec;background-color: #fff !important;border:none;margin-bottom: 30px;">
                    <div class="input-group control-group increment2" >
                      <input type="file" name="fileedit[]" class="form-control">
                      <div class="input-group-btn"> 
                        <button class="btn btn-success add2" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                      </div>
                    </div>
                    <div class="clone2 hide">
                      <div class="control-group input-group" style="margin-top:10px">
                        <input type="file" name="fileedit[]" class="form-control">
                        <div class="input-group-btn"> 
                          <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                      </div>
                    </div>
                </div>
                    <div class="col-lg-12" style="margin-top: 30px;">
                        <div class="col-md-9"></div>
                        <div class="col-md-2">
                            <button type="button" data-toggle="modal" data-target="#modalBatDau" class="btn btn-outline btn-warning" style="float: left; margin-bottom: 0px;">Bắt Đầu Thực Hiện</button>
                        </div>
                        <div class="modal inmodal fade" id="modalBatDau" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-lg" style="width: 1000px;margin: 30px auto;">
                                <div class="modal-content"style="border: 3px solid transparent;border-radius: 10px;    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);border-color: #1ab394;">
                                    <div class="modal-header"style="padding: 2px 6px;text-align: center;background-color: #1ab394;    border-color: #1ab394;">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title"style="color: #ffffff;">Bắt Đầu Thực Hiện Đề Tài</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row show-grid" >
                                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                <b><p>Số Quyết Định <a style="color: red">(*)</a></p></b>  
                                                <input style="border-radius: 10px;" type="text" class="form-control" name="SoQuyetDinh">
                                            </div>
                                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                <b><p>Ngày Quyết Định <a style="color: red">(*)</a></p></b>
                                                <div class="input-group date"style="width: 100%;">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="ngayquyetdinh" style="border-radius: 10px;"  type="text" class="form-control" name="NgayQuyetDinh">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row show-grid"style="margin: -15px 0;">
                                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                <b><p>Giá Trị Đề Tài <a style="color: red">(*)</a></p></b>  
                                                <input style="border-radius: 10px;" type="text" class="form-control" name="GiaTriDeTai">
                                            </div>
                                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                <b><p>Vốn Nhà Nước <a style="color: red">(*)</a></p></b>  
                                                <input style="border-radius: 10px;" type="text" class="form-control" name="VonNhaNuoc2">
                                            </div>
                                        </div>
                                        <div class="row show-grid"style="margin: -15px 0;">
                                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                <b><p>Thời Gian Bắt Đầu <a style="color: red">(*)</a></p></b>
                                                <div class="input-group date"style="width: 100%;">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="thoigianbatdau" style="border-radius: 10px;"  type="text" class="form-control" name="ThoiGianBatDau">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                <b><p>Thời Gian Kết Thúc <a style="color: red">(*)</a></p></b>
                                                <div class="input-group date"style="width: 100%;">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="thoigianketthuc" style="border-radius: 10px;"  type="text" class="form-control" name="ThoiGianKetThuc">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row show-grid"style="margin: -15px 0;">
                                        <div class="col-xs-12"style="padding-top: 0px;padding-bottom: 0px;border: 1px solid #ececec;background-color: #fff !important;border:none;margin-bottom: 30px;">
                                            <div class="input-group control-group increment3" >
                                              <input type="file" name="fileedit2[]" class="form-control">
                                              <div class="input-group-btn"> 
                                                <button class="btn btn-success add3" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                              </div>
                                            </div>
                                            <div class="clone3 hide">
                                              <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="fileedit2[]" class="form-control">
                                                <div class="input-group-btn"> 
                                                  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline btn-info" data-dismiss="modal"style="    margin-bottom: 0px;">Đóng</button>
                                        <button type="submit" class="btn btn-success" data-style="zoom-in" name=save value="0" > Lưu </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" name="save" value="1" class="btn btn-success" data-style="zoom-in"> Lưu </button>
                        </div>
                    </div>
        </form>
        <div class="row show-grid">
            <h5>Danh Sách File</h5>
            @foreach($fileattacks as $fileattack)   
                <a class="col-xs-6" href="/files/{{$fileattack->TenFile}}" id="preview" name="preview">{{$fileattack->TenFile}}</a>
            <form action="{{route('dangkydetai.destroy', [$fileattack->ID])}}" method="post">
                {{csrf_field()}} 
                <input name="_method" type="hidden" value="DELETE">
                <button class="col-xs-6" style="color: red" class="btn btn-danger" type="submit"> Remove</button>
            </form>
            @endforeach
        </div>
        </div>
    </div>
    <div id="tab-2" class="tab-pane">
        <div class="ibox-content">
            <div class="text-right">
                <button class="btn btn-info " type="button" data-toggle="modal" data-target="#modalHDTD">
                    <i class="fa fa-paste"></i>Thêm Mới
                </button>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Danh Sách Thẩm Định</h5>
                            </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr style="font-size: 10px;">
                                        <th>Ngày Thẩm Định</th>
                                        <th>Số Quyết Định</th>
                                        <th>Cấp Thẩm Định</th>
                                        <th>Chủ Tịch Hội Đồng</th>
                                        <th>Thành Viên Hội Đồng</th>
                                        <th>Giá Trị Thẩm Định</th>
                                        <th>Thời Gian Thực Hiện</th>
                                        <th>Nội Dung</th>
                                        <th>Ghi Chú</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($hdtd as $hdtds)
                                    <tr class="gradeX">
                                        <td>{{date('d-m-Y', strtotime($hdtds->NgayThamDinh))}}</td>
                                        <td>{{$hdtds->SoQuyetDinh}}</td>
                                        <td>{{$hdtds->loaicapquanly->TenLoaiCap}}</td>
                                        <td>{{$hdtds->ChuTichHD}}</td>
                                        <td>{{$hdtds->ThanhVienHD}}</td>
                                        <td>{{$hdtds->GiaTriThamDinh}}</td>
                                        <td>{{$hdtds->ThoiGianThucHien}}</td>
                                        <td>{{$hdtds->NoiDung}}</td>
                                        <td>{{$hdtds->GhiChu}}</td>
                                        <td class="center">
                                            <a class="btn btn-outline btn-success  dim" style=" padding: 1px 9px;"><i class="fa fa-paint-brush"></i></a>
                                        </td>
                                        <td class="center">
                                        <form action="{{action('HoiDongThamDinhController@delete', $hdtds['ID'])}}" method="post">
                                            {{csrf_field()}} 
                                            <input name="_method" type="hidden" value="delete">
                                            <button class="btn btn-outline btn-danger  dim" type="submit" style=" padding: 1px 9px;"><i class="fa fa-trash"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Danh Sách File Thẩm Định</h5>
                            </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr style="font-size: 10px;">
                                        <th>Tên File</th>
                                        <th>Số Quyết Định</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($filethamdinh as $ftk)   
                                    <tr class="gradeX">
                                        <td><a href="/files/{{$ftk->TenFile}}" id="preview" name="preview">{{$ftk->TenFile}}</a></td>
                                        <td>{{$ftk->hoidongthamdinh->SoQuyetDinh}}</td>
                                        <td class="center">
                                        <form action="{{route('hoidongthamdinh.destroy', [$ftk->ID])}}" method="post">
                                            {{csrf_field()}} 
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-outline btn-danger  dim" type="submit" style=" padding: 1px 9px;"><i class="fa fa-trash"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
    <form method="post" action="{{route('hoidongthamdinh.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="id_ttdt" type="hidden" value="{{$ttdt->ID}}">
        <div class="modal inmodal fade" id="modalHDTD" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width: 1000px;margin: 30px auto;">
                <div class="modal-content"style="border: 3px solid transparent;border-radius: 10px;    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);border-color: #1ab394;">
                    <div class="modal-header"style="padding: 2px 6px;text-align: center;background-color: #1ab394;    border-color: #1ab394;">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"style="color: #ffffff;">Hội Đồng Thẩm Định</h4>
                    </div>
                    <div class="modal-body"style="padding: 1px 30px 1px 30px;">
                        <div class="row show-grid" >
                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                <b><p>Số Quyết Định <a style="color: red">(*)</a></p></b>  
                                <input style="border-radius: 10px;" type="text" class="form-control" name="SoQuyetDinh">
                            </div>
                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                <b><p>Ngày Thẩm Định <a style="color: red">(*)</a></p></b>
                                <div class="input-group date"style="width: 100%;">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="ngaythamdinh" style="border-radius: 10px;"  type="text" class="form-control" name="NgayThamDinh">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                <b> <p>Cấp Thẩm Định <a style="color: red">(*)</a></p> </b>
                                <select class="form-control" style="border-radius: 10px;width: 100%;" name="CapThamDinh" id="CapThamDinh">
                                    @foreach($lcqls as $lcql)
                                        <option value="{{ $lcql->ID }}">{{ $lcql->TenLoaiCap }}</option>
                                    @endforeach  
                                </select>
                            </div>                                                   
                        </div>
                        <div class="row show-grid"style="margin: -15px 0;">
                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                <b><p>Chủ Tịch Hội Đồng <a style="color: red">(*)</a></p></b>  
                                <input style="border-radius: 10px;" type="text" class="form-control" name="ChuTichHD">
                            </div>
                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                <b><p>Thành Viên Hội Đồng <a style="color: red">(*)</a></p></b>
                                <input style="border-radius: 10px;" type="text" class="form-control" name="ThanhVienHD">
                            </div>
                            <div class="col-xs-6 col-sm-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                <b><p>Nội Dung</p></b>
                                <input style="border-radius: 10px;" type="text" class="form-control" name="NoiDung">
                            </div>
                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                <b><p>Giá Trị Thẩm Định </p></b>
                                <input style="border-radius: 10px;" type="text" class="form-control" name="GiaTriThamDinh">
                            </div>
                            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                <b><p>Thời Gian Thực Hiện</p></b>
                                <input style="border-radius: 10px;" type="text" class="form-control" name="ThoiGianThucHien">
                            </div>
                            <div class="col-xs-6 col-sm-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                <b><p>Ghi Chú</p></b>
                                <input style="border-radius: 10px;" type="text" class="form-control" name="GhiChu">
                            </div>
                        </div>
                        <div class="clearfix visible-xs"></div>
                        <div class="row show-grid" >
                            <div class="col-xs-12"style="padding-top: 0px;padding-bottom: 0px;border: 1px solid #ececec;background-color: #fff !important;border:none;margin-bottom: 30px;">
                                <b><p>File Đính Kèm</p></b>
                                <div class="input-group control-group increment2" >
                                  <input type="file" name="filethamdinh[]" class="form-control">
                                  <div class="input-group-btn"> 
                                    <button class="btn btn-success add2" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                  </div>
                                </div>
                                <div class="clone2 hide">
                                  <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="filethamdinh[]" class="form-control">
                                    <div class="input-group-btn"> 
                                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline btn-info" data-dismiss="modal"style="    margin-bottom: 0px;">Đóng</button>
                        <button type="submit" class="btn btn-success" data-style="zoom-in" > Lưu </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        
        <div class="footer">
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>
        </div>
        </div>
 

 


    <!-- Mainly scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>

    <!-- Data picker -->
    <script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- FooTable -->
    <script src="/js/plugins/footable/footable.all.min.js"></script>


    <!-- Jasny -->
    <script src="/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- DROPZONE -->
    <script src="/js/plugins/dropzone/dropzone.js"></script>

    <!-- CodeMirror -->
    <script src="/js/plugins/codemirror/codemirror.js"></script>
    <script src="/js/plugins/codemirror/mode/xml/xml.js"></script>

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('#ThoiGianDangKy').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
            });
            $('#ngaythamdinh').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
            });
            $('#thoigianbatdau').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
            });
            $('#thoigianketthuc').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
            });

        });

    </script>
    <script>
    function goBack() {
        window.history.back();
    }
</script>
    <script>
    (function($, undefined) {

    "use strict";

    // When ready.
    $(function() {
        
        var $form = $( "#form1" );
        var $input = $form.find( "input" );

        $input.on( "keyup", function( event ) {
            
            
            // When user select text in the document, also abort.
            var selection = window.getSelection().toString();
            if ( selection !== '' ) {
                return;
            }
            
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }
            
            
            var $this = $( this );
            
            // Get the value.
            var input = $this.val();
            
            var input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt( input, 10 ) : 0;

                    $this.val( function() {
                        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
                    } );
        } );
        
        /**
         * ==================================
         * When Form Submitted
         * ==================================
         */
        $form.on( "submit", function( event ) {
            
            var $this = $( this );
            var arr = $this.serializeArray();
        
            for (var i = 0; i < arr.length; i++) {
                    arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
            };
            
            console.log( arr );
            
            event.preventDefault();
        });
        
    });
    })(jQuery);
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".add2").click(function(){ 
          var html = $(".clone2").html();
          $(".increment2").after(html);
        });
      $(".add3").click(function(){ 
          var html = $(".clone3").html();
          $(".increment3").after(html);
        });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
    </script>
</body>
</html>

