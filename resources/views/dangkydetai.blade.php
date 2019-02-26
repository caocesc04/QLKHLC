<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>QLDTKH Sở Khoa Học Công Nghê Tỉnh Lai Châu</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/codemirror/codemirror.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" style="height: 50%; width: 100%" src="img/logo_skhcn.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{auth()->user()->name}}</strong>
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
                <div class="col-lg-10">
                    <h2>Đăng Ký Đề Tài</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="/dangkydetai">Trang Chủ</a>
                        </li>
                        <li class="active">
                            <strong>Đăng Ký Đề Tài</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2" style="margin-top: 30px;">
                    <div class="text-center">
                        <button class="btn btn-info " type="button" data-toggle="modal" data-target="#myModal5">
                            <i class="fa fa-paste"></i>  Thêm Mới
                        </button>
                    </div>
                    <form method="post" action="{{route('dangkydetai.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg" style="width: 1000px;margin: 30px auto;">
                            <div class="modal-content"style="border: 3px solid transparent;border-radius: 10px;    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);border-color: #1ab394;">
                                <div class="modal-header"style="padding: 2px 6px;text-align: center;background-color: #1ab394;    border-color: #1ab394;">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title"style="color: #ffffff;">Thêm Đăng Ký Đề Tài</h4>
                                </div>
                                <div class="modal-body"style="padding: 1px 30px 1px 30px;">
                                    <div class="row show-grid" >
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                            <b><p>Tên Cơ Quan Tổ Chức </p></b>  
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="TenCQTC">
                                        </div>
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                            <b><p>Email </p></b>
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="EmailCQTC">
                                        </div>
                                        <div class="clearfix visible-xs"></div>
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                            <b> <p>Số ĐT </p> </b>
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="SDTCQTC">
                                        </div>
                                        <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                            <b><p>Địa Chỉ </p> </b>
                                             <input style="border-radius: 10px;" type="text"  class="form-control" name="DiaChiCQTC">
                                        </div>                                                     
                                    </div>
                                    <div class="row show-grid"style="margin: -15px 0;">
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                            <b><p>Tên Chủ Nhiệm Đề Tài <a style="color: red">(*)</a></p></b>
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="TenCN" required="">
                                        </div>
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                            <b><p>Email <a style="color: red">(*)</a></p></b>
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="EmailCN" required="">
                                        </div>
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                            <b> <p>Số ĐT <a style="color: red">(*)</a></p> </b>
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="SDTCN" required="">
                                        </div>
                                        
                                        <div class="clearfix visible-xs"></div>

                                        
                                        <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                            <b><p>Địa Chỉ <a style="color: red">(*)</a></p> </b>
                                             <input style="border-radius: 10px;" type="text" class="form-control" name="DiaChiCN" required="">
                                        </div>                                                     
                                    </div>
                                    <div class="row show-grid">
                                        <div class="col-xs-12" style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                            <b><p>Tên Đề Tài <a style="color: red">(*)</a></p> </b>
                                             <input style="border-radius: 10px;" type="text" class="form-control" name="TenDT" required="">
                                        </div> 
                                        <div class="clearfix visible-xs"></div>
                                        <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                            <b><p>Thời Gian Dự Kiến <a style="color: red">(*)</a></p></b>  
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="ThoiGianDuKien" required="">
                                        </div>
                                        <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                            <b><p>Thời Gian Đăng Ký <a style="color: red">(*)</a></p></b>
                                            <div class="input-group date"style="width: 100%;">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="ThoiGianDangKy" style="border-radius: 10px;"  type="text" class="form-control" name="ThoiGianDangKy" required="">
                                            </div>
                                        </div>
                                        <div class="clearfix visible-xs"></div>
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                            <b><p>Kinh Phí Dự Kiến </p></b>
                                            <input style="border-radius: 10px;" type="number" class="form-control" name="KinhPhiDuKien">
                                        </div>
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                            <b><p>Vốn Nhà Nước</p></b>
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="VonNhaNuoc">
                                        </div>
                                        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                            <b> <p>Vốn Tự Có</p> </b>
                                            <input style="border-radius: 10px;" type="text" class="form-control" name="VonTuCo">
                                        </div>
                                    </div>
                                    <div class="row show-grid" style="margin: -15px 0;">
                                        <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                            <b><p>Loại Cấp Quản Lý</p> </b>
                                            <select class="form-control m-b" name="LoaiCapQuanLy" style="border-radius: 10px;">
                                                @foreach($lcql as $lcqls)
                                                <option value="{{$lcqls->ID}}">{{$lcqls->TenLoaiCap}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                            <b><p>Lĩnh Vực Khoa Học</p> </b>
                                            <select class="form-control m-b" name="LinhVucKhoaHoc" style="border-radius: 10px;">
                                                @foreach($lvkh as $lvkhs)
                                                <option value="{{$lvkhs->ID}}">{{$lvkhs->TenLVKH}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                            <b><p>Chương Trình Khoa Học</p> </b>
                                            <select class="form-control m-b" name="ChuongTrinhKhoaHoc" style="border-radius: 10px;">
                                                @foreach($ctkh as $ctkhs)
                                                <option value="{{$ctkhs->ID}}">{{$ctkhs->TenCTKH}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                            <b><p>Cán Bộ Quản Lý</p> </b>
                                            <select class="form-control m-b" name="CanBoQuanLy" style="border-radius: 10px;">
                                                @foreach($canbo as $cb)
                                                <option value="{{$cb->ID}}">{{$cb->Ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="clearfix visible-xs"></div>
                                        <div class="col-xs-12"style="padding-top: 0px;padding-bottom: 0px;border: 1px solid #ececec;background-color: #fff !important;border:none;margin-bottom: 30px;">
                                            <div class="input-group control-group increment" >
                                              <input type="file" name="filename[]" class="form-control">
                                              <div class="input-group-btn"> 
                                                <button class="btn btn-success save" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                              </div>
                                            </div>
                                            <div class="clone hide">
                                              <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="filename[]" class="form-control">
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
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Đăng Ký Đề Tài</h5>
                        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr style="font-size: 10px;">
                              <th>STT</th>
                              <th>Tên Đề Tài</th>
                              <th>Chủ Nhiệm Đề Tài</th>
                              <th>Cơ Quan Chủ Trì</th>
                              <th>Thời Gian Đăng Ký</th>
                              <th>Trạng Thái</th>
                              <th>Xem</th>
                              <th>Sửa</th>
                              <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($thongtindetai as $ttdt)
                        <tr class="gradeX">
                            <td>{{$ttdt->ID}}</td>
                            <td>{{$ttdt->TenDeTai}}</td>
                            <td>{{$ttdt->chunhiemdetai->Ten}}</td>
                            <td>{{$ttdt->coquanchutri->Ten}}</td>
                            <td class="center"style="text-align: center;">
                                <span class="badge badge-warning" style="margin-top: 5px;">{{date('d-m-Y', strtotime($ttdt->ThoiGianDangKy))}}</span>
                            </td>
                            <td class="center"style="text-align: center;">
                                <span class="badge badge-success" style="background-color: #1cbec6;color: #FFFFFF;    margin-top: 5px;">Đang Chờ</span>
                            </td>
                            <td class="center">
                                <button class="btn btn-outline btn-primary  dim open_modal" type="button" data-toggle="modal" style=" padding: 1px 9px;" value="{{$ttdt->ID}}"><i class="fa fa-eye"></i></button>
                            </td>
                            <td class="center">
                                <a href="{{route('dangkydetai.edit', [$ttdt->ID])}}" class="btn btn-outline btn-success  dim" style=" padding: 1px 9px;"><i class="fa fa-paint-brush"></i></a>
                            </td>
                            <td class="center">
                                <form action="{{action('DangKyDeTaiController@delete', $ttdt['ID'])}}" method="post">
                                {{csrf_field()}} 
                                    <input name="_method" type="hidden" value="delete">
                                    <button class="btn btn-outline btn-danger  dim delete-product" type="submit" style=" padding: 1px 9px;"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <input id="url" type="hidden" value="{{ \Request::url() }}">
                <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" style="width: 1000px;margin: 30px auto;">
                        <div class="modal-content animated fadeIn" style="border: 3px solid transparent;border-radius: 10px;    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);border-color: #1ab394;">
                            <div class="modal-header" style="padding: 2px 6px;text-align: center;background-color: #1ab394;    border-color: #1ab394;">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 style="color: #ffffff;">Xem Thông Tin Đề Tài </h4>
                            </div>
                            <div class="modal-body"style="padding: 1px 30px 1px 30px;">
                            <form id="frmDeTai" name="frmDetai" class="form-horizontal" novalidate="">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1"> Thông Tin Chung </a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2">Hội Đồng Thẩm Định</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="ibox-content">
                                            <div class="row show-grid" >
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                    <b><p>Tên Cơ Quan Tổ Chức : </p></b>  
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="TenCQTC" name="TenCQTC" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                    <b><p>Email</p></b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="EmailCQTC" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b> <p>Số ĐT </p> </b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="SDTCQTC" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b><p>Địa Chỉ </p> </b>
                                                     <input style="border-radius: 10px;width: 100%;" type="text" value="" id="DiaChiCQTC" class="form-control" readonly="readonly">
                                                </div>                                                     
                                            </div>
                                            <div class="row show-grid" style="margin: -15px 0;">
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                    <b><p>Tên Chủ Nhiệm Đề Tài </p></b>  
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="TenCN" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                    <b><p>Email </p></b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="EmailCN" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b> <p>Số ĐT </p> </b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="SDTCN" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="clearfix visible-xs"></div>
                                                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b><p>Địa Chỉ </p> </b>
                                                     <input style="border-radius: 10px;width: 100%;" type="text" value="" id="DiaChiCN" class="form-control" readonly="readonly">
                                                </div>               
                                            </div>
                                            <div class="row show-grid" style="margin: -15px 0;">
                                                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b><p>Tên Đề Tài </p> </b>
                                                     <input style="border-radius: 10px;width: 100%;" type="text" value="" id="TenDT" class="form-control" readonly="readonly">
                                                </div> 
                                                <div class="clearfix visible-xs"></div>
                                                <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b> <p>Thời Gian Dự Kiến</p> </b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="ThoiGianDuKien" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                <b><p>Thời Gian Đăng Ký</p></b>
                                                <input id="ThoiGianDangKy" style="border-radius: 10px;"  type="text" class="form-control" readonly="readonly" value="">
                                                </div>
                                            <div class="clearfix visible-xs"></div>
                                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                <b><p>Kinh Phí Dự Kiến: </p></b>  
                                                <input style="border-radius: 10px; width:100%;" type="text" class="form-control" readonly="readonly" value="" id="KinhPhiDuKien">
                                            </div>
                                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                <b><p>Vốn Nhà Nước</p></b>
                                                <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="VonNhaNuoc">
                                            </div>
                                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                <b> <p>Vốn Tự Có</p> </b>
                                                <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="VonTuCo">
                                            </div>                             
                                            </div>
                                            <div class="row show-grid" style="margin: -15px 0;">
                                                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                                    <b><p>Loại Cấp Quản Lý </p> </b>
                                                    <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="LoaiCapQuanLy">
                                                </div>
                                                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                                    <b><p>Lĩnh Vực Khoa Học </p> </b>
                                                    <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="LinhVucKhoaHoc">
                                                </div>
                                                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                                    <b><p>Chương Trình Khoa Học</p> </b>
                                                    <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="ChuongTrinhKhoaHoc">
                                                </div>
                                                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                                    <b><p>Cán Bộ Quản Lý </p> </b>
                                                    <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="CanBoQuanLy">
                                                </div>
                                                <div class="clearfix visible-xs"></div>
                                                <div class="col-xs-12"style="padding-top: 0px;padding-bottom: 0px;border: 1px solid #ececec;background-color: #fff !important;border:none;margin-bottom: 30px;">
                                                    <p id="preview" name="preview"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <div class="ibox-content">
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
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tthamdinh" name="tthamdinh">
                                                                
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
                                                                    </tr>
                                                                </thead>
                                                                <tbody name="filetd" id="filetd">
                                                                
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
                            </div>
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline btn-info" data-dismiss="modal"style="    margin-bottom: 0px;">Đóng</button>
                                <input type="hidden" id="dangkydetai_id" name="dangkydetai_id" value="0">
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>

        </div>
        </div>
 
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="js/plugins/fullcalendar/moment.min.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>


    <!-- Jasny -->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- CodeMirror -->
    <script src="js/plugins/codemirror/codemirror.js"></script>
    <script src="js/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="{{asset('js/ajaxscript.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                language : {
                    "zeroRecords": " "             
                },
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
                ],

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
                format:"dd-mm-yyyy"
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
          $(".save").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });
        });
    </script>
</body>
</html>