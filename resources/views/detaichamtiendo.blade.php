<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLDTKH Sở Khoa Học Công Nghê Tỉnh Lai Châu</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                        </a>
                    </div>
                    <div class="logo-element">
                        Sở Tài Nguyên
                    </div>
                </li>
                <li >
                    <a href="/dangkydetai"><i class="fa fa-diamond"></i> <span class="nav-label">Đăng Ký Đề Tài</span></a>
                </li>
                <li >
                    <a href="/detaidangthuchien"><i class="fa fa-address-card-o"></i> <span class="nav-label">Đề Tài Đang Thực Hiện</span></a>
                </li>
                <li>
                    <a href="/detaidathuchien"><i class="fa fa-file-excel-o"></i> <span class="nav-label">Đề Tài Đã Thực Hiện </span></a>
                </li>
                <li >
                    <a href="/detaidahuy"><i class="fa fa-chain-broken"></i> <span class="nav-label">Đề Tài Đã Hủy</span></a>
                </li>
                <li class="active">
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
                <div class="col-lg-10">
                    <h2>Đề Tài Chậm Tiến Độ</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dangkydetai.html">Trang Chủ</a>
                        </li>
                        <li class="active">
                            <strong>Đề Tài Chậm Tiến Độ</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2" >
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Đề Tài Chậm Tiến Độ</h5>
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
                                <span class="badge badge-success" style="background-color: #1cbec6;color: #FFFFFF;    margin-top: 5px;">{{$ttdt->trangthai->TenTrangThai}}</span>
                            </td>
                            <td class="center">
                                <button class="btn btn-outline btn-primary  dim open_modal" type="button" data-toggle="modal" style=" padding: 1px 9px;" value="{{$ttdt->ID}}"><i class="fa fa-eye"></i></button>
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
                                <h4 style="color: #ffffff;">Sửa Đăng Ký Đề Tài </h4>
                            </div>
                            <div class="modal-body"style="padding: 1px 30px 1px 30px;">
                            <form id="frmDeTai" name="frmDetai" class="form-horizontal" novalidate="">
                                    <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"> Thông Tin Chung </a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2">Hội Đồng Thẩm Định</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3">Tiến Độ Thực Hiện</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4">Tài Chính</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5">Hội Đồng Nghiệm Thu</a></li>
                                </ul>
                            </div>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="ibox-content">
                                            <div class="row show-grid" >
                                                <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                    <b><p>Số Quyết Định: </p></b>  
                                                    <input style="border-radius: 10px;width: 100%;" type="text" id="SoQuyetDinh" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                    <b><p>Ngày Quyết Định:</p></b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" id="NgayQuyetDinh" class="form-control" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="row show-grid" >
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                    <b><p>Tên Cơ Quan Tổ Chức : </p></b>  
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="TenCQTC" name="TenCQTC" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                    <b><p>Email:</p></b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="EmailCQTC" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b> <p>Số ĐT :</p> </b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="SDTCQTC" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b><p>Địa Chỉ :</p> </b>
                                                     <input style="border-radius: 10px;width: 100%;" type="text" value="" id="DiaChiCQTC" class="form-control" readonly="readonly">
                                                </div>                                                     
                                            </div>
                                            <div class="row show-grid" style="margin: -15px 0;">
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                    <b><p>Tên Chủ Nhiệm Đề Tài : </p></b>  
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="TenCN" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                    <b><p>Email :</p></b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="EmailCN" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b> <p>Số ĐT :</p> </b>
                                                    <input style="border-radius: 10px;width: 100%;" type="text" value="" id="SDTCN" class="form-control" readonly="readonly">
                                                </div>
                                                <div class="clearfix visible-xs"></div>
                                                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b><p>Địa Chỉ :</p> </b>
                                                     <input style="border-radius: 10px;width: 100%;" type="text" value="" id="DiaChiCN" class="form-control" readonly="readonly">
                                                </div>               
                                            </div>
                                            <div class="row show-grid" style="margin: -15px 0;">
                                                <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                    <b><p>Tên Đề Tài :</p> </b>
                                                     <input style="border-radius: 10px;width: 100%;" type="text" value="" id="TenDT" class="form-control" readonly="readonly">
                                                </div> 
                                                <div class="clearfix visible-xs"></div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                    <b><p>Thời Gian Đăng Ký:</p></b>
                                                    <div class="input-group date"style="width: 100%;">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="ThoiGianDangKy" 
                                                        id="ThoiGianDangKy"style="border-radius: 10px;"  type="text" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                    <b><p>Thời Gian Bắt Đầu:</p></b>
                                                    <div class="input-group date"style="width: 100%;">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="ThoiGianBatDau" style="border-radius: 10px;"  type="text" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                    <b><p>Thời Gian Kết Thúc:</p></b>
                                                    <div class="input-group date"style="width: 100%;">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="ThoiGianKetThuc" style="border-radius: 10px;"  type="text" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row show-grid" style="margin: -15px 0;">
                                                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                                    <b><p>Loại Cấp Quản Lý :</p> </b>
                                                    <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="LoaiCapQuanLy">
                                                </div>
                                                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                                    <b><p>Lĩnh Vực Khoa Học :</p> </b>
                                                    <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="LinhVucKhoaHoc">
                                                </div>
                                                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                                    <b><p>Chương Trình Khoa Học:</p> </b>
                                                    <input style="border-radius: 10px;width:100%;" type="text" class="form-control" readonly="readonly" value="" id="ChuongTrinhKhoaHoc">
                                                </div>
                                                <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                                                    <b><p>Cán Bộ Quản Lý :</p> </b>
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
                                    <div id="tab-3" class="tab-pane">
                                        <div class="ibox-content">
                                            <div class="wrapper wrapper-content animated fadeInRight">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="ibox float-e-margins">
                                                            <div class="ibox-title">
                                                                <h5>Tiến Độ Thực Hiện</h5>
                                                            </div>
                                                    <div class="ibox-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr style="font-size: 10px;">
                                                                        <th>Ngày Xác Nhận</th>
                                                                        <th>Người Thực Hiện</th>
                                                                        <th>Nội Dung</th>
                                                                        <th>Ghi Chú</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="ttiendo">
                                                                
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
                                                                <h5>Danh Sách File Tiến Độ</h5>
                                                            </div>
                                                    <div class="ibox-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr style="font-size: 10px;">
                                                                        <th>Tên File</th>
                                                                        <th>Ngày Xác Nhận</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="filetiendo">
                                                                
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
                                    <div id="tab-4" class="tab-pane">
                                        <div class="ibox-content">
                                            <div class="wrapper wrapper-content animated fadeInRight">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="ibox float-e-margins">
                                                            <div class="ibox-title">
                                                                <div class="row show-grid" style="margin: -15px 0;">
                                                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                                <b><p>Kinh Phí Đề Tài: </p></b>  
                                                                <input style="border-radius: 10px; width:100%;" type="text" class="form-control" value="" id="KinhPhiDuKien" readonly="readonly">
                                                            </div>
                                                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                                                                <b><p>Vốn Nhà Nước:</p></b>
                                                                <input style="border-radius: 10px;width:100%;" type="text" class="form-control" value="" id="VonNhaNuoc" readonly="readonly">
                                                            </div>
                                                            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                                                                <b> <p>Vốn Tự Có:</p> </b>
                                                                <input style="border-radius: 10px;width:100%;" type="text" class="form-control" value="" id="VonTuCo" readonly="readonly">
                                                            </div>
                                                        </div> 
                                                            </div>

                                                    <div class="ibox-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr style="font-size: 10px;">
                                                                        <th>Ngày Thanh Toán</th>
                                                                        <th>Số Tiền</th>
                                                                        <th>Hình Thức Thanh Toán</th>
                                                                        <th>Người Giao</th>
                                                                        <th>Người Nhận</th>
                                                                        <th>Nội Dung</th>
                                                                        <th>Ghi Chú</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="ttaichinh">
                                                                
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
                                                                <h5>Danh Sách File Tài Chính</h5>
                                                            </div>
                                                    <div class="ibox-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr style="font-size: 10px;">
                                                                        <th>Tên File</th>
                                                                        <th>Ngày Thanh Toán</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="filetaichinh">
                                                                
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
                                    <div id="tab-5" class="tab-pane">
                                        <div class="ibox-content">
                                            <div class="wrapper wrapper-content animated fadeInRight">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="ibox float-e-margins">
                                                            <div class="ibox-title">
                                                                <h5>Danh Sách Hội Đồng Nghiệm Thu</h5>
                                                            </div>
                                                    <div class="ibox-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr style="font-size: 10px;">
                                                                        <th>Ngày Nghiệm Thu</th>
                                                                        <th>Số Quyết Định</th>
                                                                        <th>Cấp Nghiệm Thu</th>
                                                                        <th>Chủ Tịch Hội Đồng</th>
                                                                        <th>Thành Viên Hội Đồng</th>
                                                                        <th>Nội Dung</th>
                                                                        <th>Ghi Chú</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tnghiemthu">
                                                                
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
                                                                <tbody id="filenghiemthu">
                                                                
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
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
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
    <!-- Ladda -->
    <script src="js/plugins/ladda/spin.min.js"></script>
    <script src="js/plugins/ladda/ladda.min.js"></script>
    <script src="js/plugins/ladda/ladda.jquery.min.js"></script>
    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>
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
            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        });
    </script>
</body>
</html>
