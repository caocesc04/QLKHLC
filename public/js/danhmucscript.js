
$(document).ready(function(){

    //get base URL *********************
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
                $('#LoaiCapQuanLy').val(data.TenLoaiCap);
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
            LoaiCapQuanLy: $('#LoaiCapQuanLy').val(),
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