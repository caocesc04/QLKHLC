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
                <li>
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
                            <strong>Đề Tài Đang Thực Hiện</strong>
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
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>{{$ttdt->TenDeTai}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="ibox-content">
    <form method="post" action="{{route('detaichamtiendo.update', $id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        
        <div class="row show-grid" >
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                <b><p>Tên Cơ Quan Tổ Chức : </p></b>  
                <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->coquanchutri->Ten}}" name="TenCQTC" name="TenCQTC" class="form-control">
            </div>
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                <b><p>Email:</p></b>
                <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->coquanchutri->Email}}" name="EmailCQTC" class="form-control">
            </div>
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                <b> <p>Số ĐT :</p> </b>
                <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->coquanchutri->SoDienThoai}}" name="SDTCQTC" class="form-control">
            </div>
            <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                <b><p>Địa Chỉ :</p> </b>
                 <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->coquanchutri->DiaChi}}" name="DiaChiCQTC" class="form-control">
            </div>                                                     
        </div>
        <div class="row show-grid" style="margin: -15px 0;">
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                <b><p>Tên Chủ Nhiệm Đề Tài : </p></b>  
                <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->chunhiemdetai->Ten}}" name="TenCN" class="form-control">
            </div>
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                <b><p>Email :</p></b>
                <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->chunhiemdetai->Email}}" name="EmailCN" class="form-control">
            </div>
            <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                <b> <p>Số ĐT :</p> </b>
                <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->chunhiemdetai->SoDienThoai}}" name="SDTCN" class="form-control">
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                <b><p>Địa Chỉ :</p> </b>
                 <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->chunhiemdetai->DiaChi}}" name="DiaChiCN" class="form-control">
            </div>               
        </div>
        <div class="row show-grid" style="margin: -15px 0;">
            <div class="col-xs-12"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                <b><p>Tên Đề Tài :</p> </b>
                 <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->TenDeTai}}" name="TenDT" class="form-control">
            </div> 
            <div class="clearfix visible-xs"></div>
            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
                <b> <p>Thời Gian Dự Kiến:</p> </b>
                <input style="border-radius: 10px;width: 100%;" type="text" value="{{$ttdt->ThoiGianDuKien}}" name="ThoiGianDuKien" class="form-control">
            </div>
            <div class="col-xs-6 col-sm-6"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
                <b><p>Thời Gian Đăng Ký:</p></b>
            <div class="input-group date"style="width: 100%;">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="ThoiGianDangKy" 
                id="ThoiGianDangKy"style="border-radius: 10px;"  type="text" class="form-control" value="{{$ttdt->ThoiGianDangKy}}">
            </div>
            </div>
        </div>
        <div class="row show-grid" style="margin: -15px 0;">
        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
            <b><p>Kinh Phí Dự Kiến: </p></b>  
            <input style="border-radius: 10px; width:100%;" type="text" class="form-control" value="{{$ttdt->KinhPhiDuKien}}" name="KinhPhiDuKien">
        </div>
        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;  background-color: #fff !important;border:none">
            <b><p>Vốn Nhà Nước:</p></b>
            <input style="border-radius: 10px;width:100%;" type="text" class="form-control" value="{{$ttdt->VonNhaNuoc}}" name="VonNhaNuoc">
        </div>
        <div class="col-xs-6 col-sm-4"style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec;    background-color: #fff !important;border:none">
            <b> <p>Vốn Tự Có:</p> </b>
            <input style="border-radius: 10px;width:100%;" type="text" class="form-control" value="{{$ttdt->VonTuCo}}" name="VonTuCo">
        </div>
        </div>                             
        <div class="row show-grid" style="margin: -15px 0;">
            <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                <b><p>Loại Cấp Quản Lý :</p> </b>
                <select class="form-control m-b" style="border-radius: 10px;width: 100%;" name="LoaiCapQuanLy" id="LoaiCapQuanLy">
                    @foreach($lcqls as $lcql)
                        <option value="{{ $lcql->ID }}"  @if($lcql->TenLoaiCap==$ttdt->loaicapquanly->TenLoaiCap) selected='selected' @endif >{{ $lcql->TenLoaiCap }}</option>
                    @endforeach  
                </select>
            </div>
            <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                <b><p>Lĩnh Vực Khoa Học :</p> </b>
                <select class="form-control m-b" style="border-radius: 10px;width: 100%;" name="LinhVucKhoaHoc" id="LinhVucKhoaHoc">
                    @foreach($lvkhs as $lvkh)
                        <option value="{{ $lvkh->ID }}"  @if($lvkh->TenLVKH==$ttdt->linhvuckhoahoc->TenLVKH) selected='selected' @endif >{{ $lvkh->TenLVKH }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                <b><p>Chương Trình Khoa Học:</p> </b>
                <select class="form-control m-b" style="border-radius: 10px;width: 100%;" name="ChuongTrinhKhoaHoc" id="ChuongTrinhKhoaHoc">
                    @foreach($ctkhs as $ctkh)
                        <option value="{{ $ctkh->ID }}"  @if($ctkh->TenCTKH==$ttdt->chuongtrinhkhoahoc->TenCTKH) selected='selected' @endif >{{ $ctkh->TenCTKH }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-6 col-sm-3"style="border: 1px solid #ffffff;background-color: #fff !important;border-width: 1px 0;">  
                <b><p>Cán Bộ Quản Lý :</p> </b>
                <select class="form-control m-b" style="border-radius: 10px;width: 100%;" name="CanBoQuanLy" id="CanBoQuanLy">
                    @foreach($cbqls as $cbql)
                        <option value="{{ $cbql->ID }}"  @if($cbql->Ten==$ttdt->canbo->Ten) selected='selected' @endif >{{ $cbql->Ten }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-xs-12"style="padding-top: 0px;padding-bottom: 0px;border: 1px solid #ececec;background-color: #fff !important;border:none;margin-bottom: 30px;">
                <div class="input-group control-group increment" >
                  <input type="file" name="fileedit[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-success addin" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                  </div>
                </div>
                <div class="clone hide">
                  <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="fileedit[]" class="form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12" style="margin-top: 30px;">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <button type="submit" name="save" value="2" class="btn btn-outline btn-danger" style="float: left; margin-bottom: 0px;">Hủy Đề Tài</button>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="save" value="0" class="btn btn-outline btn-primary" style="float: left; margin-bottom: 0px;">Hoàn Thành</button>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" name="save" value="1" class="btn btn-success" data-style="zoom-in"> Lưu </button>
                    </div>
                </div>        
            </div>
    </form>
    <div class="row show-grid">
        @foreach($fileattacks as $fileattack)   
            <a class="col-xs-6" href="/files/{{$fileattack->TenFile}}" id="preview" name="preview">{{$fileattack->TenFile}}</a>
        <form action="{{route('detaichamtiendo.destroy', [$fileattack->ID])}}" method="post">
            {{csrf_field()}} 
            <input name="_method" type="hidden" value="DELETE">
            <button class="col-xs-6" style="color: red" class="btn btn-danger" type="submit"> Remove</button>
        </form>
        @endforeach
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

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            $('#ThoiGianDangKy').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });

    </script>
    <script>
    function goBack() {
        window.history.back();
    }
</script>
    <script type="text/javascript">

    $(document).ready(function() {
      $(".btn-success").click(function(){ 
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

