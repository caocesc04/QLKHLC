$(document).ready(function(){

    //get base URL *********************
    var url = $('#url').val();
    var date = function(dateObject) {
        var d = new Date(dateObject);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var date = day + "-" + month + "-" + year;
        return date;
    };
    const numberWithCommas = (x) => {
        if(x!==null){
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
    };

    //display modal form for product EDIT ***************************
    $(document).on('click','.open_modal',function(){
        var dangkydetai_id = $(this).val();
       
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/' + dangkydetai_id,
            success: function (data) {
                console.log(data['ttdts'].ThoiGianDangKy);
                $('#dangkydetai_id').val(data['ttdts'].ID);
                $('#TenCQTC').val(data['ttdts'].coquanchutri.Ten);
                $('#EmailCQTC').val(data['ttdts'].coquanchutri.Email);
                $('#DiaChiCQTC').val(data['ttdts'].coquanchutri.DiaChi);
                $('#SDTCQTC').val(data['ttdts'].coquanchutri.SoDienThoai);
                $('#TenCN').val(data['ttdts'].chunhiemdetai.Ten);
                $('#EmailCN').val(data['ttdts'].chunhiemdetai.Email);
                $('#DiaChiCN').val(data['ttdts'].chunhiemdetai.DiaChi);
                $('#SDTCN').val(data['ttdts'].chunhiemdetai.SoDienThoai);
                $('#TenDT').val(data['ttdts'].TenDeTai);
                $('#ThoiGianDuKien').val(data['ttdts'].ThoiGianDuKien);
                $('#ThoiGianDangKy').val(date(data['ttdts'].ThoiGianDangKy));
                $('#KinhPhiDuKien').val(numberWithCommas(data['ttdts'].KinhPhiDuKien));
                $('#VonNhaNuoc').val(numberWithCommas(data['ttdts'].VonNhaNuoc));
                $('#VonTuCo').val(numberWithCommas(data['ttdts'].VonTuCo));
                $('#LoaiCapQuanLy').val(data['ttdts'].loaicapquanly.TenLoaiCap);
                $('#LinhVucKhoaHoc').val(data['ttdts'].linhvuckhoahoc.TenLVKH);
                $('#ChuongTrinhKhoaHoc').val(data['ttdts'].chuongtrinhkhoahoc.TenCTKH);
                $('#CanBoQuanLy').val(data['ttdts'].canbo.Ten);
                $('#SoQuyetDinh').val(data['ttdts'].SoQuyetDinh);
                $('#NgayQuyetDinh').val(date(data['ttdts'].NgayQuyetDinh));
                $('#ThoiGianBatDau').val(date(data['ttdts'].ThoiGianBatDau));
                $('#ThoiGianKetThuc').val(date(data['ttdts'].ThoiGianKetThuc));


                $.each(data['fileAttacks'], function(key, value){
                    $("p[name='preview']").append(
                        "<div class='row show-grid'><a href='/files/" + value.TenFile + "'  value=" + value.TenFile + ">" + value.TenFile + "</a></div>"
                    );
                });
                $.each(data['hdtd'], function(key, value){
                    $("#tthamdinh").append(
                            "<tr class='gradeX'><td> "+date(value.NgayThamDinh)+"</td>"+
                            "<td>"+value.SoQuyetDinh+"</td>"+
                            "<td>"+value.loaicapquanly.TenLoaiCap+"</td>"+
                            "<td>"+value.ChuTichHD+"</td>"+
                            "<td>"+value.ThanhVienHD+"</td>"+
                            "<td>"+value.GiaTriThamDinh+"</td>"+
                            "<td>"+value.ThoiGianThucHien+"</td>"+
                            "<td>"+value.NoiDung+"</td>"+
                            "<td>"+value.GhiChu+"</td></tr>"
                    );
                });
                $.each(data['filethamdinh'], function(i, item) {
                    var $tr = $("#filetd").append($('<tr/>')
                    .append($('<td/>').html("<a href=/files/'"+item.TenFile+"'>"+item.TenFile+"</a>"))
                    .append($('<td/>').text(item.hoidongthamdinh.SoQuyetDinh))
                    );
                });
                $.each(data['tiendo'], function(key, value){
                    $("#ttiendo").append($('<tr/>')
                    .append($('<td/>').text(date(value.NgayXacNhan)))
                    .append($('<td/>').text(value.NguoiThucHien))
                    .append($('<td/>').text(value.NoiDung))
                    .append($('<td/>').text(value.GhiChu))
                    );
                });
                $.each(data['filetiendo'], function(i, item) {
                    var $tr = $("#filetiendo").append($('<tr/>')
                    .append($('<td/>').html("<a href=/files/'"+item.TenFile+"'>"+item.TenFile+"</a>"))
                    .append($('<td/>').text(date(item.tiendothuchien.NgayXacNhan)))
                    );
                });
                $.each(data['taichinh'], function(key, value){
                    $("#ttaichinh").append(
                            "<tr><td>"+date(value.Ngay)+"</td>"+
                            "<td>"+value.SoTien+"</td>"+
                            "<td>"+value.hinhthucthanhtoan.TenHinhThuc+"</td>"+
                            "<td>"+value.NguoiGiao+"</td>"+
                            "<td>"+value.NguoiNhan+"</td>"+
                            "<td>"+value.NoiDung+"</td>"+
                            "<td>"+value.GhiChu+"</td></tr>"
                    );
                });
                $.each(data['filetaichinh'], function(i, item) {
                    var $tr = $("#filetaichinh").append($('<tr/>')
                    .append($('<td/>').html("<a href=/files/'"+item.TenFile+"'>"+item.TenFile+"</a>"))
                    .append($('<td/>').text(date(item.taichinhdetai.Ngay)))
                    );
                });
                $.each(data['hdnt'], function(key, value){
                    $("#tnghiemthu").append(
                            "<tr><td>"+date(value.Ngay)+"</td>"+
                            "<td>"+value.SoQuyetDinh+"</td>"+
                            "<td>"+value.loaicapquanly.TenLoaiCap+"</td>"+
                            "<td>"+value.ChuTichHD+"</td>"+
                            "<td>"+value.ThanhVienHD+"</td>"+
                            "<td>"+value.NoiDung+"</td>"+
                            "<td>"+value.GhiChu+"</td></tr>"
                    );
                });
                $.each(data['filenghiemthu'], function(i, item) {
                    var $tr = $("#filenghiemthu").append($('<tr/>')
                    .append($('<td/>').html("<a href=/files/'"+item.TenFile+"'>"+item.TenFile+"</a>"))
                    .append($('<td/>').text(date(item.hoidongnghiemthu.SoQuyetDinh)))
                    );
                });


                $('#btn-save').val("update");
                $('#myModal2').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new product / update existing product ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        var formData = {
            ID: $('#dangkydetai_id').val(),
            TenCQTC: $('#TenCQTC').val(),
            EmailCQTC: $('#EmailCQTC').val(),
            DiaChiCQTC: $('#DiaChiCQTC').val(),
            SDTCQTC: $('#SDTCQTC').val(),
            TenCN: $('#TenCN').val(),
            EmailCN: $('#EmailCN').val(),
            DiaChiCN: $('#DiaChiCN').val(),
            SDTCN: $('#SDTCN').val(),
            TenDT: $('#TenDT').val(),
            ThoiGianDuKien: $('#ThoiGianDuKien').val(),
            ThoiGianDangKy: $('#ThoiGianDangKy').val(),
            KinhPhiDuKien: $('#KinhPhiDuKien').val(),
            VonNhaNuoc: $('#VonNhaNuoc').val(),
            VonTuCo: $('#VonTuCo').val(),
            LinhVucKhoaHoc: $('#LinhVucKhoaHoc').val(),
            LoaiCapQuanLy: $('#LoaiCapQuanLy').val(),
            ChuongTrinhKhoaHoc: $('#ChuongTrinhKhoaHoc').val(),
            CanBoQuanLy: $('#CanBoQuanLy').val(),
            FileEdit: $('#fileedit').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
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
                var dangkydetai = '<tr id="dangkydetai' + data.ID + '"><td>' + data.ID + '</td><td>' + data.TenCQTC + '</td><td>' + data.EmailCQTC + '</td><td>' + data.DiaChiCQTC + '</td><td>' + data.SDTCQTC + '</td><td>' + data.TenCN + '</td><td>' + data.EmailCN + '</td><td>' + data.DiaChiCN + '</td><td>' + data.SDTCN + '</td><td>' + data.TenDeTai + '</td><td>' + data.ThoiGianDuKien + '</td><td>' + data.ThoiGianDangKy + '</td><td>' + data.KinhPhiDuKien + '</td><td>' + data.VonNhaNuoc + '</td><td>' + data.VonTuCo + '</td><td>' + data.LoaiCapQuanLy + '</td><td>' + data.LinhVucKhoaHoc + '</td><td>' + data.ChuongTrinhKhoaHoc + '</td><td>' + data.CanBoQuanLy + '</td>';
                dangkydetai += '<td><button btn btn-outline btn-success  dim open_modal" value="' + data.ID + '">Edit</button>';
                dangkydetai += ' <button class="btn btn-outline btn-danger  dim delete-dangkydetai" value="' + data.ID + '">Delete</button></td></tr>';
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