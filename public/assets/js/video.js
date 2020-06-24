$(function(){

    function deleteFile(file) {
        $.ajax({
            url: "/admin/send_form/" + id,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "Post",
            data: $('#sendform'+id).serialize(),
            success: function (data) {
                $('.form-area' + id).html('<h2>'+data.result+'</h2>');
            },
            error: function (data) {
                $('.form-area' + id).html('<h2>Сообщение не отправлено</h2>');
            },
            complete: function (data) {
            }
        });
    }

});
