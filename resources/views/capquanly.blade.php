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
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <meta name="_token" content="{{ csrf_token() }}">
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
                <li >
                    <a href="/detaichamtiendo"><i class="fa fa-bullseye"></i> <span class="nav-label">Đề Tài Chậm Tiến Độ </span></a>
                </li>
                 <li class="active" >
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Danh Mục</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="active"><a href="/capquanly">Cấp Quản Lý</a></li>
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
                    <h2>Cấp Quản Lý</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dangkydetai.html">Trang Chủ</a>
                        </li>
                        <li class="active">
                            <strong>Cấp Quản Lý</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2" style="margin-top: 30px;">
                            <div class="text-center">
                                <button class="btn btn-info " type="button" data-toggle="modal" data-target="#myModal5">
                                    <i class="fa fa-paste"></i>  Thêm Mới
                                </button>
                            </div>
                        <form method="post" action="{{route('loaicapquanly.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg" style="width: 300px;margin: 30px auto;">
                                    <div class="modal-content"style="border: 3px solid transparent;border-radius: 10px;    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);border-color: #1ab394;">
                                        <div class="modal-header"style="padding: 2px 6px;text-align: center;background-color: #1ab394;    border-color: #1ab394;">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title"style="color: #ffffff;">Thêm Cấp Quản Lý</h4>
                                        </div>
                                        <div class="modal-body"style="padding: 1px 30px 1px 30px;">
                                            <form method="get" class="form-horizontal">
                                                <div class="row show-grid">
                                                    <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                      <b><p>Tên Câp Quản Lý : </p></b>  
                                                        <input style="border-radius: 10px;" type="text" placeholder="Tên Câp Quản Lý" name="LoaiCapQuanLy" class="form-control">
                                                    </div>                                           
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                              <button type="button" class="btn btn-outline btn-info" data-dismiss="modal"style="    margin-bottom: 0px;">Đóng</button>
                                            <button class="ladda-button ladda-button-demo btn btn-primary" type="submit"  data-style="zoom-in" >Lưu </button>
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
                            <h5>Cấp Quản Lý</h5>
                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr style="font-size: 10px;">
                                              <th style="text-align: center;">STT</th>
                                              <th style="text-align: center;">Tên Câp Quản Lý</th>
                                              <th style="text-align: center;">Sửa</th>
                                              <th style="text-align: center;">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lcql as $lcqls)
                                        <tr class="gradeX">
                                            <td style="text-align: center;">{{$lcqls->ID}}</td>
                                            <td style="text-align: center;">{{$lcqls->TenLoaiCap}}</td>
                                            <td class="center" style="display: flex;align-items: center;justify-content: center;">
                                                <button class="btn btn-outline btn-success  dim open_modal" type="button" data-toggle="modal" style=" padding: 1px 9px;" value="{{$lcqls->ID}}"><i class="fa fa-paint-brush"></i></button>
                                            </td>
                                            <td class="center" >
                                                <form action="{{action('LoaiCapQuanLyController@delete', $lcqls['ID'])}}" method="post">
                                                {{csrf_field()}} 
                                                    <input name="_method" type="hidden" value="delete">
                                                    <button class="btn btn-outline btn-danger  dim" type="submit" style=" padding: 1px 9px;"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <input id="url" type="hidden" value="{{ \Request::url() }}">
                                <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" style="width: 300px;margin: 30px auto;">
                                        <div class="modal-content animated" style="border: 3px solid transparent;border-radius: 10px;    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);border-color: #1ab394;">
                                            <div class="modal-header" style="padding: 2px 6px;text-align: center;background-color: #1ab394;    border-color: #1ab394;">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 style="color: #ffffff;">Sửa Câp Quản Lý </h4>
                                            </div>
                                            <div class="modal-body"style="padding: 1px 30px 1px 30px;">
                                                <form method="get" class="form-horizontal">
                                                    <div class="row show-grid">
                                                        <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;border: 1px solid #ececec; background-color: #fff !important;border:none">
                                                          <b><p>Tên Câp Quản Lý : </p></b>  
                                                            <input style="border-radius: 10px;" type="text" name="LoaiCapQuanLy" id="LoaiCapQuanLy" class="form-control">
                                                        </div>                                           
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline btn-info" data-dismiss="modal" style="margin-bottom: 0px;">Đóng</button>
                                                <button id="save" class="ladda-button ladda-button-demo btn btn-primary" value="add" type="button" >Lưu </button>
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
    <!-- <script src="js/danhmucscript.js"></script> -->

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
    $(document).ready(function(){

    var url = $('#url').val();


    //display modal form for product EDIT ***************************
    $(document).on('click','.open_modal',function(){
        var dangkydetai_id = $(this).val();
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/' + dangkydetai_id,
            success: function (data) {
                console.log(data);
                $('#dangkydetai_id').val(data.ID);
                $('#LoaiCapQuanLy').val(data.TenLoaiCap);
                $('#save').val("update");
                $('#myModal2').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new product / update existing product ***************************
    $("#save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        var formData = {
            ID: $('#dangkydetai_id').val(),
            LoaiCapQuanLy: $('#LoaiCapQuanLy').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#save').val();
        var type = "POST"; //for creating new resource
        var dangkydetai_id = $('#dangkydetai_id').val();;
        var my_url = url;
        if (state === "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + dangkydetai_id;
        }
        console.log(my_url);
        console.log(type);
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var dangkydetai = '<tr id="dangkydetai' + data.ID + '"><td>' + data.LoaiCapQuanLy + '</td>';
                if (state == "add"){ //if user added a new record
                    $('#dangkydetais-list').append(dangkydetai);
                }else{ //if user updated an existing record
                    $("#dangkydetai" + dangkydetai_id).replaceWith(dangkydetai);
                }
                $('#frmDeTai').trigger("reset");
                $('#myModal2').modal('hide');
                console.log(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click','.delete-dangkydetai',function(){
        var dangkydetai_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + dangkydetai_id,
            success: function (data) {
                console.log(data);
                $("#dangkydetai" + dangkydetai_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
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