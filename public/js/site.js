$(document).ready(function ($) {

    $("#modal").on('click', function (e) {
        if (e.target == this) $("#modal").fadeOut('fast');
    });


    // setTimeout(func, 5000);

    $(".phone").mask("+7(999) 999-9999");

    $('.submit-button').click(function() {

        let send = true;
        let id = $(this).attr('rel');
        let empty_field = '';
        $('.field').each(function () {
            if ($(this).val()==='' || $(this).val()===' ') {
                empty_field = $(this).attr('rel');
                send  = false;
                return false;
            }
        });
        if (($('#message'+id).val()==='' || $('#message'+id).val()===' ') && send===true) {
            empty_field = 'message';
            send = false;
        }


        if (send) {
            $.ajax({
                url: "/send_form/" + id,
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
        else {
            console.log('Заполните поле ', empty_field, id);
            $('#'+empty_field+id).toggleClass('empty-field');
        }
        console.log('send data form ', $(this).attr('rel'));
        return false;
    });

    $('.field').blur(function () {
        if ($(this).val !== '' && $(this).val !== ' ') {
            $(this).removeClass('empty-field');
        }
    });

}(jQuery));
