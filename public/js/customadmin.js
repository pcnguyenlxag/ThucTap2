$(document).ready(function() {
    $('.xoa').click(function () {
        var name = $(this).parents('tr').find('#name').text();
        return confirm('Bạn có muốn xóa "'+name+'"');
    })
});
