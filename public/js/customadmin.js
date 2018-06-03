$(document).ready(function() {
    $('.xoa').click(function () {
        var name = $(this).parents('tr').find('#name').text();
        return confirm('Bạn có muốn xóa "'+name+'"');
    });
    $('.suasanpham').click(function(){

        var id= $(this).attr('id');
        var soluong = $(this).parent().parent().find('.soluong').val();
        var token=  $("input[name='_token']").val();
        $.ajax({
            url:'/cuulongseed/public/giohang/'+id+'/'+soluong,
            type:'POST',
            cache:false,
            data:{"_token":token, "id":id, "soluong":soluong},
            success:function(data)
            {
                if(data === "oke")
                {
                    window.location = "giohang"
                }
            }
        });
    });
});
