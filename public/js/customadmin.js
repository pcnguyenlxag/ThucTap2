$(document).ready(function() {
    $('.xoa').click(function () {
        var name = $(this).parents('tr').find('#name').text();
        return confirm('Bạn có muốn xóa "'+name+'"');
    });
    $('.suasanpham').click(function(){
        var id= $(this).attr('id');
        var soluong = $(this).parents().parents().find('.soluong').val();
        var token=  $("input[name='_token']").val();
        $.ajax({
            url:url('/giohang/'+id+'/'+soluong),
            type: 'get',
            data:{'_token':token, 'id': $item->rowId, soluong: $item->qty},
            success: function(data)
            {

            }
        });
    });
});
